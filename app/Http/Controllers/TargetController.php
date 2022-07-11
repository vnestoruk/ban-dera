<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Http\Resources\TargetResource;

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
                ->paginate(15)
                ->onEachSide(1)
        );
    }

    public function show(Target $target): \App\Http\Resources\Json\JsonResource
    {
        return TargetResource::make($target);
    }
}
