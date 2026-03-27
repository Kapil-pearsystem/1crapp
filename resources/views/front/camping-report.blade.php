@include('web.common.header')

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
   background: #e3e3e3;
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


.data_add_by .dropbtn {
    background-color: #fff;
    padding: 3px 12px;
    font-size: 14px;
    color: #000;
    border: #d9d9d9 solid 1px;
    border-radius: 3px;
}
.data_add_by .dropdown {
    position: absolute;
    display: inline-block;
    right: 10px;
    top: -4px;
}

.data_add_by .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right:0;
}

.data_add_by .dropdown-content a {
    color: black;
    padding: 5px 16px;
    text-decoration: none;
    display: block;
    font-size: 13px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {
    background-color: #f94554;
    color: #fff;
}
table.table.table-bordered.tst_cam_listst tr th span.bothss {
    display: flex;
}
table.table.table-bordered.tst_cam_listst tr th span.bothss input.ck_boxx {
    margin: 0 5px 0 0;
}

@media (min-width: 481px) and (max-width: 767px) {
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
}

@media (min-width: 320px) and (max-width: 480px) {
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
}


</style>



<section class="dash_board_pages">
 <div class="container">
 <div class="h_titless">Campaign Information : Diwali Gift For List-A (Name of the campaign)</div>
 
 <div class="data_add_by">
  <div class="ad_show">
   <div class="row">
    <div class="col-lg-4">
	 <p class="data_showss">Campaign Summary : <span class="mng_txtx">Diwali Gift to AFy Members</span></p>
	</div>
    <div class="col-lg-4">
	 <p class="data_showss">Seq ID : <span class="mng_txtx">#15788</span></p>
	</div>
    <div class="col-lg-4">
	 <p class="data_showss">Date/Time : <span class="mng_txtx">11/04/2024 07:09 PM</span></p>
	</div>
   </div>
  </div>
  
  <div class="data_bx_manges">
   <div class="cn_box_araeae">
    <div class="icnn"><i class="fa fa-users"></i></div>
    <h5>1</h5>
	<p>All your contacts</p>
	<span>See the list of contacts ></span>
   </div>

   <div class="cn_box_araeae">
    <div class="icnn"><i class="fa fa-eye"></i></div>
    <h5>9</h5>
	<p>Total Gift in Sequence</p>
	<span>See the list of contacts ></span>
   </div>
   
   <div class="cn_box_araeae">
    <div class="icnn"><i class="fa fa-eye-slash"></i></div>
	<div class="row">
	 <div class="col-lg-6 col-6">
	  <div class="boths_araea">
	   <h4>100%</h4>
	   <p>Gift Sent</p>
	  </div>
	 </div>
	 <div class="col-lg-6 col-6">
	  <div class="boths_araea">
	   <h4>70%</h4>
	   <p>Gift Delivered</p>
	  </div>
	 </div>
	</div>
	<span>See the list of contacts ></span>
   </div>
   
   <div class="cn_box_araeae">
    <div class="icnn"><i class="fa fa-hand-o-up"></i></div>
    <h5>6</h5>
	<p>Total Email in Scqucnce</p>
	<span>See the list of contacts ></span>
   </div>
   
   <div class="cn_box_araeae">
    <div class="icnn"><i class="fa fa-twitch"></i></div>
    <h5>&nbsp;</h5>
	<p>Email Sent</p>
	<span>See the list ></span>
   </div>
  </div> 
 </div>
 
 

 <div class="data_add_by">
 
   <div class="ad_show">
   <div class="row">
    <div class="col-lg-4">
	 <p class="data_showss">List Name: <span class="mng_txtx">IOCL Emp, HPCL</span></p>
	</div>
    <div class="col-lg-4">
	 <p class="data_showss">Tags Included : <span class="mng_txtx">Interest, ONGC</span></p>
	</div>
    <div class="col-lg-4">
	 <p class="data_showss bothss_sertss">
	  <span class="sm_textta">Tags Excluded :</span> 
	  <span class="mng_txtx">hpd, iod, hot</span>
	 </p>
	 <div class="dropdown">
	   <button class="dropbtn">Message <i class="fa fa-angle-down"></i></button>
	   <div class="dropdown-content">
		<a href="javascript:void(0);">Shift to New List</a>
		<a href="javascript:void(0);">New Sequence</a>
		<a href="javascript:void(0);">Send Email</a>
		<a href="javascript:void(0);">Send WhatsApp</a>
	   </div>
	  </div>
	</div>
   </div>
  </div>
 <div class="table-responsive">
				<table class="table table-bordered tst_cam_listst">
					<thead>
						<tr>
							<th>S.No</th>
							<th><span class="bothss"><input type="checkbox" class="ck_boxx" value="" /> Select</span></th>
							<th>Name</th>
							<th>UID</th>
							<th>Email</th>
							<th>Ph.No</th>
							<th>Last Gift Sent/Date of Delivery</th>
							<th>Next: Gift/Due Date</th>
							<th>Modal</th>
							<th>View Full Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01</td>
							<td><input type="checkbox" class="ck_boxx" value="" /></td>
							<td>Amit Yadav</td>
							<td>1CR APP-001</td>
							<td>yourmail@gimail.com</td>
							<td>+91 1234567890</td>
							<td>SN-01 / Cap-brown 14-11-2024 </td>							
							<td>SN-01 / Calender 14-11-2024 </td>							
							<td>
								<input type="checkbox" hidden="hidden" id="username" />
								<label class="switch" for="username"></label>
							</td>
							<td>
								View Now <a href="https://1crapp.allproject.online/sequence-details" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a>
							</td>
						</tr>

						<tr>
							<td>02</td>
							<td><input type="checkbox" class="ck_boxx" value="" /></td>
							<td>Amit Yadav</td>
							<td>1CR APP-001</td>
							<td>yourmail@gimail.com</td>
							<td>+91 1234567890</td>
							<td>SN-01 / Wal Hang 14-11-2024 </td>							
							<td>SN-01 / Calender 14-11-2024 </td>							
							<td>
								<input type="checkbox" hidden="hidden" id="username1" />
								<label class="switch" for="username1"></label>
							</td>
							<td>
								View Now <a href="https://1crapp.allproject.online/sequence-details" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a>
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


