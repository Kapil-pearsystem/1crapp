<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Camping Report</title>
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
table.table.table-bordered.tst_cam_listst tr th {
    border-top: #dddddd solid 1px;
}
table.table.table-bordered.tst_cam_listst tr td {
    vertical-align: middle;
    font-size: 13px;
}
table.table.table-bordered.tst_cam_listst span.sm_btnsss {
    background: #000;
    color: #fff;
    padding: 2px 5px;
    border-radius: 5px;
}
table.table.table-bordered.tst_cam_listst tr td a.link {
    margin-right: 6px;
}
table.table.table-bordered.tst_cam_listst tr td a.link:last-child{margin-right:0px;}
table.table.table-bordered.tst_cam_listst tr td i.fa.fa-star {
    color: #ffbf00;
}
.h_titless {
    margin-bottom: 15px;
    font-size: 22px;
    font-weight: 700;
    color: #000;
}

.switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 25px;
    border-radius: 20px;
    background: #ff0000;
    transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    vertical-align: middle;
    cursor: pointer;
    margin: 0;
}
.switch::before {
    content: '';
    position: absolute;
    top: 1px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: #fafafa;
    border-radius: 50%;
    transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
}
input:checked + .switch {
    background: #72da67;
}
input:checked + .switch::before {
    left: 27px;
    background: #fff;
}
input:checked + .switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
}

.alls_tabsst#othertabss_links .tab-wrapper {
    text-align: center;
    display: block;
    margin: auto;
    max-width: 100%;
}

.alls_tabsst#othertabss_links .tab-wrapper ul.tabs {
    justify-content: left;
    border-bottom: #ccc solid 1px;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link {
    margin-left: 0;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link {
    margin-left: 0;
    font-size: 14px;
    text-transform: capitalize;
    color: #646464;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link.active {
    color: #000;
	font-weight:600;
}

.dash_board_pages .data_add_by {
    background: #1c5299;
    padding: 5px;
	margin-bottom:20px;
}
.dash_board_pages .data_add_by:last-child{margin-bottom:0;}
.dash_board_pages .data_add_by table{background:#fff; margin-bottom:0;}

.dash_board_pages .data_add_by .ad_show {
    background: #fff;
    padding: 5px;
	margin-bottom:5px;
}
.dash_board_pages .data_add_by .ad_show p.data_showss {
    margin: 0;
    font-weight: 700;
}
.dash_board_pages .data_add_by .ad_show p.data_showss span.mng_txtx {
    font-weight: 500;
    padding-left: 5px;
    font-size: 13px;
}
.dash_board_pages .data_add_by .data_bx_manges {
    display: inline-block;
    width: 100%;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {
    background: #fff;
    float: left;
    width: 19.6%;
    margin-right: 0.5%;
    padding: 10px;
    text-align: center;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child{margin-right:0;}

.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .icnn {
    width: 30px;
	height:25px;
    margin: 0 auto;
    margin-bottom: 10px;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae h5 {
    font-size: 20px;
    font-weight: 800;
	margin: 0 0 7px;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae p {
    margin: 0 0 5px;
    font-size: 13px;
    font-weight: 600;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae span {
    font-size: 12px;
}

.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea {
    display: inline-block;
    width: 100%;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea h4 {
    margin: 2px 0 5px;
    color: #999;
    font-size: 18px;
    font-weight: 700;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea p {
    margin: 8px 0 5px;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box {
    display: flex;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box .dily_dtlss {
    margin: 0 15px;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box .dily_dtlss select:focus {
    outline: none;
}


.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss {
    display: flex;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.sm_textta {
    width: auto;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.mng_txtx {
    width: 70%;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.sm_textta {
    width: auto;
    text-wrap-mode: nowrap;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss select {
    max-width: 90px;
    width: 100%;
}
</style>


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
                        <a href="{{ url('registration') }}" class="bg_blues">Register Free</a>
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
                        <li class="clr_cngs"><a href="{{ url('registration') }}" id="activess">Register Free</a></li>
                    </ul>
                </div>
                <!-- End Main Menus Wrapper -->
			</nav>
        </div>
    </div>
</section>
<!---- End Header Part ---->   


<section class="dash_board_pages">
 <div class="container">
 <div class="h_titless">Sequence Details</div>

<div class="data_add_by">
 <div class="table-responsive">
				<table class="table table-bordered tst_cam_listst">
					<thead>
						<tr>
							<th>Date</th>
							<th>Time</th>
							<th>Type</th>
							<th>Item Name</th>
							<th>Template/Image</th>
							<th>Shipping/Courier Name</th>
							<th>Tracking</th>
							<th>Current Status of Delivery & Date</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>14-11-2024 07:00 PM</td>
							<td>3 Day IN Hours</td>
							<td>Gift</td>
							<td>CAP-Brons</td>
							<td>View Now <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
							<td>
								<select>
									<option value="1">Select</option>
								</select>
							</td>
							<td>DTT09812345 <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
							<td>
							 <div class="managess_box">
							  <div class="vew_dtlss">View Now <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></div>
							  <div class="dily_dtlss">
							    <select>
									<option value="1">Delivered</option>
									<option value="2">Lost</option>
								</select>
							  </div>
							  <div class="dats_dtlss">
							    14-11-2024
							  </div>
							 </div>
							</td>
						</tr>

						<tr>
							<td>14-11-2024 07:00 PM</td>
							<td>3 Day IN Hours</td>
							<td>Gift</td>
							<td>CAP-Brons</td>
							<td>View Now <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
							<td>
								<select>
									<option value="1">Select</option>
								</select>
							</td>
							<td>DTT09812345 <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
							<td>
							 <div class="managess_box">
							  <div class="vew_dtlss">View Now <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></div>
							  <div class="dily_dtlss">
							    <select>
									<option value="1">Delivered</option>
									<option value="2">Lost</option>
								</select>
							  </div>
							  <div class="dats_dtlss">
							    14-11-2024
							  </div>
							 </div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>




 
 

 </div>
</section>	  
     
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 
<script>
 $('[name=tab]').each(function(i,d){
  var p = $(this).prop('checked');
//   console.log(p);
  if(p){
    $('article').eq(i)
      .addClass('on');
  }    
});  

$('[name=tab]').on('change', function(){
  var p = $(this).prop('checked');
  
  // $(type).index(this) == nth-of-type
  var i = $('[name=tab]').index(this);
  
  $('article').removeClass('on');
  $('article').eq(i).addClass('on');
});
</script>

<script>
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>




<script>
 var $el = $(".fitter");
var $ee = $(".show_data");
$el.click(function(e){
  e.stopPropagation();
  $(".show_data").toggleClass('active');
});
$(document).on('click',function(e){
  if(($(e.target) != $el) && ($ee.hasClass('active'))){
  $ee.removeClass('active');
  // console.log("yes");
}
});
</script>


<script>
function openstapone() {
  $('.pageform_t').hide();
  $('#stapone').show();
}

function openstapone1() {
 $('.pageform_t').hide();
 $('#stapone1').show();
}

function opensprossnav() {
 $('.pageform_t').hide();
  $('#stapone1').show();
 $('#pross_nevs').show();
}

function openstapone2() {
 $('.pageform_t').hide();
 $('#stapone2').show();
}

function openstapone3() {
 $('.pageform_t').hide();
 $('#stapone3').show();
}

</script>


@include('front.layouts.footer')


