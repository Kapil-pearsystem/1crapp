@include('front.layouts.user-header')
<style>
.user_alllpgs .hd_viewss {
    text-align: center;
	margin-bottom:45px;
}
.user_alllpgs .hd_viewss h2 {
    margin: 0 0 10px;
    font-weight: 700;
    font-size: 30px;
    color: #000;
}
.user_alllpgs .hd_viewss p {
    margin: 0 0 0;
    font-size: 16px;
}

.al_most_bg .explrr {
    text-align: center;
    margin-top: 20px;
}
.al_most_bg .explrr a {
    background: #2196F3;
    display: inline-block;
    padding: 8px 25px;
    border-radius: 30px;
    font-weight: 700;
    color: #fff;
}


.al_most_bg {
    background: #00223b;
    padding: 45px 20px 30px;
    border-radius: 10px;
    position: relative;
}
.al_most_bg h6 {
    background: #2196F3;
    padding: 12px 0;
    text-align: center;
    font-size: 17px;
    color: #ffffff;
    font-weight: 700;
    border-radius: 4px;
    position: absolute;
    top: -20px;
    width: 90%;
    left: 0;
    right: 0;
    margin: 0 auto;
}

.al_most_bg .mg_arar {
    height: 242px;
    overflow: hidden;
    width: 100%;
}

.al_most_bg .mg_arar.realtorss {
    height: 150px;
    overflow: hidden;
    width: 100%;
}
.al_most_bg .mg_arar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.al_most_bg .cnt_al_cntent {
    margin-top: 30px;
}
.al_most_bg .cnt_al_cntent h3 {
    color: #fff;
    margin: 0 0 5px;
    font-weight: 600;
    font-size: 20px;
}
.al_most_bg .cnt_al_cntent p {
    color: #fff;
    margin: 0 0 5px;
    font-weight: 400;
    font-size: 15px;
}
.al_most_bg .usr_lists_lgo {
    display: inline-block;
    width: 100%;
}
.al_most_bg .usr_lists_lgo ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.al_most_bg .usr_lists_lgo ul li {
    display: flex;
    margin-top: 15px;
}

.al_most_bg .usr_lists_lgo ul li span.ic_partss {
    width: 7%;
    text-align: left;
    color: #fff;
    font-size: 22px;
}

.al_most_bg .usr_lists_lgo ul li .contetcus {
    width: 93%;
    color: #fff;
}
.al_most_bg .usr_lists_lgo ul li .contetcus h5 {
    margin: 0 0 3px;
    font-size: 16px;
    font-weight: 700;
}


#al_mang_tab .tab-wrapper {
    text-align: center;
    display: block;
    margin: auto;
    max-width: 100%;
    border-radius: 10px;
    overflow: hidden;
}

#al_mang_tab .tabs {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
}

#al_mang_tab .tab-link {
    margin: 0;
    list-style: none;
    padding: 10px 10px;
    color: #3f3f3f;
    background: #e5e5e5;
    cursor: pointer;
    font-weight: 700;
    transition: all ease 0.5s;
    border-bottom: solid 3px rgba(255, 255, 255, 0);
    letter-spacing: 0;
    font-size: 13px;
    width: 50%;
}

#al_mang_tab .tab-link:hover {
  color: #999;
  border-color: #999;
}

#al_mang_tab .tab-link.active {
    color: #fff;
    border-color: #1c5299;
    background: #1c5299;
}

#al_mang_tab .content-wrapper {
    padding: 15px 0 0;
}

#al_mang_tab .tab-content {
  display: none;
  text-align: left;
  opacity: 0;
  transform: translateY(15px);
  animation: fadeIn 0.5s ease 1 forwards;
}

#al_mang_tab .tab-content.active {
  display: block;
}

@keyframes fadeIn {
  100% {
    opacity: 1;
    transform: none;
  }
}

