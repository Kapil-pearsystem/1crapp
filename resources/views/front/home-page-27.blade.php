
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

<style>
#banner .owl-nav {
    margin: 0;
    position: relative;
    display: inline-block;
    width: 100%;
}

#banner .owl-nav button.owl-prev {
    display: flex;
    margin: 0;
}
#banner .owl-nav button.owl-prev span.ar_btnss {
    position: absolute;
    left: 45px;
    top: 7px;
    color: #000;
    background: transparent;
}
#banner .owl-nav button.owl-prev i{
    position: absolute;
    left: 0;
    margin: 0;
    background: #fff;
    border: #ccc solid 1px;
    width: 36px;
    height: 36px;
    border-radius: 50px;
    line-height: 34px;
}

#banner .owl-nav button.owl-next {
    display: flex;
    margin: 0;
    position: absolute;
    right: 0;
    top: 0;
}
#banner .owl-nav button.owl-next span.ar_btnss {
    position: absolute;
    right: 45px;
    top: 7px;
    color: #000;
    background: transparent;
}
#banner .owl-nav button.owl-next i{
    position: absolute;
    right: 0;
    margin: 0;
    background: #fff;
    border: #ccc solid 1px;
    width: 36px;
    height: 36px;
    border-radius: 50px;
	line-height: 34px;
}
#banner .owl-nav button.owl-prev:focus{outline: none; border:none;}
#banner .owl-nav button.owl-next:focus{outline: none; border:none;}

#banner .owl-nav button.owl-prev i:hover {background: #1c539a; opacity: 1;}
#banner .owl-nav button.owl-next i:hover {background: #1c539a; opacity: 1;}

.bgr_area .bg_contntern .bunn_araeaa a.ex_mroo {
    margin-right: 15px;
    background: #fa757f;
    padding: 10px 30px;
    display: inline-block;
    border-radius: 50px;
    font-size: 14px;
    color: #fff;
    font-weight: 700;
}
.bgr_area .bg_contntern {
    height: 90%;
}


.bgr_area .bg_contntern .bunn_araeaa a.get_st i {
    font-size: 20px;
    position: relative;
    top: 2px;
    left: 10px;
}
.bgr_area .bg_contntern .bunn_araeaa a.ex_mroo i {
    font-size: 20px;
    position: relative;
    top: 2px;
    left: 10px;
}
</style>

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
<section class="shadow">
    <div class="top_menuues">
        <div class="container">
            <div class="top_sec_menu align-to-right">
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
                </div>
                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right">
                        <li>
                            <a href="{{ url('features') }}">Features</a>
                            <ul class="nav-dropdown">
                                <li><a href="javascript:void(0);">Features</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('market-place-list') }}">Market Place</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Market Place Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('resources-tools') }}">Resourses & Tools</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Resourses & Tools Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('company') }}">Company</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">Kowledgebase</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('faq') }}">FAQ's</a>
                            <ul class="nav-dropdown">
                                <li><a href="#">FAQ's Clone</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Price</a>
                        </li>
                        <li class="lgo_space"><a href="{{ url('login') }}" id="activess">Login</a></li>
                        <li class="clr_cngs"><a href="{{ url('registration') }}" id="activess">Register Free</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>
   
   
<section class="bnr_al_bg" style="background: url('home/img/sld_imgss.png') no-repeat; background-size: cover;">

 <div class="container">
  <div class="owl-carousel owl-theme" id="slidersss">
    <div class="item">
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
    </div>
        <div class="item">
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
    </div>
        <div class="item">
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
    </div>
  </div>
 </div>
</section>   
   
