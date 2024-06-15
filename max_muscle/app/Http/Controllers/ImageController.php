<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media; 

class ImageController extends Controller
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
        $images = Media::all()->sortBy('sequence');
        return view('admin.image.images',compact("images"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public  function store(Request $request)
    { 
        
        $gallary_img = new Media;

        $gallary_img->name = $request->name; 
        $max_order = Media::max('sequence');
        if($max_order){$gallary_img->sequence = ++$max_order;}
        else{$gallary_img->sequence = 01;}
        // Get feature image.
        $file = $request->file('image');
        $destinationPath = 'images/gallary';
        $gallary_img->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
        $gallary_img->description=$request->description;
         
        $gallary_img->save();
          
        return redirect()->route('image.index')->with('success','Image created successfully!');
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
         $image = Media::where('id', $id)->first();
        return view('admin.image.edit',compact("image"));
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
        $image = Media::find($id);

        $image->name = $request->name; 
        
        $file = $request->file('image');
        if(empty($file)){
           $image->image = $request->old_img; 
        }else{
            $destinationPath = 'images/gallary';
            $image->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $image->description = $request->description;

        $image->update();
        return redirect()->route('image.index')->with('success','Image updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Media::find($id);
        $image->delete();
        return back()->with('success','image deleted successfully!');
    }
    public function sort_img(Request $request){
        $images = $request->data;
        $i = 0;
        foreach ($images as  $id) {
            $image = Media::find($id);
            $image->sequence  = $i;
            $image->update();
            $i++;
        }
    }
}
