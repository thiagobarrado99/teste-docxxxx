<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->controller(ApiController::class)->group(function () {
    Route::post('/mass-import', "massImport");
});
