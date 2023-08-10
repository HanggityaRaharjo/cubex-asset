@extends('backend.templates.index')

@section('breadcrumb')
    {{-- Breadcrumbs --}}
    <nav class="cubex-breadcrumb">
        <ul class="cubex-breadcrumb-content">
            <li class="cubex-breadcrumbs-item">Sales Lead</li>
            <li>/</li>
            <li class="cubex-breadcrumbs-item cubex-breadcrumbs-active"><a href="javascript:void(0)"
                    class="cubex-breadcrumbs-active">List Of Company</a>
            </li>
        </ul>
    </nav>

    {{-- End Breadcrumbs --}}
    {{-- Title --}}
    <div class="cubex-box-wrapper cubex-bg-primary cubex-text-primary">

        <div style="margin-left:16.75px">
            <h1 class="cubex-card-title mb-2">List Of Sales Lead</h1>
            <p class="cubex-card-content">Lorem ipsum, dolor sit amet consectetur adipisicing elitFacilis.
        </div>
        </p>
    </div>
    {{-- End Title --}}
@endsection

@section('main-content')
    <div class="cubex-card mb-5">
        {{--  --}}
        <div class="d-flex align-items-center justify-content-end cubex-text-secondary" style="margin-bottom: 17px">
            <div>
                <a href="{{ route('company.create') }}" class="btn btn-primary">
                    Add Data
                </a>
            </div>
        </div>
        {{--  --}}


        <div class="card-body">
            <table class=" " id="table-company" style="color: #A8B6BA;border:none">
                <thead class="text-center">
                    <tr style="background: #3a4042">
                        <th style="border: none" width='5%'>No</th>
                        <th style="border: none">Company Name</th>
                        <th style="border: none">Address</th>
                        <th style="border: none">Email</th>
                        <th style="border: none">Phone</th>
                        <th style="border: none" width='5%'>Active</th>
                        <th style="border: none" width="10%">ACTION</th>
                    </tr>
                </thead>
            </table>
        </div>


    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        table = '';
        let statuscode = '{{ $statuscode }}';
        $(function() {

            table = $('#table-company').DataTable({
                iDisplayLength: 10,
                processing: true,
                serverSide: true,
                language: languageIdDataTable(),
                ajax : `{{ route('company.grid',['code'=>$statuscode]) }}`,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'ID',
                        searchable: true,
                        orderable: true,
                        className: 'text-center'
                    },
                    {
                        data: 'company.nama',
                        name: 'company.nama',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'company.alamat',
                        name: 'company.alamat',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'company.email',
                        name: 'company.email',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'company.telepone',
                        name: 'company.telepone',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'active',
                        name: 'active',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ],
            });



        })

        $("#table-company").on('click', '.delete-company', function() {
            const id = $(this).data('companyid');

            const url = `${APP_URL}/sales-lead/delete/${id}`;
            const formSetup = {
                url: url
            }
            confirmDelete(formSetup).then((response) => {
                if (response.status == true) {
                    swal({
                        title: 'Success Berhasil Hapus Data',
                        icon: `${APP_URL}/assets/icon/success-popup.svg`,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            }).catch((err) => console.log(err));
        })
    </script>
@endsection
