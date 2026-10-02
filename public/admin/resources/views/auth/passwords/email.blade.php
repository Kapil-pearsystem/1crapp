@extends('auth.layouts.app')
@section('title', 'Forgot Password')
@section('content')
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
                                <h1 class="h4 text-gray-900 mb-4">Reset Password!</h1>
                            </div>
                            {{-- Alert Messages --}}
                            @include('common.alert')
                            @if (session('error'))
                            <span class="text-danger"> {{ session('error') }}</span>
                            @endif
                            @if (session('status'))
                            <span class="text-success"> {{ session('status') }}</span>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--<a href="{{ route('recover-password') }}" >-->
                                <!--    <button type="button" class="btn btn-primary btn-user btn-block">-->
                                <!--        {{ __('Rrecover Your Password') }}-->
                                <!--    </button>-->
                                <!--</a><br>-->
                                <button class="btn btn-primary btn-user btn-block">
                                    {{ __('Send Password') }}
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
@endsection