<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('activities.index');
});

use App\Http\Controllers\ActivityController;

Route::resource('activities', ActivityController::class);