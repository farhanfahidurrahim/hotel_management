<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DivisionController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user',[AuthController::class,'user'])->middleware('auth:api');
//Login Routes
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

//Division Routes
Route::get('/all_divison',[DivisionController::class,'index']);
Route::post('/add_divison',[DivisionController::class,'store']);
Route::post('/update_divison/{id}',[DivisionController::class,'update']);
Route::post('/delete_divison/{id}',[DivisionController::class,'destroy']);