.sld_btn_als {
    text-align: center;
    margin-top: 20px;
}
.sld_btn_als a {
    background: #97bdef;
    display: inline-block;
    padding: 9px 20px;
    border-radius: 6px;
    color: #fff;
}
.sld_btn_als a:hover{background:#c61515;}



.mb_view_show{display:none;}

@media (min-width: 481px) and (max-width: 767px) {
.al_most_bg .mg_arar {height: auto;}
.al_most_bg .mg_arar img {height: auto;}
.al_most_bg .usr_lists_lgo ul li span.ic_partss {width: 10%;}
.al_most_bg .usr_lists_lgo ul li .contetcus {width: 90%;}
.mb_view_none{display:none;}	
.mb_view_show{display:block;}
#al_mang_tab {margin-bottom: 25px;}
}

@media (min-width: 320px) and (max-width: 480px) {
#al_mang_tab .tab-wrapper {border-radius: 0;}	
#al_mang_tab .tabs {
    margin: 0;
    display: flex;
    justify-content: left;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 0;
    flex-wrap: inherit;
}
.realtorss#al_mang_tab .tab-link {
        border: #1c5299 solid 1px;
        padding:8px 10px;
        font-size: 11px;
        line-height:14px;
        margin-right:7px;
        border-radius:60px;
        width:auto;
    }
.realtorss#al_mang_tab .tab-link:last-child{margin-right:0;}	
	
#how_al_pgss.realtorss {margin-top: 0px;}
.al_sec_araea.how_alls_prgp.pt_top_40.realtorss {padding: 0 !important;}
.al_sec_araea.how_alls_prgp.mt_50p.realtorss .h_prp_cnt {margin-top: 20px !important;}
.al_most_bg .mg_arar {height: auto;}
.al_most_bg .mg_arar img {height: auto;}
.al_most_bg .usr_lists_lgo ul li span.ic_partss {width: 10%;}
.al_most_bg .usr_lists_lgo ul li .contetcus {width: 90%;}
.mb_view_none{display:none;}
.mb_view_show{display:block;}
#al_mang_tab {margin-bottom: 25px;}
}
</style>
 



<section class="dash_board_pages user_alllpgs">
    <div class="container">
	    <div class="hd_viewss">
		  <h2>Agents And Sourcing Professionnals</h2>
		  <p>Impress your clients with data other agents don't offer</p>
		</div>
	
        <div class="row mb_view_none">
            <div class="col-lg-4">
                <div class="al_most_bg">
                    <div class="mg_arar realtorss">
                        <img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>Direct to Vendor Prospects</h3>
                        <p>Unparalleled On and Off Market data - Target prospects with razor sharp precision</p>
                    </div>
					
					<div class="explrr">
					  <a href="javascript:void(0);">Find Prospects Now</a>
					</div>
                </div>
            </div>
			
			<div class="col-lg-4">
                <div class="al_most_bg">
                    <div class="mg_arar realtorss">
                        <img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>I want to get more leads</h3>
                        <p>Get incoming inquiries - Convert visitors into leads in awe of your brand</p>
                    </div>
					
					<div class="explrr">
					  <a href="javascript:void(0);">Find out How ?</a>
					</div>
                </div>
            </div>

			<div class="col-lg-4">
                <div class="al_most_bg">
                    <div class="mg_arar realtorss">
                        <img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>I want to win more instructions</h3>
                        <p>Revolutionary Appraisals in seconds - present comprehensive data & insignts in one place</p>
                    </div>
					
					<div class="explrr">
					  <a href="javascript:void(0);">Get Appraisal Reports</a>
					</div>
                </div>
            </div>

           
		</div>

        <div class="row mb_view_show realtorss" id="al_mang_tab">
            <!---- Mobile View ----->
            <div class="col-lg-12">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li class="tab-link active" data-tab="1">Direct to Vendor Prospects</li>
                        <li class="tab-link" data-tab="2">I want to get more leads</li>
                        <li class="tab-link" data-tab="3">I want to win more instructions</li>
                    </ul>
                </div>

                <div class="content-wrapper">
                    <div id="tab-1" class="tab-content active">
                       <div class="al_most_bg">
							<div class="mg_arar">
								<img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
							</div>
							<div class="cnt_al_cntent">
								<h3>Direct to Vendor Prospects</h3>
								<p>Unparalleled On and Off Market data - Target prospects with razor sharp precision</p>
							</div>
							
							<div class="explrr">
							  <a href="javascript:void(0);">Find Prospects Now</a>
							</div>
						</div>
                    </div>

                    <div id="tab-2" class="tab-content">
                        <div class="al_most_bg">
							<div class="mg_arar">
								<img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
							</div>
							<div class="cnt_al_cntent">
								<h3>I want to get more leads</h3>
								<p>Get incoming inquiries - Convert visitors into leads in awe of your brand</p>
							</div>
							
							<div class="explrr">
							  <a href="javascript:void(0);">Find out How ?</a>
							</div>
						</div>
                    </div>

					<div id="tab-3" class="tab-content">
                        <div class="al_most_bg">
							<div class="mg_arar">
								<img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
							</div>
							<div class="cnt_al_cntent">
								<h3>I want to win more instructions</h3>
								<p>Revolutionary Appraisals in seconds - present comprehensive data & insignts in one place</p>
							</div>
							
							<div class="explrr">
							  <a href="javascript:void(0);">Get Appraisal Reports</a>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <!---- Mobile View ----->
        </div>
    </div>
