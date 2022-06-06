<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Frontend\BannerController;
use App\Http\Controllers\Api\Frontend\InterestLinkController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('testApi', function () {
    return 'test Api';
});

Route::group(['middleware' => ['apiJwt']], function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'index']);
});

Route::group(
    [
        'prefix' => 'frontend',
        'middleware' => [
            'apiJwt',
        ],
    ],
    function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);

        Route::get('banners', [BannerController::class, 'index']);
        Route::get('banners/{id}', [BannerController::class, 'show']);
    }
);
