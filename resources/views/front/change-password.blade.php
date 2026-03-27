@include('front.layouts.header_new')

<style>
@media screen and (max-width: 800px) {
    .login-form.flu_lnth .medls_araeass {padding: 30px 20px; width: 100% !important; margin: 0 0 20px;}
	.login-form.flu_lnth .medls_araeass .login-form-inner h3 {font-size: 23px;}
	.top_hedderrss .rt_contentss {line-height: 30px;}
	.top_hedderrss .rt_contentss span.titlsss {font-size:15px; margin-right:0;  display: block;}
	.onboarding.flu_lnth .slide-content {height: 100%;}
	.top_hedderrss .rt_contentss a {padding: 0px 20px; line-height: 33px; font-size: 12px;}
	.login-container .login-form .login-form-group.with_both.lft_rigt .snd_cd {padding: 12px 7px; font-size: 11px;}
	.onboarding.flu_lnth .slide-content .cnts_fildsss {max-width: 325px; width: 100%;}
	.login-container.regisstr {padding: 0px 0 20px;}
	.login-form-group.with_both#ico_managess span.quess:after {margin: 0 0 0 -95px;}
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
    <div class="container-fluid px-0">
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
                    <div class="login-form-inner pageform_t" id="edit">
                        <h3>Change Password</h3>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                        @endif
                        <form action="{{ route('update_password') }}" method="post" onsubmit="return validatebUpdate()"
                            name="f4" id="myForm">
                            @csrf
                            <input type="hidden" name="user_token" value="{{ $token }}"/>
                            <div class="forms_reass">
								<div class="login-form-group" id="ico_managess">
								    <i class="fa fa-key"></i>
                                    <input type="password" placeholder="Enter New Password" class="lg_frms" id="new_password" name="new_password" />
                                    <span id="new_passwordError" class="err" style="color:red"></span>
                                </div>
								<div class="login-form-group" id="ico_managess">
								    <i class="fa fa-key"></i>
                                    <input type="password" placeholder="Enter Confirm Password" class="lg_frms" id="confirm_password" name="confirm_password" />
                                    <span id="confirm_passwordError" class="err" style="color:red"></span>
                                </div>
								<div class="login-form-group" id="ico_managess">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="show_check">
                                    <label class="form-check-label text-dark ml-4" for="show_check" id="showHide">Show</label>
                                </div>
                                </div>
                                <div class="lgoss"><button type="submit" value="Next" class="lgo_singup" >Update Your Password</button>
                                </div>
                                @if(session('error'))
                                    <small class="float-right text-danger"> {{ session('error') }} </small>
                                @endif
                            </div>
                        </form>
                    </div>
				  
				</div>
            </div>

        </div>
    </div>
    <!-- partial -->


	
    <script type="text/javascript">
    function validatebUpdate() {
        var new_password = document.f4.new_password.value;
        var confirm_password = document.f4.confirm_password.value;
        var status = true;
        $('.err').html('');
        if (new_password == "") {
            document.getElementById("new_passwordError").innerHTML = " Please enter new password";
            status = false;
        } 
        if (confirm_password == "") {
            document.getElementById("confirm_passwordError").innerHTML = " Please enter confirm password";
            status = false;
        } 
        if(status == true){
            if(new_password != confirm_password){
                document.getElementById("confirm_passwordError").innerHTML = " New Password and Confirm Password does not match.";
                status = false;
            }
        }
        return status;
    }
    </script>
    <script>
    // Select the checkbox and password fields
    const showCheck = document.getElementById('show_check');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    const showHideLabel = document.getElementById('showHide');
    // Toggle the type of the password fields
    showCheck.addEventListener('change', function() {
        const type = showCheck.checked ? 'text' : 'password';
        newPassword.type = type;
        confirmPassword.type = type;
        showHideLabel.textContent = showCheck.checked ? 'Hide' : 'Show';
    });
</script>
   
    </div>

    @include('front.layouts.footer_new')
   