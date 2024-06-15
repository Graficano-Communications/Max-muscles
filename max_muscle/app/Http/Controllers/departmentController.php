<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\sub_department;

class departmentController extends Controller
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
         $departments = department::all()->sortBy('sequence');
        return view('admin.department.department',compact("departments"));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
         
        $department = new Department;

        $department->name = $request->name;
        if($request->description){
            $department->description = $request->description;
        }else{
            $department->description = "N/A";
        }
        // Get feature image
        $max_order = Department::max('sequence');
        if($max_order){$department->sequence = ++$max_order;}
        else{$department->sequence = 01;}

        $name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->name);
        if (strlen(trim($name)) > 0){
            $department->url = str_replace(' ','-',strtolower($name));
        }else{
            $department->url  = strtolower($name);
        }


        $file = $request->file('home_page_icon');
        $destinationPath = 'images/department/';
        $name = date('YmdHis',time()).mt_rand().'.svg';
        $department->home_page_icon = $name;
        $file->move($destinationPath,$name);

        $banner_image = $request->file('banner_image');
        $bannerdestinationPath = 'images/department/';
        $banner_name = date('YmdHis',time()).mt_rand().'.jpg';
        $department->banner_image = $banner_name;
        $banner_image->move($bannerdestinationPath,$banner_name);
        $images = $request->images;
        if($images){ 
            foreach($images as $key => $img)
            { 
            $ext = $img->getClientOriginalExtension(); 
            
            $name = date('YmdHis',time()).mt_rand().".".$ext;        
            $destinationPathorgin = 'images/department/';
            $img->move($destinationPathorgin,$name);  
            $names[] = $name;
            } 
        } 
        $department->images =json_encode($names);

        $department->save(); 
          
        return redirect()->route('department.index')->with('success','department created successfully!');
    }
    public function delimg($image,$pid){
        $department = Department::find($pid);
        $imgs = json_decode($department->images); 
       
        if (($key = array_search($image ,$imgs)) !== false) {
           unset($imgs[$key]);
         }
        $department->images=json_encode(array_values($imgs));
        $department->save();

       

        return redirect()->back();
    }



    public function edit($id)
    {
        $department = Department::where('id', $id)->first();
        return view('admin.department.edit',compact("department"));
    }

 
    public function update(Request $request, $id)
    {
         
        $department = Department::find($id);
        
        $department->name = $request->name;
        $department->description = $request->description;
        $department->url = $request->url;

        $file = $request->file('home_page_icon'); 
        if(empty($file)){
           $department->home_page_icon = $request->old_img; 
        }else{

            $destinationPath = 'images/department/';
            $name = date('YmdHis',time()).mt_rand().'.svg';
            $department->home_page_icon = $name;
            $file->move($destinationPath,$name);
        }
         
        $banner_file = $request->file('banner_image');
        if(empty($banner_file)){
            $department->banner_image = $request->old_banner_image;
        }else{ 
            $bannerdestinationPath = 'images/department/';
            $banner_name = date('YmdHis',time()).mt_rand().'.jpg';
            $department->banner_image = $banner_name;
            $banner_file->move($bannerdestinationPath,$banner_name);
        }  

        $images = $request->images;
        if($images){ 
            foreach($images as $key => $img)
            { 
            $ext = $img->getClientOriginalExtension(); 
            
            $name = date('YmdHis',time()).mt_rand().".".$ext;        
            $destinationPathorgin = 'images/department/';
            $img->move($destinationPathorgin,$name);  
            $names[] = $name;
            } 
        }
         
        $department->images = json_encode(array_merge(json_decode($department->images),$names)); 
 

        $department->update();

          
        return redirect()->route('department.index')->with('success','department updated successfully!');
    }

    public function destroy($id)
    { 
        $department = Department::find($id);
        $department->delete();
        
        return back()->with('success','Item deleted successfully!');
    }
   
    public function sort_department(Request $request){
        // return $request;
        $departments = $request->data;
        $i = 0;
        foreach ($departments as  $id) {
            $department = Department::find($id);
            $department->sequence  = $i;
            $department->update();
            $i++;
        }
    }

}
