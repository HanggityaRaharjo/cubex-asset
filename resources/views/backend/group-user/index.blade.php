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

        <table class="w-100" id="" style="color: #A8B6BA;border:none">
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
        ini group user





    </div>

    {{-- End Box --}}
@endsection
