<?php


namespace App\Http\Controllers\Trainer\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Support\Facades\View;

class ProfileSetting extends Controller
{
    public function __construct()
    {
        
        View::share('js', ['address']);
    }
    public function showView()
    {
        return view('trainer.profile.profile_setting');
    }
}
