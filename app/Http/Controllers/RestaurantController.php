<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Restaurant;
use App\Models\Upozilla;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'required|string',
            'district' => 'required|string',
            'upozilla' => 'required|string',
            'location' => 'required|string',
            'desctiption' => 'nullable|string',
            'discount' => 'nullable|integer',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'contact_no' => 'required|string',
            'facebook_page' => 'nullable|string',
            'website_link' => 'nullable|string',
            'youtube_link' => 'nullable|string',
            'tags' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Restaurant::create($validatedData);

        return redirect()->route('restaurant.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
