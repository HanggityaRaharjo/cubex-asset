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
        <div class="d-flex align-items-center justify-content-end cubex-text-secondary" style="margin-bottom: 17px">
            <a href="{{ url('/user/create') }}" class="btn btn-primary">
                Add Data
            </a>
        </div>

        <table class="w-100" id="table-user" style="color: #A8B6BA;border:none">
            <thead class="text-center">
                <tr style="background: #3a4042">
                    <th style="border: none" width='5%'>No</th>
                    <th style="border: none">First Name</th>
                    <th style="border: none">Position</th>
                    <th style="border: none">Gender</th>
                    <th style="border: none">Perusahaan</th>
                    <th style="border: none"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $user->first_name }}</td>
                        <td class="text-center">{{ $user->position }}</td>
                        <td class="text-center">{{ $user->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td class="text-center">{{ $user->company_id == '' ? 'Tidak Ada' : 'Ada' }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center" style="gap: 10px">
                                <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $('#table-user').DataTable()
    </script>
@endsection
