<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('api')->apiResource('artists', ArtistController::class);

Route::group(['middleware' => 'api'], function ($router) {
    Route::put('/artists/like/{artist}', [ArtistController::class, 'like']);
    Route::put('/artists/dislike/{artist}', [ArtistController::class, 'dislike']);
    Route::apiResource('artists', ArtistController::class);
});