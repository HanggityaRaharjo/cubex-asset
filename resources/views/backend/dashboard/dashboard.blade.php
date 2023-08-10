@extends('backend.templates.index')

@section('breadcrumb')
    {{-- Breadcrumbs --}}
    <nav class="cubex-breadcrumb">
        {{--  <ul class="cubex-breadcrumb-content">
            <li class="cubex-breadcrumbs-item">Home</li>
            <li>/</li>
            <li class="cubex-breadcrumbs-item cubex-breadcrumbs-active">Dashboard</li>
        </ul>  --}}
    </nav>

    {{-- End Breadcrumbs --}}
    {{-- Title --}}

    {{-- End Title --}}
@endsection


@section('main-content')
    {{-- Box --}}
    <div class="cubex-box-wrapper cubex-bg-primary cubex-text-primary h-10 px-4 d-flex align-items-center" style="gap: 9px">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="52" viewBox="0 0 60 52" fill="none">
            <path d="M33 35L33 40" stroke="#533314" stroke-width="10" />
            <path d="M25 40H41" stroke="#C09162" stroke-width="2" stroke-linecap="round" />
            <rect x="13.5" y="11.5" width="39" height="24" rx="1.5" fill="#F0DFCE"
                stroke="#C09162" />
            <rect x="14" y="14" width="38" height="19" rx="1" fill="#FCF7F2" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M33.2474 26.1276C33.0245 26.3505 33.0245 26.712 33.2474 26.9349L34.95 28.6375C34.9581 28.4259 35.0429 28.2167 35.2045 28.0551C35.3519 27.9077 35.539 27.8242 35.7314 27.8045L34.0546 26.1276C33.8317 25.9047 33.4703 25.9047 33.2474 26.1276Z"
                fill="#F0DFCE" />
            <rect x="34.5898" y="28.6714" width="1.74241" height="5.16714" rx="0.871203"
                transform="rotate(-45 34.5898 28.6714)" fill="#533314" />
            <circle cx="29.96" cy="22.6338" r="4.87799" fill="url(#paint0_linear_3320_63503)" stroke="#C09162" />
            <circle cx="0.827382" cy="0.827382" r="0.827382" transform="matrix(1 0 0 -1 27.8926 25.5298)"
                fill="white" />
            <rect x="6.5" y="14.4766" width="13.2093" height="26.3256" rx="1.5" fill="#F0DFCE"
                stroke="#C09162" />
            <rect x="7.09375" y="16.1626" width="12.0233" height="22.9535" rx="1" fill="#FCF7F2" />
            <path d="M11.4648 17.2559H14.7439" stroke="#C09162" stroke-linecap="round" />
            <path d="M20.209 21.6279L20.209 24.907" stroke="#C09162" stroke-linecap="round" />
            <defs>
                <linearGradient id="paint0_linear_3320_63503" x1="29.96" y1="17.3199" x2="29.96" y2="28.0759"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FCF7F2" />
                    <stop offset="1" stop-color="#F0DFCE" />
                </linearGradient>
            </defs>
        </svg>
        <div>
            <h1 class="cubex-card-title">Sales Monitoring</h1>
            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, est!</p>
        </div>
    </div>
    <div class="row mb-4">


    </div>




    <div class="cubex-cards" style="margin-bottom: 37px">












    </div>
    {{-- End Box --}}
@endsection
