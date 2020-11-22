<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
	function login(Request $request){
        
        $u = DB::table('users')->where('email','=',$request->email)->get();
        // foreach($u as $i){
        //     echo $i->email;
        // }
        
        $user = $u;
        $data = User::where('email',$request->email)->first();
        $pas = User::Where('password',$request->password)->first();
        $admin = $request->email;
        $admin_pass = $request->password;
        if($admin=="admin@iitu.kz" && $admin_pass=="admin"){
            return redirect('admin'); 
        }
        if($data){
            if($pas){
                $request->session()->put('email',$data['email']);    
                session()->put('user',$user);            
                return view('profile_page',compact('user'));  
            }else{
                return redirect('registration'); 
            }
        } 
        else{
            return redirect('registration');
        }                                       
    }
    
}
