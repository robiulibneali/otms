@extends('front.master')

@section('title', 'Log In')

@section('body')
        <div class="site-breadcrumb">
            <div class="hero-shape-area">
                <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
                <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
                <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
                <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
            </div>
            <div class="container">
                <h2 class="breadcrumb-title">Sign In</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="active">Sign In</li>
                </ul>
            </div>
        </div>


        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
{{--                            <img src="{{ asset('/') }}front/assets/img/logo/logo.png" alt>--}}
                            <h3 class="text-black">OTMS</h3>
                            <p>sign in to your OTMS account</p>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your Password">
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember_me" type="checkbox" value id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="login-btn"><i class="far fa-sign-in"></i> Sign In</button>
                            </div>
                        </form>
                        <div class="other-login-signup my-4">
                            <div class="or-login-signup text-center">
                                <strong>Or Sign In With</strong>
                            </div>
                        </div>
                        <div class="social-login">
                            <a href="#" class="btn-f"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="#" class="btn-g"><i class="fab fa-google"></i> Google</a>
                            <a href="#" class="btn-t"><i class="fab fa-twitter"></i> Twitter</a>
                        </div>
                        <div class="login-footer">
                            <p>Don't have an account? <a href="{{ route('register') }}">Sign Up.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
