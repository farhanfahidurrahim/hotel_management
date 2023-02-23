<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $data=Booking::orderBy('customer_name','asc')->get();
        if ($data) {
            return response()->json([
                'ALL Booking'=>$data,
                200
            ]);
        }else{
            return response()->json(['error'=>'Not Found Booking Data']);
        }
    }
}