<!-- TOP MENU -->
<section>
    <div class="container">
        <div class="als_pg_bntss">
            <div class="tab-wrapper">
                <ul class="tabs">
                    <li class="tab-link active" data-tab="1">Docs</li>
                    <li class="tab-link" data-tab="2">Collaboration</li>
                    <li class="tab-link" data-tab="3">CRM</li>
                    <li class="tab-link" data-tab="4">Projects Tasks</li>
                    <li class="tab-link" data-tab="5">Finance</li>
                    <li class="tab-link" data-tab="6">Invoicing</li>
                    <li class="tab-link" data-tab="7">Client Portal</li>
                    <li class="tab-link" data-tab="8">Mind Maps</li>
                    <li class="tab-link" data-tab="9">Knowledge Base</li>
                </ul>
            </div>

            <div class="content-wrapper">
                <!-- Online CRM -->
                <div id="tab-1" class="tab-content active">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="owl-carousel owl-theme" id="banner">
                                        <div class="item">
                                            <div class="bg_contntern">
                                                <div class="medil_area">
                                                    <h2>Property Management <span>Software</span></h2>
                                                    <p>
                                                        Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                        communicating with your team at once.
                                                    </p>

                                                    <div class="bunn_araeaa">
                                                        <a href="javascript:void(0);" class="get_st">Get Started. It's Free <i class="fa fa-chevron-circle-right"></i></a>
                                                        <a href="javascript:void(0);" class="ex_mroo"><span class="wct">Explore More <i class="fa fa-chevron-circle-right"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg_contntern">
                                                <div class="medil_area">
                                                    <h2>Property Management <span>Software</span></h2>
                                                    <p>
                                                        Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                        communicating with your team at once.
                                                    </p>

                                                    <div class="bunn_araeaa">
                                                        <a href="javascript:void(0);" class="get_st">Get Started. It's Free</a>
                                                        <a href="javascript:void(0);" class="ex_mroo"><span class="wct">Explore More</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="bg_contntern">
                                                <div class="medil_area">
                                                    <h2>Property Management <span>Software</span></h2>
                                                    <p>
                                                        Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                        communicating with your team at once.
                                                    </p>

                                                    <div class="bunn_araeaa">
                                                        <a href="javascript:void(0);" class="get_st">Get Started. It's Free</a>
                                                        <a href="javascript:void(0);" class="ex_mroo"><span class="wct">Explore More</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mg_box_araea">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Online CRM -->

                <!-- Project -->
                <div id="tab-2" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Project</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Project -->

                <!-- Tasks -->
                <div id="tab-3" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Tasks</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tasks -->

                <!-- Finance -->
                <div id="tab-4" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Finance</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Finance -->

                <!-- Invoicing -->
                <div id="tab-5" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Invoicing</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Invoicing -->

                <!-- Knowledge Base -->
                <div id="tab-6" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Knowledge Base</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Knowledge Base -->

                <!-- Agile -->
                <div id="tab-7" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Agile</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Agile -->

                <!-- Collaboration -->
                <div id="tab-8" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Collaboration</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Collaboration -->

                <!-- Client Portal -->
                <div id="tab-9" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Client Portal</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Client Portal -->

                <!-- Mind Maps -->
                <div id="tab-10" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="bg_contntern">
                                        <div class="medil_area">
                                            <h2>Mind Maps</h2>
                                            <p>
                                                Track your project progress, prioritize tasks and build an end-to-end work structure. Easily forecast project revenue, calculate costs and monitor overall project profitability while
                                                communicating with your team at once.
                                            </p>

                                            <div class="bunn_araeaa">
                                                <a href="javascript:void(0);" class="get_st">Get Start</a>
                                                <a href="javascript:void(0);" class="vdooo"><img src="{{ url('home/img/vdo_btn.svg')}}" alt="" /> <span class="wct">Watch Video</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tbal_img_area">
                                        <img src="{{ url('home/img/banner_bg.png')}}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Mind Maps -->
            </div>
        </div>
    </div>
</section>
<!-- END TOP MENU -->


<!-- Video Elements -->
<section class="vedioo">
    <div class="container">
        <h4>Video Elements</h4>
        <div class="video_parts">
            <video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
                <source id="mp4" src="{{ url('home/img/vdiio.mp4')}}" type="video/mp4" />
            </video>
        </div>

        <a href="javascript:void(0);" class="alluser">Get started - it’s free <img src="{{ url('home/img/arrow_right.svg')}}" alt="" /></a>
    </div>
