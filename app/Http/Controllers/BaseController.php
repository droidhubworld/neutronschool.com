<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Traits\Category\CategoryHalper;
use App\Models\Traits\CurrentLocation\CurrentLocation;

class BaseController extends Controller
{
    use CategoryHalper, CurrentLocation;

    public function getCategory(){
        return CategoryHalper::categoryList();
    }
    public function getLocation(){
        return CurrentLocation::userCurrentLocation();
    }

    
}
