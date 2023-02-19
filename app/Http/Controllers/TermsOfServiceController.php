<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermsRequest;
use App\Models\TermsOfService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TermsOfServiceController extends Controller
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
        $term  = TermsOfService::where('id', 3)->first();
        return View("service.create", compact('term'));
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

        $terms = TermsOfService::findOrFail(3);
        $terms->update($data);

        return back();
    }


    public function add()
    {
        $term = new TermsOfService();
        $term->title = "terms of service";
        $term->description = "terms of service is available and verified";
        $term->save();
    }

    public function delete()
    {
        $term  = TermsOfService::where('id', 1)->first();
        $term->delete();
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
