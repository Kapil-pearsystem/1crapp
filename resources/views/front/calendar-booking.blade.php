@php
use App\Models\OurClientsModel;
$clients = OurClientsModel::where(['status'=> 1,'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(12)->get();
@endphp
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Calendar Booking</title>
  <link rel="shortcut icon" type="image/jpg" href="https://admin.1crapp.com/images/icon.png"/>
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
 .shadow.othr_pgss_lde .top_menuues {margin: 0; padding: 5px 0; background: #000;}
 .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {margin: 0 0 0px; padding: 5px 0; float: right;}
 .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {padding: 14px 10px; display: inline-block;}
 .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {padding: 15px 10px;}
 .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {background: #ff0000; padding: 8px 20px; display: inline-block; border-radius: 100px; font-weight: 700; position: relative; top: 6px;}
.you_tb_arra iframe {
    border-radius: 10px;
}
.new_ar_tring {text-align: center; display: inline-block; width: 100%;}
.new_ar_tring h2 {font-size: 24px; margin: 0 0 14px; font-weight: 600;}
.new_ar_tring h2.bnt_rundds {background:#f5cb8d; padding:12px 25px; color:#000000; font-size:17px; font-weight:300; border-radius:10px; display:inline-block;}
.new_ar_tring h3 {margin: 25px 0 25px; font-size: 34px; font-weight: 700;}
.new_ar_tring p {font-size: 18px; font-weight: 600; max-width: 700px; margin: 0 auto; width: 100%;}
.v_part_liststs {display: inline-block; width: 100%;}
.v_part_liststs ul {list-style: none; padding: 0; margin: 0;}
.v_part_liststs ul li {margin-bottom: 15px; font-weight: 300; font-size: 15px; color: #000;}
.v_part_liststs ul li i {color: #87c50e; font-size: 18px; -webkit-text-stroke: 1px #ffffff;}
.v_part_liststs ul li strong {font-weight: 600;}
.v_part_liststs .bk_pert_sh {margin-top: 30px; padding: 15px; background: #fff; border: #f5bcbc dashed 1px; border-radius: 10px;}
.v_part_liststs .bk_pert_sh p {text-align: center; color: #000; margin: 0 0 20px; font-size: 14px;}
.v_part_liststs .bk_pert_sh a {background: #ff0000; display: block; text-align: center; color: #fff; padding:15px 10px; border-radius: 5px;}
.v_part_liststs .bk_pert_sh a h5 {margin: 0px 0 5px; font-size: 18px; font-weight: 700;}
.v_part_liststs .bk_pert_sh a span {font-size: 12px;}
.v_part_liststs .tx_v_ars {margin-top: 15px; text-align: center; font-size: 15px; font-weight: 600;}
.v_part_liststs.opt_in_pg {
    background: #ffffff;
    padding: 30px 15px;
    border: #e18181 dashed 2px;
    border-radius: 10px;
    max-width: 750px;
    margin: 0 auto;
    display: block;
    margin-bottom: 30px;
}
.v_part_liststs.opt_in_pg .bk_pert_sh {
    padding: 0;
    border: none;
    max-width: 600px;
    margin: 0 auto;
	width:100%;
	background:#fff;
}
.v_part_liststs.opt_in_pg .bk_pert_sh p {
    font-size: 14px;
    display: inline-block;
    width: 100%;
	color: #000;
}
.v_part_liststs.opt_in_pg .bk_pert_sh p img.fr_iconss {
    margin-right: 5px;
    float: left;
    width: 7%;
	    filter: brightness(0) invert(0);
}
.v_part_liststs.opt_in_pg .bk_pert_sh p span.sup_al_cntx {
    font-size: 15px;
	text
}
.v_part_liststs.opt_in_pg .bk_pert_sh p span.sup_al_cntx strong {
    font-size: 18px;
    text-decoration: underline;
    margin-right: 5px;
}
.v_part_liststs.opt_in_pg .tx_v_ars {
    color: #000;
    font-weight: 400;
	max-width: 600px;
    margin: 0 auto;
    margin-top: 20px;
}
.what_tst .qu_bx_partss {background: #f9f9f9; padding: 0px 30px 30px; position: relative;}
.what_tst #testimonials .owl-nav.disabled button.owl-prev {position: absolute; left: -30px; margin: 0;}
.what_tst #testimonials .owl-nav.disabled button.owl-prev i {font-size: 35px; -webkit-text-stroke: 3px #f9f9f9;}
.what_tst #testimonials .owl-nav.disabled button.owl-next {position: absolute; right: 30px; margin: 0;}
.what_tst #testimonials .owl-nav.disabled button.owl-next i {font-size: 35px; -webkit-text-stroke: 3px #f9f9f9;}
.ftr_new_other{background: #000;}
.ftr_new_other {margin-top: 50px;}
.ftr_new_other .ftr_content {background: #000; padding: 20px; text-align: center;}
.ftr_new_other .ftr_content .lgo {margin-bottom: 25px;}
.ftr_new_other .ftr_content .lgo a {display: inline-block;}
.ftr_new_other .ftr_content .menu_ftrr {margin-bottom: 25px;}
.ftr_new_other .ftr_content .menu_ftrr a {color: #fff; margin-right: 20px;}
.ftr_new_other .ftr_content .menu_ftrr a:last-child {margin-right: 0px;}
.ftr_new_other .ftr_content .crt_arar {color: #fff; margin-top: 20px; display: inline-block; font-size: 15px;}
.ftr_new_other .ftr_content .crt_arar img.logo{margin-right:15px;}
.mdl_mg_arar img {width: 100%; height: 100%; object-fit: contain;}
.mdl_mg_arar {width: 100%; height: 378px; overflow: hidden;  border-radius: 5px;}
#sub_m_al_frms .modal-content.othr_ledss .modal-header {
    background: #fff;
    border: none;
}
#sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
    color: #ff0000;
}
#sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
    color: #ff0000;
    text-align: center;
    font-size: 22px;
    text-transform: capitalize;
}
#sub_m_al_frms .modal-content.othr_ledss .modal-body{
   padding-top:0;
}
#sub_m_al_frms .modal-content.othr_ledss .modal-body p {
    text-align: center;
    font-size: 15px;
    margin-bottom: 15px;
}
.arow_downss {
    text-align: center;
    margin-top:20px;
    display: inline-block;
    width: 100%;
}
.arow_downss span.ar_bntss {
    background: #1c539a;
    width: 40px;
    display: inline-block;
    height: 40px;
    color: #fff;
    line-height: 40px;
    margin-right: 5px;
}
.arow_downss span.ar_bntss:last-child{margin-right:0;}
.arow_downss span.ar_bntss i {
    position: relative;
    top: 11px;
}
#countdown {
    display: inline-block;
    margin: 40px 0 0;
    width: 100%;
}
#countdown ul {
list-style: none;
    margin: 0 auto;
    display: table;
    max-width: 450px;
    width: 100%;
}
#countdown ul li {
margin-right: 10px;
    float: left;
    background: #ff0000;
    padding: 20px 20px;
    width: 23.3%;
    border-radius: 10px;
    color: #fff;
    font-weight: 700;
    text-align: center;
    font-size: 13px;
}
#countdown ul li span {
    display: block;
    font-size: 18px;
    font-weight: 800;
}
#countdown ul li:last-child {
    margin: 0;
}
.st_p_cntss {
    background: #000;
    color: #fff;
    padding: 20px;
    display: inline-block;
    width: 100%;
    margin-top: 20px;
    border-radius: 10px;
	text-align:center;
}
.st_p_cntss h3 {
    margin: 0 0 5px;
    font-size: 22px;
    font-weight: 700;
}
.st_p_cntss p {
    margin: 0;
    font-size: 18px;
}
.part_widthss {
    padding: 25px 25px;
    border: #e18181 dashed 2px;
    border-radius: 10px;
    display:inline-block;
    margin-top: 30px;
}
.st_parts_als {
    display: inline-block;
    width: 100%;
}
.st_parts_als .hid_ar_partss {
    padding: 20px;
	border: #000 dashed 2px;
}
.st_parts_als .hid_ar_partss h2 {
    font-size: 25px;
    text-align: center;
    margin: 0;
    font-weight: 700;
}
.st_parts_als .tital_main {
    padding: 15px;
    border: #1e1e1e dashed 1px;
}
.st_parts_als .tital_main .un_boxx {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
}
.st_parts_als .tital_main .un_boxx:last-child{margin-bottom:0;}
.st_parts_als .tital_main .un_boxx h3 {
    border: #ccc solid 1px;
    padding:7px;
	text-align:center;
	margin:0px;
	font-weight:600;
	font-size:19px;
}
.st_parts_als .tital_main .un_boxx h4 {
    margin: 0 0 15px;
    font-size: 18px;
    line-height: 24px;
}
.st_parts_als .tital_main .un_boxx ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.st_parts_als .tital_main .un_boxx ul li {
    float: left;
    width: 100%;
    font-size: 16px;
    margin-bottom: 12px;
}
.st_parts_als .tital_main .un_boxx ul li i {
    color: #95c917;
    font-size:25px;
    position: relative;
    top: 4px;
    margin-right: 3px;
}
.bg_crl_sky {
    background: #a8cfff;
}
.br_radius_10{border-radius:10px;}
@media (min-width: 481px) and (max-width: 767px) {
.what_tst .qu_bx_partss {padding: 10px 10px 10px !important;}
#testimonials .owl-nav button.owl-next {right: 5px;}
.mdl_mg_arar{display:none;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {padding: 0px 0 5px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {margin-right: 7px !important;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {margin-right:0px !important;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {padding: 14px 5px; font-size: 12px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {padding: 15px 5px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {padding: 15px 5px; font-size: 12px;}
.shadow.othr_pgss_lde#myHeader .othr_logges img.logo {height: 30px; position: relative; top: 12px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {padding: 5px 8px; top: 8px;}
.v_part_liststs .bk_pert_sh a h5 {font-size: 16px;}
.new_ar_tring.mt_50p {margin-top: 25px;}
.new_ar_tring h2 {font-size: 18px; margin: 0 0 10px; line-height: 24px;}
.new_ar_tring h3 {margin: 15px 0 15px; font-size: 24px; font-weight: 700;}
.new_ar_tring p {font-size: 15px;}
.v_part_liststs {margin-top: 20px;}
.ftr_new_other .ftr_content .menu_ftrr a {margin-right: 10px; font-size: 13px;}
.ftr_new_other .ftr_content .crt_arar {font-size: 13px;}
.ftr_new_other .ftr_content .crt_arar img.logo {margin-right: 0; margin: 0 auto; display: block; margin-bottom: 10px;}
.part_widthss {padding: 15px 15px;}
.st_parts_als .hid_ar_partss {padding: 15px; border: #000 dashed 1px;}
.st_parts_als .tital_main {padding: 15px 0 0; border: none;}
.st_parts_als .hid_ar_partss h2 {font-size: 20px;}
}
@media (min-width: 320px) and (max-width: 480px) {
.what_tst .qu_bx_partss {padding: 10px 10px 10px !important;}
#testimonials .owl-nav button.owl-next {right: 5px;}
.mdl_mg_arar{display:none;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {padding: 0px 0 5px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {margin-right: 3px !important;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {margin-right:0px !important;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {padding: 14px 5px; font-size: 12px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {padding: 15px 5px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {padding: 15px 5px; font-size: 12px;}
.shadow.othr_pgss_lde#myHeader .othr_logges img.logo {height: 30px; position: relative; top: 12px;}
.shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {padding: 5px 8px; top: 8px;}
.v_part_liststs .bk_pert_sh a h5 {font-size: 16px;}
.new_ar_tring.mt_50p {margin-top: 25px;}
.new_ar_tring h2 {font-size: 18px; margin: 0 0 10px; line-height: 24px;}
.new_ar_tring h3 {margin: 15px 0 15px; font-size: 24px; font-weight: 700;}
.new_ar_tring p {font-size: 15px;}
.v_part_liststs {margin-top: 20px;}
.ftr_new_other .ftr_content .menu_ftrr a {margin-right: 10px; font-size: 13px;}
.ftr_new_other .ftr_content .crt_arar {font-size: 13px;}
.ftr_new_other .ftr_content .crt_arar img.logo {margin-right: 0; margin: 0 auto; display: block; margin-bottom: 10px;}
.n_thiks a {padding: 10px; font-size: 14px;}
.new_ar_tring h2.bnt_rundds {font-size: 14px;}
.v_part_liststs.opt_in_pg {margin-top: 0;}
.yr_awer_pro .new_ar_tring h3 {font-size: 22px;}
.new_ar_tring .pert_listst ul li {width: 100%;}
#countdown ul li {margin-right: 7px; padding: 15px 5px;}
.part_widthss {padding: 15px 15px;}
.st_parts_als .hid_ar_partss {padding: 15px; border: #000 dashed 1px;}
.st_parts_als .tital_main {padding: 15px 0 0; border: none;}
.st_parts_als .hid_ar_partss h2 {font-size: 20px;}
}
</style>
<body>
<!--- Header Part ---->
<section class="shadow othr_pgss_lde" id="myHeader">
    <div class="top_menuues">
        <div class="container">
		  <div class="row">
		   <div class="col-lg-2 col-2">
		    <div class="othr_logges">
			 <a class="nav-brand" href="javascript:void(0);"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
			</div>
		   </div>
		   <div class="col-lg-10 col-10">
		    <div class="top_sec_menu cnt_parts">
                <ul>
				    <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                    <li class="callss"><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                    <li><a href="javascript:void(0);" class="gt_it_nnw">Get it now</a></li>
                </ul>
            </div>
		   </div>
		  </div>
        </div>
    </div>
</section>
<!---- End Header Part ---->     
<!--- New On-Demand Training ---->
    <div class="container">		      
		 <div class="new_ar_tring mt_50p">
            <h2 class="bnt_rundds">{!! $booking->title !!}</h2>
			<h3>{!! $booking->subtitle !!}</h3>
         </div>
	</div>	
<!--- End New On-Demand Training ---->	
<!---- Special Deal ----->
<div class="container mt-4">
    <div class="row mt-4">
		<div class="col-lg-12">
         <div class="v_part_liststs opt_in_pg">		  
		  <div class="bk_pert_sh">
              <div class="row">
                <p>
                    <div class="col-3"><img class="fr_iconss" src="{{ url('home/img/fire_hot_icon.png')}}" alt="" style="background-color:black;"/></div>
                    <div class="col-9"><span class="sup_al_cntx">{!! $booking->sort_description !!}</span></div>
                </p>
            </div>
		    		   
		    
		  </div>
		</div>
    </div>
  </div>
</div>
<!---- End Special Deal ----->
<!---- Step ----->
<div class="container">	
 <div class="st_p_cntss">	
  <h3>STEP 1:</h3><p>{!! $booking->step_title !!}</p>
 </div>
 <div class="part_widthss">
  <div class="row">
      <div class="col-lg-6">
	<div class="st_parts_als">
		<div class="hid_ar_partss">
			<h2>{!! $booking->left_title1 !!}</h2>
			<div class="arow_downss">
				&nbsp;</div>
		</div>
		<div class="tital_main">
			<div class="un_boxx">
				{!! $booking->left_description1 !!}
			</div>
			<div class="un_boxx">
				<h3>{!! $booking->left_title2 !!}</h3>
				<div class="arow_downss mb-5">
					&nbsp;</div>
				{!! $booking->left_description2 !!}
			</div>
			<div class="un_boxx">
				<h3>{!! $booking->left_title3 !!}</h3>
				<div class="arow_downss mb-5">&nbsp;</div>
				{!! $booking->left_description3 !!}
			</div>
		</div>
	</div>
</div>
      <div class="col-lg-6">
	<div class="st_parts_als">
		<div class="hid_ar_partss">
			<h2 class="red_tx">{!! $booking->embed_title !!}</h2>
			<div class="arow_downss">
				&nbsp;</div>
		</div>
		<div class="tital_main">
			<div class="un_boxx">
            <iframe class="tidycal-embed" id="tidycal-embed-43u7b" scrolling="no" src="{!! $booking->embed_code !!}" style="border: medium; width: 1px; min-width: 100%; height: 1047px; overflow: hidden; min-height: 500px;" title="TidyCal"></iframe></div>
             <!-- <pre></pre> -->
		</div>
	</div>
</div>
     </div>
 </div>
</div>
<!---- End Step ----->
@if($booking->test_visible)
<!--- Testimonial --->
<section class="what_tst mt_50p">
    <div class="container">
        <div class="new_ar_tring bg_crl_sky br_radius_10">
            @if($booking->test_title_visible)
            <h3>{!! $booking->testimonial_title !!}</h3>
			@endif
        </div>
		<div class="arow_downss mb-5">
            <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
            <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
            <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
        </div>
        <div class="owl-carousel owl-theme qu_bx_partss pt_top_40" id="testimonials">
    @foreach($clients as $testimonial)
        <div class="item">
            <div class="it_emms">
                <div class="usr_mgss">
                    <img src="{{ ASSETS_PATH.$testimonial->image }}" alt="" />
                </div>
                <h3>{{ $testimonial->name }}</h3>
                <p>{{ $testimonial->about }}</p>
                <div class="revisss">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <i class="fa fa-star"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    @endforeach
</div>
</section>
@endif
<!--- End Testimonial --->
<section class="ftr_new_other">
 <div class="container">
  <div class="ftr_content">
   <div class="lgo">
    <a href="javascript:void(0);"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
   </div>
   <div class="menu_ftrr">
    <a href="javascript:void(0);">Blog</a>
    <a href="javascript:void(0);">DMCA Policy</a>
    <a href="javascript:void(0);">Earnings Disclaimer</a>
    <a href="javascript:void(0);">Privacy Policy</a>
    <a href="javascript:void(0);">Terms & Conditions</a>
   </div>
   <div class="crt_arar mt-0 mb-4">
    Copyright 2024 @ 1crapp.com, G-10, Green View, Jaipur, Rajasthan. India 301725
   </div>
   <div class="crt_arar">
    <img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /> Create your lead mannet and capture the leads easily with 1CR APP
   </div>
  </div>
 </div>
</section>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<!--  -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script> 
<script src="{{ url('home/js/menu_js.js')}}"></script>
<script src="{{ url('home/js/responsive.js')}}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js'></script>	
<script src="https://asset-F.b-cdn.net/js/embed.js" async></script>
<script>
(function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;
  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "09/30/",
      birthday = dayMonth + yyyy;
  today = mm + "/" + dd + "/" + yyyy;
  if (today > birthday) {
    birthday = dayMonth + nextYear;
  }
  //end
  const countDown = new Date(birthday).getTime(),
      x = setInterval(function() {    
        const now = new Date().getTime(),
              distance = countDown - now;
        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "It's my birthday!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
</script>
<script>
var owl = $('#testimonials');
              owl.owlCarousel({
                margin: 30,
				loop: true,
                dots:false,
                nav:true,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: false,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items:3
                  },
                  1200: {
                    items:3
                  }
                }
  });
</script>
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