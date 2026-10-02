@extends('auth.layouts.app')
@section('title', 'Forgot Password')
@section('content')
<style>
    .login-form-group {
        position: relative;
    }
    .login-form-group i {
        position: absolute;
        top: 15px;
        left: 15px;
        color: #999;
    }
    .lg_frms {
        height: 48px;
        border-radius: 30px;
        padding-left: 40px;
    }
</style>
<div class="row justify-content-center w-100">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <img src="https://kapil.1crapp.com/admin/profile/profile-14717340671780122575.png" alt="" height="100px" width="100px" class="mx-auto d-block   " />
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Without Password!</h1>
                            </div>
                            {{-- Alert Messages --}}
                            @if (session('error'))
                            <span class="text-danger"> {!! session('error') !!}</span>
                            @endif
                            @if (session('status'))
                            <span class="text-success"> {!! session('status') !!}</span>
                            @endif
                            @if (session('success'))
                            <span class="text-success"> {!! session('success') !!}</span>
                            @endif
                            <form method="POST" action="{{ route('login-by-otp') }}" id="otpLoginForm">
                                @csrf
                                <input type="hidden" name="sb_dom" value="{{ request()->getHost() }}">
                                <div class="login-form-group mb-3">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email"
                                        class="form-control lg_frms"
                                        name="email"
                                        id="email"
                                        placeholder="Enter Email Address"
                                        required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <button type="button"
                                            class="btn btn-dark btn-block"
                                            id="sendOtpBtn">
                                            Send OTP
                                        </button>
                                    </div>
                                    <div class="col-8">
                                        <input type="text"
                                            class="form-control lg_frms"
                                            name="otp"
                                            id="otp"
                                            placeholder="Enter OTP" required>
                                    </div>
                                </div>
                                <div id="otpMessage" class="mb-3"></div>
                                <div id="otpTimer" class="text-danger small mt-2"></div>
                                <button type="submit" class="btn btn-primary btn-block lgo_singup">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already know your password? Login Here</a>
                            </div>
                        </div>
                    </div>
                </div>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sendOtpBtn').click(function() {
            let email = $('#email').val();
            if (email == '') {
                $('#otpMessage').html(
                    '<div class="alert alert-danger">Please enter email.</div>'
                );
                return;
            }
            $.ajax({
                url: "{{ route('send.password-otp') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email
                },
                beforeSend: function() {
                    $('#sendOtpBtn')
                        .prop('disabled', true)
                        .text('Sending...');
                },
                success: function(response) {
                    $('#otpMessage').html(
                        '<div class="alert alert-success">' +
                        response.message +
                        '</div>'
                    );
                    console.log(response.remaining);
                    startOtpTimer(response.remaining);
                },
                error: function(xhr) {
                    $('#sendOtpBtn')
                        .prop('disabled', false)
                        .text('Send OTP');
                    $('#otpMessage').html(
                        '<div class="alert alert-danger">' +
                        xhr.responseJSON.message +
                        '</div>'
                    );
                }
            });
        });
        function startOtpTimer(seconds) {
            $('#sendOtpBtn').prop('disabled', true).text('OTP Sent');
            let timer = seconds;
            let interval = setInterval(function() {
                let minutes = Math.floor(timer / 60);
                let secs = timer % 60;
                $('#otpTimer').html(
                    'Resend OTP in ' +
                    minutes + ':' +
                    (secs < 10 ? '0' : '') + secs
                );
                timer--;
                if (timer < 0) {
                    clearInterval(interval);
                    $('#sendOtpBtn')
                        .prop('disabled', false)
                        .text('Resend OTP');
                    $('#otpTimer').html('');
                }
            }, 1000);
        }
    });
</script>
@endsection