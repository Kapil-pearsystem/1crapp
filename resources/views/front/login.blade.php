@include('front.layouts.header_new')

<style>
.login-form.flu_lnth .medls_araeass .login-form-inner .forms_reass input.lg_frms {width:100%;}
.iti--separate-dial-code .iti__selected-flag {color: #0e3992; font-size: 14px;}
.iti__country {color: #333; font-size: 12px;}

@media screen and (max-width: 800px) {
    .login-form.flu_lnth .medls_araeass {padding: 30px 20px; width: 100% !important; margin: 0 0 20px;}
	.login-form.flu_lnth .medls_araeass .login-form-inner h3 {font-size: 23px;}
	.top_hedderrss .rt_contentss {line-height: 30px;}
	.top_hedderrss .rt_contentss span.titlsss {font-size:15px; margin-right:0;  display: block;}
	.onboarding.flu_lnth .slide-content {height: 100%;}
	.top_hedderrss .rt_contentss a {padding: 0px 20px; line-height: 33px; font-size: 12px;}
	.iti__country-list {white-space: normal; width: 100%; max-width: 290px; min-width: 290px;}
	.login-container .login-form .login-form-group.with_both.lft_rigt .snd_cd {padding: 12px 5px; font-size: 11px;}	
}
</style>


<body class="bg_whit">
<div class="top_hedderrss">
 <div class="container">
  <div class="row">
   <div class="col-lg-1 col-xs-3"><div class="tp_lgin"><a href="{{ url('') }}"><img src="{{ url('') }}/img/logo_trnsp.png" alt="Logo" /></a></div></div>
   <div class="col-lg-11 col-xs-9">
    <div class="rt_contentss">
	 <span class="titlsss">Don't have 1CR APP Account Yet ?</span>  <a href="{{url('register')}}">Create an Account Now</a>
	</div>
   </div>
  </div>
 </div>
</div>


    <!--PEN HEADER-->
    <div class="container-fluid px-0 pdding_0">
        <div class="login-container">
            <div class="onboarding flu_lnth col-md-6 text-center">
                <div class="slide-content">
                    <div class="medilss_areaaa">
                        <div class="lgo_areaa"><a href="{{ url('') }}"><img width="100" src="{{ url('') }}/img/lg_logo.png" alt="Logo" /></a></div>
                        <h2 class="txt_hdns">Property Analysis, Simplified</h2>
                        <embed src="{{ url('') }}/img/big_buck_bunny_720p_1mb.mp4" />
                        <p class="py-4 btnmss_tx">Ofter on the road? download our mobile <span>app to analyze investment
                                properties anywhere</span></p>
                        <div class="socila_mds"><img src="{{ url('') }}/img/sign_up.png" alt="" /></div>
                    </div>
                </div>
            </div>


            <div class="login-form flu_lnth col-md-6 justify-content-center d-flex">
                <div class="medls_araeass">
                    <div class="login-form-inner">
                        <h3>Login & Explore 1CR APP</h3>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('fail'))
                        <div class="alert alert-danger">
                            {!! session('fail') !!}
                        </div>
                        @endif
                        <form action="{{route('login')}}" method="post" onsubmit="return validateb11()" name="f4"
                            id="myForm" autocomplete="off">
                            @csrf
                            <div class="forms_reass">
                                <div class="login-form-group" id="ico_managess">
								    <i class="fa fa-envelope"></i>
                                    <input type="text" placeholder="User Name/ ID Or Email" class="lg_frms"
                                        name="email" value="{{ old('email') }}"/>
                                    <span id="email" class="err" style="color:red"></span>
                                    @error('email')
                                        <span id="email" class="err" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="login-form-group" id="ico_managess">
								     <i class="fa fa-lock"></i>
                                    <input autocomplete="off" type="password" placeholder="Password" class="lg_frms"
                                        id="pwd" name="password"  value="{{ old('password') }}"/>
                                    <!--<i class="bi bi-eye-slash" id="togglePassword"></i>-->
                                    <span id="password" class="err" style="color:red"></span>
                                    @error('password')
                                        <span id="email" class="err" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="login-form-group single-row mb-1">
                                    <div class="custom-check"><input autocomplete="off" type="checkbox" checked=""
                                            id="remember" /><label for="remember">Remember me</label></div>

                                    <a href="{{url('forgot-password')}}" class="link forgot-link">Forgot Password ?</a>
                                </div>

                                <div class="lgoss"><button type="submit" value="Login Now" class="lgo_singup">Login Now
                                        !</button></div>


                                <div class="lgoss_1">
                                    <span class="mgssd"><img src="{{ url('') }}/img/without.PNG" alt="" /></span>
                                    <a href="{{url('login-without-password')}}" class="lgo_psdsss">Login without
                                        password</a>
                                    <span class="quess" tooltip="Hi" flow="down"><i
                                            class="fa fa-question-circle-o"></i></span>
                                </div>
                                <div class="lgo_with">
                                    <div class="or_width"><span class="orss">Or</span></div>
                                    <div class="soclls_ico">
                                        <h6>Login Using</h6>
                                        <a href="{{ env('GOOGLE_LOGIN_PATH') }}" class="glgllo"><img class="gloool"
                                                src="{{ url('') }}/img/goolge_sm.png" alt="" />Google</a>
                                        <a href="{{ url('auth/facebook') }}" class="fblgoo"><img class="fboo"
                                                src="{{ url('') }}/img/face_bks.png" alt="" />Facebook</a>
                                    </div>
                                    <p class="clr">By signing up, you agree to our<a href="javascript:void(0);"> Terms of Use</a> and <a href="javascript:void(0);">Privacy Policy</a>.
                                        <span class="lgonowws">You dont have an account yet? <a href="{{ url('register') }}">Register now</a></span>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script type="text/javascript">
    function validateb11() {
        var email = document.f4.email.value;
        var password = document.f4.password.value;
        // var emailRegx =
        //     /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var status = true;
        $('.err').html('');
        if (email == "") {
            document.getElementById("email").innerHTML = " Please enter email";
            status = false;
        } 
        // else if (emailRegx.test(String(email).toLowerCase()) == false) {
        //     document.getElementById("email").innerHTML = "Please enter valid email address";
        //     status = false;
        // }
        if (password == "") {
            document.getElementById("password").innerHTML = " Please enter password";
            status = false;
        }
        return status;
    }
    
    // password show hide functionality
    // window.addEventListener("DOMContentLoaded", function () {
    //   const togglePassword = document.querySelector("#togglePassword");
    
    //   togglePassword.addEventListener("click", function (e) {
    //     // toggle the type attribute
    //     const type =
    //       password.getAttribute("type") === "password" ? "text" : "password";
    //     password.setAttribute("type", type);
    //     // toggle the eye / eye slash icon
    //     this.classList.toggle("bi-eye");
    //   });
    // });
    </script>
    </div>
    @include('front.layouts.footer_new')