<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Division;
use Illuminate\Http\Request;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Hotel::all();
        return view('hotels.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data=Division::all();
        return view('hotels.create',compact('data'));
    }
    public function view()
    {
        return view('hotels.view');
    }

    public function rooms()
    {
        return view('hotels.rooms');
    }

    public function ratings()
    {
        return view('hotels.ratings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $request->validate([
        //     'name' => 'required',
        //     'division_id' => 'required',
        //     'location' => 'required',
        //     'description' => 'required',
        //     'discount' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //     'contact_no' => 'required',
        //     'facebook_page' => 'required',
        //     'website_link' => 'required',
        //     'youtube_link' => 'required',
        //     'tags' => 'required',
        //     'services' => 'required',
        //     'photo' => 'required',
        // ]);

        // dd($request->all());

        $data=array();
        $data['name']=$request->name;
        $data['division_id']=$request->division_id;
        $data['location']=$request->location;
        $data['description']=$request->description;
        $data['price']=$request->price;
        $data['offer_price']=$request->offer_price;
        $data['discount']=$request->discount;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['contact_no']=$request->contact_no;
        $data['facebook_page']=$request->facebook_page;
        $data['website_link']=$request->website_link;
        $data['youtube_link']=$request->youtube_link;
        $data['tags']=$request->tags;
        $data['services']=$request->services;
        $data['photo']=$request->photo;
        //Working with Image
        // if ($request->photo) {
        //     $file = $request->file('image');
        //     //dd($file);
        //     $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
        //     //dd($filename);
        //     $file->move(public_path('public/files/'), $filename);

        //     $data['photo']= $filename;
        // }

        DB::table('hotels')->insert($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Hotel::find($id);
        $div=Division::all();
        return view('hotels.edit',compact('data','div'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['division_id']=$request->division_id;
        $data['location']=$request->location;
        $data['description']=$request->description;
        $data['price']=$request->price;
        $data['offer_price']=$request->offer_price;
        $data['discount']=$request->discount;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['contact_no']=$request->contact_no;
        $data['facebook_page']=$request->facebook_page;
        $data['website_link']=$request->website_link;
        $data['youtube_link']=$request->youtube_link;
        $data['tags']=$request->tags;
        $data['services']=$request->services;
        //$data['photo']=$request->photo;

        DB::table('hotels')->where('id',$id)->update($data);
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Hotel::find($id);
        $data->delete();

        return redirect()->back();
    }
}
