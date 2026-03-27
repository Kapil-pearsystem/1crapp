@include('web.common.header')

<style>
.lnk_s_bntt a.bntss.blue_bg {
    padding: 8px 40px 8px 15px;
	position: relative;
}

.al_qusess_topup {
    position: relative;
}
.al_qusess_topup span.quess {
    position: absolute;
    right: 10px;
    font-size: 20px;
    margin: 0px 0 0;
}

.shr_linkss.al_qusess_topup button {
    padding: 10px 35px 10px 15px;
}

.vedioo .you_tb_arra {
    max-width: 500px;
    margin: 0 auto;
}
.vedioo p {
    font-size: 20px;
    margin-bottom: 30px;
}


.accordion_container {
    max-width: 721px;
    display: block;
    width: 100%;
    margin: 0 auto;
}
.accordion_container .al_sec_ctxt {
    margin-top: 10px;
}
.accordion_container .al_sec_ctxt h2 {
    margin: 0 0 30px;
    font-weight: 600;
    font-size: 32px;
}

.accordion_container .man_boxx {
    margin-bottom: 2px;
    border:#c9d6e7 solid 1px;
    padding: 10px;
    line-height: 30px;
}

.accordion_container .man_boxx .accordion_head {
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    display: inline-block;
    width: 100%;
    color: #252525;
    position: relative;
    padding-right: 25px;
}


.accordion_container .man_boxx .accordion_head.clr_tx {
    color: #05326b;
}
.accordion_container .man_boxx .accordion_head span.plusminus {
    float: right;
    font-size: 26px;
    color: #000;
    font-weight: 500;
    position: absolute;
    top: -1px;
    right: 0;
}
.accordion_container .man_boxx .accordion_head.clr_tx span.plusminus {
    color: #05326b;
}
.accordion_container .man_boxx .accordion_body {
    display: inline-block;
    width: 100%;
    margin-top: 0px;
}

.accordion_container .man_boxx .accordion_body .mt_datat p {
    font-size: 14px;
    margin-top: 10px;
    line-height: 22px;
    margin-bottom: 0;
}

.accordion_container .man_boxx .accordion_body .mt_datat ul li strong {
    font-weight: 600;
}
.accordion_container .man_boxx .accordion_body .mt_datat ul li {
    margin-top: 12px;
    font-size: 14px;
}

