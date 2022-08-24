<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ItemsController;


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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

 Route::middleware('auth:api')->group(function(){
Route::get('getUser', [AuthController::class, 'getUserInfo']);

Route::post('storeCategory', [CategoryController::class, 'storeCategory']);
Route::post('storeItem', [ItemsController::class, 'storeItem']);
Route::put('/item/edit/{id}', [ItemsController::class, 'update']);
Route::put('/category/edit/{id}', [CategoryController::class, 'updateCategory']);
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
