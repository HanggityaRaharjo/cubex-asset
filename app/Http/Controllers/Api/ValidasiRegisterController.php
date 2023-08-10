<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HelperUrl;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValidasiRegisterController extends Controller
{
    use HelperUrl;
    //
    public function validasi(Request $request){

        $auth = $this->authRegister($request->all());

        if($auth->status == true){

            // proses dari trx ke crm
            $dataUser = $auth->data;
            $code = $dataUser->code;
            // $data = array_push($auth->data,$request->all());

            $userCrm = $this->storeUserCrm($code,$request->all());

            return response()->json(['status' => true, 'message'   => $userCrm,'data' => $auth->data]);

            // proses dari trx ke mfa
            // $userMfa = $this->storeDeviceUser($auth->data,$request->all());

            // return response()->json(['status' => true, 'data'  => $auth, 'crm' => $userCrm]);
        }else{
            return response()->json(['status' => false, 'message'  => $auth->message]);
        }
        // $validasiEmail = $this->validasiEmail($request);

        // return response()->json(['status' => $auth->status, 'message'   => $auth->message,'data' => $auth->data]);
    }

    public function updateuser(Request $request){
        // return response()->json(['status' => true, 'message'   => 'berhasil','data' => $request->all()]);

        $auth = $this->authUpdateUser($request->all());

        if($auth->status == true){

            // proses dari trx ke crm
            $dataUser = $auth->data;
            $code = $dataUser->code;
            // $data = array_push($auth->data,$request->all());

            $userCrm = $this->updateUserCrm($code,$request->all());

            return response()->json(['status' => true, 'message'   => $userCrm,'data' => $auth->data]);

            // proses dari trx ke mfa
            // $userMfa = $this->storeDeviceUser($auth->data,$request->all());

            // return response()->json(['status' => true, 'data'  => $auth, 'crm' => $userCrm]);
        }else{
            return response()->json(['status' => false, 'message'  => $auth->message]);
        }
        // $validasiEmail = $this->validasiEmail($request);

        // return response()->json(['status' => $auth->status, 'message'   => $auth->message,'data' => $auth->data]);
    }


    protected function authRegister(array $data){
        try{
            $response = Http::acceptJson()->post($this->prefixUrlAuth().'register-user',$data);
            $response = json_decode($response->body());

            return $response;

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }

    protected function authUpdateUser(array $data){
        try{
            $response = Http::acceptJson()->post($this->prefixUrlAuth().'update-user',$data);
            $response = json_decode($response->body());

            return $response;

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }

    protected function storeUserCrm($code,$data){
        try{
            $data = ["code"=>$code,"data"=>$data];
            $response = Http::acceptJson()->post($this->prefixUrlCrm().'store-user',$data);
            $response = json_decode($response->body());

            return $response;
        }catch(Exception $e){
            return response()->json(['status' => false, 'message'  => $e]);
        }
    }

    protected function updateUserCrm($code,$data){
        try{
            $data = ["code"=>$code,"data"=>$data];
            $response = Http::acceptJson()->post($this->prefixUrlCrm().'update-user',$data);
            $response = json_decode($response->body());

            return $response;
        }catch(Exception $e){
            return response()->json(['status' => false, 'message'  => $e]);
        }
    }

    protected function storeDeviceUser($user, $request){
        try{
            $data = ["user"=>$user,"data"=>$request];
            $response = Http::acceptJson()->post($this->prefixUrlMfa().'device',$data);
            $response = json_decode($response->body());

            return $response;
        }catch(Exception $e){
            return response()->json(['status' => false, 'message'  => $e]);

        }
    }


    protected function mfaStore(array $data){
        try{
            $response = Http::acceptJson()->withHeaders([
                'Connection' => 'keep-alive',
                'Content-Type' => 'application/json'
            ])->post($this->prefixUrlAuth().'device',$data);
            $response = json_decode($response->body());

            return $response;

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }

    public function logoutuser(){
        try{
            $response = Http::acceptJson()->withHeaders([
                'code' => request()->header('code'),
                
            ])->get($this->prefixUrlAuth().'logout-user-cubex');
            $response = json_decode($response->body());
            if($response->status == true){
                $data = $response->data;
                // dd($data);

                // dd('registratsi berhasil');
                return response()->json(['status'=>true,'data'=> $data ]);

                // return redirect()->route('user.domain');
            }else{
                return response()->json(['status'=>false,'message'=> '-' ]);

            }

            // return response()->json(['status' => true, 'data'  => 'trx']);

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
    }

    public function validtoken(){
        try{
            $response = Http::acceptJson()->withHeaders([
                'code' => request()->header('code'),
                'validtoken'=>request()->header('validtoken'),                
            ])->get($this->prefixUrlAuth().'valid-token-check');
            $response = json_decode($response->body());
            if($response->status == true){
                // $data = $response->data;
                // dd($data);

                // dd('registratsi berhasil');
                return response()->json(['status'=>true]);

                // return redirect()->route('user.domain');
            }else{
                return response()->json(['status'=>false]);

            }

            // return response()->json(['status' => true, 'data'  => 'trx']);

        }catch(Exception $e){
            return $e;
            // return redirect()->route('register');
        }
        // return response()->json(['status'=>true]);

    }
}