.frm_al_suprtsss {display: inline-block; width: 100%; background: #1c52990f; padding: 15px 20px;}
.frm_al_suprtsss .frm_titless {display: inline-block; width: 100%; margin-bottom: 10px;}
.frm_al_suprtsss .frm_titless h4 {margin: 0 0 6px; color: #1c5299; font-size: 18px; font-weight: 700;}
.frm_al_suprtsss .frm_titless p {font-size: 13px; margin: 0; color: #545454;}

.frm_al_suprtsss .form-group {margin: 0 0 12px;}
.frm_al_suprtsss .form-group:last-child {margin: 0;}
.frm_al_suprtsss .form-group input.form-control {font-size:13px; height:34px; padding:2px 10px 2px 25px;}
.frm_al_suprtsss .form-group textarea.form-control {font-size: 13px; padding:5px 10px 5px 25px;}
.frm_al_suprtsss .form-group select.slt_al_arra {font-size: 13px; height: 34px; background-color: #fff; background-image: none; border: 1px solid #ccc;
    border-radius: 4px; width: 100%; padding: 6px 6px; cursor: pointer; padding:2px 10px 2px 20px;}

.marges_ic {position: relative;}	
.marges_ic i {position: absolute; top: 10px; left: 8px; font-size: 13px;}

	
.frm_al_suprtsss .form-group button.btn-submit2 {background: #f94554; border: none; width: 100%; color: #fff; padding: 8px 0; font-weight: 600; font-size: 16px; border-radius: 4px;}

.frm_al_suprtsss .form-group button.btn-submit2 span {
    display: block;
    font-size: 13px;
    color: #ffeb89;
}


.frm_al_suprtsss.join_wth {
    max-width: 500px;
    margin: 0 auto;
    display: block;
    padding: 30px;
    border: #89a0bf solid 1px;
}
h4.jn_alls {
    text-align: center;
    font-size: 30px;
    margin: 0 0 15px;
    font-weight: 700;
}

.frm_al_suprtsss.join_wth .form-group input.form-control {
    font-size: 14px;
    height: 40px;
}

.frm_al_suprtsss.join_wth .form-group select.slt_al_arra{
    font-size: 14px;
    height: 40px;
}

.frm_al_suprtsss.join_wth .jn_btn_cntss {
    display: inline-block;
    width: 100%;
}
.frm_al_suprtsss.join_wth .jn_btn_cntss p {
    font-size: 14px;
    margin: 0;
}
.frm_al_suprtsss.join_wth .jn_btn_cntss p a {
    color: #3F51B5;
}

.vedioo.y_m_s_alms h5 {
    margin: 20px 0 15px;
    font-size: 20px;
    font-weight: 700;
}

#thk_affi p {
    font-size: 14px;
    margin: 0 auto;
    max-width: 250px;
    margin-top: 12px;
}
.lnk_s_bntt.al_qusess_topup.thk_y_affi {
    margin-top: 50px;
}
.lnk_s_bntt.al_qusess_topup.thk_y_affi h4 {
    margin-bottom: 25px;
}
.lnk_s_bntt.al_qusess_topup.thk_y_affi h4 span {
    display: block;
    margin-top: 7px;
}

.red_tx {
    color: #f94554 !important;
}
</style>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Thank You - Affiliates Enquiry</h4>
    <a href="{{ url('') }}">Home</a> &gt; <a href="{{ url('join-as-affiliate') }}">Affiliate</a> &gt; <span>Thank You</span>
   </div>
  </div>
</section> 





<!-- Video Elements -->
<section class="vedioo y_m_s_alms">
    <div class="container">
        <h4 class="mb-4"><span class="grenss_tx">You're Almost Done </span></h4>
		<h5>You're Almost Done - We have received you request</h5>
		<p>Check your email and click on the confirmation link that has been sent to you. You will <span class="red_tx"><u>NOT be able to receive</u></span> further instructions until you do this.</p>		
		
         <div class="you_tb_arra">
		  <iframe width="100%" height="350" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
	     </div>
    </div>
</section>
<!-- End Video Elements -->


<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12">
                <div class="binng_araes earn_area">
                    <div class="earn_bx">
                        <h4 class="mr_botm_25">Get Your Affiliate <span class="red_tx"><u>Referral Link</u></span></h4>

                        <div class="row">
                            <div class="col-lg-4">
							  <div id="thk_affi">
                                <div class="earn_bxx">
								    <img src="{{ url('home/img/tk_apply_m_b.png')}}" alt="" />
                                    <span class="cntss_araea">Apply</span>
                                </div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							  </div>
                            </div>
                            <div class="col-lg-4">
							  <div id="thk_affi">
                                <div class="earn_bxx">
								    <img src="{{ url('home/img/tk_email_m_b.png')}}" alt="" />
                                    <span class="cntss_araea">Conform E-mail</span>
                                </div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							  </div>	
                            </div>
                            <div class="col-lg-4">
							  <div id="thk_affi">
                                <div class="earn_bxx">
								    <img src="{{ url('home/img/tk_share_m_b.png')}}" alt="" />
                                    <span class="cntss_araea">Generate Sharing Link</span>
                                </div>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
							  </div>	
                            </div>
                        </div>
                        <div class="lnk_s_bntt al_qusess_topup thk_y_affi">
						    <h4>If you don't have a 1CR APP account already, <span>sing up your <u>free account now</u></span></h4>
                            <a href="javascript:void(0);" class="bntss blue_bg">Sign up for your free account </a>							
                        </div>
                    </div>
					
					 <div class="share_araea">
                        <h4>Share your your link</h4>
                        <ul>
                            <li>
                                <a href="javascript:void(0);"><img src="{{ url('home/img/facebook.png')}}" alt="" /></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="{{ url('home/img/instagram.png')}}" alt="" /></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="{{ url('home/img/twitter.png')}}" alt="" /></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="{{ url('home/img/what-up.png')}}" alt="" /></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><img src="{{ url('home/img/messanger.png')}}" alt="" /></a>
                            </li>
                        </ul>

                    </div>


				</div>
            </div>
    </div>
</div>




<!---- Help ---->
<section class="al_sec_araea mt_50p pb-0">
<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
					    <h2 class="mb-5 mt-2">Have Question about how 1CR APP Works ? Get help Using</h2>
                        <h3>Need Help?</h3>

                        <p>Explore our resources to quickly get started with Flowlu business management software</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Book online demo</p>

                            <a href="javascript:void(0);">Get a demo</a>
                        </div>

                        <img src="{{ url('home/img/hlp_1.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Find the answers</p>

                            <a href="javascript:void(0);">Knowledge base</a>
                        </div>

                        <img src="{{ url('home/img/hlp_2.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Ask questions</p>

                            <a href="javascript:void(0);">Support chat</a>
                        </div>

                        <img src="{{ url('home/img/hlp_3.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!---- Help ---->


@include('front.layouts.footer')

		<script>
		$(document).ready(function () {
			//toggle the component with class accordion_body
			$(".accordion_head").click(function () {				
				if ($('.accordion_body').is(':visible')) {
					$(".accordion_body").slideUp(300);
					$(".plusminus").text('+');
					$('.accordion_head').removeClass('clr_tx');
				}
				if ($(this).next(".accordion_body").is(':visible')) {
					$(this).next(".accordion_body").slideUp(300);
					$(this).children(".plusminus").text('+');
				} else {
					$(this).next(".accordion_body").slideDown(300);
					$(this).addClass('clr_tx').siblings().removeClass('clr_tx');
					$(this).children(".plusminus").text('-');
				}
			});
		});
		</script>