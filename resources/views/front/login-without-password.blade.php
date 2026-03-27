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
	 <span class="titlsss">Already a User ?</span>  <a href="{{ url('login') }}">Login Now</a>
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
                        <embed src="{{ url('') }}/img/big_buck_bunny_720p_1mb.mp4">
                        <div class="cnts_fildsss">
                            <p><img src="{{ url('') }}/img/graph.png" alt="" /> Analyze any investment property in
                                seconds</p>
                            <p><img src="{{ url('') }}/img/cals.png" alt="" /> Calculate cash flow, profit, cap rates,
                                ROI and dozens of other metrics</p>
                            <p><img src="{{ url('') }}/img/price.png" alt="" /> Look up recent sales and rental comps
                            </p>
                            <p><img src="{{ url('') }}/img/serc.png" alt="" /> Compare properties and find the best real
                                estate deals</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-form flu_lnth col-md-6 justify-content-center d-flex">
                <div class="medls_araeass">
                    <div class="login-form-inner">
                    <div class="row" id="ErrorMessage2"></div>
                        <h3>Login Without Password</h3>
                        <form action="{{route('login_by_otp')}}" method="post"
                            onsubmit="return validatebForgot()" name="f4" id="myForm">
                            @csrf
                            <input type="hidden" value="" id="token_id" name="token" />
                            <div class="forms_reass">
                                <div class="login-form-group">
                                    <input type="text" placeholder="Email Address" class="lg_frms" name="email" id="email" />
                                    <span id="email" class="err" style="color:red"></span>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror 
                                </div>
								
								 <div class="login-form-group with_both lft_rigt" id="ico_managess">
									<div class="snd_cd" id="sendCode" style="cursor:pointer;">Send Code</div>
									<div class="inp_typess">
									 <input type="text" placeholder="Enter the safe code" class="lg_frms" id="pwd" name="safe_code"/>
									 <span class="quess dataadss" tooltip="Once you enter your registered email id, a safe code will be sent to that email, Please enter that code hare and login, that's it. easy peasy :)" flow="down"><i class="fa fa-question-circle"></i></span>
									</div>
                                    @error('safe_code')
                                        <<small class="text-danger">{{ $message }}</small>
                                    @enderror  
                                    <span class="float-right text-danger" id="ErrorMessage"> </span>
                                    <small class="float-right text-success" id="SuccessMessage"> </small>
								  </div>

                                

                                <div class="lgoss"><button type="submit" value="Next" class="lgo_singup">Login Now!</button>
								
								<p class="mr_txttx">A safe code will be send to the email address for you to login, Please Enter that safe code here and press login.</p>
								
                                </div>
                                <div class="lgo_with">
                                    <div class="or_width"><span class="orss">Or</span></div>
                                    <div class="soclls_ico">
                                        <h6>Register Using</h6>
                                        <a href="{{ url('auth/google') }}" class="glgllo"><img class="gloool" src="{{ url('home/img/goolge_sm.png')}}" alt="" />Google</a>
                                        <a href="{{ url('auth/facebook') }}" class="fblgoo"><img class="fboo" src="{{ url('home/img/face_bks.png')}}" alt="" />Facebook</a>				
                                    </div>
                                    <p class="clr">By signing up, you agree to our<a href="javascript:void(0);"> Terms of Use</a> and <a href="javascript:void(0);">Privacy Policy</a>.
                                        <span class="lgonowws">Already have an account? <a href="{{ url('login') }}">Login now</a></span>
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
    function validatebForgot() {
        var email = document.f4.email.value;
        var emailRegx =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var status = true;
        $('.err').html('');
        if (email == "") {
            document.getElementById("email").innerHTML = " Please enter email";
            status = false;
        } else if (emailRegx.test(String(email).toLowerCase()) == false) {
            document.getElementById("email").innerHTML = "Please enter valid email address";
            status = false;
        }
        return status;
    }
    </script>
    </div>

    @include('front.layouts.footer_new')
    <!-- <script>
    $(document).ready(function() {
        $('#sendCode').on('click', function() {
            // Data to send
			let email = $('#email').val();
            const data = {
                email: email,
                source: 'Login Without password'
            };
            if(email != ''){
                $('#CodeMessage').text('');
            // AJAX request
            $.ajax({
                url: '{{ route('send.code') }}',  // Laravel route helper to get the URL
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    // console.log('Success:', response);
                    $('#CodeMessage').text('A verification code has been sent to '+email+'. Please enter the code above to complete the verification process.');
                    // $('#CodeMessage1').text('Verification Code is: '+response.code);
                    $('#sendCode').text('Resend Code');
                    $('#token_id').val(response.token);
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('An error occurred.');
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  
                }
            });
        }
        });
    });
    </script> -->
      <script>
    $(document).ready(function() {
        $('#sendCode').on('click', function() {
            // Data to send
			let email = $('#email').val();
            const data = {
                email: email,
                source: 'Login Without password'
            };
            if(email != ''){
            // AJAX request
            $.ajax({
                url: '{{ route('send.code') }}',  // Laravel route helper to get the URL
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    // console.log('Success:', response);
                    if(response.status == true){
                        $('#SuccessMessage').html('An Verification code has been sent to '+email+', kindly enter the code above to verify safe code.');
                        $('#ErrorMessage').text('')
                        $('#ErrorMessage2').text('')
                        $('#sendCode').text('Resend Code');
                        $('#token_id').val(response.token);
                        // alert('Verification Code is: '+response.code);  // Show a success message or handle the response
                    }else{
                        $('#ErrorMessage2').html(`
                            <div class="card ml-2" style="border:2px dotted #0e3992; border-radius:10px; margin-top:-20px;">
                                <div class="card-body">
                                    <small class="float-right text-danger ml-2">${response.message}</small><br>
                                </div>
                            </div>
                        `);
                        $('#ErrorMessage').text('')
                        $('#SuccessMessage').text('')
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('An error occurred.');  // Show an error message
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Add CSRF token for security
                }
            });
        }
        });
    });
    </script>