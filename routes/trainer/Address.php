<?php

// Addres Management
Route::group(['namespace' => 'Address'], function () {
   
    Route::resource('address', AddressController::class);

    //For DataTables
    Route::post('address/get', AddresTableController::class)->name('address.get');
});