@include('front.layouts.header_new')

<style>
@media screen and (max-width: 800px) {
    .login-form.flu_lnth .medls_araeass {padding: 30px 20px; width: 100% !important; margin: 0 0 20px;}
	.login-form.flu_lnth .medls_araeass .login-form-inner h3 {font-size: 23px;}
	.top_hedderrss .rt_contentss {line-height: 30px;}
	.top_hedderrss .rt_contentss span.titlsss {font-size:15px; margin-right:0;  display: block;}
	.onboarding.flu_lnth .slide-content {height: 100%;}
	.top_hedderrss .rt_contentss a {padding: 0px 20px; line-height: 33px; font-size: 12px;}
	.login-container .login-form .login-form-group.with_both.lft_rigt .snd_cd {padding: 12px 7px;}
	.onboarding.flu_lnth .slide-content .cnts_fildsss {max-width: 325px; width: 100%;}
	.login-container.regisstr {padding: 0px 0 20px;}
}
</style>

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
				<form action="#">
				 <div class="forms_reass">
                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Enter Name" class="lg_frms" id="name" required="" />
                  </div>

                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-envelope"></i>
                    <input type="text" placeholder="Enter Email" class="lg_frms" id="email" required="" />
                  </div>

                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-mobile"></i>
                    <input type="text" placeholder="Enter Mobile Number" class="lg_frms" id="email" required="" />
                  </div>
				  
                  <div class="login-form-group" id="ico_managess">
				    <i class="fa fa-lock"></i>
                    <input autocomplete="off" type="text" placeholder="Password" class="lg_frms" id="pwd" />
                  </div>
				  
				  <div class="login-form-group with_both" id="ico_managess">
				    <i class="fa fa-user-plus" ></i>
                    <input autocomplete="off" type="text" placeholder="Referral Code/ Affiliate Link" class="lg_frms" id="pwd" />
					<span class="quess" tooltip="Hi" flow="down"><i class="fa fa-question-circle"></i></span>
                  </div>

				  <div class="login-form-group with_both lft_rigt" id="ico_managess">
				    <div class="snd_cd">Send Code</div>
					<div class="inp_typess">
				     <input type="text" placeholder="Enter the safe code" class="lg_frms" id="pwd" />
					 <span class="quess" tooltip="Hi" flow="down"><i class="fa fa-question-circle"></i></span>
					</div>
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
				    <a href="javascript:void(0);" class="glgllo"><img class="gloool" src="{{ url('home/img/goolge_sm.png')}}" alt="" />Google</a>
                    <a href="javascript:void(0);" class="fblgoo"><img class="fboo" src="{{ url('home/img/face_bks.png')}}" alt="" />Facebook</a>				
				   </div>
                   <p class="clr">By signingup, you agree to our <a href="javascript:void(0);">terms of use</a> and <a href="javascript:void(0);">privacy policy</a>
				   <span class="lgonowws">Already have an Account <a href="{{ url('login') }}">Login Now</a></span>
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