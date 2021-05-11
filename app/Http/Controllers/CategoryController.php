<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
{
  

    public function addcat()
    {
    	return view('admin.addcat');
    }

    public function save(Request $a)
    {
    	$data= new Category;

        $data->name=$a->name;
        $data->description=$a->description;
        
        $file=$a->file('image');
        $filename='image'.time().'.'.$a->image->extension();
        $file->move("upload/",$filename);

        $data->image=$filename;
        $data->status=$a->status;

        $data->save();
         if($data)
        {
            return redirect('cat/addcat')->with('message',' category added Successfully');
        }
    }

public function view()
{
	$data=Category::all();
	return view('admin.viewcat',compact('data'));
}

public function show($id)
{
	$data=Category::find($id);
	return view('admin.showcat',compact('data'));
}

public function edit($id)
{
	$data=Category::find($id);
	return view('admin.editcat',compact('data'));
}

public function update(Request $a)
{

if($a->hasFile('image'))
        { 
            $file =$a->file('image');
            // print_r($a->all());
        // die;

            // dd($file);
            // exit();
           $filename = 'image'. time().'.'.$a->image->extension();
        //     // dd($filename);
        //     // exit();
           $file->move("upload/",$filename);
            //  dd($file);
            //  exit;
    
            $data=  new Category();
            $data= Category::find($a->id);

            $data->name=$a->name;
            $data->description=$a->description;
            $data->image=$filename;

            $data->save();

            if($data)
            {
                return redirect('category/view')->with('message','Data Updated');
            }

            
            }
            else{
            $data=Category::find($a->id);
            $data->name=$a->name;
            $data->description=$a->description;
            
            $data->save();

            if($data)
            {
                return redirect('category/view')->with ('message','Data updated successfully');
            }

}
}

public function delete($id)
    {
        ///echo $id;
          $data = Category::find($id);
        $delete = $data->delete();
         if($data)
            {
                return redirect('category/view')->with('message','deleted successfully');
            }
    
    }





}