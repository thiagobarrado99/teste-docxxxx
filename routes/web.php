<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Route;

Route::middleware(['forceauth'])->group(function () {
        
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::middleware(['auth'])->prefix("dashboard")->controller(DashboardController::class)->group(function () {
        //Routes available to all logged users
        Route::get("/", "index");
        
        Route::post("/logout", "logout");
        Route::post('/keep-token-alive', 'keepTokenAlive');
        Route::post("/view-notifications", "viewNotifications");

        Route::prefix("zips")->controller(ZipController::class)->group(function () {
            Route::get("/", "index");
            Route::get("/create", "create");

            Route::post("/", "store");

            Route::delete("/{id}", "delete");
        });
    });
});
