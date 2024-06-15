<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner; 

class BannerController extends Controller
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
        $banners = Banner::all()->sortBy('sequence');
        return view('admin.banner.banners',compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public  function store(Request $request)
    { 
        
        $banner = new Banner;

        $banner->caption = $request->caption;
        $max_order = Banner::max('sequence');
        if($max_order){$banner->sequence = ++$max_order;}
        else{$banner->sequence = 01;}
        // Get feature image.
        $file = $request->file('image');
        $destinationPath = 'images/slider';
        $banner->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $file1 = $request->file('mobile_image');
        $destinationPath1 = 'images/slider';
        $banner->mobile_image = $file1->getClientOriginalName();
        $file1->move($destinationPath1,$file1->getClientOriginalName());

        $banner->save();
          
        return redirect()->route('banners.index')->with('success','Banner created successfully!');
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
         $banner = Banner::where('id', $id)->first();
        return view('admin.banner.edit',compact("banner"));
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
        $banner = Banner::find($id);

        $banner->caption = $request->caption;
        
        $file = $request->file('image');
        if(empty($file)){
           $banner->image = $request->old_img; 
        }else{
            $destinationPath = 'images/slider';
            $image = date('YmdHis',time()).mt_rand().'.png';
            $banner->image = $image;
            $file->move($destinationPath,$image);
        }

        $file1 = $request->file('mobile_image');
        if(empty($file1)){
           $banner->mobile_image = $request->old_mobile_img; 
        }else{
            $destinationPath = 'images/slider';
            $mb_image = date('YmdHis',time()).mt_rand().'.png';
            $banner->mobile_image = $mb_image;
            $file1->move($destinationPath,$mb_image);
        }

        $banner->update();
        return redirect()->route('banners.index')->with('success','Banner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return back()->with('success','Banner deleted successfully!');
    }
    public function sort_banner(Request $request){
        $banners = $request->data;
        $i = 0;
        foreach ($banners as  $id) {
            $banner = Banner::find($id);
            $banner->sequence  = $i;
            $banner->update();
            $i++;
        }
    }
}