</section>

<div id="how_al_pgss" class="mt_50p realtorss">
<!--- Step 1 - OBTAIN ---->
<section class="al_sec_araea how_alls_prgp pt_top_40 realtorss">
    <div class="container how_it_mb">
        <div class="row">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 1 - OBTAIN</h5>
                        <p>Register or Login to 1CR APP and Post the Tentative Details of the property Purchase . You can use 1CR APP as well. </p>
						<ul>
						 <li>Register or Login to 1CR APP. it's Free For Life. 90% User don't even need to upgrade. </li>
						 <li>Enter Loan Details, Basic Purchase Price, Possession Charges, Extra Charges and & Improvement Charges, Gross Rent, VC & Other Income</li>
						 <li>Enter Refinance Details & Future projection Plus Deprecations & taxes Details</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta Learn More Here.</p>
					    <div class="sld_btn_als"><a href="javascript:void(0);">Solid Button</a></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-6">
				<div class="owl-carousel owl-theme" id="how_it_scrools">
					<!----- Slider Item ---->
					<div class="item">
						<div class="mg_sclrr_ss">
							<img src="{{ url('home/img/recapt.jpg')}}" class="bg_al_cntxt" alt="" />
						</div>
					</div>
					<!----- End Slider Item ---->

					<!----- Slider Item ---->
					<div class="item">
						<div class="mg_sclrr_ss">
							<img src="{{ url('home/img/recapt.jpg')}}" class="bg_al_cntxt" alt="" />
						</div>
					</div>
					<!----- End Slider Item ---->

					<!----- Slider Item ---->
					<div class="item">
						<div class="mg_sclrr_ss">
							<img src="{{ url('home/img/recapt.jpg')}}" class="bg_al_cntxt" alt="" />
						</div>
					</div>
					<!----- End Slider Item ---->
				</div>
			</div>
        </div>
    </div>
</section>
<!--- End Step 1 - OBTAIN ---->


<!--- Step 2- OPERATE ---->
<section class="al_sec_araea how_alls_prgp mt_50p realtorss">
    <div class="container how_it_mb">
        <div class="row">
            <div class="col-lg-6">
                <div class="mg_sclrr_ss">
				  <img src="{{ url('home/img/recapt.jpg')}}" class="bg_al_cntxt" alt="" />
				</div>
			</div>
			
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 2- OPERATE</h5>
                        <p>Get into the dash board and alleys the property performance and future Projection. </p>
						<ul>
						 <li>Get the Data for Latest year</li>
						 <li>Find the ratios & Return for One year</li>
						 <li> Get to Know Future Projection & All Graphics and Bar Diagram</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
						<div class="sld_btn_als"><a href="javascript:void(0);">Solid Button</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End Step 2- OPERATE ---->

