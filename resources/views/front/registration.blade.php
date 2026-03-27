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
	.login-container .login-form .login-form-group.with_both.lft_rigt .snd_cd {padding: 12px 5px; font-size:11px;}
	.onboarding.flu_lnth .slide-content .cnts_fildsss {max-width: 325px; width: 100%;}
	.login-container.regisstr {padding: 0px 0 20px;}
	.iti__country-list {white-space: normal; width: 100%; max-width: 290px; min-width: 290px;}
}
</style>
@php
    $referral = request()->get('referral_code');
@endphp
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
<div class="login-container regisstr">
  <div class="onboarding flu_lnth col-md-6 text-center">
          <div class="slide-content">
		  <div class="medilss_areaaa">
            <div class="lgo_areaa"><a href="{{ url('') }}"><img width="100" src="{{ url('home/img/lg_logo.png')}}" alt="Logo" /></a></div>
             <h2 class="txt_hdns">Property Analysis, Simplified</h2>
			 <embed src="{{ url('') }}/img/big_buck_bunny_720p_1mb.mp4" />
             <div class="cnts_fildsss">
              <p><img src="{{ url('home/img/graph.png')}}" alt="" /> Analyze any investment property in seconds</p>
              <p><img src="{{ url('home/img/cals.png')}}" alt="" /> Calculate cash flow, profit, cap rates, ROI and dozens of other metrics</p>
              <p><img src="{{ url('home/img/price.png')}}" alt="" /> Look up recent sales and rental comps</p>
              <p><img src="{{ url('home/img/serc.png')}}" alt="" /> Compare properties and find the best real estate deals</p>
			 </div>
            </div>
          </div>
  </div>
        <div class="login-form flu_lnth frm_right_pertss col-md-6 justify-content-center d-flex">
		   <div class="medls_araeass">
            <div class="login-form-inner registers">
                <h3>Register Now. It's Free!</h3>
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
				<form action="{{ route('save-register') }}" method="post">
					@csrf
				 <div class="forms_reass">
                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Enter Name" class="lg_frms" name="name" id="name" value="{{ old('name') }}"  />
					@error('name')
                        <small class="text-danger err2">{{ $message }}</small>
					@enderror
                    <small class="text-danger err" id="nameError"></small>
				</div>

                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="Enter Email" class="lg_frms" name="email" id="email" value="{{ old('email') }}"  />
					@error('email')
						<small class="text-danger err2"> {!! $message !!}</small>
					@enderror
                    <small class="text-danger err" id="emailError"></small>
				</div>

                  <div class="login-form-group" id="ico_managess">
				    <!-- <i class="fa fa-mobile"></i> -->
                    <input id="mobile" type="text" placeholder="Enter Mobile Number" class="lg_frms" name="mobile" minlength="6" maxlength="10" value="{{ old('mobile') }}"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
					@error('mobile')
						<<small class="text-danger err2">{{ $message }}</small>
					@enderror
                    <small class="text-danger err" id="mobileError"></small>
				</div>

                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-lock"></i>
                    <input autocomplete="off" type="password" placeholder="Password" class="lg_frms"  value="{{ old('password') }}"  name="password" id="password" />
                    @error('mobile')
						<<small class="text-danger err2">{{ $message }}</small>
					@enderror
                    <small class="text-danger err" id="passwordError"></small>
                </div>

				  <div class="login-form-group with_both" id="ico_managess">
				    <i class="fa fa-user-plus" ></i>
                    <input autocomplete="off" type="text" placeholder="Referral Code/ Affiliate Link" class="lg_frms" value="{{ old('referral_code') ?? $referral }}" name="referral_code" id="pwd" />
					<span class="quess" tooltip="Hi" flow="down"><i class="fa fa-question-circle"></i></span>
                  </div>

				  <div class="login-form-group with_both lft_rigt" id="ico_managess">
				    <div class="snd_cd" id="sendCode" style="cursor:pointer;">Send Code</div>
					<div class="inp_typess">
				     <input type="text" placeholder="Enter the safe code" class="lg_frms" id="pwd"  value="{{ old('security_code') }}"  name="security_code" />
					 <span class="quess" tooltip="Hi" flow="down"><i class="fa fa-question-circle"></i></span>
					</div>
                    @error('security_code')
						<<small class="text-danger">{{ $message }}</small>
					@enderror
                    <small class="float-right text-danger" id="ErrorMessage"> </small>
                    <small class="float-right text-success" id="SuccessMessage"> </small>
                    <small class="float-right text-success" id="CodeMessage1"> </small>
                  </div>


				  <div class="lgoss">
				   <button type="submit" value="Register me now" class="lgo_singup">Register me now!</button>
				  </div>


				  <!---<div class="lgoss_1">
				   <span class="mgssd"><img src="{{ url('home/img/without.PNG')}}" alt="" /></span>
				   <a href="#" class="lgo_psdsss">Register now wothout password</a>
				   <span class="quess" tooltip="Hi" flow="down"><i class="fa fa-question-circle"></i></span>
				  </div>--->

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
 @include('front.layouts.footer_new')
 <script>
    $(document).ready(function() {
        $('#sendCode').on('click', function() {
            var status = validate();
            if(status == 1){
            // Data to send
			let email = $('#email').val();
            const data = {
                email: email,
                source: 'Register'
            };
            if(email != ''){
                $('#SuccessMessage').text('');
            // AJAX request
            $.ajax({
                url: '{{ route('email-verification') }}',  // Laravel route helper to get the URL
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    if(response.status == true){
                        $('#SuccessMessage').html('A verification code has been sent to '+email+'. Please enter the code above to complete the verification process.');
                        $('#sendCode').text('Resend Code');
                        $('#ErrorMessage').text('')
                    }else{
                        $('#ErrorMessage').html(response.message)
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
        }
        });
    });
    function validate(){
        let name = $('#name').val();
        let email = $('#email').val();
        let mobile = $('#mobile').val();
        let password = $('#password').val();
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var status = 1;
        $('.err').html('');
        $('.err2').html('');
        if(name == ''){
            $('#nameError').text('Please enter your name');
            status = 0;
        }
        if(email == ''){
            $('#emailError').text('Please enter your email');
            status = 0;
        }else if (!emailRegex.test(email)) {
            $('#emailError').text('Please enter a valid email address');
            status = 0;
        }
        if(mobile == ''){
            $('#mobileError').text('Please enter your mobile');
            status = 0;
        }else if (isNaN(mobile)) {
            $('#mobileError').text('Mobile number should be numeric');
            status = 0;
        }
        if(password == ''){
            $('#passwordError').text('Please enter your password');
            status = 0;
        }
        return status;

    }
    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    var input = document.querySelector("#mobile");
    var iti = window.intlTelInput(input, {
        separateDialCode: true, // Shows the country code separately
        initialCountry: "in", // Automatically detects the user's country
        geoIpLookup: function(callback) {
            fetch('https://ipinfo.io/json', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .then((resp) => {
                    var countryCode = (resp && resp.country) ? resp.country : "in"; // Default to India ("in")
                    callback(countryCode.toLowerCase());
                })
                .catch(() => callback("in")); // Fallback to India ("in") if GeoIP fails
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Get full number on form submission
    $('form').submit(function() {
        var fullNumber = iti.getNumber();
        $('#mobile').val(fullNumber); // Replace field value with the full number
    });
</script>