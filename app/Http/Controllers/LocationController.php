<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;

class LocationController extends Controller
{
    public function show()
    {
        return Location::get();
    }
}
