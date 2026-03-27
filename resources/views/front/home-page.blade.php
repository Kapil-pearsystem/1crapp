
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
</head>


<!-- Video Modal -->
<div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog set_y_vdo">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{{ url('home/img/close.svg')}}" alt="" /></span></button>
      <div class="modal-body">
	  <iframe width="100%" height="500" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=ONYzyvHZAE1RdK-o" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<!-- End Video Modal -->

<body>
<!--- Header Part ---->
<section class="shadow" id="myHeader">
    <div class="top_menuues">
        <div class="container">
            <div class="top_sec_menu cnt_parts">
                <ul>
                    <li><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                    <li><a href="{{ url('about-us') }}"><i class="fa fa-user"></i> <span>About Us</span></a></li>
                    <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main_header_area animated">
            <nav id="navigation1" class="navigation">
                <!-- Logo Area Start -->
                <div class="nav-header">
                    <a class="nav-brand" href="{{ url('') }}"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                    <div class="nav-toggle"></div>

                    <div class="lg_sig_up_arass desktop_view">
                        <a href="{{ url('login') }}" class="bg_red">Login</a>
                        <a href="{{ route('register') }}" class="bg_blues">Register Free</a>
                    </div>
                </div>
				<!-- End Logo Area Start -->

                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right">
                        <li>
                            <a href="javascript:void(0);">1CR APP</a>
                            <ul class="nav-dropdown">
                                <li><a href="javascript:void(0);">How it Works</a></li>
                                <li><a href="{{ url('features') }}">Features</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Market Place</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('market-place-list') }}">PE Market Place</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Resourses & Tools</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('resources-tools') }}">Resourses & Tools</a></li>
                                <li><a href="{{ url('media') }}">Media</a></li>
                                <li><a href="{{ url('plp-introduction') }}">PLP Introduction</a></li>
                                <li><a href="{{ url('join-as-affiliate') }}">Join As Affiliates</a></li>
                                <li><a href="{{ url('thank-you-affiliates') }}">Thank you for Interest in Affiliate</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Company</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('company') }}">Company 1CRAPP</a></li>
                                <li><a href="{{ url('meet-team') }}">Meet Our Team</a></li>
                                <li><a href="{{ url('join-the-team') }}">Join us Carrer</a></li>
                                <li><a href="{{ url('reviews') }}">100+ Reviews</a></li>
                                <li><a href="{{ url('landing-page') }}">1CR APP Landing Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">FAQ's</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('faq') }}">1CR APP FAQ's</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Price</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('price') }}">Price-1CR APP</a></li>
                            </ul>
                        </li>
                        <li class="lgo_space"><a href="{{ url('login') }}" id="activess">Login</a></li>
                        <li class="clr_cngs"><a href="{{ route('register') }}" id="activess">Register Free</a></li>
                    </ul>
                </div>
                <!-- End Main Menus Wrapper -->
			</nav>
        </div>
    </div>
</section>
<!---- End Header Part ---->

<section class="bnr_al_bg" style="background: url('home/img/sld_imgss.png') no-repeat; background-size: cover;">

 <div class="container">
  <div class="owl-carousel owl-theme" id="slidersss">
    <!-- <div class="item">
       <div class="md_cntectss">
	    <h3>Analyze any investment property in seconds.</h3>
		<p>Our data covers 30M+ homes. Ideal for investors, agents, and service providers</p>
		<div class="btn_newsss">
		 <a href="javascript:void(0);" class="bl_drks">Start free trial</a>
		 <a href="javascript:void(0);">Talk to an expert</a>
		</div>
	   </div>
	   <div class="lft_mg_araes">
	    <img src="{{ url('home/img/lft_mg_area.png')}}" alt="" />
	   </div>

	   <div class="rgt_mg_araes">
	    <img src="{{ url('home/img/rgt_mg_araes.png')}}" alt="" />
	   </div>
    </div> -->
    @foreach($banners as $banner)
    <div class="item">
       <div class="md_cntectss">
            <h3>{{ $banner->title }}</h3>
            <p>{{ $banner->description }}</p>
            <div class="btn_newsss">
            <a href="javascript:void(0);" class="bl_drks">Start free trial</a>
            <a href="javascript:void(0);">Talk to an expert</a>
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
        <!-- <div class="item">
       <div class="md_cntectss">
	    <h3>Analyze any investment property in seconds.</h3>
		<p>Our data covers 30M+ homes. Ideal for investors, agents, and service providers</p>
		<div class="btn_newsss">
		 <a href="javascript:void(0);" class="bl_drks">Start free trial</a>
		 <a href="javascript:void(0);">Talk to an expert</a>
		</div>
	   </div>
	   <div class="lft_mg_araes">
	    <img src="{{ url('home/img/lft_mg_area.png')}}" alt="" />
	   </div>

	   <div class="rgt_mg_araes">
	    <img src="{{ url('home/img/rgt_mg_araes.png')}}" alt="" />
	   </div>
    </div> -->
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
                    <!-- <li class="tab-link" data-tab="2">Collaboration</li>
                    <li class="tab-link" data-tab="3">CRM</li>
                    <li class="tab-link" data-tab="4">Projects Tasks</li>
                    <li class="tab-link" data-tab="5">Finance</li>
                    <li class="tab-link" data-tab="6">Invoicing</li>
                    <li class="tab-link" data-tab="7">Client Portal</li>
                    <li class="tab-link" data-tab="8">Mind Maps</li>
                    <li class="tab-link" data-tab="9">Knowledge Base</li> -->
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
                                                        <a href="javascript:void(0);" class="get_st">Get Started. It's Free <i class="fa fa-chevron-circle-right"></i></a>
                                                        <a href="javascript:void(0);" class="ex_mroo"><span class="wct">Explore More <i class="fa fa-chevron-circle-right"></i></span></a>
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
				<!-- End Online CRM -->
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

<!--- What clients are saying about our 1cr app --->
<section class="al_sec_araea testy_bx mg_bg_setss what_cl">
    <div class="testi_bgr">
        <h4>What clients are saying about our 1cr app</h4>
    </div>
    <div class="al_text_box">
        <div class="container">
            <div class="owl-carousel owl-theme" id="testimonials">
                @foreach($clients as $key=>$client)
                <div class="item">
                    <div class="it_emms">
						<div class="usr_mgss"><img src="{{ ASSETS_PATH.$client->image }}" alt="" /></div>
						<h3>{{ $client->name }}</h3>
                        <p class="mb-0"><strong>{{ $client->designation }}, {{ $client->company }}</strong></p>
                        <p><strong>{{ $client->location }}</strong></p>
                        <p class="dis_part">{{ $client->about }}</p>
                        <div class="revisss">
                            @for($i=1; $i>=5; $i++)
                                @if($i<= $client->rating)
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                            <!-- <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i> -->
                        </div>
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B{{ $client->contact }}&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 {{ $client->contact }}</a>
						</div>
						<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
					</div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!--- End What clients are saying about our 1cr app --->


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
            <div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>

            <div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>

			<div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>

            <div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>

			<div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>

            <div class="item">
                <div class="qu_box_parts">
                    <img src="{{ url('home/img/esy_lgoo.jpg')}}" alt="" />
                    <h4>Easy to Share</h4>
                    <p>You Can Crate & Share the Report in Just two easy Steps</p>
                </div>
            </div>
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

<section class="al_sec_araea">
    <div class="container">
      <div class="box_parts_areaese more_x">
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