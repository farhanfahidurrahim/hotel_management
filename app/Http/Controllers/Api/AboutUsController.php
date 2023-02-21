<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $data=AboutUs::get();
        if ($data) {
            return response()->json([
                'message'=>'Successfully Found Data!',
                'About-Us'=>$data,
                200
            ]);
        }else{
            return response()->json([
                'message'=>'Not Found Data!',
            ]);
        }
    }
}
