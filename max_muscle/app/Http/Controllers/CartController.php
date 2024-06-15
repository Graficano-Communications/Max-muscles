<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use PDF;
use Carbon;
use App\Models\Inquiry;

class CartController extends Controller
{
	public function add_to_cart(Request $request){
		// dd($request);die;
		
      $id = $request->id;
      $name = $request->name;
      $size = $request->size;
      $qty = $request->quantity;
      $color = $request->color;

      Cart::add($id,  $name , $qty , '0.00', ['size' => $size , 'color' => $color]);
      return  redirect()->route('cart');


	}


	public function get_cart_data(){
		$data = Cart::content();  
		return $data; 
	}
	public function inquiry(){
		$data = Cart::content();  
		return view('inquiry');
	}
	public function cart(){
		return view('cart');
	}
	public function removecart($rowid){
		Cart::remove($rowid);
		return redirect()->route('cart')->with('message', 'Cart Item Removed'); 
	}
	public function checkout(Request $request){

		$products = Cart::content();
		$sender_name = $request->sender_name;
		$company_name = $request->company;
		$email = $request->email;
		$address = $request->address;
		$dev_address = $request->dev_address;
		$phone = $request->phone;
		$msg = $request->msg;
            // $data = ['title' => 'Welcome to HDTuto.com'];
            // $pdf = PDF::loadView('myPDF', $data);
		$mytime = Carbon\Carbon::now();


		$output = ' <img src="http://www.dalzemsports.com/assets/images/logo.png">
		<h3>Sender Details</h3> 
		<p><strong>Date Time</strong>'.$mytime->toDateTimeString().'</p>
		<p><strong>Sender Name : </strong>'.$sender_name.'</p>
		<p><strong>Company Name : </strong>'.$company_name.'</p>
		<p><strong>Email : </strong>'.$email.'</p>
		<p><strong>Address : </strong>'.$address.'</p>
		<p><strong>Delivery Address : </strong>'.$dev_address.'</p>
		<p><strong>Phone : </strong>'.$phone.'</p>
		<p><strong>Instructions/Message : </strong>'.$msg.'</p>
		<hr>
		<h3 >Product Details</h3>
		<table width="100%" style="border-collapse: collapse; border: 0px;">
		<tr>
		<th style="border: 1px solid; padding:12px;" width="20%">Id</th>
		<th style="border: 1px solid; padding:12px;" width="30%">Name</th>
		<th style="border: 1px solid; padding:12px;" width="15%">Size</th>
		<th style="border: 1px solid; padding:12px;" width="15%">Qty</th>
		</tr>
		';  
		foreach($products as $product)
		{
			$output .= '
			<tr>
			<td style="border: 1px solid; padding:12px;">'.$product->id.'</td>
			<td style="border: 1px solid; padding:12px;">'.$product->name.'</td>
			<td style="border: 1px solid; padding:12px;">'.$product->options->size.'</td>
			<td style="border: 1px solid; padding:12px;">'.$product->qty.'</td>
			</tr>
			';
		}
		$output .= '</table>';
     //  return $output;
		$pdf = \App::make('dompdf.wrapper');
		$pdf = $pdf->loadHTML($output);
    //  return $pdf->stream();

		$data = array(
			'name' => $sender_name,   
			'Company Name'=> $company_name,
			'email' => $email,
			'Phone #' => $phone,
			'pdf' => $pdf);
        $file_name = $mytime+'.pdf';
        
        file_put_contents("inquiry/".$file_name, $pdf->output());
		file_put_contents("checkout.pdf", $pdf->output());
    // $getpdf = PDF::loadv('checkout.pdf',$pdf);

		$Inquiry = new Inquiry;
		$Inquiry->order_no = $mytime;
		$Inquiry->name = $sender_name;
		$Inquiry->company = $company_name ;
		$Inquiry->email = $email;
		$Inquiry->country = $address;
		$Inquiry->address = $address;
		$Inquiry->phone = $phone;
		$Inquiry->message = $dev_address;
		$Inquiry->order_pdf = $file_name ;

       $Inquiry->save();

		$result = Mail::send('mail', $data, function($message) use ($data){

        // $pdf = PDF::loadFile('http://www.dalzemsports.com/checkout.pdf');

			$message->to('info@dalzemsports.com','Dalzem Sports')->subject('Product Invoice');

			$message->from($data['email'],$data['name']);

        // $message->attach($data['pdf']->output());
        // $message->attachData($pdf,'checkout.pdf');

			$message->attach("checkout.pdf");
		});
    // File::delete("checkout.pdf");
		Cart::destroy();
		return redirect()->route('cart')->with('message', 'Inquiry Sent Sucessfully');
        //  var_dump($result );  
	}
}
