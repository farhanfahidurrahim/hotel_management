<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\PrivacyPolicyController;
use App\Http\Controllers\Api\HelpSupportController;
use App\Http\Controllers\Api\TermsServiceController;

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
//Login API Routes
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

//Division API Routes
Route::get('/all_divison',[DivisionController::class,'index']);
Route::post('/add_divison',[DivisionController::class,'store']);
Route::post('/update_divison/{id}',[DivisionController::class,'update']);
Route::post('/delete_divison/{id}',[DivisionController::class,'destroy']);

// displayjibon  all hotel
Route::get('/all_hotel',[HotelController::class,'hotel_list']);
Route::get('/hotel_Room_list',[HotelController::class,'hotel_Room_list']);

//Booking API Routes
Route::get('/all-booking',[BookingController::class,'index']);

//Restaurant API Routes
Route::get('/all-restaurant',[RestaurantController::class,'index']);
Route::get('/all-restaurant-menus',[RestaurantController::class,'menuIndex']);

//AboutUs, PrivacyPolicy, HelpSupport : API Routes
Route::get('/about-us',[AboutUsController::class,'index']);
Route::get('/privacy-policy',[PrivacyPolicyController::class,'index']);
Route::get('/help-support',[HelpSupportController::class,'index']);
Route::get('/terms-service',[TermsServiceController::class,'index']);


