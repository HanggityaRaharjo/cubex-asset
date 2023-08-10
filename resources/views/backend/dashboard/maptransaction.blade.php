@extends('backend.templates.index')

@section('breadcrumb')
    {{-- Breadcrumbs --}}
    <nav class="cubex-breadcrumb">
        <ul class="cubex-breadcrumb-content">
            <li class="cubex-breadcrumbs-item">Reference</li>
            <li>/</li>
            <li class="cubex-breadcrumbs-item cubex-breadcrumbs-active"><a href="javascript:void(0)"
                    class="cubex-breadcrumbs-active">Map Transaction</a>
            </li>
        </ul>
    </nav>

    {{-- End Breadcrumbs --}}
    {{-- Title --}}
    <div class="cubex-box-wrapper cubex-bg-primary cubex-text-primary h-10 px-4 d-flex align-items-center" style="gap: 9px">
        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
            <path
                d="M52.25 37.9162V12.6463C52.25 11.1816 50.7274 10.2137 49.4011 10.8354L40.2444 15.1276C39.8175 15.3277 39.3335 15.3706 38.8781 15.2486L18.1219 9.68891C17.6665 9.56691 17.1825 9.60975 16.7556 9.80988L5.90113 14.8979C5.19867 15.2272 4.75 15.933 4.75 16.7088V41.9787C4.75 43.4434 6.27262 44.4113 7.59887 43.7896L16.7556 39.4974C17.1825 39.2973 17.6665 39.2544 18.1219 39.3764L38.8781 44.9361C39.3335 45.0581 39.8175 45.0152 40.2444 44.8151L51.0989 39.7271C51.8013 39.3978 52.25 38.692 52.25 37.9162Z"
                stroke="#E4BE98" stroke-width="2" />
            <path d="M40.375 45.125V14.25" stroke="#E4BE98" stroke-width="2" />
            <path d="M16.625 39.1875L16.625 9.5" stroke="#E4BE98" stroke-width="2" />
            <path
                d="M21.375 32.0625L20.6276 31.3981C20.2908 31.777 20.2908 32.348 20.6276 32.7269L21.375 32.0625ZM30.875 33.0625C31.4273 33.0625 31.875 32.6148 31.875 32.0625C31.875 31.5102 31.4273 31.0625 30.875 31.0625V33.0625ZM23.7943 27.8356L20.6276 31.3981L22.1224 32.7269L25.2891 29.1644L23.7943 27.8356ZM20.6276 32.7269L23.7943 36.2894L25.2891 34.9606L22.1224 31.3981L20.6276 32.7269ZM21.375 33.0625H30.875V31.0625H21.375V33.0625Z"
                fill="#F0DFCE" />
            <path
                d="M35.625 22.5625L36.3724 21.8981C36.7092 22.277 36.7092 22.848 36.3724 23.2269L35.625 22.5625ZM26.125 23.5625C25.5727 23.5625 25.125 23.1148 25.125 22.5625C25.125 22.0102 25.5727 21.5625 26.125 21.5625V23.5625ZM33.2057 18.3356L36.3724 21.8981L34.8776 23.2269L31.7109 19.6644L33.2057 18.3356ZM36.3724 23.2269L33.2057 26.7894L31.7109 25.4606L34.8776 21.8981L36.3724 23.2269ZM35.625 23.5625H26.125V21.5625H35.625V23.5625Z"
                fill="#F0DFCE" />
        </svg>
        <div>
            <h1 class="cubex-card-title">Map Transaction</h1>
            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, est!</p>
        </div>
    </div>
    {{-- End Title --}}
@endsection

