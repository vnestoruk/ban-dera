<?php

namespace App\Http\Controllers;

use Stevebauman\Location\Facades\Location;

class LocationController extends Controller
{
    public function show()
    {
        return Location::get('93.175.200.119');
    }
}