</section>
<!-- End Video Elements -->

<!-- How It works -->
<section class="al_sec_araea how_alls_prgp">
    <div class="container">
        <h4>How It works</h4>
    </div>
    <div class="container bg_mediss how_it_mb">
        <!--- Import dozens of Property data points ---->
        <div class="row">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Import dozens of Property data points.</h5>
                        <p>Quickly search for properties and import their description, list price, value & rent estimates, property taxes, photos and more. Or use our step-by-step wizard to enter the data manually.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="prop_area_dp">
                    <h6>Property Details</h6>
                    <div class="prp_boxxs">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tax Amount</label>
                                        <input type="text" name="" value="$25,000 in 2019" class="form-control" placeholder="" required="" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>List Price</label>
                                        <input type="text" name="" value="$26,000" class="form-control" placeholder="" required="" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <input type="text" name="" value="$2,500,000" class="form-control" placeholder="" required="" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Rent Estimates</label>
                                        <input type="text" name="" value="$10,000" class="form-control" placeholder="" required="" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="prp_tyee">
                        <h5>Property Details</h5>
                        <ul>
                            <li>
                                <div class="prp_boxx"><img src="{{ url('home/img/pro_p_sm.png')}}" alt="" /></div>
                            </li>
                            <li>
                                <div class="prp_boxx"><img src="{{ url('home/img/pro_p_sm1.png')}}" alt="" /></div>
                            </li>
                            <li>
                                <div class="prp_boxx"><img src="{{ url('home/img/pro_p_sm2.png')}}" alt="" /></div>
                            </li>
                            <li>
                                <div class="prp_boxx"><img src="{{ url('home/img/pro_p_sm3.png')}}" alt="" /></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Import dozens of Property data points ---->

        <!--- Customize precise deal parameters ---->
        <div class="row mt_130">
            <div class="col-lg-6">
                <div class="prop_area_dp">
                    <h6>Renatal income</h6>
                    <div class="prp_boxxs">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group marg_ara">
                                        <label>Gross Rent</label>
                                        <input type="text" name="" value="$20,213" class="form-control" placeholder="" required="" />
										<select class="slt_optionss">
										 <option value="1">Per Month</option>
										</select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group marg_ara">
                                        <label>Vacancy</label>
                                        <input type="text" name="" value="5" class="form-control" placeholder="" required="" />
										<span class="parstnt">%</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="prop_area_dp mt-4">
                    <h6>Operating expenses</h6>
                    <div class="prp_boxxs">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group marg_ara">
                                        <label>Itemized Total</label>
                                        <input type="text" name="" value="$20,213" class="form-control" placeholder="" required="" />
										<div class="ediit_bntsss"><i class="fa fa-pencil-square-o"></i> Edit</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Customize precise deal parameters.</h5>
                        <p>Fill in your purchase price, financing, closing costs, rehab budget, rent roll and estimated expenses. Configure dozens of parameters to structure the exact deal you want.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Customize precise deal parameters ---->

        <!--- View detailed financial analysis and projections ---->
        <div class="row mt_150">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>View detailed financial analysis and projections</h5>
                        <p>Instantly view each property’s cash flow, cap rate, ROI, profit from sale, acquisition costs and more. Explore long-term cash flow projections for rentals & BRRRR’s, and profit projections for flips.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="prop_area_dp">
                            <h6>Renatal income</h6>
                            <div class="prp_boxxs">
                                <div class="lst_rent"><span class="lenth_w">Purchase price:</span> <span class="right_t">$ 125,000</span></div>
                                <div class="lst_rent"><span class="lenth_w">Amount financed:</span> - <span class="right_t">$352,000</span></div>
								<div class="brd_linesss">&nbsp;</div>
                                <div class="lst_rent"><span class="lenth_w b">Down payment:</span> = <span class="right_t">$352,000</span></div>
                                <div class="lst_rent"><span class="lenth_w">Purchase costs:</span> + <span class="right_t">$5,200</span></div>
                                <div class="lst_rent"><span class="lenth_w">Rehab costs:</span> + <span class="right_t">$5,050</span></div>
                                <div class="lst_rent"><span class="lenth_w">Rehab costs:</span> + <span class="right_t">$5,050</span></div>
								<div class="brd_linesss">&nbsp;</div>
                                <div class="lst_rent"><span class="lenth_w b">Total cash needed:</span> = <span class="right_t">$52,250</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="chart1" style="width: 100%; height: 270px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Customize precise deal parameters ---->

        <!--- Look up recent sales and rental comps ---->
        <div class="row mt_150">
            <div class="col-lg-6">
                <div class="mapss_boxxs">
                    <div class="mapss_asr">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224357.50124338546!2d77.23701176108413!3d28.52210234792777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5a43173357b%3A0x37ffce30c87cc03f!2sNoida%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1711711255451!5m2!1sen!2sin"
                            style="border: 0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                    <div class="mapsss_araeae">
                        <div class="cnt_mp_text">
                            <div class="lft_tctc">
                                <h5>Average Sale Price</h5>
                                <p>$ 266,232 ($ 223/sq.ft.)</p>
                                <p>$ 211,300 $ 632,700</p>
                                <span>$ 80/sq.ft. - $ 325/sq.ft</span>
                            </div>

                            <div class="lft_tctc">
                                <h5>Zillow" Zestimate</h5>
                                <p>$221,325 ($ 163/sq.ft.)</p>
                                <p>$500,632 - $321,900</p>
                                <span>$200/sq.ft. - $502/sq.ft</span>
                            </div>
                        </div>

                        <div class="mp_ct_tetxtxt">
                            <p>Estimated Value Based on Average Price/Sq.Ft.</p>
                            <p>$254,542</p>
                            <p>Current ARV</p>
                            <span class="bnttst">$303,362</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Look up recent sales and rental comps.</h5>
                        <p>Fill in your purchase price, financing, closing costs, rehab budget, rent roll and estimated expenses. Configure dozens of parameters to structure the exact deal you want.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Look up recent sales and rental comps ---->

        <!--- Calculate your max allowable offers to sellers ---->
        <div class="row mt_150">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Calculate your max allowable offers to sellers.</h5>
                        <p>Use the offer calculator to figure out the highest price you can offer to make each deal work for you. Select from over a dozen criteria based on your unique investment approach.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="prop_area_dp">
                            <h6>Current Price</h6>
                            <div class="prp_boxxs sm_size_bxx">
                                <span class="rpsss">$ 154,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="prop_area_dp">
                            <h6>Highest Offer</h6>
                            <div class="prp_boxxs sm_size_bxx">
                                <span class="rpsss">$ 154,000</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="prop_area_dp">
                            <h6>Investment returns</h6>
                            <div class="prp_boxxs">
                                <div class="py">
                                    <label>
                                        <input type="radio" class="option-input radio" name="example" checked />
                                        Cap Rate (Purchase Price)
                                    </label>
                                    <label>
                                        <div class="cash_on_re">
                                            <input type="radio" class="option-input radio" name="example" />
                                            Cash on cash return
                                            <div class="rio_rightt">
                                                <span>At least</span>
                                                <input type="text" class="form-control" name="" placeholder="" />
                                                <span class="parstnt">%</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Calculate your max allowable offers to sellers ---->

        <!--- Create and share professional property reports. ---->
        <div class="row mt_150">
            <div class="col-lg-6">
                <div class="prop_area_dp">
                    <div class="prp_boxxs bor_none">
                        <div class="left_cntetx">
                            <h4>Classic Apartment</h4>
                            <p>New boston</p>
                            <div class="revisss">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span class="rev_vee">(123 reviews)</span>
                            </div>
                            <div class="icoo_liststs">
                                <ul>
                                    <li><img src="{{ url('home/img/networks.svg')}}" alt="" /> 3</li>
                                    <li><img src="{{ url('home/img/bedss.svg')}}" alt="" /> 1</li>
                                    <li><img src="{{ url('home/img/usersss.svg')}}" alt="" /> 1</li>
                                    <li><img src="{{ url('home/img/bathss.svg')}}" alt="" /> 3</li>
                                </ul>
                            </div>
                            <h3>$5,521,00</h3>
                        </div>

                        <div class="usr_mgss">
                            <div class="usr_pickk"><img src="{{ url('home/img/classic_apartment_sm.png')}}" alt="" /></div>
                        </div>

                        <div class="content_ararar">
                            This luxurious builder floor is strategically located at Boston. The apartment comes with all modern facilities. The house features wooden cabinets & modular fittings in the kitchen. See More
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Create and share professional property reports.</h5>
                        <p>Export each property’s analysis, projections, comps and photos in one complete online or PDF report. Instantly share property reports with lenders, partners or clients.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--- End Create and share professional property reports ---->
    </div>
