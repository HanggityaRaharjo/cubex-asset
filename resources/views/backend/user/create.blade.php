@extends('backend.templates.index')

@section('breadcrumb')
    <nav class="cubex-breadcrumb">

    </nav>
@endsection


@section('main-content')
    <div class="cubex-card mb-5">

        <form action="{{ url('/user') }}" method="post">
            @csrf
            <div class="row">
                {{-- Name --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Name</label>
                        <input type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="name . . ." name="name">
                    </div>
                </div>
                {{-- End  Name --}}
                {{-- Email --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Email</label>
                        <input type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Email . . ." name="email">
                    </div>
                </div>
                {{-- End  Email --}}
                {{-- Password --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Password</label>
                        <input type="password" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Password . . ." name="password">
                    </div>
                </div>
                {{-- End  Password --}}
                {{-- Position --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Position</label>
                        <input type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Position . . ." name="position">
                    </div>
                </div>
                {{-- End  Position --}}
                {{-- Gender --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Gender</label>
                        <select type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Gender . . ." name="gender">
                            <option value="1">Laki Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                {{-- End  Gender --}}
                {{-- Company --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Company</label>
                        <input type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Company . . ." name="company_id">
                    </div>
                </div>
                {{-- End  Company --}}
                {{-- Phone Number --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="cubex-label">Phone Number</label>
                        <input type="text" class="form-control cubex-input" id="exampleFormControlInput1"
                            placeholder="Phone Number . . ." name="phone">
                    </div>
                </div>
                {{-- End  Phone Number --}}


            </div>

            <div class="d-flex justify-content-end" style="gap: 30px">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-primary">Cancel</button>
            </div>

        </form>

    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $('#table-user').DataTable()
    </script>
@endsection
