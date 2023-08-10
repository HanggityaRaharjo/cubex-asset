@extends('backend.templates.index')

@section('breadcrumb')
    {{-- Breadcrumbs --}}
    <nav class="cubex-breadcrumb">
        <ul class="cubex-breadcrumb-content">
            <li class="cubex-breadcrumbs-item">Company</li>
            <li>/</li>
            <li class="cubex-breadcrumbs-item cubex-breadcrumbs-active"><a href="javascript:void(0)"
                    class="cubex-breadcrumbs-active">
                    @if (!empty($company))
                        Edit
                    @else
                        Add
                    @endif
                </a>
            </li>
        </ul>
    </nav>

    {{-- End Breadcrumbs --}}
@endsection

@section('main-content')
    <div class="cubex-card" style="margin-bottom: 25px">
        <div class="card-body" style="color: #CCD2D9">
            <form class="mt-3" id="form-domainreg" action="{{ route('company.store') }}" method="POST">
                @csrf
                @if (!empty($company) && !empty($form))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-12" for="Code"><h6><b>Form : {{ $form->code }} / {{ $form->name }} </b></h6></label>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Nama Perusahaan</b></label>
                            <div class="col-sm-12">
                                <input type="text" name="nama" id="nama" class="form-control cubex-input"
                                    placeholder="Nama Perusahaan"
                                    @if (!empty($company)) value="{{ $company->nama }}" @endif>
                                @error('nama')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('nama') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Alamat</b></label>
                            <div class="col-sm-12">
                                <textarea class="form-control cubex-text-area" name="alamat">@if(!empty($company)){{ $company->alamat }}@endif</textarea>
                                @error('alamat')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('alamat') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Email</b></label>
                            <div class="col-sm-12">
                                <input type="text" name="email" id="email" class="form-control cubex-input"
                                    placeholder="Email Perusahaaan"
                                    @if (!empty($company)) value="{{ $company->email }}" @endif>
                                @error('name')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Telepone</b></label>
                            <div class="col-sm-12">
                                <input type="text" name="telepone" id="telepone" class="form-control cubex-input"
                                    placeholder="Telepone Perusahaan"
                                    @if (!empty($company)) value="{{ $company->telepone }}" @endif>
                                @error('name')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('telepone') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Website</b></label>
                            <div class="col-sm-12">
                                <input type="text" name="website" id="website" class="form-control cubex-input"
                                    placeholder="Website Perusahaan"
                                    @if (!empty($company)) value="{{ $company->website }}" @endif>
                                @error('name')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('website') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Jenis Usaha </b></label>
                            <div class="col-sm-12">
                                <select class="form-control  cubex-input" name="jenis_usaha" id="jenis_usaha">
                                    <option value="0">-</option>
                                </select>
                                @error('jenis_usaha')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('jenis_usaha') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Skala Usaha </b></label>
                            <div class="col-sm-12">
                                <select class="form-control  cubex-input" name="sekala_usaha" id="sekala_usaha">
                                    <option value="0">-</option>
                                </select>
                                @error('sekala_usaha')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('sekala_usaha') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Pendapatan Tahunan </b></label>
                            <div class="col-sm-12">
                                <select class="form-control  cubex-input" name="pendapatan_tahun" id="pendapatan_tahun">
                                    <option value="0">-</option>
                                </select>
                                @error('name')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('jenis_usaha') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Jumlah Karyawan</b></label>
                            <div class="col-sm-12">
                                <input type="number" name="karyawan" id="karyawan" class="form-control cubex-input"
                                    placeholder="Jumlah Karyawan"
                                    @if (!empty($company)) value="{{ $company->jumlah_karyawan }}" @endif>
                                @error('name')
                                    <span class="text-danger class-error">
                                        {{ $errors->first('website') }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-3" style="border-top:1px solid #CCD2D9">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label class="col-sm-12 mt-3" for="Code"><b>Kontak Pribadi</b></label>
                            </div>
                            <div class=" flex-row-reverse">
                                <button class="btn btn-add-contact"  @if (!empty($company)) data-companyid="{{ $company->id }}" @endif style="color: white"><i class="fa fa-plus "></i></button>
                            </div>
                        </div>
                        <table id="table-contact-personal" class="table cubex-text-secondary" width="100%">
                            <thead>
                                <tr style="background: #3a4042">
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($company))
                                @forelse ($company->users as $users)
                                @php
                                    $first = $users->user->first_name;
                                    $mid = isset($users->user->mid_name ) ? $users->user->mid_name : '' ;
                                    $last = isset($users->user->last_name ) ? $users->user->last_name : '' ;
                                    $fullname = $first ." ". $mid ." ". $last;

                                @endphp
                                <tr>
                                    <td>{{ $fullname }} </td>
                                    <td>{{ $users->user->contacts[0]->nama }}</td>
                                    <td>{{ $users->user->contacts[1]->nama }}</td>
                                    <td>{{ $users->user->position }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="edit-contact"  data-contactid="{{ $users->id}}">
                                            <img src="{{ asset('assets/icon/edit-ico.svg') }}" alt="edit-ico">
                                        </a>
                                        <a href="javascript:void(0)" class="delete-contact" data-contactid="{{ $users->id}}">
                                            <img src="{{ asset('assets/icon/delete-ico.svg')}}" alt="delete-ico">
                                        </a>
                                    </td>
                                </tr>
                                @empty

                                @endforelse

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-2" style="margin-right: 0px;padding-right:0px;">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Status Proses : </b></label>
                            <div class="col-sm-12">
                                <h6>{{ $form->status->name }}</h6>
                               {{--  @php
                                   $status = \DB::table('tr_status')->where('type_code','05')->get();
                               @endphp

                               <select class="form-control  cubex-input" name="status" id="status">
                                    @foreach ($status as $status)
                                        <option @if (!empty($company) && $form->status_id == $status->id) selected @endif value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group row">

                            <div class="col-sm-12">
                                <button class="btn btn-sm btn-approval" data-statusid="{{ $form->status->id }}" data-formid="{{ $form->id }}" style="background:#2C9ED7;padding:8px 16px;border-radius:8px;color:white">Approval</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 ">
                        <div class="form-group row">
                            <label class="col-sm-12" for="Code"><b>Active</b></label>
                            <div class="col-sm-2">
                                @if (!empty($company) && $company->active == 1)
                                    <input type="checkbox" name="active" value="1" data-toggle="toggle"
                                    data-on="Active" data-off="InActive" data-onstyle="primary"
                                    data-offstyle="danger" data-width="100%" data-style="ios" checked>
                                @else
                                <input type="checkbox" name="active" value="2" data-toggle="toggle"
                                                    data-on="Active" data-off="InActive" data-onstyle="primary"
                                                    data-offstyle="danger" data-width="100%" data-style="ios" >
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 text-right">
                        @if (!empty($company))
                            <input type="hidden" id="company_id" name="company_id" value="{{ $company->id }}">
                            <input type="hidden" id="form_id" name="form_id" value="{{ $form->id }}">
                            <input type="submit" value="Update" class="btn btn-sm " id="button-status"
                                style="background:#2C9ED7;padding:8px 16px;border-radius:8px;color:white">
                        @else
                            <input type="submit" value="Simpan" class="btn btn-sm btn-success" id="button-status"
                                style="background:#2C9ED7;padding:8px 16px;border-radius:8px;border:none;color:white">
                        @endif
                        <a href="{{ route('company') }}" class="btn btn-sm btn-warning"
                            style="border:1px solid #2C9ED7;background:transparent;color:#2C9ED7;padding:8px 16px;border-radius:8px;">Cancel</a>
                    </div>
                </div>

            </form>
        </div>


    </div>
    <br>


@endsection

@section('javascript')
    @if (!empty($company))
        <script type="text/javascript">
            var url = `${APP_URL}/sales-lead/reference`;
            let formSetup = {url:url,method:'get'}
            let jenisid = `{{ $company->jenis_usaha }}`;
            let skalaid = `{{ $company->skala_usaha }}`;
            let incomeid = `{{ $company->pendapatan_tahun }}`;


            commit(formSetup).then((response)=>{
                let datas = response.data;

                let jenisusaha = datas.filter((data)=> data.parent_code == '01')
                jenisusaha.forEach((element)=>{
                    $('#jenis_usaha').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

                $(`#jenis_usaha option[value=${jenisid}]`).prop("selected", "selected")

                let skalausaha = datas.filter((data)=> data.parent_code == '02')
                skalausaha.forEach((element)=>{
                    $('#sekala_usaha').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

                $(`#sekala_usaha option[value=${skalaid}]`).prop("selected", "selected")


                let pendthn = datas.filter((data)=> data.parent_code == '03')
                pendthn.forEach((element)=>{
                    $('#pendapatan_tahun').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

                $(`#pendapatan_tahun option[value='${incomeid}']`).prop("selected", "selected")

            }).catch((err) => console.log(err));


        </script>
    @else
        <script type="text/javascript">
            var url = `${APP_URL}/sales-lead/reference`;
            let formSetup = {url:url,method:'get'}
            commit(formSetup).then((response)=>{
                let datas = response.data;

                let jenisusaha = datas.filter((data)=> data.parent_code == '01')
                jenisusaha.forEach((element)=>{
                    $('#jenis_usaha').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

                let skalausaha = datas.filter((data)=> data.parent_code == '02')
                skalausaha.forEach((element)=>{
                    $('#sekala_usaha').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

                let pendthn = datas.filter((data)=> data.parent_code == '03')
                pendthn.forEach((element)=>{
                    $('#pendapatan_tahun').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))
                })

            }).catch((err) => console.log(err));
        </script>
    @endif
    <script type="text/javascript">

        $('.btn-approval').on('click', function(e){
            e.preventDefault();
            var statusid = $(this).data('statusid');
            var formid = $(this).data('formid');
            var url = `${APP_URL}/sales-lead/update-status/${statusid}/${formid}`;
            let formSetup = {url:url,method:'get'}
            commit(formSetup).then((response)=>{
                console.log(response.data)
                if (response.status == true) {
                    showSuccessMessage('Form Approved To '+response.data.name);
                    setTimeout(function() {
                        window.location.reload();
                    }, 800);
                }
            }).catch((err) => console.log(err));
        })


        $('.btn-add-contact').on('click', function(e) {
            e.preventDefault();

            var compid = $(this).data('companyid');
            if(compid == null || compid == '0'){
                showFailMessage('Please Save Before Add Employee ')
            }else{
                $(this).attr('disabled', true);
                $('.edit-server').attr('disabled', true);
                $('.delete-server').attr('disabled', true);

                let table = $('#table-contact-personal');
                var url = `${APP_URL}/sales-lead/reference`;
                let formSetup = {url:url,method:'get'}
                commit(formSetup).then((response)=>{
                    let datas = response.data;

                    $('#table-contact-personal tr:last').after(`
                        <tr>
                            <td><input type="text" name="namakontak" id="namakontak" class="form-control cubex-input" required></td>
                            <td><input type="text" name="emailkontak" id="emailkontak" class="form-control cubex-input" required></td>
                            <td><input type="text" name="phonekontak" id="phonekontak" class="form-control cubex-input" required></td>
                            <td><select id="jabatankontak" name="jabatankontak" class="form-control cubex-input"class="form-control cubex-input"></select></td>
                            <td width="8%">
                                <input type="hidden" name="tjId" id="tjId" value="">
                                <input type="hidden" name="serverLocationId" id="serverLocationId" value="">
                                <button class="btn btn-sm btn-info btn-save-contact" style="background:#598470;"><i class="fa fa-floppy-o"></i></button>
                                <button class="btn btn-sm btn-danger" style="background:#7C3333;"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    `);
                    let jabatan = datas.filter((data)=> data.parent_code == '04')
                    jabatan.forEach((element)=>{
                        $('#jabatankontak').append($('<option>',{
                            value : element.name,
                            text : element.name,
                        }))
                    })

                }).catch((err) => console.log(err));
            }

        })

        $('#table-contact-personal').on('click','.btn-save-contact',function(e){
            e.preventDefault();
            if($('#namakontak').val() == '' || $('#emailkontak').val() == '' || $('#phonekontak').val() == ''){
                showFailMessage('Required Field')
            }else{
                const url = `${APP_URL}/sales-lead/add-contact`;
                const formData = new FormData();
                formData.append('company_id', $('#company_id').val());
                formData.append('namakontak', $('#namakontak').val());
                formData.append('emailkontak', $('#emailkontak').val());
                formData.append('phonekontak', $('#phonekontak').val());
                formData.append('jabatankontak', $('#jabatankontak').find(':selected').val());

                const formSetup = {
                    url: url,
                    type: 'post',
                    data: formData,
                    hasCustomForm: true
                };

                commit(formSetup).then((response) => {
                    //console.log(response)

                    if (response.status == true) {
                        showSuccessMessage(response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 800);
                    } else {
                        let message = response.message;
                        let pesan='';
                        if(message.emailkontak){
                            pesan += message.emailkontak[0]+'\n';
                        }

                        if(message.phonekontak){
                            pesan += message.phonekontak[0]+'\n';
                        }
                       showFailMessage(pesan)

                    }
                }).catch((err) => console.log(err));
            }
        })

        $('#table-contact-personal').on('click','.btn-update-contact',function(e){
            e.preventDefault();
            if($('#namakontak').val() == '' || $('#emailkontak').val() == '' || $('#phonekontak').val() == ''){
                showFailMessage('Required Field')
            }else{
                const url = `${APP_URL}/sales-lead/update-contact`;
                const formData = new FormData();
                formData.append('company_id', $('#company_id').val());
                formData.append('namakontak', $('#namakontak').val());
                formData.append('emailkontak', $('#emailkontak').val());
                formData.append('phonekontak', $('#phonekontak').val());
                formData.append('userid', $('#userid').val());
                formData.append('emailkontakid', $('#emailkontakid').val());
                formData.append('phonekontakid', $('#phonekontakid').val());
                formData.append('jabatankontak', $('#jabatankontak').find(':selected').val());

                const formSetup = {
                    url: url,
                    type: 'post',
                    data: formData,
                    hasCustomForm: true
                };

                commit(formSetup).then((response) => {
                    if (response.status == true) {
                        showSuccessMessage(response.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 800);
                    } else {
                        let message = response.message;
                        let pesan='';
                        if(message.emailkontak){
                            pesan += message.emailkontak[0]+'\n';
                        }

                        if(message.phonekontak){
                            pesan += message.phonekontak[0]+'\n';
                        }
                       showFailMessage(pesan)
                    }
                }).catch((err) => console.log(err));
            }
        })


        $('#table-contact-personal').on('click','.edit-contact',function(e){
            e.preventDefault();
            let id = $(this).data('contactid');
            var url = `${APP_URL}/sales-lead/edit-contact/${id}`;
            let formSetup = {url:url,method:'get'}
            commit(formSetup).then((response)=>{
                let data = response.data.user;
                let reference = response.reference;
                let jabatan = reference.filter((data)=> data.parent_code == '04')

                let firstname = data.first_name != null ? data.first_name : '';
                let midname =  data.mid_name != null ? data.mid_name : '';
                let lastname = data.last_name != null ? data.last_name : '';
                let fullname = firstname  +' '+ midname +' '+ lastname;
                {{--  console.log(fullname )  --}}
                var cols = $(this).closest("tr");
                    cols.replaceWith(`
                    <tr>
                        <td><input type="text" name="namakontak" id="namakontak" class="form-control cubex-input" value="${fullname}" required></td>
                        <td><input type="text" name="emailkontak" id="emailkontak" class="form-control cubex-input" value="${data.contacts[0].nama}" required></td>
                        <td><input type="text" name="phonekontak" id="phonekontak" class="form-control cubex-input" value="${data.contacts[1].nama}" required></td>
                        <td><select id="jabatankontak" name="jabatankontak" class="form-control cubex-input"class="form-control cubex-input"></select></td>
                        <td width="8%">
                            <input type="hidden" name="userid" id="userid" value="${data.id}">
                            <input type="hidden" name="emailkontakid" id="emailkontakid" value="${data.contacts[0].id}">
                            <input type="hidden" name="phonekontakid" id="phonekontakid" value="${data.contacts[1].id}">

                            <button class="btn btn-sm btn-info btn-update-contact" style="background:#598470;"><i class="fa fa-floppy-o"></i></button>
                            <button class="btn btn-sm btn-danger" style="background:#7C3333;"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    `);

                jabatan.forEach((element)=>{
                    $('#jabatankontak').append($('<option>',{
                        value : element.name,
                        text : element.name,
                    }))

                $(`#jabatankontak option[value='${data.position}']`).prop("selected", "selected")

                })
            }).catch((err) => console.log(err));
        });

        $('#table-contact-personal').on('click','.delete-contact',function(e){
            e.preventDefault();
            let id = $(this).data('contactid');
            var url = `${APP_URL}/sales-lead/delete-contact/${id}`;
            let formSetup = {url:url,method:'get'}
            commit(formSetup).then((response)=>{
                if (response.status == true) {
                    console.log(response.data)
                    showSuccessMessage(response.message);
                    setTimeout(function() {
                        window.location.reload();
                    }, 800);
                } else {

                }
            }).catch((err) => console.log(err));
        });
    </script>
@endsection
