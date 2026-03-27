
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Meet The Team</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
  <link rel='stylesheet' href="{{ url('home/css/intlTelInput.css')}}">
</head>

<!-- Chat Part Modal -->
<div class="modal fade" id="chat_mesages" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
              <iframe src="https://chat.digitalramjee.com/chatbot-iframe/9baff73a5f33415196c1680a465c56c5" id="chatbot-iframe" style="border: 1px solid #e5e7eb" width="470px" height="600px"  frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- End Chat Part Modal -->

<style>
.business_card_items{margin:30px 0 0;}


.business_card_items .businnes_main.busness_new {
    padding: 0;
    border: none;
    max-width: 500px;
    margin: 0 auto;
    display: block;
}

.businnes_main .bus_part_lk {
    position: relative;
}
.businnes_main .bus_part_lk .shr_links_parts.click-parts {
    position: absolute;
    right: 25px;
    z-index: 1;
    top: 7px;
    color: #fff;
    background: #2196F3;
    padding: 3px 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

.show_parts_arar {
    display: none;
    position: absolute;
    top: 34px;
    right: 25px;
    background: #ffffff;
    width: 100%;
    max-width: 320px;
    height: auto;
    text-align: center;
    box-sizing: border-box;
    box-shadow: 0 0 20px rgba(0, 0, 0, .2);
    z-index: 9;
    padding: 10px 10px 25px;
}
.show_parts_arar.active#sld_ara_partss h4 {
    padding: 3px 0 8px;
    margin: 0 0 15px;
    font-size: 17px;
}
.show_parts_arar.active#sld_ara_partss .social_iconsss {
    display: inline-block;
    width: 100%;
	margin-bottom:15px;
}
.show_parts_arar.active#sld_ara_partss .social_iconsss ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.show_parts_arar.active#sld_ara_partss .social_iconsss ul li {
    float: left;
    margin-right:5.5%;
}

.show_parts_arar.active#sld_ara_partss .social_iconsss ul li a {
    display: inline-block;
    padding: 4px 10px;
    border: #b8c8dd solid 1px;
    border-radius: 3px;
}

.show_parts_arar.active#sld_ara_partss .qr_images {
    display: inline-block;
    width: 100%;
}

.show_parts_arar.active#sld_ara_partss .social_iconsss ul li:last-child{margin-right:0;}

.show_parts_arar.active#sld_ara_partss .qr_images {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
}
.show_parts_arar.active#sld_ara_partss .qr_images .qr_mg_area {
    max-width: 130px;
    height: 130px;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
	overflow: hidden;
}

.show_parts_arar.active#sld_ara_partss .qr_images .qr_mg_area img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0) invert(0);
}

.show_parts_arar.active#sld_ara_partss .qr_images .dwn_led a {
    background: #1c5298;
    padding: 8px 20px;
    display: inline-block;
    color: #fff;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
}
.show_parts_arar.active#sld_ara_partss .url_cpyss {
    display: flex;
    width: 100%;
}
.show_parts_arar.active#sld_ara_partss .url_cpyss input {
    width: 88%;
    border: #ccc solid 1px;
    font-size: 14px;
    padding: 6px;
}
.show_parts_arar.active#sld_ara_partss .url_cpyss button {
    background: #1c5298;
    width: 12%;
    color: #fff;
    border: gainsboro;
}
.show_parts_arar.active#sld_ara_partss .url_cpyss input:focus{outline:none;}
.show_parts_arar.active#sld_ara_partss .url_cpyss button:focus{outline:none;}

.show_parts_arar.active{display: block;}



