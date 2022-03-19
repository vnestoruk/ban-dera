<?php

namespace App\Http\Controllers;

use App\Http\Resources\TargetResource;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::availableFrom(request()->input('location_iso'))->get();
        return response()->json([
            'total' => Target::all()->count(),
            'ready' => $targets->count(),
            'data' => TargetResource::collection($targets)
        ]);
//        return TargetResource::collection(Target::availableFrom(request()->input('location_iso'))->get());
    }

}
