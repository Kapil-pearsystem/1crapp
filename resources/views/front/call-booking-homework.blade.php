
@php
use App\Models\BookingEventModel;
$steps = BookingEventModel::where('status', 1)->where('step', 2)->first();
@endphp
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Call Booking Homework</title>
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

.you_tb_arra iframe {
    border-radius: 10px;
}


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

.st_p_cntss.call_bk {
    max-width: 900px;
    width: 100%;
    margin: 0 auto;
    display: block;
}

.v_part_liststs.opt_in_pg.call_bk{padding:20px; margin-top:30px; max-width: 900px; width: 100%;}


.new_ar_tring.call_bk {
    max-width: 900px;
    margin: 0 auto;
    display: block;
    width: 100%;
}
.new_ar_tring.call_bk h3 {
    margin-bottom: 10px;
}



.new_ar_tring h3 label.custom-checkbox input[type="checkbox"] {
    zoom: 1;
    width: 30px;
    height: 30px;
    cursor: pointer;
    position: relative;
    top: 3px;
    margin-right: 4px;
}

.new_ar_tring .progress-container {
  box-shadow: 0 4px 5px rgb(0, 0, 0, 0.1)
}

.new_ar_tring .progress-container, .new_ar_tring .progress {
    background-color: #eee;
    border-radius: 5px;
    position: relative;
    height: 18px;
    width: 300px;
    margin: 0 auto;
    margin-top: 10px;
    margin-bottom: 40px;
}

.new_ar_tring .progress {
  background-color:#5cb039;
  width: 0;
  transition: width 0.4s linear;
  margin:0;
}

.new_ar_tring .percentage {
  background-color: #5cb039;
  border-radius: 5px;
  box-shadow: 0 4px 5px rgb(0, 0, 0, 0.2);
  color: #fff;
  font-size: 12px;
  padding: 4px;
  position: absolute;
  top: 28px;
  left: 0;
  transform: translateX(-50%);
  width: 40px;
  text-align: center;
  transition: left 0.4s linear;
}

.new_ar_tring .percentage::after {
  background-color: #5cb039;
  content: '';
  position: absolute;
  top: -5px;
  left: 50%;
  transform: translateX(-50%) rotate(45deg);
  height: 10px;
  width: 10px;
  z-index: -1;
}

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

.n_thiks a {padding: 10px; font-size: 14px;}
.new_ar_tring h2.bnt_rundds {font-size: 14px;}
.v_part_liststs.opt_in_pg {margin-top: 0;}
.yr_awer_pro .new_ar_tring h3 {font-size: 22px;}
.new_ar_tring .pert_listst ul li {width: 100%;}
#countdown ul li {margin-right: 7px; padding: 15px 5px;}

.iv-player_responsive_padding {padding: 150% 0 0 0 !important;}

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
.new_ar_tring h3 label.custom-checkbox input[type="checkbox"] {top: 8px;}

.new_ar_tring h3 {margin: 15px 0 15px; font-size: 20px; font-weight: 700;}
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

.iv-player_responsive_padding {padding: 250% 0 0 0 !important;}

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


<!--- YOUR CALL IS RESERVED! ---->
<div class="container">
    <div class="new_ar_tring mt_50p">
        <h2>Step 1 Is Complete!
		<div class="progress-container" data-percentage='50'>
		  <div class="progress"></div>
		  <div class="percentage">0%</div>
		</div>
		
		</h2>
        <h3>
		 <label class="custom-checkbox">
		  <input type="checkbox" value="checkbox1" checked="checked"> {!! $homework->title !!}</label>
		</h3>
    </div>
</div>
<!--- End YOUR CALL IS RESERVED! ---->	

<!---- Step ----->
<div class="container">	
 <div class="st_p_cntss call_bk">	
  <h3>STEP 2:</h3><p> {!! $homework->sub_title !!}</p>
 </div>
</div>
<!---- End Step ----->