.business_card_items .businnes_main {
    display: inline-block;
    width: 100%;
    border: #e7e7e7 solid 1px;
    border-radius: 7px;
}
.business_card_items .businnes_main h4 {
    padding: 13px 13px;
    border-bottom: #e7e7e7 solid 1px;
    margin: 0 0 10px;
    font-size: 18px;
    font-weight: 600;
}
.business_card_items .businnes_main .content_arara {
    padding: 5px 15px 15px;
}
.business_card_items .businnes_main .content_arara  .mettre {
    background: #bcd7f3;
    padding: 15px;
    border-radius: 7px;
    font-size: 15px;
    display: inline-block;
    width: 100%;
    position: relative;
	margin-bottom:15px;
	line-height: 34px;
}
.business_card_items .businnes_main .content_arara .mettre a {
    margin-left: 5px;
    color: #3F51B5;
    font-weight: 600;
    text-decoration: underline;
}
.business_card_items .businnes_main .content_arara .mettre span.copy_urlss {
    float: right;
    background: #1c5299;
    padding: 7px 10px;
    border-radius: 7px;
    font-size: 14px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
	line-height: 22px;
}

.business_card_items .businnes_main .content_arara .form-group {
    margin-bottom: 20px;
}

.business_card_items .businnes_main .content_arara .form-group span.titalss_name {
    font-size: 14px;
    font-weight: 600;
    text-align: right;
    display: block;
	line-height: 36px;
}

.business_card_items .businnes_main .content_arara .form-group .form-control {
    padding: 10px;
    height: 38px;
    font-size: 14px;
}
.business_card_items .businnes_main .content_arara .form-group select.form-control {
    padding: 0 7px;
    color: #999;
}

.business_card_items .businnes_main .content_arara .form-group textarea.form-control {
    padding: 10px;
    font-size: 14px;
	    height: auto;
}

.business_card_items .businnes_main .content_arara .form-group .ck_list_tik {
    display: inline-block;
    width: 100%;
}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p {
    margin-bottom: 15px;
}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p:last-child {
    margin-bottom: 0px;
}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p input {
    width: 20px;
    height: 20px;
}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p label {
    font-weight: 500;
    margin: 0;
    position: relative;
    top: -4px;
    left: 3px;
    font-size: 15px;
}

.business_card_items .businnes_main .content_arara .form-group .sub_miitss {
    display: inline-block;
    width: 100%;
    margin-top: 10px;
}
.business_card_items .businnes_main .content_arara .form-group .sub_miitss button {
    background:#1c5299;
    width: 100%;
    border: none;
    padding: 10px 0;
    color: #fff;
    font-weight: 600;
    border-radius: 5px;
}
.business_card_items .businnes_main .content_arara .form-group .sub_miitss button:focus {
    outline: none;
}

.business_card_items .businnes_main .content_arara .form-group [type="file"] {
  color: #333;
}
.business_card_items .businnes_main .content_arara .form-group [type="file"]::-webkit-file-upload-button {
  background: #fff;
  border: 1px solid #333;
  border-radius: 4px;
  color: #333;
  cursor: pointer;
  font-size: 12px;
  outline: none;
  padding: 10px 25px;
  text-transform: uppercase;
  transition: all 1s ease;
}

.business_card_items .businnes_main .content_arara .form-group [type="file"]::-webkit-file-upload-button:hover {
  background: #f1f1f1;
  border: 1px solid #ccc;
  color: #000;
}

.businnes_main .user_proff .user_list ul li span.cntents a.al_linkss:hover {
    background: transparent;
    text-decoration: underline;
	color:#333;
}
.businnes_main .user_proff .user_list ul li span.cntents a.al_linkss {
    border: none;
    padding: 0;
    font-size: 17px;
    font-weight: 600;
    color: #333;
    display: block;
    margin-bottom: 0px;
    position: relative;
    top: 0;
}


.businnes_main .user_proff {
    background:#ebf6fb;
    padding: 20px;
    border-radius: 10px;
	    overflow: hidden;
    position: relative;
}
.businnes_main .user_proff:before {
    background:#1c5299;
    width: 100%;
    height: 230px;
    position: absolute;
    content: '';
    left: 0;
    top: -110px;
    border-radius: 0px 0px 160px 160px;
}


