<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;

class CouponController extends Controller
{

    public function create()
	{
		return view('admin.coupon.addcou');
	}

	public function save(Request $a)
	{

		//print_r($data->all());

		$data= new Coupon;
        $data->coupon_code=$a->coupon_code;
        $data->amount=$a->amount;
        $data->amount_type=$a->amount_type;
        $data->expiry_date=$a->expiry_date;
        
        $data->save();
        if($data)
        {
            return redirect('coupon/addcou')->with('message','Coupon Added Successfully');
        }
        

	}


	public function view()
{
	$data=Coupon::all();
	return view('admin.coupon.viewcou',compact('data'));
}

public function show($id)
{
	$data=Coupon::find($id);
	return view('admin.coupon.showcou',compact('data'));
}
public function edit($id)
{
	$data=Coupon::find($id);
	return view('admin.coupon.editcou',compact('data'));
}

public function update(Request $a)
    {
        //print_r($a->all());
        $data = Coupon::find($a->id);
        $data->coupon_code=$a->coupon_code;
        $data->amount=$a->amount;
        $data->amount_type=$a->amount_type;
        $data->expiry_date=$a->expiry_date;
        
         $data->save();
         if ($data) {
            return redirect('coupon/view')->with('message','successfully updated');
        }
        }


public function delete($id)
    {
        ///echo $id;
          $data = Coupon::find($id);
        $delete = $data->delete();
         if($data)
            {
                return redirect('coupon/view')->with('message','deleted successfully');
            }
    
    }
}
