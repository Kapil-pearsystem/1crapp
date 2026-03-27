@include('web.common.header')
<style>
.cmpy_arara {display:inline-block; width:100%; border:#e1e1e1 solid 1px; padding:10px 30px 30px 30px; border-radius:10px; margin-bottom:20px;}
.cmpy_arara h4 {margin:10px 0 0; font-size:22px; font-weight:700; border-bottom:#e7e7e7 solid 1px; padding-bottom:10px; position:relative;}
.cmpy_arara h4:before {content: ''; position: absolute; width: 10%; height: 3px; background: #e7e7e7; bottom: 0;}
.cmpy_arara .al_cm_py {display: flex; width: 100%; margin-top: 25px;}
.cmpy_arara .al_cm_py .al_ic {width: 7%;}
.cmpy_arara .al_cm_py .al_cm_tx {width: 93%;}
.cmpy_arara .al_cm_py .al_cm_tx h5 {margin: 0 0 5px; font-size: 18px; font-weight: 700;}
.cmpy_arara .al_cm_py .al_cm_tx p {margin: 0; font-size: 15px; font-weight:400;}

.cmpy_arara .bk_bnt_al_btn {margin-top:30px;}
.cmpy_arara .bk_bnt_al_btn a {background:#fff; border:#6d7a83 solid 1px; padding:8px 20px; display:inline-block; border-radius:50px; font-size:14px; margin-right: 10px; color: #032a44; font-weight: 600;}
.cmpy_arara .bk_bnt_al_btn a:last-child{margin-right:0;}
.cmpy_arara .bk_bnt_al_btn a:hover {background: #003250; color: #fff;}

.resorss_bx.d_bluee.cmpy_boxx {border-radius: 20px;}
.resorss_bx.d_bluee.cmpy_boxx .bg_ctxtx {font-size:19px; color:#ffe000; line-height:24px; font-weight:700; margin-bottom:0; padding:20px 20px 20px 20px;}
</style>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Company</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Company</span>
   </div>
  </div>
</section> 

    
<section class="dash_board_pages">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
              <div class="cmpy_arara">
			   <h4>Company Information</h4>
			   
			   <div class="row">
			    <!--- Item ---->
			    <div class="col-lg-6">
				 <div class="al_cm_py">
				  <div class="al_ic"><i class="fa fa-building"></i></div>
				  <div class="al_cm_tx">
				   <h5>About Us</h5>
                   <p>Our Story and the Why</p>
				  </div>
				 </div>
				</div>
				<!--- End Item ---->
				
				<!--- Item ---->
			    <div class="col-lg-6">
				 <div class="al_cm_py">
				  <div class="al_ic"><i class="fa fa-phone"></i></div>
				  <div class="al_cm_tx">
				   <h5>Phone Number</h5>
                   <p>+91 12345 67890</p>
				  </div>
				 </div>
				</div>
				<!--- End Item ---->
				
				<!--- Item ---->
			    <div class="col-lg-6">
				 <div class="al_cm_py">
				  <div class="al_ic"><i class="fa fa-trophy"></i></div>
				  <div class="al_cm_tx">
				   <h5>Awards & Press</h5>
                   <p>In the Press and Awards</p>
				  </div>
				 </div>
				</div>
				<!--- End Item ---->
				
				<!--- Item ---->
			    <div class="col-lg-6">
				 <div class="al_cm_py">
				  <div class="al_ic"><i class="fa fa-envelope"></i></div>
				  <div class="al_cm_tx">
				   <h5>Email</h5>
                   <p>info@property.com</p>
				  </div>
				 </div>
				</div>
				<!--- End Item ---->
				
				<div class="col-lg-12">
				 <div class="bk_bnt_al_btn">
				  <a href="javascript:void(0);">CONTACT SALES</a>
				  <a href="javascript:void(0);">BOOK A MEETING</a>
				 </div>
				</div>
			   </div>
			  </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="rec_box_main mt-0" id="tlss_bxxs">
                    <div class="resorss_bx d_bluee cmpy_boxx">
					    <div class="bg_ctxtx">Wants to take control of the Reale state INSIDE DEAL??</div>
                        <div class="urs_bx_rgss mt-0 pt-0">
                            <div class="cnt_txt_bx">
                                <h4>Get Free e-Book!</h4>

                                <p>Ultimote 4 Step Guide: How to be the agent of choice?</p>

                                <a href="javascript:void(0);">Download</a>
                            </div>

                            <div class="mg_bx_araeae">
                                <img src="{{ url('home/img/bk_images.png')}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('front.layouts.footer')
