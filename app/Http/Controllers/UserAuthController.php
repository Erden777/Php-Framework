<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserAuthController extends Controller
{
    //
    public function register(AdminRequest $req){
            $user = new User();
            $user->full_name = $req->input('name');
            $user->email = $req->input('email');
            $user->tel_number = $req->input('number');
            $user->password = $req->input('password');
            $user->picture_Url = "https://www.computerhope.com/jargon/g/guest-user.jpg";
            $user->save();  
        
        return view('ProfilePage',compact('user'));
    }


	public function loginSubmit(Request $request){
        $user = User::where('email','=',$request->email)->first();
        $data = User::where('email',$request->email)->first();
        $pas = User::Where('password',$request->password)->first();
        $admin = $request->email;
        $admin_pass = $request->password;
        if($admin=="admin@iitu.kz" && $admin_pass=="admin"){
            return redirect('admin'); 
        }
        if($data){
            if($pas){    
                session(['user' => $user]);
                return redirect()->route('ProfilePage');  
            }else{
                return redirect()->route('Loginin'); 
            }	
        } 
        else{
            return view('Registration');
        }                                       
    }

    public function Login(){
        return view('UserLogin');
    }

    public function ProfilePage(){
        if(session()->get('user')!=null){
             return view('ProfilePage');
        }else{
            return redirect()->route('Loginin');
        }
    }

    public function UpdateUser($id , Request $req){
        $user =User::find($id);
        $user->full_name = $req->input('full_name');
        $user->email = $req->input('email');
        $user->tel_number = $req->input('tel_number');
        $user->password = $req->input('password');
        $user->picture_Url = $req->input('picture_Url');
        session(['user' => $user]);
        $user->save();

        return redirect()->route('user_details' , $id)->with('success' , 'Success edited');  
    }

    public function Logout(){
        session()->forget('user');
        return redirect()->route('Loginin');
    }

}
