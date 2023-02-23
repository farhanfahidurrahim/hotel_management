<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Hotelroom;
use DB;

class BookingController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Booking::all();
        return view('booking.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $hotel=Hotel::all();
        return view('booking.create',compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $hotelid=DB::table('hotelrooms')->where('id',$request->room_id)->first();
        //dd($hotelid);
        Booking::insert([
            'customer_name'=>$request->customer_name,
            'customer_phone'=>$request->customer_phone,
            'hotel_id'=>$hotelid->hotel_id,
            'room_id'=>$request->room_id,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'distance'=>$request->distance,
            'numberof_room'=>$request->numberof_room,
            'original_price'=>$request->original_price,
            'discount'=>$request->discount,
            'final_price'=>$request->final_price,
            'status'=>$request->status,
        ]);

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=Booking::FindorFail($id);
        $hotel=Hotel::all();
        return view('booking.edit',compact('data','hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $hotelid=DB::table('hotelrooms')->where('id',$request->room_id)->first();
        //dd($hotelid);
        $data = Booking::FindorFail($id);
        $data->update([
            'customer_name'=>$request->customer_name,
            'customer_phone'=>$request->customer_phone,
            'hotel_id'=>$hotelid->hotel_id,
            'room_id'=>$request->room_id,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'distance'=>$request->distance,
            'numberof_room'=>$request->numberof_room,
            'original_price'=>$request->original_price,
            'discount'=>$request->discount,
            'final_price'=>$request->final_price,
            'status'=>$request->status,
        ]);

        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Booking::FindorFail($id);
        $data->delete();

        return redirect()->back();
    }
}
