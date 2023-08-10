<?php

namespace App\Http\Controllers;

use App\Models\TjServerFunction;
use App\Models\TjServerLocation;
use App\Models\TrControlPanel;
use App\Models\TrDatabase;
use App\Models\TrDomain;
use App\Models\TrFunction;
use App\Models\TrMikrotik;
use App\Models\TrProvider;
use App\Models\TrServer;
use App\Models\TrServerLocation;
use App\Models\TtAsset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $data = [
            'trFunction' => 0,
            'trDatabase' => 0,
            'trServer'   => 0,
            'trMikrotik' => 0,
            'trProvider' => 0,
            'trControlPanel' => 0,
            'trDomain' => 0,
            'trServerLocation' => 0,
        ];
        // dd($trFunction);
        return view('backend.dashboard.dashboard', compact('data'));
    }


}
