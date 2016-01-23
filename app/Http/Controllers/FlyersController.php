<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Flyer;
use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyersController extends Controller
{
    public function __construct()
    {

        //Have to explicitly call the parent constructor because unlike in Java, it won't
        //get called automatically.
        parent::__construct();
    }

    public function getButton()
    {
        return view('button');
    }

    /**
     * @param $zip
     * @param $street
     * @param Request $request
     * @return string
     */
    public function addPhoto($zip, $street, Request $request)
    {
        $photo = $this->makePhoto($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())->move($file);
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
        Flyer::create($request->all());

        flash()->overlay("Success!", "Listing successfully created.");

        // We've created "flash" as a global function in app/helpers.php
        // where it accesses the class and object we've created
        // in app/http called Flash.php
        flash('Flyer successfully created!');
        $street = $street = str_replace('-', ' ', $request->street);
        return redirect($request->zip . '/' . $street);
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
        $flyer = \App\Flyer::locatedAt($zip, $street);
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
