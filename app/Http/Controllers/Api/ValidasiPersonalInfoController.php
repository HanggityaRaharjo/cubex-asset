<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperUrl;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValidasiPersonalInfoController extends Controller
{
    //
    use HelperUrl;
    public function personalinfo($code){
        try{
            $response = Http::acceptJson()->get($this->prefixUrlCrm().'personal-info/'.$code);
            $response = json_decode($response->body());

            return $response;

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }
}
