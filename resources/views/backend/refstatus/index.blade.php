@extends('backend.templates.index')

@section('breadcrumb')
<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item">References</li>
    <li class="breadcrumb-item">{{ $typeText }}</li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Status</a></li>
</ol>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-cubex">
                <div class="d-flex">
                    <div>
                        <h5>List Status {{ $typeText }}</h5>
                    </div>
                    <div class="ml-auto">
                        <button type="button" onclick="addStatus({{ $type }})" class="btn btn-sm btn-block btn-cubex-secondary" style="color:#333333;font-weight:600;">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="table-status">
                    <thead class="text-center">
                        <tr style="background-color:#e9ecef;">
                            <th width="3%">NO</th>
                            <th width='10%'>Sequence</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Descr</th>
                            <th width='10%'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($status as $status)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $status->sequence }}</td>
                                <td>{{ $status->code }}</td>
                                <td>{{ $status->name }}</td>
                                <td>{{ $status->descr }}</td>
                                <td style="text-align: center">
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-cut"></i> </button>
                                    <button class="btn btn-sm btn-danger button-delete-status" title="delete/inactive" data-idstatus="{{ $status->id }}" data-codestatus="{{ $status->code }}" data-namestatus="{{ $status->name }}" ><i class="fa fa-edit"></i> </button>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@include('backend.refstatus.modal-add-status')
@endsection
@section('javascript')
    <script type="text/javascript">
        $('#table-status').DataTable();

        function addStatus(type){
            if(type==1){
                $('#type_id').val(1);
                $('#title-status').text('Add Status Authentication')
            }
            if(type==2){
                $('#type_id').val(2);
                $('#title-status').text('Add Status Authorization')
            }
            setModal('modalStatusRef','show');
        }

        $('#button-status').on('click', function(){

            if( $('#code').val() =='' || $('#nama').val()=='' || $('#descr').val() =='' ) {
                showFailMessage('Please Fill Out Fields');
            }else{

                const url = `${APP_URL}/ref-status/add`;
                const formData = $('#form-status').serialize();

            // console.log(formData);

                const formSetup = {url:url, type:'post', data:formData};
                commit(formSetup).then((response) => {
                    if(response.status == true){
                        showSuccessMessage(response.message)
                        setTimeout(function(){
                            window.location.reload();
                         }, 2000);
                    }else{
                        showFailMessage(response.message);
                    }
                    console.log(response.message)
                }).catch((err) => console.log(err));
            }
        });

        $('.button-delete-status').on('click', function(){
            const id = $(this).data('idstatus');
            const url = `${APP_URL}/ref-status/delete/${id}`;
            const formSetup = {url:url}
            confirmDelete(formSetup).then((response) => {
                if(response.status==true){
                    showSuccessMessage(response.message)
                        setTimeout(function(){
                            window.location.reload();
                         }, 2000);
                }
            }).catch((err) => console.log(err));

            //alert(code)
        });
    </script>
@endsection
