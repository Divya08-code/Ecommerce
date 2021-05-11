<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;

class BannerController extends Controller
{
    
    public function addban()
    {
    	return view('admin.banner.addban');
    }

    public function save(Request $a)
    {
    	$data= new Banner;

        $data->title=$a->title;
        $data->url=$a->url;
        
        $file=$a->file('image');
        $filename='image'.time().'.'.$a->image->extension();
        $file->move("upload/",$filename);

        $data->image=$filename;
        

        $data->save();
        if($data)
        {
            return redirect('banner/addban')->with('message','banner Added Successfully');
        }
    }


    public function view()
{
	$data=Banner::all();
	return view('admin.banner.viewban',compact('data'));
}


public function show($id)
{
	$data=Banner::find($id);
	return view('admin.banner.showban',compact('data'));
}
public function edit($id)
{
	$data=Banner::find($id);
	return view('admin.banner.editban',compact('data'));
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
    
            $data=  new Banner();
            $data= Banner::find($a->id);

            $data->title=$a->title;
            $data->url=$a->url;
            $data->image=$filename;

            $data->save();

            if($data)
            {
                return redirect('banner/view')->with('message','Data Updated');
            }

            
            }
            else{
            $data=Banner::find($a->id);
            $data->title=$a->title;
            $data->url=$a->url;
            
            $data->save();

            if($data)
            {
                return redirect('banner/view')->with ('message','Data updated successfully');
            }

}
}

public function delete($id)
    {
        ///echo $id;
          $data = Banner::find($id);
        $delete = $data->delete();
         if($data)
            {
                return redirect('banner/view')->with('message','deleted successfully');
            }
    
    }
}
