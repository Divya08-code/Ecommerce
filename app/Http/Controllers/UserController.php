<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Cart;
use Session;
use DB;
class UserController extends Controller
{
    public function login()
    {
    	return view('front.login');
       
 
    }

    public function register()
    {
    	return view('front.register');
    	
    }

    public function regsave(Request $a)
    {
        $this->validate($a,[   
       "name"=>"required", //rules
       "email"=>"required|max:30|min:5|email|unique:users",
        
        "password"=>"required|max:8|min:5|",]);
    	$data= new user;
    	$data->name=$a->name;
    	$data->email=$a->email;
        $data->password = Hash::make($a->password);
    	$data->verification_code = sha1(time());

        $data->save();

        if($data != null)
        {
            //Send Email
            MailController::sendSignupEmail($data->name,$data->email,$data->verification_code);

            return redirect()->back()->with(session()->flash('alert-success','Your account has been created. Please chek email for verification link.'));

            //Show a message
        }
        
        return redirect()->back()->with(session()->flash('alert-danger','Something went wrong!'));
}



    public function verifyUser(Request $request)
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $data = User::where(['verification_code' => $verification_code])->first();
        //dd($data);
        if($data != null){
            $data->is_verified = 1;
            $data->save();
            return redirect('user/login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect('user/login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
    
        

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }




}
