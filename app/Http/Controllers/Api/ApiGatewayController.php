<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RouteServices;
use App\Models\Services;
use App\Traits\HelperUrl;
use App\Traits\ResponseUtils;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiGatewayController extends Controller
{
    use ResponseUtils, HelperUrl;
    //

    public function auth(Request $request){
        try {
            $arrDomain = ['domain_origin'=>config('app.url')];
            $data = array_merge($request->all(),$arrDomain);
            $header = array_merge(['tokentrx'=>$request->header('token')],$request->header());

            $response = Http::withHeaders([
                'tokentrx'=>$request->header('token')
            ])->acceptJson()->post('http://192.168.10.201/api/v1/user/ticket', $data );

            $response = json_decode($response->body());
            // return response()->json(['status'=>false,'message'=>$data]);
            if($response->status == true){

                // $route->update();
                // $this->insertTtTrx($request,'1',$response->message);

                return response()->json(['status'=>true,'data'=>$response->data]);
            }else{
                // $this->insertTtTrx($request,'1',$response->message);

                return response()->json(['status'=>false,'message'=>$response->message],404);
            }

        }catch(Exception $e){
            return response()->json(['status'=>false,'message'=>$e],505);
        }


    }
    public function gateway(Request $request,$path){
        $route = RouteServices::with('service')->where('path',$path)->first();
                    // return response()->json(['status'=>true,'data'=>$route]);

        if($route){
            if($route->methodroute == "POST"){
                try{
                    $arrDomain = ['domain_origin'=>config('app.url')];
                    $data = array_merge($request->all(),$arrDomain);
                    $header = array_merge(['tokentrx'=>$request->header('token')],$request->header());
                    // return response()->json(['status'=>false,'message'=>$header],505);

                    $response = Http::withHeaders($header)->acceptJson()->post($route->service->url_origin, $data );

                    $response = json_decode($response->body());
                    // return response()->json(['status'=>true,'data'=>$response]);

                    if($response->status == true){
                        $route->counter = $route->counter +1;
                        // $route->update();
                        // $this->insertTtTrx($request,'1',$response->message);

                        return response()->json(['status'=>true,'data'=>$response->data]);
                    }else{
                        // $this->insertTtTrx($request,'1',$response->message);

                        return response()->json(['status'=>false,'message'=>$response->message],404);
                    }
                }catch(Exception $e){
                    // return response()->json(['status'=>false,'message'=>'error exception api gateway'],505);
                    return response()->json(['status'=>false,'message'=>$request->header()],505);
                }

            }
            // return response()->json(['message'=>$path,'data'=>[]]);
        }else{
            return response()->json(['status'=>false,'message'=>'no route matched with those values']);
        }
    }

    public function listUserDomain(){
        // return response()->json(['status'=>false,'message'=>request()->get('domain_id')]);
        // return response()->json(['status'=>false,'message'=>$this->prefixUrlCrm()]);

        try{
            $response = Http::acceptJson()->withHeaders([
                'domain_id'=>request()->header('domain_id'),
            ])->get($this->prefixUrlCrm().'list-user?domain_id='.request()->get('domain_id'));
            $response = json_decode($response->body());


            if($response->status == true){
                // dd($data);
                return response()->json(['status'=>true,'data'=>$response->data]);

                // dd($data);
            }else{
                return response()->json(['status'=>false,'message'=>$response->message]);

            }
            // dd($response);
        }catch(Exception $e){
            return response()->json(['status'=>false,'message'=>'xx' ]);

        }

    }

    public function holdUser(){
        try{
            $response = Http::acceptJson()->withHeaders([
                'domain_id'=>request()->header('domain_id'),
            ])->get($this->prefixUrlAuth().'hold-user?status='.request()->get('status').'&code_auth='.request()->get('code_auth'));
            $response = json_decode($response->body());
            if($response->status == true){
                try{
                    $responsecrm = Http::acceptJson()->withHeaders([
                        'domain_id'=>request()->header('domain_id'),
                    ])->get($this->prefixUrlCrm().'hold-user?status='.request()->get('status').'&code_auth='.request()->get('code_auth'));
                    $responsecrm = json_decode($responsecrm->body());

                    return response()->json(['status'=>true,'data'=>$responsecrm->data]);

                }catch(Exception $e){
                    return response()->json(['status'=>false,'message'=>'Error Gateway']);

                }
            }else{
                return response()->json(['status'=>false,'message'=>$response->message]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'message'=>'Error Gateway xx' ]);

        }
    }

    public function edituser(){
        try{
            $responsecrm = Http::acceptJson()->withHeaders([
                'domain_id'=>request()->header('domain_id'),
            ])->get($this->prefixUrlCrm().'edit-user?code_auth='.request()->get('code_auth'));
            $responsecrm = json_decode($responsecrm->body());

            $responseauth = Http::acceptJson()->withHeaders([
                'domain_id'=>request()->header('domain_id'),
            ])->get($this->prefixUrlAuth().'edit-user?code_auth='.request()->get('code_auth'));

            $responseauth = json_decode($responseauth->body());

            $data = [$responsecrm->data,$responseauth->data];

            return response()->json(['status'=>true,'data'=>$data]);

        }catch(Exception $e){
            return response()->json(['status'=>false,'message'=>'Error Gateway']);

        }
    }
}
