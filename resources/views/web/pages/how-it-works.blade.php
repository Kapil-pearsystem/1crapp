
@include('web.common.header')
 <section class="tital_mg_cntss">
  <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>How It Works</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>How It Works</span>
   </div>
  </div>
</section>

<div id="how_al_pgss">
@include('web.pages.how-it-works-data')

<!-- Video Elements -->
<section class="vedioo">
    <div class="container">
        <h4 class="mb-4">Watch a demo below...</h4>

         <div class="you_tb_arra">
		  <iframe width="100%" height="350" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
	     </div>
    </div>
</section>
<!-- End Video Elements -->

<!--- Get Started. It's Free ---->
<section class="get_nd_blogss mt-0 mb-5">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>
<!--- End Get Started. It's Free ---->


<!-- Trusted by over 350,000 professionals worldwide -->
<section class="al_sec_araea str_14">
    <div class="container">
	   <h4>Trusted by over 350,000 professionals worldwide:</h4>
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

<!---- Mobile office in your pocket ---->
<section class="mobile_qr_scnn mr_top_50">
    <div class="container mb_qr_essge">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mq_titles">
                        <div class="medills">
                            <h3>Mobile office in your pocket</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>

                            <div class="qr_pay_boxx">
                                <img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" />
                                <img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
				 <div class="mb_mbl_qr">
				  <img src="{{ url('home/img/mb_qr_web.png')}}" alt="" />
				 </div>
				</div>
            </div>
    </div>
</section>
<!---- End Mobile office in your pocket ---->


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

</div>

@include('front.layouts.footer')