.businnes_main .user_proff .user_pickks {
    text-align: center;
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
	position: relative;
}
.businnes_main .user_proff .user_pickks .pic_araea {
    width: 150px;
    height: 150px;
    overflow: hidden;
    margin: 0 auto;
    border-radius: 100px;
    border: #fff solid 2px;
    margin-bottom: 20px;
}
.businnes_main .user_proff .user_pickks .pic_araea img.logo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.businnes_main .user_proff .user_pickks h4 {
    margin: 0 0 6px;
    border: none;
    padding: 0;
    font-size: 22px;
    line-height: 26px;
}
.businnes_main .user_proff .user_pickks p {
    margin: 0 0 5px;
    font-size: 16px;
    color: #c1c1c1;
}
.businnes_main .user_proff .user_pickks span {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 15px;
}

.businnes_main .user_proff .user_list {
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
}
.businnes_main .user_proff .user_list ul {
    margin: 0;
    list-style: none;
    padding: 0;
}

.businnes_main .user_proff .user_list ul li {
    margin-bottom: 15px;
    display: flex;
    width: 100%;
    padding: 10px;
    border: #ebf6fb solid 1px;
    border-radius: 7px;
}
.businnes_main .user_proff .user_list ul li:first-child {
border: #d5ecf7 solid 1px;
    border-radius: 7px;
    background: #e1f0f7;
}
.businnes_main .user_proff .user_list ul li:last-child {
border: #d5ecf7 solid 1px;
    border-radius: 7px;
    background: #e1f0f7;
}

.businnes_main .user_proff .user_list ul li:last-child{margin-bottom:0;}

.businnes_main .user_proff .user_list ul li span.usr_icoos {
    display: block;
    float: left;
    width: 50px;
    height: 50px;
    background: #d0e8f3;
    border-radius: 100px;
    text-align: center;
    font-size: 24px;
    line-height: 50px;
}
.businnes_main .user_proff .user_list ul li span.usr_icoos i {
    position: relative;
    top: 11px;
    color: #626262;
}
.businnes_main .user_proff .user_list ul li span.cntents {
    float: left;
    padding-left: 15px;
    font-size: 17px;
    font-weight: 600;
	    width: 85%;
}
.businnes_main .user_proff .user_list ul li span.cntents span.und_txss {
    display: block;
    font-size: 15px;
    font-weight: 400;
    color: #9f9f9f;
}
.businnes_main .user_proff .user_list ul li span.cntents a {
    border:#1c5299 solid 1px;
    padding: 6px 15px;
    display: block;
    color: #1c5299;
    border-radius: 4px;
    font-weight: 600;
    position: relative;
    top: 6px;
}
.businnes_main .user_proff .user_list ul li span.cntents a:hover {
    background:#1c5299;
    color: #fff;
}

.businnes_main .user_proff .social_iconsss {
    display: inline-block;
    width: 100%;
}

.businnes_main .user_proff .social_iconsss h6 {
    margin: 0 0 10px;
    text-align: center;
    font-size: 17px;
}
.businnes_main .user_proff .social_iconsss ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.businnes_main .user_proff .social_iconsss ul li {
    float: left;
    margin-right: 3%;
}
.businnes_main .user_proff .social_iconsss ul li:last-child {
    margin: 0;
}

.businnes_main .user_proff .social_iconsss ul li a {
    border: #626262 solid 1px;
    padding: 5px 20px;
    display: inline-block;
    border-radius: 7px;
}
.businnes_main .user_proff .social_iconsss ul li a:hover {
    background: #626262;
    color: #fff;
}

@media (min-width: 481px) and (max-width: 767px) {
.business_card_items .businnes_main .content_arara .form-group span.titalss_name {text-align: left;}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p {display: flex;}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p input {position: relative; top: -8px; margin-right: 5px;}
.businnes_main .user_proff .social_iconsss ul li a {padding: 5px 14px;}
#chat_mesages iframe {width: 100%;}	
}

