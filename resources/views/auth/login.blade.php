@extends('layouts.app')

@section('content')
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div style="width: fit-content;">

                    <div class="d-flex justify-content-center" style="margin-bottom: 70px">
                        <img src="{{ asset('assets/images/Logo-Cube-X-3.png') }}" alt="">
                    </div>

                    @if (Session::has('fail'))
                        <div class="alert alert-danger">
                            <b>Login Gagal</b><br>
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    <div class="cubex-card" style="color: #CCD2D9">
                        <div style="margin-bottom:20px;">
                            <div class="col-md-12 text-center d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="88" height="70" viewBox="0 0 88 70"
                                    fill="none">
                                    <path d="M44.8814 0L69.1228 8.31891L44.8814 16.4841L20.7285 8.31891L44.8814 0Z"
                                        fill="url(#paint0_linear_3320_63409)" />
                                    <path d="M45.4531 17.1669L69.4521 8.9248V38.7417L45.4531 46.9838V17.1669Z"
                                        fill="#4579A0" />
                                    <path d="M44.4833 17.1669L20.4844 8.9248V38.7417L44.4833 46.9838V17.1669Z"
                                        fill="white" />
                                    <path
                                        d="M38.0624 49.1655L14.0635 40.9234L20.4874 38.7417L44.4864 46.9838L38.0624 49.1655Z"
                                        fill="url(#paint1_linear_3320_63409)" />
                                    <path d="M69.4521 8.9248L57.4526 27.9543L45.4531 17.1669L69.4521 8.9248Z"
                                        fill="#E2E7EC" />
                                    <path d="M69.4521 8.9248L57.4526 27.9543L45.4531 17.1669L69.4521 8.9248Z"
                                        fill="url(#paint2_linear_3320_63409)" />
                                    <path d="M57.4526 27.9541L45.4531 46.9836L69.4521 38.7415L57.4526 27.9541Z"
                                        fill="url(#paint3_linear_3320_63409)" />
                                    <path
                                        d="M11.541 68.946C10.4099 69.4955 9.00121 69.7704 7.31527 69.7704C5.13839 69.7704 3.39549 69.1258 2.0865 67.8369C0.77754 66.548 0.123047 64.8567 0.123047 62.763C0.123047 60.5121 0.859354 58.6933 2.33194 57.3062C3.80454 55.9191 5.67194 55.2256 7.9342 55.2256C9.38543 55.2256 10.5878 55.4185 11.541 55.8045V57.5612C10.4455 56.9986 9.23611 56.7172 7.91284 56.7172C6.15571 56.7172 4.72934 57.257 3.6338 58.3367C2.54537 59.4162 2.00115 60.8588 2.00115 62.6648C2.00115 64.3789 2.50978 65.7463 3.52709 66.7671C4.55151 67.7812 5.89249 68.2883 7.55005 68.2883C9.08678 68.2883 10.4169 67.9744 11.541 67.3463V68.946Z"
                                        fill="url(#paint4_linear_3320_63409)" />
                                    <path
                                        d="M28.9123 63.8429C28.9123 67.7947 26.9737 69.7709 23.0965 69.7709C19.383 69.7709 17.5264 67.8701 17.5264 64.0686V55.4614H19.319V63.9607C19.319 66.8461 20.6421 68.2888 23.2885 68.2888C25.8426 68.2888 27.1194 66.8951 27.1194 64.1078V55.4614H28.9123V63.8429Z"
                                        fill="url(#paint5_linear_3320_63409)" />
                                    <path
                                        d="M35.8027 69.5352V55.4614H40.1565C41.4798 55.4614 42.529 55.7591 43.3045 56.3545C44.0799 56.9501 44.4676 57.7253 44.4676 58.6807C44.4676 59.4787 44.2329 60.1723 43.7634 60.7613C43.2938 61.3501 42.6463 61.7688 41.8211 62.0175V62.0568C42.8526 62.168 43.678 62.5278 44.2969 63.1362C44.9158 63.7382 45.2251 64.5233 45.2251 65.4918C45.2251 66.6956 44.7558 67.6706 43.8167 68.4165C42.8776 69.1622 41.6931 69.5352 40.2631 69.5352H35.8027ZM37.5954 56.9532V61.4973H39.4309C40.4127 61.4973 41.1846 61.2813 41.7465 60.8496C42.3084 60.4113 42.5896 59.796 42.5896 59.0045C42.5896 57.6371 41.6112 56.9532 39.6549 56.9532H37.5954ZM37.5954 62.9792V68.0434H40.0285C41.0813 68.0434 41.8958 67.8143 42.472 67.3564C43.0555 66.8985 43.3471 66.2704 43.3471 65.4721C43.3471 63.8102 42.1164 62.9792 39.6549 62.9792H37.5954Z"
                                        fill="url(#paint6_linear_3320_63409)" />
                                    <path
                                        d="M59.4986 69.5352H51.3887V55.4614H59.1573V56.9532H53.1816V61.6347H58.7091V63.1166H53.1816V68.0434H59.4986V69.5352Z"
                                        fill="url(#paint7_linear_3320_63409)" />
                                    <path d="M70.8616 64.5689H65.0352V63.3027H70.8616V64.5689Z"
                                        fill="url(#paint8_linear_3320_63409)" />
                                    <path
                                        d="M87.876 69.5352H85.6885L82.167 64.1471C82.0603 63.9835 81.943 63.7512 81.815 63.4504H81.7723C81.701 63.6009 81.5801 63.8332 81.4094 64.1471L77.7812 69.5352H75.583L80.7052 62.4592L75.9886 55.4614H78.1868L81.3134 60.4079C81.5197 60.7351 81.701 61.0622 81.8576 61.3894H81.9003C82.1279 60.9574 82.3272 60.6173 82.4979 60.3686L85.7525 55.4614H87.812L82.9994 62.4395L87.876 69.5352Z"
                                        fill="url(#paint9_linear_3320_63409)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_3320_63409" x1="69.2113" y1="8.44012"
                                            x2="20.7285" y2="8.44012" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#484848" />
                                            <stop offset="0.501166" stop-color="#D5DBE0" />
                                            <stop offset="1" stop-color="#484848" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_3320_63409" x1="40.1229" y1="24.0757"
                                            x2="32.7293" y2="45.1657" gradientUnits="userSpaceOnUse">
                                            <stop />
                                            <stop offset="1" stop-opacity="0" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_3320_63409" x1="73.3307" y1="14.0155"
                                            x2="37.5747" y2="24.3181" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#2C5A7C" />
                                            <stop offset="0.438135" stop-color="#4579A0" />
                                            <stop offset="1" stop-color="#D2E0E9" />
                                        </linearGradient>
                                        <linearGradient id="paint3_linear_3320_63409" x1="40.2412" y1="40.802"
                                            x2="80.8455" y2="36.4386" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#2C5A7C" />
                                            <stop offset="0.438135" stop-color="#4579A0" />
                                            <stop offset="1" stop-color="#D2E0E9" />
                                        </linearGradient>
                                        <linearGradient id="paint4_linear_3320_63409" x1="43.9999" y1="55.2256"
                                            x2="43.9999" y2="69.7704" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                        <linearGradient id="paint5_linear_3320_63409" x1="44.0018" y1="55.226"
                                            x2="44.0018" y2="69.7709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                        <linearGradient id="paint6_linear_3320_63409" x1="44.0019" y1="55.226"
                                            x2="44.0019" y2="69.7709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                        <linearGradient id="paint7_linear_3320_63409" x1="44.0006" y1="55.226"
                                            x2="44.0006" y2="69.7709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                        <linearGradient id="paint8_linear_3320_63409" x1="44.0019" y1="55.2258"
                                            x2="44.0019" y2="69.7706" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                        <linearGradient id="paint9_linear_3320_63409" x1="43.9992" y1="55.226"
                                            x2="43.9992" y2="69.7709" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5A3D33" />
                                            <stop offset="0.5" stop-color="#E3C3A2" />
                                            <stop offset="1" stop-color="#916751" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>

                        <div class="login-text-wrap" style="margin-bottom:15px">
                            <p class="login-text-title d-flex flex-column" style="margin:0;">
                                <span>
                                    Welcome to Pengembang Informatika.
                                </span>
                                <span>
                                    Please put your login
                                </span>
                                <span>
                                    credentials below to start using the app.
                                </span>
                            </p>
                        </div>

                        <h5 style="text-align: center;color: #a0a8b0;margin-bottom:15px">LOGIN</h5>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="cubex-form-wrapper">
                                <div class="cubex-form-control">
                                    <label for="email"class="cubex-label"
                                        style="margin-bottom:9px">{{ __('Username') }}</label>
                                    <input id="username" type="text"
                                        class="cubex-input @error('email') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="email" autofocus
                                        placeholder="Masukan Username Anda" style="width:269px">
                                    <input type="hidden" name="latitude">
                                    <input type="hidden" name="longitude">
                                    <input type="hidden" name="address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="cubex-form-wrapper">
                                <div class="cubex-form-control">
                                    <label for="password" class="cubex-label"
                                        style="margin-bottom:9px">{{ __('Password') }}</label>


                                    <input id="password" type="password" autocomplete="new-password"
                                        class="cubex-input @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Masukan Password Anda"
                                        style="width:269px">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>



                            <button type="submit" class="cubex-button-login">
                                {{ __('Login') }}
                            </button>



                        </form>

                    </div>



                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        const options = {
            enableHighAccuracy: false,
            timeout: 5000,
            maximumAge: 0
        };

        $(function() {
            getCurrentLocation();
        })

        function getCurrentLocation() {
            navigator.geolocation.getCurrentPosition(success, error, options)
        }

        function success(pos) {
            const coordinate = pos.coords;

            // console.log(coordinate);
            getAddressLocation(coordinate);
        }

        function error(err) {
            console.warn(`ERROR(${err.code}): ${err.message}`);
        }

        function getAddressLocation({
            latitude,
            longitude,
        }) {

            $('input[name=latitude]').val(latitude);
            $('input[name=longitude]').val(longitude);

            $.getJSON(
                `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key={{ config('app.map_api_key') }}`,
                (data) => {
                    const address = data.results[0].formatted_address;

                    $('#currentLocation').html(`<strong>Lokasi anda saat ini:</strong> <br> ${address}`);

                    $('input[name=address]').val(address);
                });
        }
    </script>
@endsection
