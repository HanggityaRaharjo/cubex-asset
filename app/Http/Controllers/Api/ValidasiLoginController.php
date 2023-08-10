<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperUrl;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValidasiLoginController extends Controller
{
    use HelperUrl;
    //
    public function validasilogin(Request $request){
        $requestHost = parse_url($request->headers->get('host'),  PHP_URL_HOST);
        return response()->json(['status'=>true,'data'=>$request->header()]);

        $login = $this->loginAuth($request->all());
        if($login->status == true){
            return response()->json(['status'=>true,'data'=>$login]);
        }else{
            return response()->json(['status'=>false,'message'=>$login->message]);
        }
    }

    protected function loginAuth(array $data){
        try{
            $response = Http::acceptJson()->post($this->prefixUrlAuth().'user/ticket',$data);
            $response = json_decode($response->body());

            return $response;

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }
}
