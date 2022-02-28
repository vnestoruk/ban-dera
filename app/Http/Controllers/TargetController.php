<?php

namespace App\Http\Controllers;

use App\Http\Resources\TargetResource;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        return TargetResource::collection(Target::all());
    }

    public function replace()
    {
        return TargetResource::make(Target::inRandomOrder()->limit(1)->get());
    }

}
