<?php

namespace App\Http\Controllers;

use App\Models\HelpAndSupport;
use Illuminate\Http\Request;

class HelpAndSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
    }

    public function add()
    {
        $help = new HelpAndSupport();
        $help->title = "Help and Support";
        $help->description = "Lots of help and support";
        $help->save();
    }

    public function delete()
    {
        $help  = HelpAndSupport::where('id', 1)->first();
        $help->delete();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $help  = HelpAndSupport::where('id', 1)->first();
        return View("support.create", compact('help'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        $help = HelpAndSupport::findOrFail(1);
        $help->update($data);

        return back();

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
