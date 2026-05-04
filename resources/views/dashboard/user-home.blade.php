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
		  <h2>Now, Using 1CR APP You Can</h2>
		  <p>Find and Analyse and in Seconds</p>
		</div>
	    <div class="row mb_view_none">
            <div class="col-lg-6">
                <div class="al_most_bg">
                    <h6>{{ $appuses->realtor_title }}</h6>
                    <div class="mg_arar">
                        <img src="{{ $appuses->realtor_image }}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>{{ $appuses->realtor_subtitle }}</h3>
                        <p>{{ $appuses->realtor_shortdesc }}</p>
                    </div>

                    <div class="usr_lists_lgo">
                        {!! $appuses->realtor_description !!}
                    </div>
					<div class="explrr">
                        <a href="{{ $appuses->realtor_btnlink }}" @if($appuses->realtor_btnlink_new_tab == 1) target="_blank" @endif>{{ $appuses->realtor_btntext }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="al_most_bg">
                    <h6>{{ $appuses->investor_title }}</h6>
                    <div class="mg_arar">
                        <img src="{{ $appuses->investor_image }}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>{{ $appuses->investor_subtitle }}</h3>
                        <p>{{ $appuses->investor_shortdesc }}</p>
                    </div>

                    <div class="usr_lists_lgo">
                        {!! $appuses->investor_description !!}
                    </div>
					
					<div class="explrr">
                        <a href="{{ $appuses->investor_btnlink }}" @if($appuses->investor_btnlink_new_tab == 1) target="_blank" @endif>{{ $appuses->investor_btntext }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row mb_view_none">
            <div class="col-lg-6">
                <div class="al_most_bg">
                    <h6>If You Are A Realtor?</h6>
                    <div class="mg_arar">
                        <img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>Estate and Letting Agents</h3>
                        <p>Impress your clients with data agents don't offer, making You the of choice</p>
                    </div>

                    <div class="usr_lists_lgo">
                        <ul>
                            <li>
                                <span class="ic_partss"><i class="fa fa-history"></i></span>
                                <div class="contetcus">
                                    <h5>On and Off Market Data</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                            <li>
                                <span class="ic_partss"><i class="fa fa-lightbulb-o"></i></span>
                                <div class="contetcus">
                                    <h5>Get More Leads</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                            <li>
                                <span class="ic_partss"><i class="fa fa-book"></i></span>
                                <div class="contetcus">
                                    <h5>Revolutionary Property Appraisals</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                        </ul>
                    </div>
					<div class="explrr">
							 <a href="javascript:void(0);">Explore Realtors</a>
							</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="al_most_bg">
                    <h6>If You Are An Investor?</h6>
                    <div class="mg_arar">
                        <img src="{{ url('home/img/usr_hm_mg1.png')}}" alt="" />
                    </div>
                    <div class="cnt_al_cntent">
                        <h3>Property Investors</h3>
                        <p>Make better property decisions faster - with investor insights</p>
                    </div>

                    <div class="usr_lists_lgo">
                        <ul>
                            <li>
                                <span class="ic_partss"><i class="fa fa-book"></i></span>
                                <div class="contetcus">
                                    <h5>Research Property Hotspots</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                            <li>
                                <span class="ic_partss"><i class="fa fa-history"></i></span>
                                <div class="contetcus">
                                    <h5>Find Deals Now</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                            <li>
                                <span class="ic_partss"><i class="fa fa-calculator"></i></span>
                                <div class="contetcus">
                                    <h5>Analyse and Package</h5>
                                    <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                </div>
                            </li>
                        </ul>
                    </div>
					
					<div class="explrr">
							 <a href="javascript:void(0);">Explore Investors</a>
							</div>
                </div>
            </div>
        </div> -->

        <div class="row mb_view_show" id="al_mang_tab">
            <!---- Mobile View ----->
            <div class="col-lg-12">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li class="tab-link active" data-tab="1">If You Are A Realtor?</li>
                        <li class="tab-link" data-tab="2">If You Are An Investor?</li>
                    </ul>
                </div>

                <div class="content-wrapper">
                    <div id="tab-1" class="tab-content active">
                        <div class="al_most_bg">
                            <div class="mg_arar">
                                <img src="{{ url('home/img/usr_hm_mg.png')}}" alt="" />
                            </div>
                            <div class="cnt_al_cntent">
                                <h3>Estate and Letting Agents</h3>
                                <p>Impress your clients with data agents don't offer, making You the of choice</p>
                            </div>

                            <div class="usr_lists_lgo">
                                <ul>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-history"></i></span>
                                        <div class="contetcus">
                                            <h5>On and Off Market Data</h5>
                                            <p>Unparalleled Market Intelligence and Prospecting data</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-lightbulb-o"></i></span>
                                        <div class="contetcus">
                                            <h5>Get More Leads</h5>
                                            <p>Branded Lead Magnet - Incoming hot inquires</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-book"></i></span>
                                        <div class="contetcus">
                                            <h5>Revolutionary Property Appraisals</h5>
                                            <p>Comprehensive property reports, with more instructions</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
							
							<div class="explrr">
							 <a href="javascript:void(0);">Explore</a>
							</div>
                        </div>
                    </div>

                    <div id="tab-2" class="tab-content">
                        <div class="al_most_bg">
                            <div class="mg_arar">
                                <img src="{{ url('home/img/usr_hm_mg1.png')}}" alt="" />
                            </div>
                            <div class="cnt_al_cntent">
                                <h3>Property Investors</h3>
                                <p>Make better property decisions faster - with investor insights</p>
                            </div>

                            <div class="usr_lists_lgo">
                                <ul>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-book"></i></span>
                                        <div class="contetcus">
                                            <h5>Research Property Hotspots</h5>
                                            <p>Helping you identify areas with highest yield or growth</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-history"></i></span>
                                        <div class="contetcus">
                                            <h5>Find Deals Now</h5>
                                            <p>BRR, D2V, HMO, Auctions, BMV, Reposessions, Short Lease, Discounte and more</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="ic_partss"><i class="fa fa-calculator"></i></span>
                                        <div class="contetcus">
                                            <h5>Analyse and Package</h5>
                                            <p>Tools and calculators to instantly analyse & package deals</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
							<div class="explrr">
							 <a href="javascript:void(0);">Explore</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!---- Mobile View ----->
        </div>
    </div>
</section>


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