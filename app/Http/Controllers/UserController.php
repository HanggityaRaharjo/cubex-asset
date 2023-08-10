<?php

namespace App\Http\Controllers;

use App\Models\Passwords;
use App\Models\TtContact;
use App\Models\TtUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $users = TtUser::all();
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('sampe store');
        $full_name = explode(" ", $request->name);
        $first_name = $full_name[0];
        if (count($full_name) > 3) {
            $string_name = '';
            for ($i=1; $i < count($full_name) - 1; $i++) { 
                $string_name = $string_name . $full_name[$i] . ' ';
            }
            $mid_name = $string_name;
        }else{
            $mid_name = $request->name;
        }
        $last_name = $full_name[count($full_name) - 1 ];

        $user = TtUser::create([
            "first_name" => $first_name,
            "mid_name" => $mid_name,
            "last_name" =>  $last_name,
            "position" => $request->position,
            "gender" => $request->gender,
        ]);

        Passwords::create([
            'user_id' =>  $user->id,
            'user_code' =>  "00001",
            "password" =>  Hash::make($request->password),
            "status_id" => 1,
            "status_code" => "0101",
            "created_by" => "Super Admin TRX"
        ]);

        !empty($request->email) ? TtContact::create([
            'nama' =>  $request->email,
            "type" => 1,
            'user_id' =>  $user->id,
        ]) : null;

        !empty($request->phone) ? TtContact::create([
            'nama' =>  $request->phone,
            "type" => 2,
            'user_id' =>  $user->id,
        ]) : null;

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = TtUser::where('id',$id)->first();
        $user_phone = !empty(TtContact::where('user_id',$id)->where('type',2)->first()->nama);
        $user_email = !empty(TtContact::where('user_id',$id)->where('type',1)->first()->nama);
        $full_name = $user->first_name . ' ' . $user->mid_name . ' ' . $user->last_name;
        return view('backend.user.edit',compact('user','user_phone','user_email','full_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('sampe sini update',$request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
