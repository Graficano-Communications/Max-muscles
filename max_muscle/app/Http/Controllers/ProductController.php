<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
         $products = Product::paginate(25);
         $categories = Category::all()->sortBy('sequence');
        return view("admin.product.products",compact("products","categories"));
    }
    public function product_by_subcategory($id){
        $categories = Category::all()->sortBy('sequence');
        $category = Subcategory::find($id); 
        $products = Product::where('subcategory_id',$id)->get()->sortBy('sequence');
        return view("admin.product.category_product",compact("products","categories","category"));
    }
     
    public function check_product_url($url)
    {
        $product = Product::where('slug',$url)->first();
        if ($product) {   return "true"; }
        else { return "false"; }
    } 

    public function create()
    {
        return view('admin.product.create');
    }

    public function add_img(Request $request)
    { 
        $color = $request->color;
        $images = $request->images;
        $product_id = $request->product_id;
  
        $image = new Image;
        $image->color = $color;
        $image->name = $color;

        $max_order = Image::where('product_id',$request->product_id)->max('sequence');
        
  
        if($max_order){$image->sequence = ++$max_order;}
        else{$image->sequence = 01;}
   
        foreach($images as $key => $img)
        { 
          $ext = $img->getClientOriginalExtension(); 
        
          $name = date('YmdHis',time()).mt_rand().".".$ext;        
          $destinationPathorgin = 'images/products/';
          $img->move($destinationPathorgin,$name);  
          $names[] = $name;
         }  
  
          $image->images =json_encode($names);
          $image->product_id = $product_id;
          $image->save();

     return redirect()->route('products_images',$product_id)->with('success','Images Added successfully!');;
    }


    public function store(Request $request)
    {
        
        $product = new Product;
        $product->slug = $request->slug;
        if($request->has('feature')){
            $product->feature = 1;
        }else{
            $product->feature = 0;

        }
        
        $product->name = $request->name;
        if($request->description){
            $product->description = $request->description;
        }else{
            $product->description = "N/A";
        }

        $size_chart = $request->file('size_image');
        if(!empty($size_chart)){
            $bannerdestinationPath = 'images/products/size_charts/';
            $size_chart_name = date('YmdHis',time()).mt_rand().'.png';
            $product->size_image = $size_chart_name;
            $size_chart->move($bannerdestinationPath,$size_chart_name);
        }

        $product->category_id = $request->category;
        $product->subcategory_id = $request->sub_category;
        
        $max_order = Product::max('sequence');
        if($max_order){$product->sequence = ++$max_order;}
        else{$product->sequence = 01;}

        $product->save();
        return redirect()->route('products_images',$product->id)->with('success','Products Created successfully!');
    }

    public function edit($id) 
    {
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit',compact("product"));
    }

    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
         if($request->description){
            $product->description = $request->description;
        }else{
            $product->description = "N/A";
        }
        $product->category_id = $request->category;
        $product->subcategory_id = $request->sub_category;
        
        if($request->has('feature')){
            $product->feature = 1;
        }else{
            $product->feature = 0;

        }
        $size_chart = $request->file('size_image');
        if(empty($size_chart)){
            $product->size_image = $request->old_size_chart;
        }
        else{
            $bannerdestinationPath = 'images/products/size_charts/';
            $size_chart_name = date('YmdHis',time()).mt_rand().'.png';
            $product->size_image = $size_chart_name;
            $size_chart->move($bannerdestinationPath,$size_chart_name);

        }
        

        $product->update();
        $product_id = $product->id;
         
        return redirect()->route('products.index')->with('success','Products updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success','Item deleted successfully!');
    }

    public function sort_products(Request $request){
        $products = $request->data;
        $i = 0;
        foreach ($products as  $id) {
            $product = Product::find($id);
            $product->sequence  = $i;
            $product->update();
            $i++;
        }
    }


    public function importexport(){
        $subcats = Subcategory::all();
        return view('admin.product.importexport',compact('subcats'));
    }


    public function producttocopy($id){
     $data = Product::where('subcategory_id',$id)->get();
     return $data;
    }

    public function images($id){
        $imgs = Product::find($id)->images;
        $product = product::find($id);
        return view("admin.product.imgs",compact("imgs","product"));

    }
    public function editimg($id){
       $img = Image::find($id);
       return view('admin.product.editimg',compact("img"));
         
    }
       public function updateimg(Request $request, $id){
        $image = Image::find($id);
        $color = $request->color;
        $name = $request->name;
        $images = $request->images;
        $product_id = $request->product_id;

         $image->color = $color;
         $image->name = $name;
      if($images){
      foreach($images as $key => $img)
      { 
        $ext = $img->getClientOriginalExtension(); 
      
        $name = date('YmdHis',time()).mt_rand()."." .$ext;        
        $destinationPathorgin = 'images/products/';
        $img->move($destinationPathorgin,$name);  
        $names[] = $name;
      }
    
     
      $image->images = json_encode(array_merge(json_decode($image->images),$names)); 
     
      }
    $image->product_id = $product_id;
 
        $image->update();
        return redirect()->route('products_images',$image->product_id)->with('success','Image updated successfully!');   

    }
    public function deleteimg($image,$id){
        $color = Image::find($id);
        $imgs = json_decode($color->images); 
       
        if (($key = array_search($image ,$imgs)) !== false) {
           unset($imgs[$key]);
         }
        $color->images=json_encode(array_values($imgs));
        $color->save();

       

        return redirect()->back();
   }


    public function delimg($id,$pid){
        $img = Image::find($id);
        $img->delete();
        return redirect()->route('products_images',$pid)->with('success','Image deleted successfully!');

    }
}