<!---- Special Deal ----->
<div class="container mt-4">
    <div class="v_part_liststs opt_in_pg call_bk">
       <div class="you_tb_arra">
            @php
                $type = $homework->media_type;
                $url  = $homework->media_path;
                $ext  = strtolower(pathinfo($url, PATHINFO_EXTENSION));
            @endphp
            {{-- 🔥 EMBED (YouTube / iframe) --}}
            @if($type == 'embed_code')
                <iframe
                    width="100%"
                    height="400"
                    src="{{ $url }}"
                    frameborder="0"
                    allowfullscreen
                ></iframe>

            {{-- 🎥 VIDEO --}}
            @elseif($type == 'video' || in_array($ext, ['mp4','webm','ogg']))
                <video width="100%" height="400" controls controlsList="nodownload" oncontextmenu="return false;">
                    <source src="{{ $url }}" type="video/{{ $ext }}">
                    Your browser does not support video.
                </video>

            {{-- 🎧 AUDIO --}}
            @elseif($type == 'audio' || in_array($ext, ['mp3','wav','ogg']))
                <audio controls style="width:100%;">
                    <source src="{{ $url }}" type="audio/{{ $ext }}">
                    Your browser does not support audio.
                </audio>

            {{-- 🖼 IMAGE --}}
            @elseif(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                <img src="{{ $url }}" alt="image" class="w-full rounded-lg" />

            {{-- 📄 PDF --}}
            @elseif($ext == 'pdf')
                <iframe 
                    src="{{ $url }}#toolbar=0" 
                    width="100%" 
                    height="500px" 
                    style="border:none;">
                </iframe>

            {{-- 📁 DOC / DOCX / XLS / PPT --}}
            @elseif(in_array($ext, ['doc','docx','xls','xlsx','ppt','pptx']))
                <iframe 
                    src="https://docs.google.com/gview?url={{ urlencode($url) }}&embedded=true" 
                    width="100%" 
                    height="500px">
                </iframe>

            {{-- 📦 DEFAULT DOWNLOAD --}}
            @else
                <a href="{{ $url }}" target="_blank"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Download File
                </a>
            @endif
        </div>
    </div>
</div>
<!---- End Special Deal ----->

<!--- YOUR CALL IS RESERVED! ---->
<div class="container">
    <div class="new_ar_tring mt_50 call_bk">
        <h3>{!! $homework->sort_description !!}</h3>
    </div>
	
	<div class="arow_downss">
     <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
     <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
     <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
    </div>
    <div class="new_ar_tring mt_50 call_bk mt-4" style="border: #e18181 dashed 2px;">
        @if($homework->ec_visible)
        {!! $homework->embed_code !!}
        @endif
        @if($homework->fd_visible)
            <div class="arow_downss">
                <a class="btn btn-info mx-auto text-center" href="{{ $homework->file_path }}" download> Download {{ $homework->file_name }} Now</a>
            </div>
        @endif
        @if($homework->form_visible)
            {!! $form_data??'' !!}
        @endif
    </div>
</div>
<!--- End YOUR CALL IS RESERVED! ---->	

 
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


<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script> 
<script src="{{ url('home/js/menu_js.js')}}"></script>
<script src="{{ url('home/js/responsive.js')}}"></script>
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js'></script>	

<script src="https://asset-tidycal.b-cdn.net/js/embed.js" async></script>
<script src="https://www.chatsurvey.io/embed/1crapp" async></script>


<script>
    const progressContainer = document.querySelector('.progress-container');
    // initial call
    setPercentage();
    function setPercentage() {
        const percentage = progressContainer.getAttribute('data-percentage') + '%';
        const progressEl = progressContainer.querySelector('.progress');
        const percentageEl = progressContainer.querySelector('.percentage');
        progressEl.style.width = percentage;
        percentageEl.innerText = percentage;
        percentageEl.style.left = percentage;
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const redirect_path = "{{ url('appointments/thankyou') }}/{{ $homework->thankyou_path }}";
        const form = document.getElementById('leadForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(form);
            fetch("{{ url('/admin/api/save-leads') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(async response => {
                let data = await response.json();
                if (!response.ok) {
                    throw data;
                }
                return data;
            })
            .then(data => {
                if (data.status) {
                    alert(data.msg || "Lead submitted successfully!");
                    form.reset();
                    // ✅ redirect if needed
                    if (redirect_path) {
                        window.location.href = redirect_path;
                    }
                } else {
                    alert(data.msg || "Something went wrong");
                }
            })
            .catch(error => {
                console.error(error);
                // ✅ Validation errors (Laravel 422)
                if (error.errors) {
                    let messages = Object.values(error.errors).flat().join("\n");
                    alert(messages);
                } else {
                    alert(error.msg || "Server Error");
                }
            });
        });
    });
</script>