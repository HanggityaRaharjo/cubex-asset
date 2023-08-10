<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HelperUrl {
    public function prefixUrlAuth(){
        return App::environment() == 'local' ? config('app.cubex_auth_local') : config('app.cubex_auth_prod');
    }

    public function prefixUrlMfa(){
        return App::environment() == 'local' ? config('app.cubex_mfa_local') : config('app.cubex_mfa_prod');
    }

    public function prefixUrlCrm(){
        return App::environment() == 'local' ? config('app.cubex_crm_local') : config('app.cubex_crm_prod');
    }
}
