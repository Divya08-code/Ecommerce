<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;

class ProductController extends Controller
{
    public function create()
    {
    	$categories=Category::all();

        return view('admin.product.addpr',compact('categories'));
    
    }



    public function save(Request $a)
    {
    	$data= new Product;
    	$data->category_id=$a->category_id;

        $data->product_name=$a->product_name;
        $data->product_code=$a->product_code;
        $data->product_size=$a->product_size;
        $data->product_description=$a->product_description;
        $data->product_price=$a->product_price;
        $data->product_quantity=$a->product_quantity;
        
        $file=$a->file('product_image');
        $filename='image'.time().'.'.$a->product_image->extension();
        $file->move("upload/",$filename);

        $data->product_image=$filename;
       

        $data->save();
        if($data)
        {
        	return redirect('product/addproduct')->with ('message','Data inserted successfully');
        }

    }

    public function view()
{
	$data=Product::all();
	return view('admin.product.viewpr',compact('data'));
}
public function show($id)
{
	$data=Product::find($id);
	return view('admin.product.showpr',compact('data'));
}



public function edit($id)
{
	$categories=Category::all();
	$data=Product::find($id);
	return view('admin.product.editpr',compact('data','categories'));
}


public function update(Request $a)
    {
if($a->hasFile('image'))
        { 
            $file =$a->file('product_image');
            // print_r($a->all());
        // die;

            // dd($file);
            // exit();
           $filename = 'product_image'. time().'.'.$a->product_image->extension();
        //     // dd($filename);
        //     // exit();
           $file->move("upload/",$filename);
            //  dd($file);
            //  exit;
    
            $data=  new Product();
            $data= Product::find($a->id);
            $data->category_id=$a->category_id;

        $data->product_name=$a->product_name;
        $data->product_code=$a->product_code;
        $data->product_size=$a->product_size;
        $data->product_description=$a->product_description;
        $data->product_price=$a->product_price;
        $data->product_quantity=$a->product_quantity;

            
            $data->product_image=$filename;

            $data->save();

            if($data)
            {
                return redirect('product/view')->with('message','Data Updated');
            }

            
            }
            else{
            $data=Product::find($a->id);
            $data->category_id=$a->category_id;

        $data->product_name=$a->product_name;
        $data->product_code=$a->product_code;
        $data->product_size=$a->product_size;
        $data->product_description=$a->product_description;
        $data->product_price=$a->product_price;
        $data->product_quantity=$a->product_quantity;
            
            $data->save();

            if($data)
            {
                return redirect('product/view')->with ('message','Data updated successfully');
            }

}
}



public function delete($id)
    {
        ///echo $id;
          $data = Product::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('product/view');
        }
    
    }

}