@media (min-width: 320px) and (max-width: 480px) {
.business_card_items .businnes_main .content_arara .form-group span.titalss_name {text-align: left;}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p {display: flex;}
.business_card_items .businnes_main .content_arara .form-group .ck_list_tik p input {position: relative; top: -8px; margin-right: 5px;}
.businnes_main .user_proff .social_iconsss ul li a {padding: 5px 14px;}
#chat_mesages iframe {width: 100%;}
}
</style>



<body style="background:#000;">
 
 

    
<section class="business_card_items">
    <div class="container">
        <div class="businnes_main busness_new">
            <div class="content_arara">

                <div class="row">
                    

				   <div class="col-lg-12">
				     <div class="bus_part_lk newarea">
				        <!--- Share Area ---->
				        <div class="shr_links_parts click-parts" ><i class="fa fa-share-alt"></i> Share</div>
						<div class="show_parts_arar" id="sld_ara_partss">
						 <h4>Share Your Card</h4>
						 <div class="social_iconsss">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-linkedin-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-whatsapp"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
							
							<div class="qr_images">
							 <div class="qr_mg_area"><img src="{{ url('home/img/qr_pay_1cr.png')}}" alt="" /></div>
							 <div class="dwn_led">
							  <a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> Download</a>
							 </div>
							 
							 
							</div>
							
							<div class="url_cpyss">
							  <input type="text" value="www.ramjeemeena.com/ramjee" placeholder="Enter URL" />
							  <button type="text" value=""><i class="fa fa-file-text-o"></i></button>
							 </div>
						 
						</div>
						<!--- End Share Area ---->
				   
                        <div class="user_proff new_paert">
                            <div class="user_pickks">
                                <div class="pic_araea">
                                    <img class="logo" src="{{ url('home/img/pro_perty_bg.jpg')}}" alt="Logo" />
                                </div>
                                <h4>Ramjee Meena</h4>
                                <p>CEO</p>
                                <span>Ramjee Enterprises</span>
                            </div>

                            <div class="user_list">
                                <ul>
                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-user"></i></span>
                                        <span class="cntents"><a href="javascript:void(0);">Add to Contacts</a></span>
                                    </li>

                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-phone"></i></span>
                                        <span class="cntents">4546456564 <span class="und_txss">Phone</span></span>
                                    </li>

                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-envelope-o"></i></span>
                                        <span class="cntents"><a href="mailto:ramjee@ramjeemeena.com" class="al_linkss">ramjee@ramjeemeena.com</a> <span class="und_txss">Email</span></span>
                                    </li>

                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-globe"></i></span>
                                        <span class="cntents">https://www.ramjeemeena.com <span class="und_txss">Official Website</span></span>
                                    </li>

                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-map-marker"></i></span>
                                        <span class="cntents">Jaipur, Rajasthan, India <span class="und_txss">Address</span></span>
                                    </li>

                                    <li>
                                        <span class="usr_icoos"><i class="fa fa-comment-o"></i></span>
                                        <span class="cntents"><a href="javascript:void(0);" data-toggle="modal" data-target="#chat_mesages">Talk with My AI Assistant</a></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="social_iconsss">
							   <h6>Connect with me on</h6>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-linkedin-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-whatsapp"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
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
	    <script src="{{ url('home/js/intlTelInput-jquery.min.js')}}"></script>
	
<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.2.2/echarts.min.js'></script>	


<script>
  window.chatpilotIframeConfig = {
    chatbotId: "9baff73a5f33415196c1680a465c56c5",
    domain: "https://chat.digitalramjee.com"
  }
</script>
<script src="https://chat.digitalramjee.com/embed.iframe.js" charset="utf-8"></script>

<script>
$("#mobile_code").intlTelInput({
	initialCountry: "in",
	separateDialCode: true,
});
</script>

<script>
 const chart1 = echarts.init(document.getElementById('chart1'));
