<?php

use App\Http\Controllers\EntityCardController;
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
Route::patch('v1/make_damage', [EntityCardController::class, 'makeDamage']);
