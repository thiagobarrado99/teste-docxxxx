<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/mass-import', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
