<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;

/**
 * Class HomeController.
 */
class HomeController extends BaseController
{ 
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index')
        ->withCategorys($this->getCategory())
        ->withLocation($this->getLocation());
    }
}