<!--- Step 3- OPTIMISE ---->
<section class="al_sec_araea how_alls_prgp mt_50 realtorss">
    <div class="container how_it_mb">
        <div class="row">	
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 3- OPTIMISE</h5>
                        <p>Get into the dash board and alleys the property performance and future Projection. </p>
						<ul>
						 <li>Get the Data for Latest year</li>
						 <li>Find the ratios & Return for One year</li>
						 <li> Get to Know Future Projection & All Graphics and Bar Diagram</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
						<div class="sld_btn_als"><a href="javascript:void(0);">Solid Button</a></div>
                    </div>
                </div>
            </div>
			
			<div class="col-lg-6">
                <div class="mg_sclrr_ss">
				  <img src="{{ url('home/img/recapt.jpg')}}" class="bg_al_cntxt" alt="" />
				</div>
			</div>
        </div>
    </div>
</section>
<!--- End Step 3- OPTIMISE ---->
</div>

<!--- What clients are saying about our 1cr app --->
<section class="al_sec_araea testy_bx mg_bg_setss what_cl">
    <div class="testi_bgr">
        <h4>What clients are saying about our 1cr app</h4>
    </div>
    <div class="al_text_box">
        <div class="container">
            <div class="owl-carousel owl-theme" id="testimonials">
                <div class="item">
                    <div class="it_emms">
						<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="mb-0"><strong>Designation, Company</strong></p>
						<p><strong>Location</strong></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<div class="revisss">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
						<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
					</div>
                </div>

                <div class="item">
                    <div class="it_emms">
						<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="mb-0"><strong>Designation, Company</strong></p>
						<p><strong>Location</strong></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<div class="revisss">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
						<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
					</div>
                </div>

                <div class="item">
                    <div class="it_emms">
						<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="mb-0"><strong>Designation, Company</strong></p>
						<p><strong>Location</strong></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<div class="revisss">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
						<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End What clients are saying about our 1cr app --->


<!---- 1CR APP Is accurate, easy to use & FAST --->
<section class="al_sec_araea mt_50p" id="1cr_app_acc">
    <div class="container">
        <h4>1CR APP Is accurate, easy to use & FAST</h4>
    </div>
	
	<div class="container qu_bx_partss">
	 <div class="row scrool_parts">
	  <!--- Box Parts --->
	  <div class="col-lg-4">
	   <div class="qu_box_parts">
	     <img src="{{ url('home/img/R_logoss.jpg')}}" alt="" />
		 <h4>The Coldest Sunset</h4>
		 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
	   </div>
	  </div>
	  <!--- End Box Parts --->
	  
	  <!--- Box Parts --->
	  <div class="col-lg-4">
	   <div class="qu_box_parts">
	     <img src="{{ url('home/img/R_logoss.jpg')}}" alt="" />
		 <h4>The Coldest Sunset</h4>
		 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
	   </div>
	  </div>
	  <!--- End Box Parts --->
	  
	  <!--- Box Parts --->
	  <div class="col-lg-4">
	   <div class="qu_box_parts">
	     <img src="{{ url('home/img/R_logoss.jpg')}}" alt="" />
		 <h4>The Coldest Sunset</h4>
		 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
	   </div>
	  </div>
	  <!--- End Box Parts --->
	 </div>
	</div>
</section>	
<!---- End 1CR APP Is accurate, easy to use & FAST --->

