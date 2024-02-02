<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::post('v1/test', [TestController::class, 'test']);

Route::post('v1/user/create', [\App\Http\Controllers\UserController::class, 'create']);

Route::post('v1/entity/create', [\App\Http\Controllers\EntityCardController::class, 'create']);
Route::post('v1/entity/make-damage', [\App\Http\Controllers\EntityCardController::class, 'makeDamage']);
Route::post('v1/entity/restore-health', [\App\Http\Controllers\EntityCardController::class, 'restoreHealth']);

Route::post('v1/group/create', [\App\Http\Controllers\GroupController::class, 'create']);
Route::post('v1/group/rename', [\App\Http\Controllers\GroupController::class, 'rename']);
Route::post('v1/group/add-user', [\App\Http\Controllers\GroupController::class, 'addUser']);
Route::post('v1/group/all-users', [\App\Http\Controllers\GroupController::class, 'getAllUsers']);
Route::post('v1/group/get', [\App\Http\Controllers\GroupController::class, 'getGroup']);