</section>
<!-- End How It works -->

<!-- See how 1cr app works for your investment. no credit card required -->
<section class="al_sec_araea">
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
<!-- End See how 1cr app works for your investment. no credit card required -->

<!--- Quickly analyze a wide range of real estate investments --->
<section class="al_sec_araea">
    <div class="container">
        <h4>Quickly analyze a wide range of real estate investments:</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="prop_boxx_pt">
                    <div class="medilss">
                        <h2><img src="{{ url('home/img/rentals.png')}}" alt="" /></h2>
                        <h5>Rental properties</h5>
                        <p>Analyze buy & hold and rehab & hold rental properties, including house hacks</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="prop_boxx_pt">
                    <div class="medilss">
                        <h2><img src="{{ url('home/img/vrvo.png')}}" alt="" /></h2>
                        <h5>Airbnb's, VRBO's and Vacation Rentals</h5>
                        <p>Analyze Airbnb's, VRBO'S, vacation, and other short-term rentals</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="prop_boxx_pt">
                    <div class="medilss">
                        <h2><img src="{{ url('home/img/properti.png')}}" alt="" /></h2>
                        <h5>BRRRR Properties</h5>
                        <p>Analyze properties you plan to buy, rehab, rent, refinance and repeat using the BRRRR method.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End Quickly analyze a wide range of real estate investments --->