@section('main-content')
    <div class="cubex-card">

        <div id="map" style="width: 100%; height: 486px;"></div>


    </div>
    <br>
    <div class="cubex-card" id="list-server" style="display:none;margin-bottom: 25px">
        <div class="card-body" style="color: #CCD2D9">
            <div class="cubex-bg-primary cubex-text-primary cubex-rounded-md" style="padding:5px 15px;border-radius:8px">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 style="margin: 0;font-weight:bold">List Of Server</h5>
                    </div>
                    <div class=" flex-row-reverse">
                        {{--  <button class="btn btn-add-server" style="color: white"><i class="fa fa-plus "></i></button>  --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="" style="border:none" id="list-of-server" width="100%">
                    <thead>
                        <tr style="background: #3a4042">
                            <th style="border: none">No</th>
                            <th style="border: none">Code</th>
                            <th style="border: none">Server Name</th>
                            <th style="border: none">Brand</th>
                            <th style="border: none">Type</th>
                            <th style="border: none">Os</th>
                            <th style="border: none">Ram</th>
                            <th style="border: none">Hdd</th>
                            <th style="border: none">Function</th>
                            <th style="border: none">Installation Date</th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {
                maxZoom: 20,
                attribution: osmAttrib
            }),
            map = new L.Map('map', {
                center: new L.LatLng('-6.896306', '107.565894'),
                zoom: 10,
                maxZoom: 30
            }),
            drawnItems = L.featureGroup().addTo(map);

        //var searchControl = L.esri.Geocoding.geosearch().addTo(map);
        var results = L.layerGroup().addTo(map);
        var address = '';

        {{--  searchControl.on('results', function (data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(L.marker(data.results[i].latlng));
            address=data.results[i].text;
            lat = data.results[i].latlng.lat;
            lng = data.results[i].latlng.lng;
            }
            $('#address').val(address);
            $('#lat').val(lat);
            $('#lng').val(lng);
        });  --}}

        L.control.layers({
            'osm': osm.addTo(map),
            "google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
                attribution: 'google'
            })
        }, {
            'drawlayer': drawnItems
        }, {
            position: 'topright',
            collapsed: true
        }).addTo(map);

        var url = `${APP_URL}/list-map-transaction`
        var formSetup = {
            url: url,
            method: 'get'
        }
        commit(formSetup).then((response) => {
            let data = response.data;
            data.forEach((element) => {
                //console.log(element.lat+' '+element.lng)

                var _icon = L.divIcon({
                    html: `<img src="{{ asset('assets/icon/service-lg-ico.svg') }}">`,
                    iconSize: [40, 48],
                    iconAnchor: [20, 48],
                    popupAnchor: [0, -48]
                });

                marker = L.marker(L.latLng(element.lat, element.lng), _icon).addTo(map);

                marker.bindPopup(`
                    <div class="row">
                        ${element.name} <br>
                        ${element.address} <br>
                        <a href="javascript:void(0)" class="show-detail" onclick="showdetail('${element.id}')">Detail Info</a>
                    </div>
                `);

            })
        }).catch((err) => console.log(err));

        function showdetail(id) {
            var url = `${APP_URL}/list-server/${id}`
            var formSetup = {
                url: url,
                method: 'get'
            }
            $('#list-of-server tbody').empty();
            commit(formSetup).then((response) => {
                console.log(response)

                table = $('#list-of-server').DataTable({
                    iDisplayLength: 10,
                    processing: true,
                    serverSide: false,
                    language: languageIdDataTable(),
                    data: response.data,
                    pagination: false,
                    searching: false,
                    destroy: true,
                    //ajax: "{{ route('history.login.list') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'ID',
                            searchable: true,
                            orderable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'server.code',
                            name: 'server.code',
                            orderable: false,
                            searchable: false,
                            className: 'text-left'
                        },
                        {
                            data: 'server.name',
                            name: 'server.name',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'server.brand',
                            name: 'server.brand',
                            orderable: false,
                            searchable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'server.server_type',
                            name: 'server.server_type',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'server.os',
                            name: 'server.os',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'server.ram',
                            name: 'server.ram',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'server.hdd_cap',
                            name: 'server.hdd_cap',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'listfunction',
                            name: 'listfunction',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                        {
                            data: 'install_date',
                            name: 'install_date',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        },
                    ],
                });

                $('#list-server').show();

            }).catch((err) => console.log(err));


        }
    </script>
@endsection
