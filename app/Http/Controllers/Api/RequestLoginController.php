<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperUrl;
use App\Traits\ResponseUtils;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestLoginController extends Controller
{
    use ResponseUtils, HelperUrl;
    //
    public function requestLogin(Request $request){
        $origin = $request->input('origin');
        // $this->insertThLoginTrx($request->input('origin'),$request->input('ip'),$request->input('latitude'),$request->input('longitude'),$request->input('address'),$request->input('browser'));

        // return response()->json(['status'=>true,'data'=>$request->header()]);

        try{
            $arrDomain = ['domain_origin'=>url('/')];
            $data = array_merge($request->all(),$arrDomain);
            $response = Http::withHeaders(['token'=>$request->header('token')])->acceptJson()->post($request->header('callback'),$data);
            $response = json_decode($response->body());
            if($response->status == true){
                $this->insertTtTrx($request,'1',$response->message);
                return response()->json(['status'=>true,'data'=>$response]);
            }else{
                $this->insertTtTrx($request,'1',$response->message);

                return response()->json(['status'=>false,'message'=>$response->message]);
            }

        }catch(Exception $e){

            return response()->json(['status'=>false,'message'=>$e]);

            // return redirect()->route('register');
        }

    }
}
