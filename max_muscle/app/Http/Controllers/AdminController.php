<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page;
use App\Models\vimeovid;

class AdminController extends Controller
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
    public function edit_aboutus()
    {
        $aboutus = page::find(1);
        return view('admin.aboutus',compact("aboutus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_vimeo()
    {
        $vimeo = vimeovid::find(1);
        return view('admin.vimeo',compact("vimeo"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
     return view("admin.dashboard");
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
       $aboutus = page::find($id);
       $aboutus->title = $request->title;
       $aboutus->content = $request->description;
       $aboutus->update();
       return redirect()->route('admin.aboutus')->with('success','About Us updated successfully!');

    }
    public function update_vimeo(Request $request,$id){
      $vimeo = vimeovid::find($id);
       $vimeo->title = $request->title;
       $vimeo->description = $request->description;
       $vimeo->link = $request->link;
       $vimeo->update();
       return redirect()->route('admin.vimeo')->with('success','Vimeo Video updated successfully!');   
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
