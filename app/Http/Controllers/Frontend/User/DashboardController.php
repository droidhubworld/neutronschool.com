<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\BaseController;

/**
 * Class DashboardController.
 */
class DashboardController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')
        ->withCategorys($this->getCategory());
    }
}
