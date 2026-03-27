@include('web.common.header')
<section class="bnr_al_bg" style="background: url('home/img/sld_imgss.png') no-repeat; background-size: cover;">
 <div class="container">
  <div class="owl-carousel owl-theme" id="slidersss">
    @foreach($banners as $banner)
    <div class="item">
       <div class="md_cntectss">
            <h3>{{ $banner->title }}</h3>
            <p>{{ $banner->description }}</p>
            <div class="btn_newsss">
            <a href="{{ $banner->start_free_trial_link??'#' }}" class="bl_drks"  @if($banner->start_link_new_tab == 1) target="_blank" @endif>Start free trial</a>
            <a href="{{ $banner->talk_to_expert_link??'#' }}" @if($banner->talk_to_expert_link_new_tab == 1) target="_blank" @endif>Talk to an expert</a>
            </div>
	   </div>
	   <div class="lft_mg_araes">
	        <img src="{{ ASSETS_PATH.$banner->left_image }}" alt="" />
	   </div>

	   <div class="rgt_mg_araes">
	        <img src="{{ ASSETS_PATH.$banner->right_image }}" alt="" />
	   </div>
    </div>
    @endforeach
  </div>
 </div>
</section>

<!-- TOP MENU -->
<section>
    <div class="container">
        <div class="als_pg_bntss">
            <div class="tab-wrapper">
                <ul class="tabs">
                    @foreach($services as $key=>$category)
                        <li class="tab-link @if($key == 0) active @endif" data-tab="{{ $category->category_slug }}">{{ $category->category_name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="content-wrapper">
			    <!-- Online CRM -->
                @foreach($services as $key=>$service)
                <div id="tab-{{ $service->category_slug }}" class="tab-content  @if($key == 0) active @endif">
                    <div class="bgr_area">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>{{ $service->title }}</h2>
                                            <p>
                                                {{ $service->description }}
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="{{ $service->get_started_link??'#' }}" @if($service->start_link_new_tab == 1) target="_blank" @endif class="get_st">Get Started. It's Free <i class="fa fa-chevron-circle-right"></i></a>
                                                <a href="{{ $service->explore_more_link??'#' }}" @if($service->explore_more_link_new_tab == 1) target="_blank" @endif class="ex_mroo"><span class="wct">Explore More <i class="fa fa-chevron-circle-right"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
								    <div class="mg_box_araea">
                                      <img src="{{ ASSETS_PATH.$service->image }}" alt="" />
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- END TOP MENU -->


<!---- Testimonials ---->
<section class="dash_board_pages spaceses" id="tsts_mlts">
    <div class="container">
	 <div class="row scrool_parts">
     @foreach($testimonials as $key=>$testimonial)
	  <!--- Item List --->
      <div class="col-lg-4">
	   <div class="it_emms">
			<div class="usr_mgss"><img src="{{ ASSETS_PATH.$testimonial->image }}" alt="" /></div>
			<h3>{{ $testimonial->name }}</h3>
			<p class="mb-0"><strong>{{ $testimonial->designation }}, {{ $testimonial->company }}</strong></p>
			<p><strong>{{ $testimonial->location }}</strong></p>
			<p class="dis_part">{{ $testimonial->about }}</p>
			<div class="revisss">
                @for($i=1; $i>=5; $i++)
                    @if($i<= $testimonial->rating)
				        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star-o"></i>
                    @endif
                @endfor
			</div>
			<div class="w_numbber">
			 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B{{ $testimonial->contact }}&amp;text=Hi&amp;app_absent=0">
             <i class="fa fa-whatsapp"></i> +91 {{ $testimonial->contact }}</a>
			</div>
			<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
		</div>
	  </div>
      <!--- End Item List --->
    @endforeach

	 </div>

	 <div class="mr_c_test"><a href="javascript:void(0);" class="alluser">More Customers Testimonials.</a></div>
    </div>
</section>
<!---- End Testimonials ---->

<!-- Video Elements -->
<section class="vedioo" id="bg_grea_all">
    <div class="container">
        <h4>Watch A Demo Below...</h4>
        <div class="video_parts">
            <video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
                <source id="mp4" src="{{ url('home/img/vdiio.mp4')}}" type="video/mp4" />
            </video>
        </div>
    </div>
</section>
<!-- End Video Elements -->

<!---- Get Started. It's Free ---->
<section class="get_nd_blogss mt-0">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>
<!---- End Get Started. It's Free ---->

<!-- How It works -->
<div id="how_al_pgss" class="mt_50p">
<section class="al_sec_araea pb-0">
 <div class="container">
   <h4 class="text-left">HOW IT WORKS</h4>
 </div>
</section>

<!--@foreach($how_it_works as $key=>$h_works)-->
<!--@if($h_works->section_side == 'left')-->
<!--- Step 1 - OBTAIN ---->
<!--<section class="al_sec_araea how_alls_prgp">-->
<!--    <div class="container how_it_mb">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-6">-->
<!--                <div class="h_prp_cnt">-->
<!--                    <div class="medilsss">-->
<!--                        <h5>Step {{ $h_works->step }} - {{ $h_works->title }}</h5>-->
<!--                        {!! $h_works->description !!}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--			<div class="col-lg-6">-->
<!--                <div class="owl-carousel owl-theme how_it_scrools_{{ $key }}">-->
<!--                           <div class="owl-carousel owl-theme" id="how_it_scrools">-->
<!--                    @foreach(explode(',', $h_works->images) as $img)-->
<!--                        @if(!empty($img))-->
<!--                                <div class="item">-->
<!--                                    <div class="mg_sclrr_ss">-->
<!--                                        <img src="{{ ASSETS_PATH.$img }}" class="bg_al_cntxt" alt="" />-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                        @endif-->
<!--                    @endforeach-->
<!--                            </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--@else-->
<!--<section class="al_sec_araea how_alls_prgp mt_50">-->
<!--    <div class="container how_it_mb">-->
<!--        <div class="row">-->
<!--                    <div class="owl-carousel owl-theme" id="how_it_scrools">-->
<!--            @foreach(explode(',', $h_works->images) as $img)-->
<!--                @if(!empty($img))-->
<!--                        <div class="item">-->
<!--                            <div class="mg_sclrr_ss">-->
<!--                                <img src="{{ ASSETS_PATH.$img }}" class="bg_al_cntxt" alt="" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                @endif-->
<!--            @endforeach-->
<!--                    </div>-->

<!--			<div class="col-lg-6">-->
<!--                <div class="h_prp_cnt">-->
<!--                    <div class="medilsss">-->
<!--                         <h5>Step {{ $h_works->step }} - {{ $h_works->title }}</h5>-->
<!--                            {!! $h_works->description !!}    -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--@endif-->
<!--@endforeach-->
<!--- Step 1 - OBTAIN ---->
<section class="al_sec_araea how_alls_prgp">
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
<section class="al_sec_araea how_alls_prgp mt_50">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End Step 2- OPERATE ---->

<!--- Step 3- OPTIMISE ---->
<section class="al_sec_araea how_alls_prgp mt_50">
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


<section class="al_sec_araea mt_50">
    <div class="container">
        <div class="see_how_areaa">
            <div class="see_h_are_ct">
                <div class="mediaa">
                    <img src="{{ url('home/img/1cr_lgo.png')}}" alt="" />
                    <h5>See how 1cr app works for your investment. no credit card required.</h5>
                    <p>
                        <a href="javascript:void(0);" class="alluser">Sign up for free <img src="{{ url('home/img/arrow_right.svg')}}" alt="" /></a>
                    </p>
                </div>
            </div>
            <div class="mg_ara_stl">
                <img src="{{ url('home/img/see_how.png')}}" alt="" class="ovr_m" />
                <div class="und_mgss"><img src="{{ url('home/img/see_how_mg_sm.png')}}" alt="" /></div>
                <div class="socialss">
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/chn_ico.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/twi_tter.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/face_book.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/insta_gr.png')}}" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!--- Step 1 ---->
<section class="al_sec_araea how_alls_prgp mt_50">
   <div class="container">
        <h4 class="text-left">Plus you can</h4>
   </div>


    <div class="container how_it_mb">
        <div class="row">
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 1</h5>
                        <p>Register or Login to 1CR APP and Post the Tentative Details of the property Purchase . You can use 1CR APP as well. </p>
						<ul>
						 <li>Register or Login to 1CR APP. it's Free For Life. 90% User don't even need to upgrade.</li>
						 <li>Enter Loan Details, Basic Purchase Price, Possession Charges, Extra Charges and & Improvement Charges</li>
						 <li>Enter Gross Monthly Rent, vacancy Rate, other Income </li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
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
<!--- End Step 1 ---->

<!--- Step 2 ---->
<section class="al_sec_araea how_alls_prgp mt_50p">
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
                        <h5>Step 2</h5>
                        <p>Get into the dash board and alleys the property performance and future Projection.</p>
						<ul>
						 <li>Get the Data for Latest year</li>
						 <li>Find the ratios & Return for One year</li>
						 <li>AllGraphics and Bar Diagram</li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!--- End Step 2 ---->


<!--- Step 3 ---->
<section class="al_sec_araea how_alls_prgp pb-0 mt_50p">
    <div class="container how_it_mb">
        <div class="row">
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 3</h5>
                        <p>Register & Login to 1CR APP. You can use 1CR APP as well. </p>
						<ul>
						 <li>Share he report with your Circle to get the better feedbakc</li>
						 <li>use the interactive report with dynamic and change the various paramater to see the effefct they have your your return,</li>
						 <li>compaire the Rental & Sold Properties in a area with your peers and get an idea of the property performarnce. </li>
						</ul>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
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
<!--- End Step 3 ---->

</div>
<!-- End How It works -->

<!---- Get Started. It's Free ---->
<section class="get_nd_blogss">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>
<!---- End Get Started. It's Free ---->


<!---- Quickly analyze a wide range of real estate investments --->
<section class="al_sec_araea mt_50p" id="quck_ana">
    <div class="container">
        <h4>Quickly analyze a wide range of real estate investments:</h4>
    </div>

	<div class="container qu_bx_partss">
	 <div class="row scrool_parts">
        @foreach($quickly_analyze as $key=>$q_a)
	  <!--- Box Parts --->
	  <div class="col-lg-4">
	   <div class="qu_box_parts">
	     <img src="{{ ASSETS_PATH.$q_a->image }}" alt="" />
		 <h4>{{ $q_a->title }}</h4>
		 <p>{{ $q_a->description }}</p>
	   </div>
	  </div>
	  <!--- End Box Parts --->
      @endforeach
	 </div>
	</div>
</section>
<!---- End Quickly analyze a wide range of real estate investments --->


<!-- Trusted by over 350,000 professionals worldwide -->
<section class="al_sec_araea str_14">
    <div class="container">
        <div class="free_trailss">
            <img src="{{ url('home/img/free-trial.png')}}" class="mb_not_sh" alt="" />
            <div class="contents_frt">
                <div class="cnt_leftsss">
                    <div class="medilss">
                        <h5>Start your 14-day free trial</h5>
                        <p>No credit card required</p>
                    </div>
                </div>
                <div class="bntss_leftsss">
                    <a href="javascript:void(0);" class="alluser">Sign up for free <img src="{{ url('home/img/arrow_right.svg')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Trusted by over 350,000 professionals worldwide -->


<!--- our 1cr app is useful for almost all sort of real estate properties --->
<section class="al_sec_araea our_1cr">
    <div class="container">
        <h4>Our 1cr app is useful for almost all sort of real estate properties</h4>
    </div>
    <div class="full_part_mg_araeaes">
        <div class="mg_bg_areaea">
            <img src="{{ url('home/img/trusted_bg.png')}}" alt="" />
        </div>
        <div class="medillls">
            <div class="ful_part_content">
                <div class="cnt_tx_main">
                    <div class="mg_ic"><img src="{{ url('home/img/real-estate-investors.png')}}" alt="" /></div>
                    <div class="tx_partss">
                        <h5>Real Estate Investors</h5>
                        <p>Whether you need to evaluate a single SFR or analyze dozens of multi-family buildings, our software will help you make smarter and more educated investment decisions.</p>
                    </div>
                </div>

                <div class="cnt_tx_main">
                    <div class="mg_ic"><img src="{{ url('home/img/agents-brokers-wholesalers.png')}}" alt="" /></div>
                    <div class="tx_partss">
                        <h5>Agents, Brokers & Wholesalers</h5>
                        <p>Whether you need to evaluate a single SFR or analyze dozens of multi-family buildings, our software will help you make smarter and more educated investment decisions.</p>
                    </div>
                </div>

                <div class="cnt_tx_main">
                    <div class="mg_ic"><img src="{{ url('home/img/homeowners.png')}}" alt="" /></div>
                    <div class="tx_partss">
                        <h5>Homeowners</h5>
                        <p>Thinking about turning your home into a rental? Use DealCheck to help you figure out how much passive income you will generate each month.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End our 1cr app is useful for almost all sort of real estate properties --->
@include('web.pages.what-client-are-saying')
<!---- Get Started. It's Free ---->
<section class="get_nd_blogss">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>
<!---- End Get Started. It's Free ---->



<!---- Easy to Share --->
<section class="al_sec_araea mt_50p" id="esy_shrrs">
    <div class="container qu_bx_partss">
        <div class="owl-carousel owl-theme" id="esy_to_shar">
            @foreach($easytoshare as $item)
                <div class="item">
                    <div class="qu_box_parts">
                        <!-- Display Image dynamically -->
                        <img src="{{ ASSETS_PATH.$item->image }}" alt="{{ $item->title }}" />
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!---- End Easy to Share --->

<!---- 1CR APP Is accurate, easy to use & FAST --->
<section class="al_sec_araea" id="1cr_app_acc">
    <div class="container">
        <h4>1CR APP Is accurate, easy to use & FAST</h4>
    </div>

    <div class="container qu_bx_partss">
        <div class="row scrool_parts">
            <!-- Loop through each box from the database -->
            @foreach($easytouse as $easytouse)
                <div class="col-lg-4">
                    <div class="qu_box_parts">
                        <!-- Check if image exists, then display it -->
                        <img src="{{ ASSETS_PATH.$easytouse->image }}" alt="{{ $easytouse->title }}" />
                        <h4>{{ $easytouse->title }}</h4>
                        <p>{{ $easytouse->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!---- End 1CR APP Is accurate, easy to use & FAST --->

<!--- Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->
<section class="get_nd_blogss mt-0">
 <div class="btm_contect red_to_drvvs">
    <h4>Ready To Dive In? Book A Demo Or Try It Free For 14 Day</h4>
    <p>Property Deals Insight: Unleash The Power Of Date And Insights To Discover Lucrative Opportunities in The UK Property Market</p>

    <div class="bunnt_araeae_bnt">
        <a href="javascript:void(0);" class="read_bg">Talk To An Expert <i class="fa fa-arrow-circle-right" ></i></a>
        <a href="javascript:void(0);">Get Started for Free <i class="fa fa-arrow-circle-right" ></i></a>
    </div>
  </div>
</section>
<!--- End Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->

<section class="al_sec_araea" id="counter-section">
    <div class="container">
      <div class="box_parts_areaese more_x">
                <ul>
                    @foreach($workmatrix as $item)
                        <li>
                            <img src="{{ ASSETS_PATH.$item->image }}" alt="" />
                            @php
                                preg_match('/(\d+)(\+{1,2})?/', $item->title, $matches);
                                $number = $matches[1] ?? 0;
                                $plus = $matches[2] ?? '';
                            @endphp
                            
                            <h6 class="counter_title" data-count="{{ $number }}" data-plus="{{ $plus }}">0</h6>

                            <p>{{ $item->description }}</p>
                        </li>
                    @endforeach

                </ul>
            </div>
    </div>
</section>

<!--- Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->
<section class="get_nd_blogss mt-0">
 <div class="btm_contect red_to_drvvs">
    <h4>Ready To Dive In? Book A Demo Or Try It Free For 14 Day</h4>
    <p>Property Deals Insight: Unleash The Power Of Date And Insights To Discover Lucrative Opportunities in The UK Property Market</p>

    <div class="bunnt_araeae_bnt">
        <a href="javascript:void(0);" class="read_bg">Talk To An Expert <i class="fa fa-arrow-circle-right" ></i></a>
        <a href="javascript:void(0);">Get Started for Free <i class="fa fa-arrow-circle-right" ></i></a>
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

                @foreach($needhelp as $item)
                    <div class="col-lg-4">
                        <div class="hpls_box">
                            <div class="ovr_centetent">
                                <p>{{ $item->title }}</p>
                                <a href="{{ url($item->url) }}" {{ $item->url_new_tab ? 'target="_blank"' : '' }}>
                                    {{ $item->link_name }}
                                </a>
                            </div>
                            <img src="{{ ASSETS_PATH.$item->image }}" alt="" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
<!---- Help ---->
@include('web.common.footer')
<script>
function runCounterAnimation() {
    $('.counter_title').each(function () {
        var $this = $(this);
        var countTo = parseInt($this.data('count'));
        var plusSign = $this.data('plus') || '';

        $({ countNum: 1 }).animate({ countNum: countTo }, {
            duration: 2000,
            easing: 'swing',
            step: function () {
                $this.text(Math.floor(this.countNum) + plusSign);
            },
            complete: function () {
                $this.text(countTo + plusSign);
            }
        });
    });
}

$(document).ready(function () {
    let hasRun = false;

    const observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasRun) {
                hasRun = true;
                runCounterAnimation();
                observer.unobserve(entry.target); // Optional: stop observing after first run
            }
        });
    }, {
        threshold: 0.1 // 10% of the section must be visible
    });

    const target = document.querySelector('#counter-section');
    if (target) {
        observer.observe(target);
    }
});
</script>

