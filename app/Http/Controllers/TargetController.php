<?php

namespace App\Http\Controllers;

use App\Http\Requests\Target\StoreRequest;
use App\Models\Category;
use App\Models\Target;
use App\Http\Resources\TargetResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(StoreRequest $request) {
        $target = Target::create([
            'url' => $request->input('url'),
            'secure' => $request->input('secure', true),
            'approved' => false
        ]);


        $target->suggestedBy()->associate(Auth::user()->id);

        $target->categories()->attach($request->validated('categories'));
        $target->save();
    }
}