const option1 = {
  title: {
    text: '',
    left: 'left' },

  grid: {
    show: true,
    top: 30,
    backgroundColor: '#fff' },

  tooltip: {
    trigger: 'axis' },


  xAxis: {
    data: ['1997', '1998', '1999', '2000', '2001', '2002'] },

  yAxis: {},
  series: [
  {
    name: 'Y',
    type: 'line',
    data: [10, 35, 20, 13, 12, 18] },

  {
    name: 'X',
    type: 'line',
    data: [20, 11, 10, 9, 8, 8] }] };
	
	
	
	
chart1.setOption(option1);
chart1.group = 'group1';
echarts.connect('group1');	
</script>	
	
	
<script>
var owl = $('#banner');
              owl.owlCarousel({
                margin: 0,
                dots:true,
                nav:false,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items:1
                  },
                  1200: {
                    items:1
                  }
                }
  });
</script>

	
<script>
var owl = $('#testimonials');
              owl.owlCarousel({
                margin: 30,
				loop: true,
                dots:true,
                nav:false,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 2
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
 $("document").ready(function(){
  $(".tab-slider--body").hide();
  $(".tab-slider--body:first").show();
});

$(".tab-slider--nav li").click(function() {
  $(".tab-slider--body").hide();
  var activeTab = $(this).attr("rel");
  $("#"+activeTab).fadeIn();
	if($(this).attr("rel") == "tab2"){
		$('.tab-slider--tabs').addClass('slide');
	}else{
		$('.tab-slider--tabs').removeClass('slide');
	}
  $(".tab-slider--nav li").removeClass("active");
  $(this).addClass("active");
});
</script>
	
	<script>
	 $(function() {
	  $('.hidden_ck').hide();
	  $('.trigger').change(function() {  
		var hiddenId = $(this).attr("data-trigger");
		if ($(this).is(':checked')) {
		  $("#" + hiddenId).show();
		} else {
		  $("#" + hiddenId).hide();
		}
	  });
	});
	</script>
	
	
	<script>
	 $('.tab-link').click( function() {	
	  var tabID = $(this).attr('data-tab');	
	  $(this).addClass('active').siblings().removeClass('active');	
	  $('#tab-'+tabID).addClass('active').siblings().removeClass('active');
     });
	</script>
	
	<script>
	   var $el = $(".onclicks");
		var $ee = $(".clicckshowd");
		$el.click(function(e){
		  e.stopPropagation();
		  $(".clicckshowd").toggleClass('active');
		});
		$(document).on('click',function(e){
		  if(($(e.target) != $el) && ($ee.hasClass('active'))){
		  $ee.removeClass('active');
		  // console.log("yes");
		}
		});
	</script>
	
	
	<script>
	 function funcToggle() {
	  $(".cont").toggleClass('hidden');
	 };
	</script>
	
	<script>
	 $(function() {
	  $('#language-wrapper').hover(
		function() {
		  $('.language-text').fadeIn();
		},
		function() {
		  $('.language-text').fadeOut();
		}
	  );
	 });
	</script>
	
<!-- start new add -->
<script>
 $(document).ready(function(){
	
	$("#extend").click(function(e){
		e.preventDefault();
		$("#extend-field").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 1
$(document).ready(function(){
	
	$("#extend1").click(function(e){
		e.preventDefault();
		$("#extend-field1").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field1").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 2
$(document).ready(function(){
	
	$("#extend2").click(function(e){
		e.preventDefault();
		$("#extend-field2").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field2").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
// 3
$(document).ready(function(){
	
	$("#extend3").click(function(e){
		e.preventDefault();
		$("#extend-field3").append('<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>')
	});

	$("#extend-field3").on("click",".remove-extend-field",function(e){
		e.preventDefault();
		$(this).parent('div').remove();
	});

	
}); 
</script>

<script>
  $("#search-icon").click(function() {
  $(".nav").toggleClass("search");
  $(".nav").toggleClass("no-search");
  $(".search-input").toggleClass("search-active");
});

$('.menu-toggle').click(function(){
   $(".nav").toggleClass("mobile-nav");
   $(this).toggleClass("is-active");
});

</script>
</body>
</html>