
@extends('front.master')
@section('title','ecommerce')

@section('content')

<!-- breadcrumb-section start -->

<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">login</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Log in to your account </li>
                </ol>
            </div>
        </div>
    </div>
</nav>
@if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
    @endif
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="my-account pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25"> Log in to your account</h3>
                <form class="log-in-form" method="post" action="{{route('front.loginsave')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="staticEmail" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-6">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" class="form-control" id="inputPassword" name="password">
                                <div class="input-group-prepend">
                                    <button type="button"
                                        class="input-group-text  theme-btn--dark1 btn--md show-password">show</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                  <strong >Login With Google</strong>
                                </a> 
                                <br>
                                {{-- Login with Facebook --}}
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('login/facebook') }}"
                    style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Facebook
                </a>
                <br>
            </div>
                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                
                                <div class="sign-btn">
                                   <input type="submit" name="" value="Sign in" class="btn btn-dark">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="POST" action="{{ url('/reset_password_without_token') }}">
                    <a href="#" class="for-get">Forgot your password?</a>
                </form>

                    <div class="form-group row text-center mb-0">
                        <div class="col-12">
                            <div class="border-top">
                                <a href="{{url('user/register')}}" class="no-account">No account? Create one here</a>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->


 @endsection                       