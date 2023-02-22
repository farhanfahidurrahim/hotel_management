<?php

// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

// Route::get('/', function () {
//     return redirect()->route('login');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// <?php
/*
use Faker\Guesser\Name;


|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PopularDealsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\CustomerRewardController;
use App\Http\Controllers\HelpAndSupportController;
use App\Http\Controllers\TermsOfServiceController;
use App\Http\Controllers\RestaurantOrderController;
use App\Http\Controllers\CustomerMagementController;
use App\Http\Controllers\EmergencyContactsController;

Route::get('/', function () {
    return redirect()->route('login');
    //return redirect()->route('index');
})->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
});

Route::resource('/division',DivisionController::class);

Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class,'index'])->name('hotels.index');
    Route::get('/create', [HotelController::class,'create'])->name('hotels.create');
    Route::post('/store', [HotelController::class,'store'])->name('hotels.store');
    Route::get('/edit/{id}', [HotelController::class,'edit'])->name('hotels.edit');
    Route::post('/update/{id}', [HotelController::class,'update'])->name('hotels.update');
    Route::post('/delete/{id}', [HotelController::class,'destroy'])->name('hotels.delete');
    Route::get('/view', [HotelController::class,'view'])->name('hotels.view');

    //route hotel room
    Route::get('/hotel-rooms', [HotelController::class,'rooms'])->name('hotels.rooms');
    Route::get('/hotel-rooms-offer-create', [HotelController::class,'roomCreate'])->name('hotels.rooms.create');
    Route::post('/hotel-rooms-offer-store', [HotelController::class,'roomStore'])->name('hotels.rooms.store');
    Route::get('/hotel-rooms-offer-edit/{id}', [HotelController::class,'roomEdit'])->name('hotels.rooms.edit');
    Route::post('/hotel-rooms-offer-update/{id}', [HotelController::class,'roomUpdate'])->name('hotels.rooms.update');
    Route::post('/hotel-rooms-offer-delete/{id}', [HotelController::class,'roomDestroy'])->name('hotels.rooms.delete');
    Route::get('/rating', [HotelController::class,'ratings'])->name('hotels.rating');
});

Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class,'index'])->name('booking.index');
    Route::get('/create', [BookingController::class,'create'])->name('booking.create');
});

Route::prefix('restaurant')->group(function () {
    Route::get('/', [RestaurantController::class,'index'])->name('restaurant.index');
    Route::get('/create', [RestaurantController::class,'create'])->name('restaurant.create');
    Route::post('/store', [RestaurantController::class,'store'])->name('restaurant.store');
    Route::get('/edit/{id}', [RestaurantController::class,'edit'])->name('restaurant.edit');
    Route::post('/update/{id}', [RestaurantController::class,'update'])->name('restaurant.update');
    Route::post('/delete/{id}', [RestaurantController::class,'destroy'])->name('restaurant.delete');

    Route::get('/menus', [RestaurantController::class,'menus'])->name('restaurant.menus');
    Route::get('/menus/create', [RestaurantController::class,'menusCreate'])->name('restaurant.menus.create');
    Route::post('/menus/store', [RestaurantController::class,'menusStore'])->name('restaurant.menus.store');
    Route::get('/menus/edit/{id}', [RestaurantController::class,'menusEdit'])->name('restaurant.menus.edit');
    Route::post('/menus/update/{id}', [RestaurantController::class,'menusUpdate'])->name('restaurant.menus.update');
    Route::post('/menus/delete/{id}', [RestaurantController::class,'menusDestroy'])->name('restaurant.menus.delete');

    Route::get('/menus/foods', [RestaurantController::class,'foods'])->name('restaurant.foods');

    Route::get('/ratings', [RestaurantController::class,'rating'])->name('restaurant.ratings');
    Route::get('/ratings/edit/{id}', [RestaurantController::class,'ratingEdit'])->name('restaurant.ratings.edit');
    Route::post('/ratings/update/{id}', [RestaurantController::class,'ratingUpdate'])->name('restaurant.ratings.update');
    Route::post('/ratings/delete/{id}', [RestaurantController::class,'ratingDelete'])->name('restaurant.ratings.delete');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [RestaurantOrderController::class,'index'])->name('order.index');
    Route::get('/create', [RestaurantOrderController::class,'create'])->name('order.create');
    Route::get('/inprogress', [RestaurantOrderController::class,'inProgress'])->name('order.inprogress');
    Route::get('/pending', [RestaurantOrderController::class,'pending'])->name('order.pending');
    Route::get('/delivered', [RestaurantOrderController::class,'delivered'])->name('order.delivered');
    Route::get('/cancelled', [RestaurantOrderController::class,'cancelled'])->name('order.cancelled');
});

Route::prefix('reward')->group(function () {
    Route::get('/', [CustomerRewardController::class,'index'])->name('reward.index');
    Route::get('/create', [CustomerRewardController::class,'create'])->name('reward.create');
});

Route::prefix('vendor')->group(function () {
    Route::get('/', [VendorController::class,'index'])->name('vendor.index');
    Route::get('/create', [VendorController::class,'create'])->name('vendor.create');
    Route::post('/store', [VendorController::class,'store'])->name('vendor.store');
    //Route::get('/roles', [RolesController::class,'index']);
});

Route::prefix('campaign')->group(function () {
    Route::get('/', [CampaignController::class,'index'])->name('campaign.index');
    Route::get('/create', [CampaignController::class,'create'])->name('campaign.create');
    Route::post('/store', [CampaignController::class,'store'])->name('campaign.store');
    Route::get('/edit/{id}', [CampaignController::class,'edit'])->name('campaign.edit');
    Route::get('/delete/{id}', [CampaignController::class,'delete'])->name('campaign.destroy');
});

Route::resource('customer', CustomerController::class);

Route::resource('/about-us', AboutUsController::class);

Route::resource('/privacy-policy', PrivacyPolicyController::class);

Route::resource('/help-support', HelpAndSupportController::class);

Route::resource('/terms-service', TermsOfServiceController::class);

Route::prefix('popular-deals')->group(function () {
    Route::get('/', [PopularDealsController::class,'index'])->name('deals.index');
});

Route::resource('emergency', EmergencyContactsController::class);


// Route::get('/login', function(){
//     return view('admin.login');
// })->name('login');

// Route::get('/register', function(){
//     return view('admin.register');
// })->name('sign-up');

// Route::get('/forget-password', function(){
//     return view('admin.forget-password');
// })->name('forget-password');


Route::post('/get-districts', [AjaxController::class, 'getDistricts'])->name('get.districts');
Route::post('/get-upazillas', [AjaxController::class, 'getUpazillas'])->name('get.upozillas');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

