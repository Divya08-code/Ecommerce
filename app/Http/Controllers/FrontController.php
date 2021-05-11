<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Product;
use App\cart;
use Session;
use DB;
use Auth;
use App\Order;
use App\Orderproduct;
use Hash;
use App\User;

class FrontController extends Controller
{
    public function create()
    {
    	$banner=Banner::all(); 
    	$cat=Category::all(); 
    	$product=Product::all();
        $categories=$cat;

    	return view('front.index',compact('banner','cat','product','categories'));

    }


    public function productdetail($id)
    {
    	$product=product::find($id);
    	return view('front.productdetail',compact('product'));

    }

    public function addtocart(Request$a)
    {
    	//print_r($a->all());
        $session_id=Session::getId();
        
    	$cart=new cart;

        if(Auth::check()){
            $useremail=Auth::user()->email;
            $cart->useremail=$useremail;
        }
    	$cart->product_id=$a->product_id;
    	$cart->product_name=$a->product_name;
    	$cart->product_price=$a->product_price;
    	$cart->product_quantity=$a->product_quantity;
    	$cart->product_image=$a->product_image;
        $cart->session_id=$session_id;


    	$cart->save();

    	if($cart){
    		return redirect('cart');
    	}
    	


    }

     public function cart()
    {


        if(Auth::check()){
            $useremail=Auth::user()->email;
            $data=Cart::where('useremail',$useremail)->get();
            $d=$data;
            return view('front.cart',compact('data','d'));



        }
        else{
               $session_id=Session::getId();
         $data=Cart::where(['session_id'=> $session_id])->get();
        $d=$data;   
        
         return view('front.cart',compact('data','d'));

        }
    
    }

public function updatequantity($id=null,$product_quantity=null)
{
    //print_r($id);
    DB::table('carts')->where('id',$id)->increment('product_quantity',$product_quantity);
    return redirect('cart')->with('message','product quantity has been updated');


}





public function contact()
{
    return view('front.contact');
}


public function checkout()
    {
        $useremail=Auth::User()->email;
        $d=Cart::where('useremail',$useremail)->get();
        $data=$d;
        return view('front.checkout',compact('d','data'));    
    }

  public function placeorder(Request $a)
    {
        // print_r($a->all());

        $data=new Order;

        $data->useremail=$a->email;
        $data->name=$a->name;
        $data->address=$a->address;
        $data->city=$a->city;
        $data->state=$a->state;
        $data->country=$a->country;
        $data->pincode=$a->pincode;
        $data->phone=$a->phone;
        $data->payment_method=$a->payment_method;
        $data->grand_total=$a->grand_total;

        $data->save();

        $order_id=DB::getPdo()->lastinsertID();
        
        // print_r($order_id);
        // die;

        $cart_product=DB::table('carts')->where(['useremail'=>$a->email])->get();

        // print_r($cart_product);

        foreach ($cart_product as $c)
        {
            $cart=new Orderproduct;

            $cart->useremail=$a->email;
            $cart->order_id=$order_id;
            $cart->product_id=$c->product_id;
            $cart->product_name=$c->product_name;
            $cart->product_price=$c->product_price;
            $cart->product_size=$c->product_size;
            $cart->product_quantity=$c->product_quantity;
            $cart->product_image=$c->product_image;

            $cart->save();

        }

        if($cart)
        {
            return redirect('thanks'.$order_id)->with('message','Order details submitted sucessfully');
        }
        else
        {
            return redirect('thanks'.$order_id)->with('message','Order could not be placed :( Try again!');
        }
    }

    public function orderconfirm()
    {
        $useremail=Auth::user()->email;

        DB::table('carts')->where('useremail',$useremail)->delete();

        $data=Order::where('useremail',$useremail)->get();
        $productdata=Orderproduct::where('useremail',$useremail)->get();
        return view('front.thanks',compact('data','productdata'));
       
        
    }

    public function myaccount()
    {
         $useremail=Auth::user()->email;

        $data=Order::where('useremail',$useremail)->get();
        $detail=Order::join('orderproducts','orders.id','=','orderproducts.order_id')->get();
        $order=order::all();
        return view('front.myaccount',compact('detail','order','data'));

    }

   
    public function changepassword(Request $request)
    {
        $request->validate([
            // 'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('myaccount')->with('message','Password updated successfully');
    }
    public function viewdetail($order_id)
    {
        $detail=Order::join('orderproducts','orders.id','=','orderproducts.order_id')->where('orders.id',$order_id)->get();
        return view('front.viewdetail',compact('detail'));

    }
}