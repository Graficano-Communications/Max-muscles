<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\history;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Event;
use App\Models\compliance;
use App\Models\Catalog;
use App\Models\Size;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Department;
 
use PDF;
use Mail;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::all()->sortBy('sequence');
        $categories = Category::all()->sortBy('sequence');
        return view('index' ,compact('banners','categories'));
    }

    public function about()
    {
      return view('about');
    }
    public function password_hash($pass){
      return Hash::make($pass);
  }


    public function contact()
    {
      return view('contact');
    }

    public function compliance()
    {
      return view('compliance');
    }

    public function logisticpatners()
    {
      return view('logistics_partner');
    }

    public function blog()
    {
      return view('blogs');
    }
    public function blogdetails($slug){

      $blog = Blog::where('slug',$slug)->first();
      return view('blog-details',compact('blog'));
    }

    public function media()
    {

      return view('gallery');
    } 

    public function videos()
    {
      return view('videos');
    }

    public function timeline()
    {
      $timelines = history::all()->sortby('sequence');
      return view('timeline',compact('timelines'));
    }

    public function technologypatners()
    {
      return view('technology_partner');
    } 

    public function events()
    {
      // return date("Y-m-d H:i:s" , strtotime("-5 days"));
      // $events = event::where('end_date',">",date("Y-m-d H:i:s" , strtotime("-5 days")))->get()->sortBy('sequence');
      $events = Event::all();
      // return $events;
      return view('events',compact('events'));
    } 

    public function resources()
    {
      $resources = Catalog::all()->sortBy('sequence');
      return view('resources',compact('resources'));
    }

    
    public function product($slug)
    { 
      $product = product::where('slug',$slug)->first();
       return view('large',compact('product'));
    }

    public function largeview()
    { 
      return view('large');
    }

    public function subcategory($cat_slug)
    {
      $category = Category::where('slug',$cat_slug)->first();
      $subcategories = Subcategory::where('category_id',$category->id)->get()->sortBy('sequence');
      return view('subcategory',compact('subcategories','category'));
    }
    
    public function admin_login()
    {
      return view('admin.adminlogin');
    }

   
    public function get_by_category($cat_slug)
    {
      $category = Category::where('slug',$cat_slug)->first();
      $subcategories = Subcategory::where('category_id',$category->id)->get()->sortBy('sequence');
      $products = Product::where('category_id',$category->id)->get()->sortby('sequence');
  
      return view('products',compact('subcategories','category','products'));
    }
    public function get_by_subcategory($cat, $subcat){
      $category = Category::where('slug',$cat)->first();
      $subcategory = Subcategory::where('slug',$subcat)->first();
      $subcategories = Subcategory::where('category_id',$category->id)->get()->sortBy('sequence');
      $products = Product::where('category_id',$category->id)->where('subcategory_id',$subcategory->id)->get()->sortby('sequence');  
      return view('products',compact('subcategories','category','subcategory','products'));
    }

    public function product_by_category($category_slug, $subcategory_slug){

      $category = Category::where('slug',$category_slug)->first();
      $subcategory = Subcategory::where('slug',$subcategory_slug)->first();
      $product_id = Product::where('subcategory_id',$subcategory->id)->first();
      
      if(!empty($product_id)){ 
        // $products = product::where('subcategory_id',$subcategory->id)->orderBy('sequence')->paginate(12);
        $myproducts = product::where('subcategory_id',$subcategory->id)->get();
      }
      else{
          $myproducts = null;   
      }   
      return view('product',compact('myproducts','category','subcategory'));
}



    public function get_product($slug){
      $product = product::where('slug',$slug)->first();
      $images  = \App\image::where('product_id',$product->id)->get();
      $img = \App\image::where('product_id',$product->id)->first();
      return view('single',compact('product','images','img'));
    }
    public function product_by_id($id){
      $data = product::where('id',$id)->first();
      return $data;
    }

    public function downloadcatlog(Request $request){
      $catlog = Catalog::select('file','password')->where('id',$request->id)->first();
      // dd(Hash::check($request->password,$catlog->password));die;
     if(Hash::check($request->password,$catlog->password))
        {
        $pdfready = 'assets/img/catalogue/'.$catlog->file;  
        // dd($pdfready);die;
        return response()->download($pdfready);  
        }
        else{
        // dd("no");die;

            return redirect()->back()->with('message', 'wrong password .. plz try again');
        } 
    }
     
    public function download()
    {
     $catlog = catlougue::select('file')->where('id',3)->where('password','cardic1234')->first();
     $pdfready = 'images/pdf/'.$catlog->file;  
      return response()->download($pdfready);
    }

  
    public function search (Request $request){
    $input = $request->search_value;
    
    $product = product::where('name','LIKE','%'.$input.'%')->orWhere('code','LIKE','%'.$input.'%')->get();
    
    if(count($product)){
        return view('search' , compact("input","product"));
    }
    else{
        return view('search');   
    }
   }

     public function SendMail(Request $request){
      if(isset($_POST['g-recaptcha-response'])){
        $captcha = $_POST['g-recaptcha-response'];
      }
      if(!$captcha){
        // echo 'Please check the the captcha form.';
        return redirect()->back()->with('error','Please check the the captcha! Try Again..');
      }
      $secretKey = "6LdC1WEeAAAAAFgzPdqJDQdXK03S8HwftbaQ5t_1";
      $ip = $_SERVER['REMOTE_ADDR'];
      // post request to server
      $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
      $response = file_get_contents($url);
      $responseKeys = json_decode($response,true);
     
      // should return JSON with success as true
      if($responseKeys["success"]) {
     
        $Name = $request->name;
        $Email = $request->email;
        $msg = $request->message;
        $message = 'Email :'.$Email.' 
        Sender Name : '.$Name.'
        Message:'.$msg.'';
    
        Mail::raw($message, function($message) use ($request)
         {
             $message->from($request->email, $request->name);
             $message->to('info@sports-leader.com','Sports Leader')->subject("A new query from sports leader"); 
         });
         return redirect()->back()->with('message', 'Message Sent Successfully');
        } else {


            // echo 'You are spammer ! Get the @$%K out';
        return redirect()->back()->with('error','You are spammer ! Try Again!'); 
   
        }

    }
   

    public function csr_view()
    {
      return view('csr');
    }

    public function departments(){  
      $departments = Department::all()->sortBy('sequence');
      return view('departments',compact('departments')); 
    }
	public function our_team(){
		$teams = Team::all()->sortBy('sequence');
		return view('team',compact('teams'));
	}

}