<!--- Trusted by over 250,000 professionals worldwide --->
<section class="al_sec_araea">
    <div class="container">
        <h4>Trusted by over 250,000 professionals worldwide:</h4>
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
<!--- End Trusted by over 250,000 professionals worldwide --->

<!--- Testimonials --->
<section class="al_sec_araea testy_bx">
    <div class="testi_bgr">
        <h4>What client’s are saying about 1cr app</h4>
        <img src="{{ url('home/img/tst_bgr.png')}}" class="img-full" alt="" />
    </div>
    <div class="al_text_box">
        <div class="container">
            <div class="owl-carousel owl-theme" id="testimonials">
                <div class="item">
                    <div class="it_emms">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Homeowners</h3>
                        <p>“My busy schedule leaves little, if any, time for blogging and social media. The Lorem Ipsum Company has been a huge part of helping me grow my business through organic search and content marketing.”</p>
                        <div class="revisss">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="ustt"><img src="{{ url('home/img/ts_bottomss.png')}}" alt="" /></div>
                    </div>
                </div>

                <div class="item">
                    <div class="it_emms">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Homeowners</h3>
                        <p>“My busy schedule leaves little, if any, time for blogging and social media. The Lorem Ipsum Company has been a huge part of helping me grow my business through organic search and content marketing.”</p>
                        <div class="revisss">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="ustt"><img src="{{ url('home/img/ts_bottomss.png')}}" alt="" /></div>
                    </div>
                </div>

                <div class="item">
                    <div class="it_emms">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Homeowners</h3>
                        <p>“My busy schedule leaves little, if any, time for blogging and social media. The Lorem Ipsum Company has been a huge part of helping me grow my business through organic search and content marketing.”</p>
                        <div class="revisss">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="ustt"><img src="{{ url('home/img/ts_bottomss.png')}}" alt="" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End Testimonials --->

