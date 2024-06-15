<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
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
         $categories = Category::all()->sortBy('sequence');
        return view('admin.category.categories',compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $category = new Category;

        $category->name = $request->name;
    
        // Get feature image
        $max_order = Category::max('sequence');
        if($max_order){$category->sequence = ++$max_order;}
        else{$category->sequence = 01;}

        $name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->name);
        if (strlen(trim($name)) > 0){
            $category->slug = str_replace(' ','-',strtolower($name));
        }else{
            $category->slug  = strtolower($name);
        }


        $file = $request->file('image');
        if($file){
        $destinationPath = 'images/category/';
        $name = date('YmdHis',time()).mt_rand().'.png';
        $category->image = $name;
        $file->move($destinationPath,$name);
        }

        $banner_image = $request->file('banner_image');
        if($banner_image){
        $bannerdestinationPath = 'images/category/banner_image/';
        $banner_name = date('YmdHis',time()).mt_rand().'.png';
        $category->banner_image = $banner_name;
        $banner_image->move($bannerdestinationPath,$banner_name);
        }
        $category->save();

        $category_id = $category->id;

        $subcategories= $request->subcategory;
         
        foreach ($subcategories as  $subcategory) {
            $subcat = new Subcategory;
            $subcat->name = $subcategory;
            $subcategory_name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $subcategory);
            if (strlen(trim($subcategory_name)) > 0){
                $subcat->slug = str_replace(' ','-',strtolower($subcategory_name));
            }else{
                $subcat->slug  = strtolower($subcategory_name);
            }

            $file = $request->file('subcat_image');
            if($file){
            $destinationPath = 'images/subcategory/';
            $name = date('YmdHis',time()).mt_rand().'.png';
            $subcat->banner_image = $name;
            $file->move($destinationPath,$name); 
            }
            $max_order = Subcategory::max('sequence');
            if($max_order){$subcat->sequence = ++$max_order;}
            else{$subcat->sequence = 01;}

            $subcat->category_id = $category_id;
            $subcat->save();
        }
          
        return redirect()->route('categories.index')->with('success','Category created successfully!');
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
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit',compact("category"));
    }

    public function sub_category_edit($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();
        return view('admin.category.subcategoryedit',compact("subcategory"));
    }
    
    public function sub_category($id)
    {
        $data = Category::find($id)->subcategory;
        return $data;
    }

    public function view_sub_category($id)
    {
        $category = Category::find($id);
        $subcategory = Subcategory::where('category_id',$id)->get()->sortBy('sequence');
      return view('admin.category.subcategory',compact("subcategory","category"));
    }

    public function subcategoryupdate(Request $request, $id)
    {
        $subcategory = subcategory::find($id);
        
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->category_id = $request->category_id;
  
        $file = $request->file('subcat_image');
      
        if(empty($file)){ 
           $subcategory->banner_image = $request->old_img; 
        }else{ 
            $file = $request->file('subcat_image');
            $destinationPath = 'images/subcategory/';
            $name = date('YmdHis',time()).mt_rand().'.png';
            $subcategory->banner_image = $name;
            $file->move($destinationPath,$name);
        }


        $subcategory->update();
        return redirect()->route('view_sub_category', ['id' => $request->category_id])->with('success','Subcategory updated successfully!');

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
         
        $category = Category::find($id);
        
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;

        $file = $request->file('image');
 
        if(empty($file)){
           $category->image = $request->old_img; 
        }else{

            $destinationPath = 'images/category/';
            $name = date('YmdHis',time()).mt_rand().'.png';
            $category->image = $name;
            $file->move($destinationPath,$name);
        }
         
        $banner_file = $request->file('banner_image');
        if(empty($banner_file)){
            $category->banner_image = $request->old_banner_img;
        }else{
            $banner_image = $request->file('banner_image');
            $bannerdestinationPath = 'images/category/banner_image/';
            $banner_name = date('YmdHis',time()).mt_rand().'.png';
            $category->banner_image = $banner_name;
            $banner_image->move($bannerdestinationPath,$banner_name);
        } 
        


        $category->update();

        $subcategories= $request->subcategory;

        if ($subcategories[0] !== null) {
            $category_id = $category->id;
            foreach ($subcategories as  $subcategory) {
            $subcat = new Subcategory;
            $subcat->name = $subcategory;

            $subcategory_name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $subcategory);
            if (strlen(trim($subcategory_name)) > 0){
                $subcat->slug = str_replace(' ','-',strtolower($subcategory_name));
            }else{
                $subcat->slug  = strtolower($subcategory_name);
            }
                
            $file = $request->file('subcat_image');
            if($file){
                $destinationPath = 'images/subcategory/';
                $name = date('YmdHis',time()).mt_rand().'.png';
                $subcat->banner_image = $name;
                $file->move($destinationPath,$name);

            }else{
                
                $subcat->banner_image = 'N/A';
            }
            

            $max_order = Subcategory::max('sequence');
            $subcat->sequence = ++$max_order;
            
            $subcat->category_id = $category_id;
            $subcat->save();
        }
        } 
    

        return redirect()->route('categories.index')->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::where('category_id',$id)->delete();
        $category = Category::find($id);
        $category->delete();
        
        return back()->with('success','Item deleted successfully!');
    }
    public function sub_category_del($id){

       $subcategory = Subcategory::find($id);
       $category_id = $subcategory->category_id;
       $subcategory->delete();
       return redirect()->route('view_sub_category', ['id' => $category_id])->with('success','Subcategory deleted successfully!');
    }
    public function sort_category(Request $request){
        // return $request;
        $categories = $request->data;
        $i = 0;
        foreach ($categories as  $id) {
            $category = Category::find($id);
            $category->sequence  = $i;
            $category->update();
            $i++;
        }


    }
    public function sort_subcategory(Request $request){
        // return $request;
        $subcategories = $request->data;
        $i = 0;
        foreach ($subcategories as  $id) {
            $subcategory = Subcategory::find($id);
            $subcategory->sequence  = $i;
            $subcategory->update();
            $i++;
        }


    }
    
}
