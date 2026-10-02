@extends('auth.layouts.app')
@section('title', 'Login')
@section('content')
<style>
    .min-vh-100 {
        min-height: 100vh;
    }
    .login-card {
        border-radius: 15px;
    }
    .login-form-group {
        position: relative;
        margin-bottom: 20px;
    }
    .login-form-group i {
        position: absolute;
        top: 15px;
        left: 15px;
        color: #777;
    }
    .lg_frms {
        width: 100%;
        height: 50px;
        padding-left: 45px;
        border: 1px solid #ddd;
        border-radius: 30px;
        outline: none;
    }
    .lg_frms:focus {
        border-color: #4e73df;
        box-shadow: 0 0 5px rgba(78, 115, 223, 0.3);
    }
    .lgo_singup {
        height: 50px;
        border-radius: 30px;
        font-weight: 600;
    }
    body {
        background: linear-gradient(135deg, #4e73df, #224abe);
    }
    .lgoss_1 {
        display: block;
        margin: 0px 0 20px;
        background: #fff;
        padding: 10px;
        border-radius: 5px;
        border: #333 solid 1px;
        position: relative;
        text-align: center;
    }
    .btn{
        background-color: #0e3992;
    }
    .or-divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
    }

    .or-divider hr {
        flex: 1;
        border: 0;
        border-top: 1px solid #ddd;
        margin: 0;
    }

    .or-divider span {
        padding: 0 15px;
        font-size: 14px;
        color: #666;
        font-weight: 600;
        background: #fff;
    }
</style>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100 mt-2">
        <div class="col-lg-6 col-md-6 col-sm-10">
            <div class="card shadow border-0 login-card">
                <div class="card-body p-3">
                    <img src="https://kapil.1crapp.com/admin/profile/profile-14717340671780122575.png" alt="" height="100px" width="100px" class="mx-auto d-block   "/>
                    <div class="text-center mb-4">
                        <h4 class="text-dark font-weight-bold"> Welcome To 1CRApp Admin Panel</h4>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif
                    <form class="form" action="{{ route('login') }}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="sb_dom" value="{{ request()->getHost() }}">
                        <div class="login-form-group p-1">
                            <label>Login ID</label>
                            <input type="email" name="email" class="lg_frms form-control" placeholder="User Name / Email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-danger small">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="login-form-group p-1">
                            <label >Password</label>
                            <input type="password" name="password" class="lg_frms form-control" placeholder="Password" required>
                            @error('password')
                            <span class="text-danger small">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 p-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                <label class="custom-control-label" for="remember">
                                    Keep Me Logged in
                                </label>
                            </div>
                            <a href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block lgo_singup">
                            Login Now !
                        </button>
                    </form>
                    <a href="{{ route('login-without-password') }}"><button type="button" class="btn btn-outline-primary btn-block mt-4"><img src="https://1crapp.com/img/without.PNG" alt="" height="25px" style="float:left;"/> Login without password</button></a>
                    
                    <br>
                    <br>
                    <span class="text-center mx-auto d-block">───────────────── OR ─────────────────</span>
                    <span class="text-center mx-auto d-block">Login Using</span>
                    <div class="soclls_ico d-flex mt-2">
                        <button type="button" class="btn btn-outline-primary w-50 mr-2 alert-msg">
                            <img src="https://1crapp.com/img/goolge_sm.png" alt="" height="20">
                            &ensp; Google
                        </button>

                        <button type="button" class="btn btn-primary w-50 ml-2 alert-msg">
                            <img src="https://1crapp.com/img/face_bks.png" alt="" height="20">
                            &ensp; Facebook
                        </button>
                    </div>
                    
                    <p class="clr text-center mt-4">By signing up, you agree to our<a href="javascript:void(0);"> Terms of Use</a> and <a href="javascript:void(0);">Privacy Policy</a>.
                        <span class="lgonowws">You dont have an account yet? <a href="{{ url('register') }}">Register now</a></span>
                    </p>
                </div>
            </div>
            <div class="text-center mt-4 text-white">
                <small>
                    @1CRAPP || Designed & Developed By </br>
                    <a class="text-white" href="tel:8295500152">
                        Digitalramjee +91 8295500152
                    </a>
                </small>
            </div><br>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function () {
    $('.alert-msg').on('click', function () {
        alert('Currently This feature is not working.');
    });
});
</script>
@endsection