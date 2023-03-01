<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Campaign::all();
        return view("campaign.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("campaign.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data=$request->all();

         if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('file/campaign/images/'),$filename);

            $data['photo'] = $filename;
        }

        Campaign::create([
            'title'=>$request->title,
            'type'=>$request->type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'photo' => $data['photo'],
        ]);

        return redirect()->route('campaign.index');
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
        $data = Campaign::findOrFail($id);
        return view('campaign.edit', compact('data'));
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
        $data =   Campaign::FindorFail($id);

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            //dd($filename);
            $file->move(public_path('file/campaign/images/'), $filename);
            // deleting previous photo 
            @unlink(public_path('file/campaign/images/'. $data->photo));
            $requestData['photo']= $filename;
        }

        $data->fill($requestData)->save();
        return redirect()->route('campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Campaign::findOrFail($id);
        @unlink(public_path('file/campaign/images/' . $data->photo));
        $data->delete();
        return back();
    }
}