<!-- Forth Box Area -->
<section class="al_sec_araea">
    <div class="container">
        <div class="row">
            <!---- Item Box ---->
            <div class="col-lg-3">
                <div class="securty_box">
                    <img src="{{ url('home/img/secure_icon_ms.png')}}" alt="" />
                    <h3>Secure</h3>
                    <p>All your information is securely stored and encrypted with a TLS protocol.</p>
                </div>
            </div>
            <!---- End Item Box ---->

            <!---- Item Box ---->
            <div class="col-lg-3">
                <div class="securty_box">
                    <img src="{{ url('home/img/secure_icon_ms1.png')}}" alt="" />
                    <h3>Easy-to-use</h3>
                    <p>Explore the seamless onboarding and constantly updating knowledge base</p>
                </div>
            </div>
            <!---- End Item Box ---->

            <!---- Item Box ---->
            <div class="col-lg-3">
                <div class="securty_box">
                    <img src="{{ url('home/img/secure_icon_ms2.png')}}" alt="" />
                    <h3>All-in-one</h3>
                    <p>We have everything you need to plan, manage, and analyze your projects end-to-end.</p>
                </div>
            </div>
            <!---- End Item Box ---->

            <!---- Item Box ---->
            <div class="col-lg-3">
                <div class="securty_box">
                    <img src="{{ url('home/img/secure_icon_ms3.png')}}" alt="" />
                    <h3>Fully Customizable</h3>
                    <p>Customize Flowly to meet exactly your needs</p>
                </div>
            </div>
            <!---- End Item Box ---->
        </div>
    </div>
</section>
<!-- End Forth Box Area -->

<!-- Start your 14-day free trial -->
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
<!-- End Start your 14-day free trial -->

<!--- Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->
<section class="al_sec_araea">
    <div class="container">
        <div class="btm_contect">
            <h4>Ready To Dive In? Book A Demo Or Try It Free For 14 Day</h4>
            <p>Property Deals Insight: Unleash The Power Of Date And Insights To Discover Lucrative Opportunities in The UK Property Market</p>

            <div class="bunnt_araeae_bnt">
                <a href="javascript:void(0);">Talk To An Expert </a>
                <a href="javascript:void(0);">Get Started for Free </a>
            </div>

            <div class="box_parts_areaese more_x">
                <ul>
                    <li>
                        <img src="{{ url('home/img/off-market-deals.png')}}" alt="" />
                        <h6>28M <span class="lst_wordds">+</span></h6>
                        <p>Off market deals</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/motivated-vendors.png')}}" alt="" />
                        <h6>100k <span class="lst_wordds">+</span></h6>
                        <p>Motivated Vendors</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/on-market-deals.png')}}" alt="" />
                        <h6>2m <span class="lst_wordds">+</span></h6>
                        <p>On Market Deals</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/deals-closed.png')}}" alt="" />
                        <h6>1000 <span class="lst_wordds">s</span></h6>
                        <p>Deals Closed</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/ms_deals.png')}}" alt="" />
                        <h6>3k <span class="lst_wordds">+</span></h6>
                        <p>Satisfied clients</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/mg_deals.png')}}" alt="" />
                        <h6>2X</h6>
                        <p>More Leads</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/mode_deals.png')}}" alt="" />
                        <h6>3X</h6>
                        <p>More Instructions</p>
                    </li>
                    <li>
                        <img src="{{ url('home/img/avg_deals.png')}}" alt="" />
                        <h6>5k <span class="lst_wordds">+</span></h6>
                        <p>Avg Fee Saved</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--- End Ready To Dive In? Book A Demo Or Try It Free For 14 Day --->


@include('front.layouts.footer')

