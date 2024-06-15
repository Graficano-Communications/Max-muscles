<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video; 

class VideoController extends Controller
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
        $videos = Video::all()->sortBy('sequence');
        return view('admin.video.videos',compact("videos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public  function store(Request $request)
    { 
        
        $videos = new Video;

        $videos->name = $request->name;
        $videos->video_url = $request->video_url;
        $videos->description = $request->description;

        $max_order = Video::max('sequence');
        if($max_order){$videos->sequence = ++$max_order;}
        else{$videos->sequence = 01;}
         
        $videos->save();
          
        return redirect()->route('video.index')->with('success','Video created successfully!');
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
         $video = Video::where('id', $id)->first();
        return view('admin.video.edit',compact("video"));
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
        $videos = Video::find($id);
  
        $videos->name = $request->name;
        $videos->video_url = $request->video_url;
        $videos->description = $request->description;

        $max_order = Video::max('sequence');
        if($max_order){$videos->sequence = ++$max_order;}
        else{$videos->sequence = 01;}
           
        $videos->update();
        return redirect()->route('video.index')->with('success','Video updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videos = Video::find($id);
        $videos->delete();
        return back()->with('success','video deleted successfully!');
    }
    public function sort_vid(Request $request){
        $videos = $request->data;
        $i = 0;
        foreach ($videos as  $id) {
            $video = Video::find($id);
            $video->sequence  = $i;
            $video->update();
            $i++;
        }
    }
}
