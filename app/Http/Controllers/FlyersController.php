<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FlyersController extends Controller
{
    public function addPhoto(Request $request){
        dd($request->file('file'));
    }


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
        flash()->overlay("WELCOME!!!", "Welcome to the create page!");
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FlyerRequest $request)
    {
        // Notice the validation is being done through the custom Request in the above parameter
        // This method won't get triggered if the Request doesn't pass validation in the FlyerRequest.php file
        \App\Flyer::create($request->all());

        // We've created "flash" as a global function in app/helpers.php
        // where it accesses the class and object we've created
        // in app/http called Flash.php
        flash('Flyer successfully created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $street
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($zip, $street)
    {
        $flyer = \App\Flyer::locatedAt($zip, $street)->first();
        return view('flyers.show', compact('flyer'));
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
