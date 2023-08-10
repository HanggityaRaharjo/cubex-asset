<?php

namespace App\Http\Controllers;

use App\Models\Passwords;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('backend.profile-admin.index', compact('user'));
    }

    public function updateprofile(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $user->name=$request->name;
        $user->username=$request->username;

        $user->update();

        $userPassword = Passwords::where('user_id', Auth::user()->id)
        ->where('status_code', '0201')
        ->first();

        $pass = Hash::check($request->password, $userPassword->password);
        // dd($pass);
        if(empty($request->password)){
            // jika kosong maka tidak perlu update password
        }


        if($pass || empty($request->password)){
            // return redirect()->route('profile')->with('status', 'Profile updated !');;
        }else{
            $userPassword->status_id='3';
            $userPassword->status_code='0203';
            $userPassword->update();

            Passwords::create([
                'user_id'=>Auth::user()->id,
                'user_code'=>Auth::user()->code,
                'status_id'=>'2',
                'status_code'=>'0201',
                'created_at'=>now(),
                'created_by'=>Auth::user()->name,
                'password' => Hash::make($request->password)
            ]);
            // dd('else');
        }
        return redirect()->route('profile')->with('status', 'Profile updated!');;

    }
}
