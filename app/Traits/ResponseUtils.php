<?php

namespace App\Traits;

use App\Models\ThLoginTrx;
use App\Models\TtTransaction;
use Illuminate\Support\Facades\App;

trait ResponseUtils {
    protected function insertTtTrx($request,$type,$status)
    {
        // return $request->input('origin');
        TtTransaction::create([
            'code'        => $request->input('feature_auth')['code'],
            'name'        => $request->input('feature_auth')['name'],
            'type'        => $type,
            'status'        => $status,
            'username'        => $request->input('email'),
            'origin_url'        => $request->input('origin')[0],
            'origin_ip'      => $request->input('ip')[0],
            'origin_domain'      => $request->input('domain_name'),
            'latitude'      => $request->input('latitude'),
            'longitude'      => $request->input('longitude'),
            'address'      => $request->input('address'),
            'browser'      => $request->input('browser'),
        ]);
    }
}
