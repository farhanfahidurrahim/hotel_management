<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $rv=Review::create([
            'user_id'=>$request->userid,
            'user_name'=>$request->username,
            'restaurant_id'=>$request->restid,
            'restaurant_name'=>$request->restname,
            'star'=>$request->star,
            'feedback'=>$request->feedback,
        ]);

        return response()->json([
            'message'=>"Review Added Successfully",
            'Review'=>$rv,
        ]);
    }
}
