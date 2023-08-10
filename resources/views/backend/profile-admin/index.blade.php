@extends('backend.templates.index')

@section('breadcrumb')
    {{-- Breadcrumbs --}}
    <nav class="cubex-breadcrumb">
        <ul class="cubex-breadcrumb-content">
            <li class="cubex-breadcrumbs-item">Home</li>
            <li>/</li>
            <li class="cubex-breadcrumbs-item cubex-breadcrumbs-active"><a href="javascript:void(0)"
                    class="cubex-breadcrumbs-active">Profile</a>
            </li>
        </ul>
    </nav>
        <div class="cubex-box-wrapper cubex-bg-primary cubex-text-primary" style="">
            <h1 class="cubex-card-title">
                Profile Admin
            </h1>
            </p>
        </div>

@endsection
@section('main-content')
<div class="row" id="form-create-certificate" style="margin-bottom: 37px">
    <div class="col-md-12">
        <div class="card cubex-card cubex-text-secondary">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="mt-3" id="form-domainreg" action="{{ route('update.profile') }}" method="POST">
                    @csrf
                    {{--  <div class="row" style="border-bottom:1px solid grey;margin-bottom:20px">
                        <div class="col-md-12">
                            <b style="font-size:16px">Personal Info</b>
                        </div>
                    </div>  --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-3" for="Code">Name</label>
                                <div class="col-9">
                                    <input type="text" name="name" id="name"
                                        class="form-control input-sm"
                                        @if (!empty($user)) value="{{ $user->name }}" @endif>
                                    @error('code')
                                        <span class="text-danger class-error">
                                            {{ $errors->first('code') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-3" for="Code">Username</label>
                                <div class="col-9">
                                    <input type="text" name="username" id="username"
                                        class="form-control input-sm"
                                        @if (!empty($user)) value="{{ $user->username }}" @endif>
                                    @error('code')
                                        <span class="text-danger class-error">
                                            {{ $errors->first('code') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-3" for="Code">Password</label>
                                <div class="col-9">
                                    <input type="password" name="password" id="password"
                                        class="form-control input-sm" placeholder="******"
                                        @if (!empty($certificate)) value="{{ $certificate->code }}" @endif>
                                    @error('code')
                                        <span class="text-danger class-error">
                                            {{ $errors->first('code') }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-sm cubex-button-login">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
