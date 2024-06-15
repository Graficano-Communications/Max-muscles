<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; 

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all()->sortBy('sequence');
        return view('admin.blog.blog',compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogs = new Blog;

        $blogs->title = $request->name;
        
        $name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->name);
        if (strlen(trim($name)) > 0){
            $blogs->slug = str_replace(' ','-',strtolower($name));
        }else{
            $blogs->slug  = strtolower($name);
        }
        
        
        $max_order = Blog::max('sequence');
        if($max_order){$blogs->sequence = ++$max_order;}
        else{$blogs->sequence = 01;}

        // Get feature image.
        $file = $request->file('banner_image');
        $destinationPath = 'images/blog';
        $blogs->banner_image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());
        
        // Get feature image.
        $file2 = $request->file('thumbnail_image');
        $destinationPath2 = 'images/blog';
        $blogs->thumbnail_image = $file2->getClientOriginalName();
        $file2->move($destinationPath2,$file2->getClientOriginalName());
        
        $blogs->content=$request->description;
         
        $blogs->save();
          
        return redirect()->route('blog.index')->with('success','Image created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogs_detail($id)
    {
        $blogs = Blog::where('id',$id)->first();
        return view('blog_detail',compact("blogs"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = blog::where('id', $id)->first();
        return view('admin.blog.edit',compact("image"));
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
        $blogs = Blog::find($id);

        $blogs->title = $request->name; 
        
        $file = $request->file('banner_image');
        
        if(empty($file)){
           $blogs->banner_image = $request->old_img; 
        }else{
            $destinationPath = 'images/blog';
            $blogs->banner_image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $file2 = $request->file('thumbnail_image');
        if(empty($file2)){
           $blogs->thumbnail_image = $request->old_img2; 
        }else{
            $destinationPath2 = 'images/blog';
            $blogs->thumbnail_image = $file2->getClientOriginalName();
            $file2->move($destinationPath2,$file2->getClientOriginalName());
        }

        $blogs->content = $request->description;

        $blogs->update();
        return redirect()->route('blog.index')->with('success','Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
        return back()->with('success','blog deleted successfully!');
    }

    public function sort_blog(Request $request){
        $blogs = $request->data;
        $i = 0;
        foreach ($blogs as  $id) {
            $blog = Blog::find($id);
            $blog->sequence  = $i;
            $blog->update();
            $i++;
        }
    }
}
