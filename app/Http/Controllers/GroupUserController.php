<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    public function index(){
        return view('backend.group-user.index');
    }
}
