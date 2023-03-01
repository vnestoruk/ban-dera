<?php

namespace App\Http\Controllers;

use App\Events\TargetAttackState;
use App\Http\Requests\Target\ApproveTargetRequest;
use App\Http\Requests\Target\DestroyTargetRequest;
use App\Http\Requests\Target\UpdateTargetRequest;
use App\Http\Requests\Target\StoreTargetRequest;
use App\Models\Target;
use App\Http\Resources\TargetResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TargetController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TargetResource::collection(
            Target::orderBy('updated_at', 'desc')
                ->search(request()->input('keyword', null))
                ->paginate(10)
                ->onEachSide(1)
        );
    }

    public function attackList()
    {
        return TargetResource::collection(
            Target::approved()->underAttack()->get()
        );
    }

    public function show(Target $target): \App\Http\Resources\Json\JsonResource
    {
        return TargetResource::make($target);
    }

    public function store(StoreTargetRequest $request) {
        $target = Target::create([
            'url' => $request->validated('url'),
            'secure' => $request->validated('secure', true),
            'approved' => false
        ]);


        $target->suggestedBy()->associate(Auth::user()->id);

        $target->categories()->attach($request->validated('categories'));
        $target->save();

        return TargetResource::make($target);
    }

    public function update(UpdateTargetRequest $request, Target $target) {
        $validated = $request->validated();

        $target->fill($validated);

        if (isset($validated['categories'])) {
            $target->categories()->sync($request->validated('categories'));
        }

        TargetAttackState::dispatchIf($target->isDirty('under_attack'), $target);

        $target->save();
        Log::info($target);

        return TargetResource::make($target);
    }

    public function destroy(DestroyTargetRequest $request, Target $target) {
        $target->delete();
    }
}
