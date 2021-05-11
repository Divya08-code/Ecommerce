<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderproduct;

class AdminController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('auth.login');
    }
    
     public function dashboard()
    {
        return view('admin.index');
    }
    public function order()
    {

        $detail=Order::join('orderproducts','orders.id','=','orderproducts.order_id')->get();
       
      
        return view ('admin.orders.disporder',compact('detail'));

    }

   public function orderinvoice($id)
   {
        $data=Order::find($id);
        $productdata=Orderproduct::find($id);
        return view('admin.orders.invoice',compact('data','productdata'));


   } 

   public function vieworder($id)
   {
    $data=Order::find($id);
        $productdata=Orderproduct::find($id);
        return view('admin.orders.vieworder',compact('data','productdata'));

   }

   

}
