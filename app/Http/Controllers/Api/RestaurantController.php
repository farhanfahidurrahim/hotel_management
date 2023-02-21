<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Restaurantmenu;

class RestaurantController extends Controller
{
    public function index()
    {
        $data=Restaurant::orderBy('name','asc')->get();
        if ($data) {
            return response()->json([
                'ALL Restaurant'=>$data,
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
