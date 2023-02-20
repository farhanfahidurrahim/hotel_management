<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Restaurant;
use App\Models\Upozilla;
use Illuminate\Http\Request;
use DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Restaurant::all();
        return view('restaurant.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('restaurant.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'division_id' => 'required|string',
        //     // 'district' => 'required|string',
        //     // 'upozilla' => 'required|string',
        //     'location' => 'required|string',
        //     'desctiption' => 'nullable|string',
        //     'discount' => 'nullable|integer',
        //     'latitude' => 'required|string',
        //     'longitude' => 'required|string',
        //     'contact_no' => 'required|string',
        //     'facebook_page' => 'nullable|string',
        //     'website_link' => 'nullable|string',
        //     'youtube_link' => 'nullable|string',
        //     'tags' => 'nullable|string',
        //     'status' => 'required|boolean',
        // ]);

        $data=array();
        $data['name']=$request->name;
        $data['division_id']=$request->division_id;
        $data['location']=$request->location;
        $data['description']=$request->description;
        $data['discount']=$request->discount;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;
        $data['contact_no']=$request->contact_no;
        $data['facebook_page']=$request->facebook_page;
        $data['website_link']=$request->website_link;
        $data['youtube_link']=$request->youtube_link;
        $data['tags']=$request->tags;
        $data['status']=$request->status;
        //Working with Image
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('file/restaurant/images/'),$filename);

            $data['photo'] = $filename;
        }

        DB::table('restaurants')->insert($data);
        return redirect()->route('restaurant.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=Restaurant::findOrFail($id);
        $division=Division::all();
        return view('restaurant.edit',compact('data','division'));
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
        $requestData = $request->all();
        $data =   Restaurant::FindorFail($id);

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            //dd($filename);
            $file->move(public_path('file/restaurant/images/'), $filename);
            // deleting previous photo 
            @unlink(public_path('file/restaurant/images/'. $data->photo));
            $requestData['photo']= $filename;
        }

        $data->fill($requestData)->save();
        return redirect()->route('restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Restaurant::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function foods()
    {
        return view('restaurant.foods');
    }

    public function menus()
    {
        return view('restaurant.menus');
    }

    public function rating()
    {
        return view('restaurant.rating');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
}
