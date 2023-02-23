<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Restaurantmenu;
use App\Models\Restaurantrating;

class RestaurantController extends Controller
{
    public function index()
    {
        $data=Restaurant::where('status','=',1)->orderBy('name','asc')->get();
        $menudata=Restaurantmenu::where('status','=',1)->get();
        //$ratingdata=Restaurantrating::where('restaurant_id',$data->id)->first();
        if ($data) {
            return response()->json([
                'ALL Restaurant'=>$data,
                'Menu'=>$menudata,
                'Rating'=>$ratingdata,
                200
            ]);
        }else{
            return response()->json(['error'=>'Not Found Restaurant Data']);
        }
    }

    public function menuIndex()
    {
        $data=Restaurantmenu::orderBy('name','asc')->get();
        if ($data) {
            return response()->json([
                'All Restaurant Menus'=>$data,
                200
            ]);
        }else{
            return response()->json(['error'=>'Not Found Restaurant Menus Data']);
        }
    }
}
