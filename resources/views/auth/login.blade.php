@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-title" style="background-color:rgb(31, 49, 153);">
                    <div class=" mt-4 pl-4"><h3  style="color: white; font-weight:bold">Welcome!</h3>
                   <h5 style="color: white;"> Sign up or log in to continue</h5></div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><img src="\images\email.png" alt=""></label>

                            <div class="col-md-6">
                                <input id="email" type="email"  placeholder="Enter your email address" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><img src="\images\padlock.png" alt=""></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Enter your password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> -->
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn" style="background-color:rgb(31, 49, 153); color: white;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <!-- {{ __('Forgot Your Password?') }} -->
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                   
                
                    
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-link mt-4" href="{{ route('register') }}">
                        Create an account
                </a></div>
                    <div class="form-group mt-3">
                        <h6 class="mt-3">Or login with </h6>
                    </div>
                    <div class="form-group mt-3 pr-1" >
                        
                          <a href="{{url('/redirect')}}" class="btn btn"  >
                          <img src="\images\facebook (1).png" alt="">
                         </a>
                       
                    </div>

                     <div class="form-group mt-3">
                    
                          <a href="{{ url('/google') }}" class="btn btn" >
                          <img src="\images\download.png" alt="" style="width:32px; height: 32px;" class="rounded">
                         </a>
                        
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
