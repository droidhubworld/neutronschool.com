<?php


/**
 * All route names are prefixed with 'trainer.'.
 */

use App\Http\Controllers\Trainer\DashboardController;
use App\Http\Controllers\Trainer\Profile\ProfileController;
use App\Http\Controllers\Trainer\Profile\ProfileSetting;

use App\Http\Controllers\Frontend\User\AccountController;

Route::group([
    'middleware' => ['auth', 'password_expires']
], function () {
    
   
    Route::group(['namespace' => 'Trainer'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');
   
        Route::group([
            'prefix' => 'myaccount',
            'as' => 'myaccount.',
            'namespace' => 'MyAccount',], function () {
           
            Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile');
            Route::get('setting', [ProfileSetting::class, 'showView'])->name('setting');
            // User Profile Specific
            Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
            //Address 
            // Route::get('address', [AddressController::class, 'index'])->name('address');
            // Route::delete('destroy', [AddressController::class, 'destroy'])->name('destroy');
          
            // Save Address
            // Route::patch('address_save', [AddressController::class, 'save'])->name('address_save');

            
        });
    });
});
