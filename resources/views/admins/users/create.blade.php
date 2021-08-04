@extends('admins.layouts.master')
@section('title','User')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-title" style="background-color:rgb(31, 49, 153);">
                    <div class=" mt-4  pl-4"><h3  style="color: white; font-weight:bold">User Create Form</h3>
                    {{-- <h5 style="color: white;">Please fill out the form</h5> --}}
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/user') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4  text-md-right"><img src="\images\user (1).png" alt=""></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Enter user name" class="form-control border border-primary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4  text-md-right"><img src="\images\email.png" alt=""></label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Enter user email" type="email" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4  text-md-right"><img src="\images\padlock.png" alt=""></label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Enter user password" type="password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4  text-md-right"><img src="\images\download (1).png" alt="" style="height: 32px; width: 32px;"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm user password" type="password" class="form-control border border-primary" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn" style="background-color:rgb(31, 49, 153); color: white;">
                                 Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="form-group row mt-3">
                        <div class="col-md-6 offset-md-4">
                    Already have an account? <a class="btn btn-link" href="{{ route('login') }}">Sign in
                    </a>
                    </div>
                </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