<!--- Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->
<section class="get_nd_blogss mt-0">
<div class="container">
 <div class="btm_contect red_to_drvvs">
    <h4>Ready to Dive in ? Book a Demo or use it For Free. </h4>
    <p>1CR APP unleash the data analysis and make it very lucrative to analyse any property in the market and Fetch you accurate data for fast and easy decesion maing </p>

    <div class="bunnt_araeae_bnt">
        <a href="javascript:void(0);" class="read_bg">Talk To An Expert <i class="fa fa-arrow-circle-right" ></i></a>
        <a href="javascript:void(0);">Get Started for Free <i class="fa fa-arrow-circle-right" ></i></a>
    </div>
  </div>	
  </div>	
</section>		
<!--- End Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->


<section class="al_sec_araea mt_50p">
<div class="container">
        <h4>1CR APP Is accurate, easy to use & FAST</h4>
    </div>
    <div class="container">
      <div class="box_parts_areaese more_x mt-0">
                <ul>
                    <li>
                        <img src="{{ url('home/img/off-market-deals.png')}}" alt="" />
                        <h6>500+ <span class="lst_wordds">+</span></h6>
                        <p>Registred Customers USing 1CR APP </p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/motivated-vendors.png')}}" alt="" />
                        <h6>15000+ <span class="lst_wordds">+</span></h6>
                        <p>Reports generated as on Date - jhsjkfahfjaf</p>
                    </li>
					
					 <li>
                        <img src="{{ url('home/img/mg_deals.png')}}" alt="" />
                        <h6>900+</h6>
                        <p>New Invetsors Have Purchased</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/mode_deals.png')}}" alt="" />
                        <h6>400+</h6>
                        <p>Audit Reports Done dgfjsgdfj</p>
                    </li>
					
					<li>
                        <img src="{{ url('home/img/ms_deals.png')}}" alt="" />
                        <h6>350+ <span class="lst_wordds">+</span></h6>
                        <p>Investors have joined hands with fhdfhdh</p>
                    </li>
					
                    <li>
                        <img src="{{ url('home/img/on-market-deals.png')}}" alt="" />
                        <h6>50+ <span class="lst_wordds">+</span></h6>
                        <p>Projects Delivered - shfkjhfkjfhk fhdh</p>
                    </li>
					
					
					
                    
                   
                    <li>
                        <img src="{{ url('home/img/avg_deals.png')}}" alt="" />
                        <h6>9600+ <span class="lst_wordds">+</span></h6>
                        <p>Propertu Compaired and Analysed</p>
                    </li>
					<li>
                        <img src="{{ url('home/img/deals-closed.png')}}" alt="" />
                        <h6>60+ <span class="lst_wordds">s</span></h6>
                        <p>Subscription Based Customers</p>
                    </li>
                    
                </ul>
            </div>
    </div>
</section>

<!--- Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->
<section class="get_nd_blogss mt-0">
<div class="container">
 <div class="btm_contect red_to_drvvs">
    <h4>Ready to Dive in ? Book a Demo or use it For Free. </h4>
    <p>1CR APP unleash the data analysis and make it very lucrative to analyse any property in the market and Fetch you accurate data for fast and easy decesion maing </p>

    <div class="bunnt_araeae_bnt">
        <a href="javascript:void(0);" class="read_bg">Talk To An Expert <i class="fa fa-arrow-circle-right" ></i></a>
        <a href="javascript:void(0);">Get Started for Free <i class="fa fa-arrow-circle-right" ></i></a>
    </div>
  </div>	
  </div>	
</section>		
<!--- End Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->

<!---- Help ---->
<section class="al_sec_araea mt_50p pb-0">
<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
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
 $('.tab-link').click( function() {	
	var tabID = $(this).attr('data-tab');
	$(this).addClass('active').siblings().removeClass('active');	
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');
});
</script>

<script>
	getcountry();
	function getcountry() {
    var URL = '{{url("get-country")}}/'+id;
    $.ajax({
        url: URL,
        type: "GET",  
        success: function(response) {
            $('#countries_id').html(response);
            if(callback){
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    return 1;
}
</script>