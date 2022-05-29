<?php

namespace App\Http\Controllers;

use App\Events\SignUpEvent;
use App\Events\NewVisitorEvent;
use App\Http\Resources\TargetResource;
use App\Models\Node;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class TargetController extends Controller
{

    public function index()
    {
        $location = Location::get('93.175.201.77');
        if ($location && Node::where('location_iso', '=', $location->countryCode)->exists()) {
            $targets = Target::available()->availableFrom($location->countryCode)->get();
        } else {
            $targets = Target::available()->get();
        }

        return response()->json([
            'location' => $location,
            'status' => [
                'total' => Target::all()->count(),
                'alive' => Target::available()->count()
            ],
            'data' => TargetResource::collection($targets)
        ]);
    }

}
