<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Rocklo -->
    <style>
      @font-face {
        font-family: "RockoFLF";
        font-style: normal;
        font-weight: normal;
        src: local("RockoFLF Regular"),
          url("{{ asset('assets/landingpage/assets/font/RockoFLF.woff') }} ") format("woff");
      }

      @font-face {
        font-family: "RockoFLF Bold";
        font-style: normal;
        font-weight: normal;
        src: local("RockoFLF Bold"),
          url("{{ asset('assets/landingpage/assets/font/RockoFLF-Bold.woff') }}") format("woff");
      }

      @font-face {
        font-family: "RockoUltraFLF Regular";
        font-style: normal;
        font-weight: normal;
        src: local("RockoUltraFLF Regular"),
          url("{{ asset('assets/landingpage/assets/font/RockoUltraFLF.woff') }}") format("woff");
      }

      @font-face {
        font-family: "RockoUltraFLF Bold";
        font-style: normal;
        font-weight: normal;
        src: local("RockoUltraFLF Bold"),
          url("{{ asset('assets/landingpage/assets/font/RockoFLF-Bold.woff') }}") format("woff");
      }
    </style>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/landingpage/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/landingpage/responsive.css') }}" />

    <title>ALIANSI PENGEMBANG INFORMATIKA</title>
  </head>
  <body class="d-flex flex-column justify-content-center align-items-center">
    <nav class="position-fixed w-100" id="navbar">
      <div id="nav-menu">
        <a href="#home-section" class="nav-item">Home</a>
        <a href="#profile-section" class="nav-item">Profile</a>
        <a href="#xnet-section" class="nav-item">xNet</a>
        <div class="cbx-dropdown">
          <span
            style="
              color: #efebeb;
              font-family: Poppins;
              font-size: 18px;
              font-style: normal;
              font-weight: 500;
              line-height: 20px;
            "
            >Feature</span
          >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            class="cbx-nav-icon"
          >
            <path
              d="M6 9L12 15L18 9"
              stroke="#CE6055"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
          <div class="cbx-dropdown-content shadow">
            <a href="" class="nav-item" class="p-2">Feature Menu</a>
            <a href="" class="nav-item" class="p-2">Feature Menu</a>
            <a href="" class="nav-item" class="p-2">Feature Menu</a>
            <a href="" class="nav-item" class="p-2">Feature Menu</a>
            <a href="" class="nav-item" class="p-2">Feature Menu</a>
          </div>
        </div>
        <a href="#contact-section" class="nav-item">Contact Us</a>
      </div>

      <div id="responsive-nav" class="position-relative" style="color: white">
        <button
          style="background-color: transparent; border: none; color: white"
          onclick="HandleNavMenuResponsive()"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
            style="width: 40px; height: 40px"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
        <div id="responsive-nav-menu" class="position-absolute">
          <a href="#home-section" class="nav-item p-2">Home</a>
          <a href="#profile-section" class="nav-item p-2">Profile</a>
          <a href="#xnet-section" class="nav-item p-2">xNet</a>
          <div class="cbx-dropdown p-2">
            <span
              style="
                color: #efebeb;
                font-family: Poppins;
                font-size: 18px;
                font-style: normal;
                font-weight: 500;
                line-height: 20px;
              "
              >Feature</span
            >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              class="cbx-nav-icon"
            >
              <path
                d="M6 9L12 15L18 9"
                stroke="#CE6055"
                stroke-width="2"
                stroke-linecap="round"
              />
            </svg>
            <div class="cbx-dropdown-content shadow">
              <a href="" class="p-2">Feature Menu</a>
              <a href="" class="p-2">Feature Menu</a>
              <a href="" class="p-2">Feature Menu</a>
              <a href="" class="p-2">Feature Menu</a>
              <a href="" class="p-2">Feature Menu</a>
            </div>
          </div>
          <a href="#contact-section" class="nav-item p-2">Contact Us</a>
        </div>
      </div>
    </nav>
    <main
      style="max-width: 1920px; width: 100%; color: white; overflow: hidden"
    >
      <section id="home-section">
        <div class="d-flex flex-column align-items-center" style="gap: 30px">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="228"
            height="230"
            viewBox="0 0 228 230"
            fill="none"
          >
            <ellipse
              cx="114.617"
              cy="67.1333"
              rx="29.1333"
              ry="29.1333"
              transform="rotate(90 114.617 67.1333)"
              fill="#5A2D2D"
            />
            <ellipse
              cx="114.617"
              cy="162.133"
              rx="29.1333"
              ry="29.1333"
              transform="rotate(90 114.617 162.133)"
              fill="#958E8E"
            />
            <path
              d="M21.5332 95C29.8711 51.7194 68.3758 19 114.617 19C160.857 19 199.362 51.7194 207.7 95"
              stroke="#5A2D2D"
              stroke-width="38"
              stroke-linecap="round"
            />
            <path
              d="M207.7 134.267C199.362 177.547 160.858 210.267 114.617 210.267C68.3762 210.267 29.8715 177.547 21.5336 134.267"
              stroke="url(#paint0_linear_3885_88280)"
              stroke-width="38"
              stroke-linecap="round"
            />
            <defs>
              <linearGradient
                id="paint0_linear_3885_88280"
                x1="114.617"
                y1="229.267"
                x2="114.617"
                y2="96.8999"
                gradientUnits="userSpaceOnUse"
              >
                <stop stop-color="#958E8E" />
                <stop offset="1" stop-color="#958E8E" stop-opacity="0" />
              </linearGradient>
            </defs>
          </svg>
          <p id="api-title">PT ALIANSI PENGEMBANG INFORMATIKA</p>
        </div>
      </section>
      <!--  -->
      <section id="profile-section">
        <div
          class="position-absolute"
          style="
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
          "
        >
          <img src="{{ asset('assets/landingpage/assets/Mars-Background.png') }}" alt="" id="mars-image" />
        </div>
        <div
          style="
            width: 100%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
          "
        >
          <div id="profile-item" class="w-100">
            <div class="profile" data-aos="fade-up">
              <div class="d-flex flex-column">
                <p id="profile-title">Profile Perusahaan</p>
                <div id="profile-content">
                  <p>
                    PT Aliansi Pengembang Informatika (PT API) bergerak di
                    bidang teknologi informasi yang berfokus pada pengembangan
                    dan pemasaran software dan telah berdiri sejak 10 Maret 2022
                    dan berdomisili di Jakarta.
                  </p>
                  <p>
                    PT API berkomitmen untuk menjadi perusahaan yang mampu
                    mengembangkan produk-produk digital yang dapat menjadi
                    solusi permasalahan bisnis yang terjadi. Seperti salah satu
                    produk kami yaitu xNet, sebuah software API Tools berbasis
                    web, yang mampu menjadi solusi perusahaan dalam melakukan
                    integrasi data dari berbagari sumber secara mudah dan cepat.
                  </p>
                </div>
              </div>
            </div>
            <div class="position-relative profile">
              <div class="d-flex justify-content-end w-100 position-relative">
                <img
                  src="{{ asset('assets/landingpage/assets/image-company-profile.png') }}"
                  style="width: 70%"
                />
              </div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="657"
                height="1025"
                style="position: absolute; top: -70px; right: 0"
                viewBox="0 0 717 1085"
                fill="none"
              >
                <g filter="url(#filter0_dd_3901_87832)">
                  <path
                    d="M1035.34 410.105C1108.31 682.44 946.694 962.366 674.36 1035.34C402.025 1108.31 122.099 946.694 49.1274 674.359C-23.8444 402.025 137.771 122.099 410.105 49.1271C615.917 -6.01991 826.064 72.8126 947.945 232.161"
                    stroke="#DABBBB"
                    stroke-width="3"
                  />
                </g>
                <defs>
                  <filter
                    id="filter0_dd_3901_87832"
                    x="0.105469"
                    y="0.105225"
                    width="1084.25"
                    height="1084.25"
                    filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB"
                  >
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix
                      in="SourceAlpha"
                      type="matrix"
                      values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                      result="hardAlpha"
                    />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix
                      type="matrix"
                      values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"
                    />
                    <feBlend
                      mode="normal"
                      in2="BackgroundImageFix"
                      result="effect1_dropShadow_3901_87832"
                    />
                    <feColorMatrix
                      in="SourceAlpha"
                      type="matrix"
                      values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                      result="hardAlpha"
                    />
                    <feOffset />
                    <feGaussianBlur stdDeviation="15" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix
                      type="matrix"
                      values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.8 0"
                    />
                    <feBlend
                      mode="normal"
                      in2="effect1_dropShadow_3901_87832"
                      result="effect2_dropShadow_3901_87832"
                    />
                    <feBlend
                      mode="normal"
                      in="SourceGraphic"
                      in2="effect2_dropShadow_3901_87832"
                      result="shape"
                    />
                  </filter>
                </defs>
              </svg>
            </div>
          </div>
        </div>
      </section>
      <!--  -->
      <section style="min-height: 100vh; position: relative">
        <div
          style="
            background-color: #21242b;
            height: 100vh;
            position: relative;
            z-index: -10;
          "
        ></div>
        <div
          class="w-100 position-absolute d-flex justify-content-center align-items-center"
          style="top: 0; height: 100vh"
        >
          <div id="profile-additional">
            <div class="profile-additional-item">
              <img
                src="{{ asset('assets/landingpage/assets/bg-detail-section.png') }}"
                style="width: 70%"
                alt=""
              />
            </div>
            <div class="profile-additional-item" data-aos="fade-up">
              <p id="profile-additional-title">
                Satu solusi untuk kebutuhan integrasi data dan aplikasi
              </p>
              <p id="profile-additional-content">
                API tools berbasis web yang mengedepankan kemudahan dalam
                mengintegrasikan data dan aplikasi. Memudahkan Anda dalam
                melakukan integrasi data dari berbagai sumber database/aplikasi,
                mengolah dan menyimpan data, serta menghasilkan report dalam
                bentuk visualisasi chart maupun data table sesuai kebutuhan
                pengguna.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section id="xnet-section">
        <div id="x-net-items">
          <div class="x-net-item" style="z-index: 10">
            <p id="xnet-title" data-aos="fade-up">xNet</p>
            <p id="xnet-content" data-aos="fade-up">
              Melakukan integrasi data dan aplikasi serta melihat report dari
              mana saja dan kapan saja.
            </p>
          </div>

          <div id="x-net-image">
            <img
              src="{{ asset('assets/landingpage/assets/component-1-img.png') }}"
              class="image-1"
              data-aos="fade-left"
            />
            <img
              src="{{ asset('assets/landingpage/assets/component-2-img.png') }}"
              class="image-2"
              data-aos="fade-left"
            />
            <img
              src="{{ asset('assets/landingpage/assets/component-2-img.png') }}"
              class="image-3"
              data-aos="fade-left"
            />
          </div>
        </div>
      </section>
      <section id="feature-section">
        <p id="feature-title" data-aos="fade-up">5 Fitur Utama</p>
        <div
          class="row row-cols-lg-5 row-cols-md-4 justify-content-center"
          style="gap: 0px"
        >
          <!-- Card Feature -->
          <div class="p-2">
            <div
              class="card-feature"
              style="
                border-radius: 100px;
                padding: 10px;
                background: linear-gradient(
                  180deg,
                  rgba(90, 45, 45, 0.8) 0%,
                  rgba(156, 100, 100, 0.8) 100%
                );
              "
            >
              <p class="card-number">1</p>
              <p class="card-title">Access Management</p>
              <div style="margin-bottom: 30px">
                <img
                  src="{{ asset('assets/landingpage/assets/component-fitur-1.png') }}"
                  style="width: 100%"
                  alt=""
                />
              </div>
              <div class="card-content">
                <p class="text-center">
                  Lorem ipsum dolor sit amet consectetur
                </p>
              </div>
              <button
                style="
                  background: #572d2d;
                  display: flex;
                  padding: 11px 24px;
                  justify-content: center;
                  align-items: center;
                  gap: 8px;
                  border-radius: 4px;
                  border: none;
                  color: #fbfcff;
                  font-family: Poppins;
                  font-size: 14px;
                  font-style: normal;
                  font-weight: 400;
                  line-height: 18px;
                "
              >
                Learn More
              </button>
            </div>
          </div>
          <!-- End Card Feature -->

          <!-- Card Feature -->
          <div class="p-2">
            <div
              class="card-feature"
              style="
                border-radius: 100px;
                padding: 10px;
                background: linear-gradient(
                  180deg,
                  rgba(90, 45, 45, 0.8) 0%,
                  rgba(156, 100, 100, 0.8) 100%
                );
              "
            >
              <p class="card-number">2</p>
              <p class="card-title">Access Management</p>
              <div style="margin-bottom: 30px">
                <img
                  src="{{ asset('assets/landingpage/assets/component-fitur-2.png') }}"
                  style="width: 100%"
                  alt=""
                />
              </div>
              <div class="card-content">
                <p class="text-center">
                  Lorem ipsum dolor sit amet consectetur
                </p>
              </div>
              <button
                style="
                  background: #572d2d;
                  display: flex;
                  padding: 11px 24px;
                  justify-content: center;
                  align-items: center;
                  gap: 8px;
                  border-radius: 4px;
                  border: none;
                  color: #fbfcff;
                  font-family: Poppins;
                  font-size: 14px;
                  font-style: normal;
                  font-weight: 400;
                  line-height: 18px;
                "
              >
                Learn More
              </button>
            </div>
          </div>
          <!-- End Card Feature -->

          <!-- Card Feature -->
          <div class="p-2">
            <div
              class="card-feature"
              style="
                border-radius: 100px;
                padding: 10px;
                background: linear-gradient(
                  180deg,
                  rgba(90, 45, 45, 0.8) 0%,
                  rgba(156, 100, 100, 0.8) 100%
                );
              "
            >
              <p class="card-number">3</p>
              <p class="card-title">Access Management</p>
              <div style="margin-bottom: 30px">
                <img
                  src="{{ asset('assets/landingpage/assets/component-fitur-3.png') }}"
                  style="width: 100%"
                  alt=""
                />
              </div>
              <div class="card-content">
                <p class="text-center">
                  Lorem ipsum dolor sit amet consectetur
                </p>
              </div>
              <button
                style="
                  background: #572d2d;
                  display: flex;
                  padding: 11px 24px;
                  justify-content: center;
                  align-items: center;
                  gap: 8px;
                  border-radius: 4px;
                  border: none;
                  color: #fbfcff;
                  font-family: Poppins;
                  font-size: 14px;
                  font-style: normal;
                  font-weight: 400;
                  line-height: 18px;
                "
              >
                Learn More
              </button>
            </div>
          </div>
          <!-- End Card Feature -->

          <!-- Card Feature -->
          <div class="p-2">
            <div
              class="card-feature"
              style="
                border-radius: 100px;
                padding: 10px;
                background: linear-gradient(
                  180deg,
                  rgba(90, 45, 45, 0.8) 0%,
                  rgba(156, 100, 100, 0.8) 100%
                );
              "
            >
              <p class="card-number">4</p>
              <p class="card-title">Access Management</p>
              <div style="margin-bottom: 30px">
                <img
                  src="{{ asset('assets/landingpage/assets/component-fitur-4.png') }}"
                  style="width: 100%"
                  alt=""
                />
              </div>
              <div class="card-content">
                <p class="text-center">
                  Lorem ipsum dolor sit amet consectetur
                </p>
              </div>
              <button
                style="
                  background: #572d2d;
                  display: flex;
                  padding: 11px 24px;
                  justify-content: center;
                  align-items: center;
                  gap: 8px;
                  border-radius: 4px;
                  border: none;
                  color: #fbfcff;
                  font-family: Poppins;
                  font-size: 14px;
                  font-style: normal;
                  font-weight: 400;
                  line-height: 18px;
                "
              >
                Learn More
              </button>
            </div>
          </div>
          <!-- End Card Feature -->

          <!-- Card Feature -->
          <div class="p-2">
            <div
              class="card-feature"
              style="
                border-radius: 100px;
                padding: 10px;
                background: linear-gradient(
                  180deg,
                  rgba(90, 45, 45, 0.8) 0%,
                  rgba(156, 100, 100, 0.8) 100%
                );
              "
            >
              <p class="card-number">5</p>
              <p class="card-title">Access Management</p>
              <div style="margin-bottom: 30px">
                <img
                  src="{{ asset('assets/landingpage/assets/component-fitur-5.png') }}"
                  style="width: 100%"
                  alt=""
                />
              </div>
              <div class="card-content">
                <p class="text-center">
                  Lorem ipsum dolor sit amet consectetur
                </p>
              </div>
              <button
                style="
                  background: #572d2d;
                  display: flex;
                  padding: 11px 24px;
                  justify-content: center;
                  align-items: center;
                  gap: 8px;
                  border-radius: 4px;
                  border: none;
                  color: #fbfcff;
                  font-family: Poppins;
                  font-size: 14px;
                  font-style: normal;
                  font-weight: 400;
                  line-height: 18px;
                "
              >
                Learn More
              </button>
            </div>
          </div>
          <!-- End Card Feature -->
        </div>
      </section>
      <section class="" id="contact-section">
        <div></div>
        <div id="contact-form">
          <div class="contact-form-item" data-aos="fade-up">
            <div class="p-5" id="form">
              <div class="row mb-4">
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      First Name
                    </label>
                    <input
                      type="text"
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    />
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      Last Name
                    </label>
                    <input
                      type="text"
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    />
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      Email
                    </label>
                    <input
                      type="text"
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    />
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      Phone Number
                    </label>
                    <input
                      type="text"
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    />
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-12 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      Country
                    </label>
                    <select
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    >
                      <option value=""></option>
                      <option value=""></option>
                      <option value=""></option>
                    </select>
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      Company Name
                    </label>
                    <input
                      type="text"
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    />
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="col-md-6 mb-2">
                  <div class="w-100">
                    <label
                      for=""
                      style="
                        color: #ced1d6;
                        font-family: RockoFLF;
                        font-size: 15px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: 18px;
                      "
                    >
                      How we can help ?
                    </label>
                    <select
                      name=""
                      class="w-100"
                      style="
                        height: 36px;
                        border-radius: 4px;
                        border: 1px solid #ced1d6;
                        background: #2f3236;
                      "
                      id=""
                    >
                      <option value=""></option>
                      <option value=""></option>
                      <option value=""></option>
                    </select>
                  </div>
                </div>
                <!--  -->
              </div>
              <div class="d-flex justify-content-end">
                <button
                  style="
                    display: inline-flex;
                    padding: 11px 24px;
                    justify-content: center;
                    align-items: center;
                    gap: 8px;
                    border-radius: 4px;
                    background: #572d2d;
                    border: none;
                    color: #fbfcff;
                    font-family: Poppins;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: 18px;
                  "
                >
                  Submit
                </button>
              </div>
            </div>
          </div>
          <div class="contact-form-item">
            <div>
              <p id="contact-title">Contact Us</p>
              <p id="contact-content">
                We’d love to hear your thoughts feedback or even just news
                around your latest project. For technical support or all other
                inquiries, please use the form to get in touch with us.
              </p>
            </div>
          </div>
        </div>
        <div class="w-100" id="contact-form-social">
          <div>
            <button style="background-color: transparent; border: none">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                viewBox="0 0 25 25"
                fill="none"
              >
                <path
                  d="M22.9163 12.5631C22.9163 6.77492 18.2531 2.08325 12.4997 2.08325C6.7462 2.08325 2.08301 6.77492 2.08301 12.5631C2.08301 17.7951 5.89134 22.1305 10.8719 22.9166V15.593H8.22745V12.5624H10.8719V10.2541C10.8719 7.6277 12.4268 6.17631 14.8066 6.17631C15.9455 6.17631 17.1386 6.38117 17.1386 6.38117V8.96033H15.824C14.5302 8.96033 14.1275 9.76867 14.1275 10.5978V12.5631H17.0163L16.5545 15.5923H14.1275V22.9166C19.108 22.1305 22.9163 17.7951 22.9163 12.5631Z"
                  fill="#D8B3B3"
                />
              </svg>
            </button>
            <button style="background-color: transparent; border: none">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                viewBox="0 0 25 25"
                fill="none"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.5 3.125C9.95375 3.125 9.635 3.13563 8.635 3.18125C7.63688 3.22687 6.955 3.38563 6.35875 3.6175C5.73375 3.8525 5.16687 4.22125 4.69813 4.69875C4.22139 5.16696 3.85241 5.73343 3.61687 6.35875C3.38625 6.955 3.22687 7.6375 3.18125 8.63563C3.13625 9.635 3.125 9.95312 3.125 12.5C3.125 15.0469 3.13563 15.365 3.18125 16.365C3.22687 17.3631 3.38563 18.045 3.6175 18.6413C3.8525 19.2663 4.22125 19.8331 4.69875 20.3019C5.16697 20.7786 5.73344 21.1476 6.35875 21.3831C6.955 21.6144 7.63688 21.7731 8.635 21.8188C9.635 21.8644 9.95375 21.875 12.5 21.875C15.0463 21.875 15.365 21.8644 16.365 21.8188C17.3631 21.7731 18.045 21.6144 18.6413 21.3825C19.2663 21.1475 19.8331 20.7787 20.3019 20.3013C20.7786 19.833 21.1476 19.2666 21.3831 18.6413C21.6144 18.045 21.7731 17.3631 21.8188 16.365C21.8644 15.365 21.875 15.0463 21.875 12.5C21.875 9.95375 21.8644 9.635 21.8188 8.635C21.7731 7.63688 21.6144 6.955 21.3825 6.35875C21.1471 5.73317 20.7781 5.16645 20.3013 4.69813C19.833 4.22139 19.2666 3.85241 18.6413 3.61687C18.045 3.38625 17.3625 3.22687 16.3644 3.18125C15.365 3.13625 15.0469 3.125 12.5 3.125ZM12.5 4.81438C15.0031 4.81438 15.3 4.82375 16.2887 4.86875C17.2025 4.91062 17.6988 5.0625 18.0294 5.19187C18.4669 5.36125 18.7794 5.565 19.1075 5.8925C19.4356 6.22062 19.6388 6.53312 19.8081 6.97062C19.9369 7.30125 20.0894 7.7975 20.1312 8.71125C20.1762 9.7 20.1856 9.99687 20.1856 12.5C20.1856 15.0031 20.1762 15.3 20.1312 16.2887C20.0894 17.2025 19.9375 17.6988 19.8081 18.0294C19.6581 18.4366 19.4187 18.805 19.1075 19.1075C18.8051 19.4187 18.4366 19.6582 18.0294 19.8081C17.6988 19.9369 17.2025 20.0894 16.2887 20.1312C15.3 20.1762 15.0037 20.1856 12.5 20.1856C9.99625 20.1856 9.7 20.1762 8.71125 20.1312C7.7975 20.0894 7.30125 19.9375 6.97062 19.8081C6.56341 19.6581 6.195 19.4187 5.8925 19.1075C5.58136 18.805 5.34196 18.4366 5.19187 18.0294C5.06312 17.6988 4.91062 17.2025 4.86875 16.2887C4.82375 15.3 4.81438 15.0031 4.81438 12.5C4.81438 9.99687 4.82375 9.7 4.86875 8.71125C4.91062 7.7975 5.0625 7.30125 5.19187 6.97062C5.36125 6.53312 5.565 6.22062 5.8925 5.8925C6.19496 5.58128 6.56338 5.34186 6.97062 5.19187C7.30125 5.06312 7.7975 4.91062 8.71125 4.86875C9.7 4.82375 9.99687 4.81438 12.5 4.81438Z"
                  fill="#D8B3B3"
                />
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.5004 15.628C12.0896 15.628 11.6828 15.5471 11.3033 15.3899C10.9238 15.2327 10.5789 15.0023 10.2885 14.7118C9.998 14.4213 9.76758 14.0765 9.61038 13.697C9.45318 13.3175 9.37227 12.9107 9.37227 12.4999C9.37227 12.0891 9.45318 11.6823 9.61038 11.3028C9.76758 10.9233 9.998 10.5785 10.2885 10.288C10.5789 9.99751 10.9238 9.76709 11.3033 9.60989C11.6828 9.45269 12.0896 9.37178 12.5004 9.37178C13.33 9.37178 14.1257 9.70135 14.7123 10.288C15.2989 10.8746 15.6285 11.6703 15.6285 12.4999C15.6285 13.3295 15.2989 14.1252 14.7123 14.7118C14.1257 15.2985 13.33 15.628 12.5004 15.628ZM12.5004 7.68115C11.2224 7.68115 9.99671 8.18884 9.09302 9.09253C8.18933 9.99622 7.68164 11.2219 7.68164 12.4999C7.68164 13.7779 8.18933 15.0036 9.09302 15.9073C9.99671 16.811 11.2224 17.3187 12.5004 17.3187C13.7784 17.3187 15.0041 16.811 15.9078 15.9073C16.8115 15.0036 17.3191 13.7779 17.3191 12.4999C17.3191 11.2219 16.8115 9.99622 15.9078 9.09253C15.0041 8.18884 13.7784 7.68115 12.5004 7.68115ZM18.721 7.59365C18.721 7.89575 18.601 8.18548 18.3874 8.39909C18.1738 8.61271 17.884 8.73271 17.582 8.73271C17.2799 8.73271 16.9901 8.61271 16.7765 8.39909C16.5629 8.18548 16.4429 7.89575 16.4429 7.59365C16.4429 7.29155 16.5629 7.00183 16.7765 6.78821C16.9901 6.5746 17.2799 6.45459 17.582 6.45459C17.884 6.45459 18.1738 6.5746 18.3874 6.78821C18.601 7.00183 18.721 7.29155 18.721 7.59365Z"
                  fill="#D8B3B3"
                />
              </svg>
            </button>
            <button style="background-color: transparent; border: none">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                viewBox="0 0 25 25"
                fill="none"
              >
                <path
                  d="M20.7835 8.25017C20.7962 8.43384 20.7962 8.6175 20.7962 8.80285C20.7962 14.4507 16.4966 20.9643 8.63474 20.9643V20.9609C6.31231 20.9643 4.03812 20.2991 2.08301 19.0447C2.42071 19.0854 2.7601 19.1057 3.10034 19.1065C5.02498 19.1082 6.89461 18.4624 8.40876 17.2733C6.57976 17.2386 4.97589 16.0461 4.4156 14.3051C5.0563 14.4287 5.71646 14.4033 6.34531 14.2315C4.35127 13.8286 2.91668 12.0766 2.91668 10.0419C2.91668 10.0233 2.91668 10.0055 2.91668 9.98777C3.51083 10.3187 4.17607 10.5024 4.85655 10.5227C2.97846 9.26751 2.39955 6.76903 3.53368 4.81562C5.70377 7.4859 8.90557 9.10924 12.3427 9.28105C11.9982 7.79652 12.4688 6.2409 13.5792 5.19733C15.3007 3.57907 18.0083 3.66202 19.6265 5.38268C20.5838 5.19394 21.5012 4.8427 22.3408 4.34503C22.0217 5.33444 21.3539 6.17488 20.4619 6.70894C21.3091 6.60907 22.1368 6.38224 22.9163 6.03608C22.3425 6.89599 21.6197 7.64502 20.7835 8.25017Z"
                  fill="#D8B3B3"
                />
              </svg>
            </button>
          </div>
          <div>
            <p>
              Subscribe to our newsletter and stay up to date with the latest
              news and deals!
            </p>
          </div>
          <div class="d-flex align-items-end" style="gap: 5px">
            <div class="d-flex flex-column">
              <label
                for=""
                style="
                  color: #f5dada;
                  font-family: RockoFLF;
                  font-size: 15px;
                  font-style: normal;
                  font-weight: 500;
                  line-height: 18px;
                "
                >Email</label
              >
              <input
                type="text"
                placeholder="Email@gmail.com"
                style="
                  border-radius: 4px;
                  border: 1px solid #ced1d6;
                  background: #000;
                  padding: 8px;
                  width: 300px;
                "
              />
            </div>
            <button
              style="
                display: inline-flex;
                padding: 11px 24px;
                justify-content: center;
                align-items: center;
                gap: 8px;
                border-radius: 4px;
                border-color: transparent;
                background: #572d2d;
                color: #fbfcff;
                font-family: Poppins;
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: 18px;
              "
            >
              Submit
            </button>
          </div>
        </div>
      </section>
    </main>
    <footer style="background: #484a4e; width: 100%; padding: 20px">
      <p
        style="
          color: #fbfcff;
          font-family: RockoFLF;
          font-size: 15px;
          font-style: normal;
          font-weight: 500;
          line-height: 14px;
        "
      >
        Powered by Cubex 2023-2028
      </p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
    <script>
      AOS.init();
    </script>
    <script>
      const HandleNavMenuResponsive = () => {
        console.log("klik");
        const element = document.getElementById("responsive-nav-menu");
        element.classList.toggle("active");
      };
    </script>
  </body>
</html>
