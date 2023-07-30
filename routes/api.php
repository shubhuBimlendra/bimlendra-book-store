<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BookControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BookControllerApi::class, 'index']);
    Route::post('/', [BookControllerApi::class, 'store']);
    Route::get('/{id}', [BookControllerApi::class, 'show']);
    Route::put('/{id}', [BookControllerApi::class, 'update']);
    Route::delete('/{id}', [BookControllerApi::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
