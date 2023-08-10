<?php

use App\Http\Controllers\Api\ApiGatewayController;
use App\Http\Controllers\Api\RequestLoginController;
use App\Http\Controllers\Api\ValidasiLoginController;
use App\Http\Controllers\Api\ValidasiPersonalInfoController;
use App\Http\Controllers\Api\ValidasiRegisterController;
use App\Http\Controllers\FileTransferController;
use App\Http\Controllers\SalesLeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
    // return "ini user";
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'v1.'], function () {

    Route::get('/order-installasi',[SalesLeadController::class,'orderinstall']);


    // Route::post('/request-loginx',[RequestLoginController::class,'requestLogin']);
    Route::post('/request-register',[ValidasiRegisterController::class,'validasi']);
    Route::post('/request-updateuser',[ValidasiRegisterController::class,'updateuser']);
    Route::get('/logout-user-cubex',[ValidasiRegisterController::class,'logoutuser']);
    Route::get('/valid-token-check',[ValidasiRegisterController::class,'validtoken']);

    // Route::post('/validasi-login',[ValidasiLoginController::class,'validasilogin']);
    // Route::get('/validasi-personal/{code}',[ValidasiPersonalInfoController::class,'personalinfo']);
    Route::get('/list-user-domain',[ApiGatewayController::class,'listUserDomain']);
    Route::get('/hold-user',[ApiGatewayController::class,'holdUser']);
    Route::get('/edit-user',[ApiGatewayController::class,'edituser']);

    Route::post('/request-login',[ApiGatewayController::class,'auth']);

    // list-user-domain
    Route::post('/{path}',[ApiGatewayController::class,'gateway']);
});
// FTP
// Route::get('/ftp-root',[FileTransferController::class,'get_all_content']);
// Route::post('/connect-ftp',[FileTransferController::class,'connect_ftp']);
// Route::post('/ftp-content',[FileTransferController::class,'show_folder']);

// Route::post('/create-folder',[FileTransferController::class,'create_folder']);
