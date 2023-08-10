<nav class="sb-topnav navbar navbar-expand navbar-dark cubex-navbar-primary">
    <a href="" class="navbar-brand d-flex justify-content-start align-items-center" style="gap: 10px">

        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 40 35" fill="none">
            <path d="M21.8394 0L39.0189 5.89548L21.8394 11.682L4.72266 5.89548L21.8394 0Z"
                fill="url(#paint0_linear_3320_63484)" />
            <path d="M22.2441 12.1657L39.2518 6.32471V27.4555L22.2441 33.2965V12.1657Z" fill="#4579A0" />
            <path d="M21.5565 12.1657L4.54883 6.32471V27.4555L21.5565 33.2965V12.1657Z" fill="white" />
            <path d="M17.0077 34.8427L0 29.0017L4.55256 27.4556L21.5602 33.2966L17.0077 34.8427Z"
                fill="url(#paint1_linear_3320_63484)" />
            <path d="M39.2518 6.32471L30.748 19.8106L22.2441 12.1657L39.2518 6.32471Z" fill="#E2E7EC" />
            <path d="M39.2518 6.32471L30.748 19.8106L22.2441 12.1657L39.2518 6.32471Z"
                fill="url(#paint2_linear_3320_63484)" />
            <path d="M30.748 19.8105L22.2441 33.2964L39.2518 27.4554L30.748 19.8105Z"
                fill="url(#paint3_linear_3320_63484)" />
            <defs>
                <linearGradient id="paint0_linear_3320_63484" x1="39.0816" y1="5.98138" x2="4.72266"
                    y2="5.98138" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#484848" />
                    <stop offset="0.501166" stop-color="#D5DBE0" />
                    <stop offset="1" stop-color="#484848" />
                </linearGradient>
                <linearGradient id="paint1_linear_3320_63484" x1="18.4679" y1="17.062" x2="13.2282"
                    y2="32.0081" gradientUnits="userSpaceOnUse">
                    <stop />
                    <stop offset="1" stop-opacity="0" />
                </linearGradient>
                <linearGradient id="paint2_linear_3320_63484" x1="42.0005" y1="9.9324" x2="16.6608"
                    y2="17.2337" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2C5A7C" />
                    <stop offset="0.438135" stop-color="#4579A0" />
                    <stop offset="1" stop-color="#D2E0E9" />
                </linearGradient>
                <linearGradient id="paint3_linear_3320_63484" x1="18.5506" y1="28.9157" x2="47.3262"
                    y2="25.8234" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#2C5A7C" />
                    <stop offset="0.438135" stop-color="#4579A0" />
                    <stop offset="1" stop-color="#D2E0E9" />
                </linearGradient>
            </defs>
        </svg>

        <div class="d-flex flex-column">

            <span
                style="color:  #F0DFCE;
                font-family: Poppins;
                font-size: 16px;
                font-style: normal;
                font-weight: 300;
                line-height: 20px;">
                Admin
            </span>
        </div>

    </a>
    <button class="" id="sidebarToggle" href="#"
        style="padding:0;margin:0;margin-left: 99px;background:transparent;border:none">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="12" viewBox="0 0 19 12" fill="none">
            <rect y="5" width="19" height="2" rx="1" fill="#F0DFCE" />
            <rect y="10" width="19" height="2" rx="1" fill="#F0DFCE" />
            <rect width="19" height="2" rx="1" fill="#F0DFCE" />
        </svg>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ml-auto nav-fill">

        </ul>
        <ul class="navbar-nav ml-auto nav-fill">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown2" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reference
                    &nbsp;<img alt="" xclass="img-thumbnail" class="rounded-circle" width="25"
                        src=""></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown2" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                    &nbsp;<img alt="" xclass="img-thumbnail" class="rounded-circle" width="25"
                        src=""><!-- <i class="fas fa-user fa-fw"></i> --></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown2"
                    style="border-radius:8px;padding:20px 0px">
                    <a class="dropdown-item" href="{{ url('/profile-user') }}">Profile</a>
                    <a class="dropdown-item" href="#">Activity Log</a>

                    {{--  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>  --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <img src="{{ asset('assets/icon/logout-ico.svg') }}" alt="logout-ico">
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

</nav>
