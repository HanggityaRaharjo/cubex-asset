<?php

use App\Http\Controllers\AdminProfileController;
// use App\Http\Controllers\AssetCategoryController;
// use App\Http\Controllers\AssetController;
// use App\Http\Controllers\AssetPhaseController;
// use App\Http\Controllers\CompanyController;
// use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\DatabaseController;
// use App\Http\Controllers\DomainController;
// use App\Http\Controllers\FileTransferController;
// use App\Http\Controllers\FunctionController;
use App\Http\Controllers\GroupUserController;
// use App\Http\Controllers\HistoryLoginController;
// use App\Http\Controllers\MikrotikController;
// use App\Http\Controllers\ProviderController;
// use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SalesLeadController;
// use App\Http\Controllers\ServerController;
// use App\Http\Controllers\ServerLocationController;
// use App\Http\Controllers\ServicesController;
// use App\Http\Controllers\SetupServerController;
// use App\Http\Controllers\SoftwareLifecycleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage.index');
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile-user')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('/update-profile', [AdminProfileController::class, 'updateprofile'])->name('update.profile');

    });


    Route::prefix('sales-lead')->group(function () {
        Route::get('/', [SalesLeadController::class, 'index'])->name('company');
        Route::get('/create', [SalesLeadController::class, 'create'])->name('company.create');
        Route::get('/edit/{formid}', [SalesLeadController::class, 'edit'])->name('company.edit');
        Route::get('/delete/{ttform}', [SalesLeadController::class, 'destroy'])->name('company.destroy');
        Route::post('/store', [SalesLeadController::class, 'store'])->name('company.store');
        Route::post('/add-contact', [SalesLeadController::class, 'addcontact'])->name('company.addcontact');
        Route::post('/update-contact', [SalesLeadController::class, 'updatecontact'])->name('company.updatecontact');
        Route::get('/grid/{code}', [SalesLeadController::class, 'grid'])->name('company.grid');
        Route::get('/reference', [SalesLeadController::class, 'reference'])->name('company.reference');
        Route::get('/edit-contact/{id}', [SalesLeadController::class, 'editcontact'])->name('company.editcontact');
        Route::get('/delete-contact/{id}', [SalesLeadController::class, 'deletecontact'])->name('company.deletecontact');
        Route::get('/update-status/{statusid}/{formid}', [SalesLeadController::class, 'updatestatus'])->name('company.updatestatus');

    });

});


Route::get('/group-user', [GroupUserController::class, 'index']);


// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/create', [UserController::class, 'index']);
// Route::get('/user/edit/{id}', [UserController::class, 'index']);
// Route::get('/user/delete/{id}', [UserController::class, 'index']);

Route::resource('/user', UserController::class);
