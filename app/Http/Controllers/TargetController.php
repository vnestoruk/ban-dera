<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Http\Resources\TargetResource;

class TargetController extends Controller
{
    public function index()
    {
        return TargetResource::collection(Target::paginate(15));
    }

    public function show(Target $target)
    {
        return TargetResource::make($target);
    }
}
