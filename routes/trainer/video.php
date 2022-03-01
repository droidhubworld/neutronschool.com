<?php

use App\Http\Controllers\Trainer\Video\VideoUploadController;

// Video Management
Route::group(['namespace' => 'Video'], function () {
   
    Route::resource('video-upload', VideoController::class);

    Route::post('file-upload/upload-large-files', [VideoUploadController::class, 'uploadLargeFiles'])->name('file.upload.lrge');

});