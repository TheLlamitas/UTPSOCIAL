<?php

use Facades\App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/crop-image', [ApiController::class, 'cropImage']);
Route::delete('/destroy-post', [ApiController::class, 'destroyPost']);
Route::get('/render-component-post-show', [ApiController::class, 'render']);
Route::post('/edit-post', [PostController::class, 'edit'])->name('editPost');
