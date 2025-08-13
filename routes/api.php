<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BlogController;

Route::get('/ping', function() {
    return response()->json(['pong' => true]);
});

Route::prefix('v1')->group(function() {
    Route::get('/health', fn() => response()->json(['ok' => true]));
    Route::apiResource('blogs', BlogController::class);
});