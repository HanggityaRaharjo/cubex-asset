<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu" style="background: #1F2324;padding-left:10px;padding-right:10px;">
        <div class="nav cubex-text-secondary">
            <div class="sb-sidenav-menu-heading" style="gap: 10px">Dashboard</div>
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><img src="{{ asset('assets/icon/dashboard-nav-ico.svg') }}"></i></div>
                Sales Monitoring
            </a>

            <div class="sb-sidenav-menu-heading">Pre Sales</div>

            {{--  <a class="nav-link" href="{{ url('/sales-lead') }}">
                <div class="sb-nav-link-icon"><img src="{{ asset('assets/icon/client-ico.svg') }}" alt="api-gateway-ico"></div>
                Sales Lead
                <div class="sb-sidenav-collapse-arrow"></div>
            </a>  --}}

            @php
                $status = \DB::table('tr_status')->where('type_code','05')->get(['id','code','name','type_code','type_id']);
            @endphp

            @foreach($status as $menu)
            <a class="nav-link" href="{{ url('/sales-lead?status-code='.$menu->code) }}">
                <div class="sb-nav-link-icon"><img src="{{ asset('assets/icon/client-ico.svg') }}" alt="api-gateway-ico"></div>
                {{ $menu->name}}
                <div class="sb-sidenav-collapse-arrow"></div>
            </a>
            @endforeach




            {{--  <a class="nav-link" href="{{ url('/organizations') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-building"></i></div>
                Organizations
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/usermanagement') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                User Management
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/branding') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-id-card-o"></i></div>
                Branding
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/security') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-shield"></i></div>
                Security
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>  --}}
            {{--  <a class="nav-link" href="{{ url('/actions') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Actions
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/authpipeline') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Auth Pipeline
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/monitoring') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Monitoring
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/marketplace') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Marketplace
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/extensions') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Extensions
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <a class="nav-link" href="{{ url('/setting') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Setting
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>  --}}
            {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa fa-cog"></i></div>
                References
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('status.index') }}">Status</a>
                    <a class="nav-link" href="{{ route('type.index') }}">Type</a>
                    <a class="nav-link" href="{{ route('brand.index') }}">Brand</a>
                    <a class="nav-link" href="{{ route('devices.index') }}">Devices</a>
                </nav>
            </div> --}}
            {{--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistration" aria-expanded="false" aria-controls="collapseRegistration">
                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                SETUP
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>  --}}
            {{--  <div class="collapse" id="collapseRegistration" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">  --}}
            {{--  <a class="nav-link" href="{{ route('user.group') }}">Group Access</a>
                    <a class="nav-link" href="{{ route('gui.modul') }}">Layar GUI / Menu</a>
                    <a class="nav-link" href="{{ route('group.layar') }}">Group Layar</a>
                    <a class="nav-link" href="{{ route('user.management',['page=1']) }}">User Group Access</a>
                    <a class="nav-link" href="{{ route('user.management.layar',['page=1']) }}">User Layar / GUI</a>
                    <a class="nav-link" href="{{ route('user.matrix') }}">User Matrix</a>
                    <a class="nav-link" href="{{ route('domain.index') }}">Domain</a>  --}}
            {{--  </nav>
            </div>

            <div class="sb-sidenav-menu-heading">History</div>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                Login
            </a>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon"><i class="fas fa-mobile"></i></div>
                Device Users
            </a>  --}}
        </div>
    </div>
</nav>
