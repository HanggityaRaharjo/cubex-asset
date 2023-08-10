<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class HistoryLoginController extends Controller
{
    //
    public function index(){
        // $query = HistoryLogin::with(['user', 'status'])->latest();

        // dd($browser);
        return view('backend.history-login.index');
    }

    public function list()
    {
        $query = HistoryLogin::with(['user', 'status'])->orderBy('id','desc')->get();

        return Datatables::of($query)
            ->addIndexColumn()
            ->setRowClass(function ($query) {
                if ($query->status_code == '0302')
                    return 'table-danger-failed-1';
                else if ($query->status_code == '0303')
                    return 'table-danger';
                else if ($query->status_code == '0702')
                    return 'table-danger-0702';
                else if ($query->status_code == '0101' || $query->status_code == '0103' || $query->status_code == '0104' || $query->status_code == '0104' || $query->status_code == '0105' || $query->status_code == '0106' || $query->status_code == '0107')
                    return 'table-danger';
                else if ($query->status_code == '0106')
                    return 'table-danger-failed-1';
                else
                    return $query->username == 'SUPER ADMIN' ? 'table-warning' : 'table-warning-purple';
            })
            ->editColumn('agent', function ($query) {
                return $query->agent;
                // return 'OS: ' . $query->os . '<br>' .
                //     'OS Bit: ' . $query->os_bit . '<br> Browser: ' . $query->browser . '<br> Serial: ' . $query->browser_number . '<br>';
            })
            ->editColumn('username', function ($query) {
                return isset($query->username) ? $query->username : '-';
            })
            ->editColumn('user_login', function ($query) {
                return isset($query->user_login) ? $query->user_login : '-';
            })
            ->editColumn('status_name', function ($query) {
                return $query->status->name;
            })
            ->editColumn('status_descr', function ($query) {
                return $query->status->descr . '<br>' .
                    'Latitude: ' . Str::limit($query->latitude, 8, '') . ' -
                     Longitude: ' . Str::limit($query->longitude, 8, '') . '<br>' .
                    $query->address;
            })
            ->editColumn('emergency', function ($query) {
                return '<button type="button" class="btn btn-danger btn-sm" onclick="emergency('.$query->user_id.')">
                    <i class="fa fa-exclamation-circle"></i>
                </button>';
            })
            ->rawColumns(['status_descr', 'browser_agent', 'emergency'])
            ->make(true);
    }

    public function emergency($userid){

    }
}
