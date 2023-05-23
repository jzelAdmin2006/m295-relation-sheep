<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/relationsheep'], function () {
    Route::get('/posts', [PostController::class, 'findAll']);

    Route::get('/topics/{slug}/posts', [TopicController::class, 'findPostsBySlug']);
    Route::get('/tags/{tagSlug}/posts', [TagController::class, 'findPostsBySlug']);
});
