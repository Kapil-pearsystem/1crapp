@include('front.layouts.user-header')
<style>
table.table.table-bordered.tst_cam_listst tr th {
    border-top: #dddddd solid 1px;
}
table.table.table-bordered.tst_cam_listst tr td {
    vertical-align: middle;
    font-size: 13px;
	text-align:center;
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


.p_mitters canvas#foo {
    width: 100%;
    background: #fff;
    height: 100%;
}
.p_mitters canvas#foo {
    width: 100% !important;
    height: 100% !important;
}

.grea_bg{background:#e9e9e9 !important; font-size: 11px !important;}
.yellowe_bg{background:#ffdd00 !important;}
.reds_bg{background:#f94554 !important;}
.tx_read{color:#f94554 !important; font-weight:600;}
.tx_white{color:#fff !important;}
.tx_bluess{color:#6490cb !important; font-weight:600;}
.brd_none{border:none !important;}
.arow_rt_parts{text-align: right !important; background: #bbe4ed !important;     font-size: 11px !important;}
.fnt_size{font-size: 11px !important; padding-left: 3px !important; padding-right: 3px !important;}

.tanksss .ftr_thknsss {
    background: #2196f3;
    position: relative;
    padding: 18px 0;
}
.tanksss .ftr_thknsss .lgo_partss {
    max-width: 50px;
    width: 100%;
    position: absolute;
    height: 50px;
    overflow: hidden;
    top: 4px;
    left: 4px;
}
.tanksss .ftr_thknsss .lgo_partss img {
    width: 100%;
}
.tanksss .ftr_thknsss p {
    text-align: center;
    margin: 0;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
}
.tanksss .ftr_thknsss p a.ex_btn_areaa {
    float: right;
    background: #db0000;
    padding: 5px 13px;
    border-radius: 40px;
    position: absolute;
    right: 10px;
    top: 12px;
    color: #fff;
    border: #fff solid 2px;
}

.manages_widthsss{width:8%;  font-size:10px !important;}

a.sm_right_vdooos {float: right; display: inline-block; width: 8%;}
a.sm_right_vdooos img {width: 100%;}

a.sm_right_vdooos.siz_vdoo {width: 35%;}
a.sm_right_vdooos.siz_vdoo.sm_sizzess {width: 25%;}

.show_boxxx#itemisedPaidAmount {
    display: none;
}
.show_boxxx.active#itemisedPaidAmount {
    display: block;
}

.form-group.managsss1.lot_sz .pusntttss {
    background: #4a83cc;
    right: 2px;
    margin: 2px 0 0;
    padding: 8px 15px;
    color: #fff;
    border-radius: 10px;
	position: absolute;
    bottom: 0;
    right: 0;
}

.all_frm_list .form-group.managsss1 .shrliststs {
    position: absolute;
    right: 8px;
    bottom: 8px;
    border: #dddddd solid 1px;
    border-radius: 25px;
    width: 26px;
    height: 26px;
    text-align: center;
    display: inline-block;
	background:#fff;
}
.all_frm_list .form-group.managsss1 .shrliststs i {
    position: relative;
    top: 4px;
}


.ad_multipal_araea {
    display: inline-block;
    width: 100%;
}
.ad_multipal_araea h4 {
    margin: 0 0 10px;
    font-size: 20px;
    font-weight: 600;
    display: inline-block;
    width: 100%;
}
.ad_multipal_araea .ad_und_boxx {
    border: #1c5299 dotted 2px;
    padding: 10px;
}
.ad_multipal_araea .ad_und_boxx ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.ad_multipal_araea .ad_und_boxx ul li {
    display: block;
    margin-bottom: 10px;
}
.ad_multipal_araea .ad_und_boxx ul li:last-child{margin-bottom:0;}
.ad_multipal_araea .ad_und_boxx ul li span.bg_u_clr {
    background: #fff;
    padding: 2px 10px;
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    color: #1c5299;
}


.all_supportss_modalss .modal-dialog {width: 100%; margin: 30px auto; max-width: 600px;}
.all_supportss_modalss .all_frm_list {padding: 25px 25px;}
.all_supportss_modalss .all_frm_list .hd_res_listsss h2 {
    font-size: 22px;
    font-weight: 600;
	margin-bottom:25px;
}
.all_supportss_modalss .all_frm_list .all_frm_list {
    padding: 0;     margin: 0;
}

.all_supportss_modalss .all_frm_list .form-group input {
    width: 100%;
    padding: 0px 5px;
    height: 42px;
    line-height: 42px;
    font-size: 13px;
    border: #0e3992 solid 1px;
    border-radius: 10px;
	margin: 0;
    background: #fff;
}
.all_supportss_modalss .all_frm_list .form-group select {
    width: 100%;
    padding: 0px 5px;
    height: 42px;
    line-height: 42px;
    font-size: 13px;
    border: #0e3992 solid 1px;
    border-radius: 10px;
    cursor: pointer;
}
.all_supportss_modalss .all_frm_list .form-group input.browsss {
    padding-left: 0 !important; line-height: 34px;
}
.all_supportss_modalss .all_frm_list .form-group.managsss1 .currencyInputprefix {
    position: absolute;
    left: 10px;
    color: black;
    bottom: 9px;
	width:13px;
}

.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea {
    display: inline-block;
    width: 100%;
}

.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button.actsss {
    background: #4a83cc;
    color: #fff;
    font-size: 14px;
    border: #1c5299 solid 1px;
    padding: 8px 25px;
    display: inline-block;
    border-radius: 50px;
    margin-right: 15px;
}
.all_supportss_modalss .all_frm_list button.close span {
    font-size: 40px;
    position: absolute;
    top: 10px;
    right: 20px;
}
.add_paymmntss a {
    background: #f94755;
    padding: 3px 10px;
    color: #fff;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
}
.all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn {
    text-align: center;
}

.all_supportss_modalss .all_frm_list .all_frm_list {
    padding: 0 !important;
}
.all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn {
    text-align: center;
}
.all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn a {
    font-size: 13px;
    padding: 8px 15px;
    margin-right: 5px;
}
.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button.actsss {
    font-size: 13px;
    padding: 8px 10px;
    margin-right: 5px;
}
.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button.actsss:last-child{margin-right:0;}	


@media (min-width: 481px) and (max-width: 767px) {
	
.ad_multipal_araea {
    margin-top:20px;
}	
	
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
.hd_res_listsss h2 {font-size: 18px; font-weight: 700;}
.hd_res_listsss button.btn.btn-primary {padding: 2px 5px !important; font-size: 11px !important;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: block; width: 40%; margin: 0 auto;
        margin-top: 10px;}
}

@media (min-width: 320px) and (max-width: 480px) {
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
.hd_res_listsss h2 {font-size: 16px; font-weight: 700;}
.hd_res_listsss button.btn.btn-primary {padding: 2px 5px !important; font-size: 11px !important;    margin-bottom: 10px;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: inline-block; margin-top: 10px;}
}
.err{
    color:red;
}

</style>

<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="videotutorialmodal" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
 </div> 

<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="uploaddocuments" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="uploadDocForm" action="" method="post" enctype="multipart/form-data">
                <!-- CSRF if needed -->
                @csrf
                <div class="hd_res_listsss">
                    <h2>Upload Document</h2>
                </div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Party</label>
                                <select id="party" class="currencyInput">
                                    <option value="agent">Document of Agents</option>
                                    <option value="seller">Document of Seller</option>
                                    <option value="property">Property Documents</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Type of Document</label>
                                <select id="docType" class="currencyInput">
                                    <option value="aadhar_card">Adhar Card</option>
                                    <option value="pan_card">Pan Card</option>
                                    <option value="driving_license">Driving License</option>
                                    <option value="voter_card">Voter/Election Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Upload Document</label>
                                <input type="file" id="uploadFile" class="currencyInput browsss" />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Upload Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
    </div>
  </div>
 </div> 
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Property Details</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Property Details1</span>
   </div>
  </div>
</section>  

<section class="dash_board_pages">
    <div class="container">
      <!--   <div class="table-responsive">-->
      <!--      <table class="table table-bordered tst_cam_listst">-->
      <!--          <tbody>-->
      <!--              <tr>-->
      <!--                  <td>Detils of the Property - FY-2020/01 (Name of the property)</td>-->
      <!--                  <td>-->
						<!-- <a href="javascript:void(0);"><i class="fa fa-share-alt"></i></a> &nbsp;-->
						<!-- <a href="javascript:void(0);">Share & Download</a>-->
						<!--</td>-->
      <!--              </tr>-->

      <!--              <tr>-->
      <!--                  <td class="yellowe_bg">Click Here to Check Property Performance* (PP)</td>-->
      <!--                  <td class="yellowe_bg"><a href="javascript:void(0);" class="sm_right_vdooos siz_vdoo sm_sizzess"  data-toggle="modal" data-target="#videotutorialmodal"><img src="https://1crapp.allproject.online/img/video-tutorial-new.png"> </a>-->
						<!--</td>-->
      <!--              </tr>-->

      <!--          </tbody>-->
      <!--      </table>-->
      <!--  </div>-->
		
		
		
		<form method="post" action="{{ route('property-market.store') }}" onsubmit="return validate()" name="f1" enctype="multipart/form-data">
	        @csrf
		<!-- Core Details -->
		<div class="Description mt-4">
			<div class="hd_res_listsss">
				<h2 style="float: left;">
					Core Details 
				</h2>
				<!--<button type="button" class="btn btn-primary" onClick="copyPropertyAddress()" style="float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>-->
			</div>
			<div class="all_frm_list">
				<div class="row">

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Property Name</label>
                            <input type="text" name="property_name" id="" placeholder="Property Name" value=""/>
                            <span class="property_nameError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Ownership</label>
                            <input type="text" name="owner_name" id="" placeholder="Ownership" value=""  />
                            <span class="owner_nameError err"></span>
                         </div>
					</div>
					
					
				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Location</label>
                            <input type="text" name="location" id="" placeholder="Location" value=""  />
                            <span class="locationError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Date of Booking</label>
                            <input type="date" name="date_of_booking" id="" placeholder="Date of Booking" value=""  />
                            <span class="date_of_bookingError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Date of Registry</label>
                            <input type="date" name="date_of_registry" id="" placeholder="Date of Registry" value=""  />
                            <span class="date_of_registryError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Date of Possession</label>
                            <input type="date" name="date_of_possession" id="" placeholder="Date of Possession" value=""  />
                            <span class="date_of_possessionError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Gross Payment Paid</label>
                            <input type="text" name="gross_payment" id="" placeholder="Gross Payment Paid" value=""  />
							<a href="https://1crapp.allproject.online/payment-details" target="_blank" class="shrliststs"><i class="fa fa-share-square-o"></i></a>
                            <span class="gross_paymentError err"></span>
                         </div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Core Details -->
		
		
		
		<!-- Description -->
            <div class="Description">
            <div class="hd_res_listsss">
                <h2 style="float: left;">
                    Description 
                </h2>
                <button type="button" class="btn btn-primary" onClick="" style="float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>
            </div>
            <div class="all_frm_list">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Category:</label>
                            <select name="property_type" id="pcategory" onChange="setOption(this.value)" class="slt_areaa_ful">
                                <option value="">N/A</option>
                                <option value="Residentail">Residentail</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Industrial">Industrial</option>
                            </select>
                            <span class="property_typeError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group managsss1">
                                    <label>Parking:</label>
                                    <select name="parking" id="parking" class="slt_areaa_ful">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="parkingError err"></span>
                                </div>
                            </div>
        
                            <div class="col-lg-6 col-12">
                                <div class="form-group managsss1">
                                    <label>No. of Parking</label>
                                    <select name="no_of_parking" id="no_of_parking" class="slt_areaa_ful">
                                        <option selected disabled value="">Select</option>
                                        @for($i = 1; $i<=10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <span class="no_of_parkingError err"></span>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Type:</label>
                            <select name="pcategorytype" id="pcategorytype" class="slt_areaa_ful pcategorytype">
                                <option value="">N/A</option>
                            </select>
                            <span class="pcategorytypeError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1 lot_sz">
                            <label>Size:</label>
                            <input type="text" name="property_size" placeholder="Size" value="" />
                            <select name="property_size_type" id="psizetype" class="pusntttss">
                                <option selected value="Square Feet">Square Feet</option>
                                <option value="Square Yard">Square Yard</option>
                                <option value="Meter Feet">Square Meter</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Acres">Acres</option>
                                <option value="Hectre">Hectre</option>
                            </select>
                            <span class="property_sizeError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Units Type:</label>
                            <select name="property_unit" id="property_unit" class="slt_areaa_ful">
                                <option value="">N/A</option>
                                <option value="1">1 BHK</option>
                                <option value="2">2 BHK</option>
                                <option value="3">3 BHK</option>
                                <option value="4">4 BHK</option>
                                <option value="5">5 BHK</option>
                            </select>
                            <span class="property_unitError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Status:</label>
                            <select name="current_status" id="current_status" class="slt_areaa_ful">
                                <option value="Ready To Move">Ready To Move</option>
                                <option value="Underconstruction">Underconstruction</option>
                            </select>
                            <span class="current_statusError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>No of bedrooms</label>
                            <select name="bedrooms" id="bedrooms" class="slt_areaa_ful">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                            </select>
                            <span class="bedroomsError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>No of bathrooms</label>
                            <select name="bathrooms" id="bathrooms" class="slt_areaa_ful">
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                            </select>
                            <span class="bathroomsError err"></span>
                        </div>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Year Built:</label>
                            <input type="year" name="built_year" placeholder="Year Built" value="" />
                        </div>
                        <span class="built_yearError err"></span>
                    </div>
        
                    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Transaction Type(Optional):</label>
                            <select name="transaction_type" id="transaction_type" class="slt_areaa_ful">
                                <option value="">None</option>
                                <option value="Direct">Direct</option>
                                <option value="Through Agent">Through Agent</option>
                                <option value="From Owner">From Owner</option>
                            </select>
                            <span class="transaction_typeError err"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Description -->


		<!-- Full Address of The Property -->
		<div class="Description">
			<div class="hd_res_listsss">
				<h2 style="float: left;">
					Full Address of The Property
				</h2>
				<!--<button type="button" class="btn btn-primary" onClick="copyPropertyAddress()" style="float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>-->
			</div>
			<div class="all_frm_list">
				<div class="row">
				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Unit Number(Optional):</label>
                            <input type="text" name="prop_unit" id="" placeholder="Unit Number" value=""  />
                            <span class="prop_unitError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Tower Number(Optional):</label>
                            <input type="text" name="tower_no" id="" placeholder="Tower Number" value=""  />
                            <span class="tower_noError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Project Name(Optional):</label>
                            <input type="text" name="project_name" id="" placeholder="Project Name" value=""  />
                            <span class="project_nameError err"></span>
                         </div>
					</div>
					
					
				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Building Name(Optional):</label>
                            <input type="text" name="building_name" id="" placeholder="Building Name" value=""  />
                            <span class="building_nameError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Sector / Street No. /Address:</label>
                            <input type="text" name="street_no" id="" placeholder="Sector Address" value=""  />
                            <span class="street_noError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Country:</label>
                            <select name="prop_country" id="cp-country" onchange="getState(this.value)" class="slt_areaa_ful">
                                <option value="">N/A</option>
                                @foreach($countries as $list)
                                <option
                                    value="{{ $list->id }}"
                                    {{ (old('pcountry', $PropertyAddress->prop_country ?? '') == $list->id) ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="prop_countryError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>State/Region:</label>
                            <select name="prop_state" id="cp-state" onchange="getCity(this.value)" class="slt_areaa_ful"></select>
                            <span class="prop_stateError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>City:</label>
                             <select name="prop_city" id="cp-city" class="slt_areaa_ful"></select>
                            <span class="prop_cityError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>ZIP/Postal Code:</label>
                            <input type="text" name="prop_zip_code" id="" placeholder="ZIP/Postal Code" value=""  />
                            <span class="prop_zip_codeError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Property Google Location:</label>
                            <input type="text" name="prop_google_location" id="" placeholder="Paste Enbeded Share" value=""  />
							<a href="javascript:void(0);" class="shrliststs"><i class="fa fa-share-alt"></i></a>
                            <span class="prop_google_locationError err"></span>
                         </div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Full Address of The Property -->



		<!-- Full Address of the Seller -->
		<div class="Description">
			<div class="hd_res_listsss">
				<h2 style="float: left;">
					Full Address of the Seller
				</h2>
				<!--<button type="button" class="btn btn-primary" onClick="copyPropertyAddress()" style="float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>-->
			</div>
			<div class="all_frm_list">
				<div class="row">
				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Name</label>
                            <input type="text" name="seller_name" id="" placeholder="Name" value=""  />
                            <span class="seller_nameError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Sector / Street No. / Address:</label>
                            <input type="text" name="seller_street_name" id="" placeholder="Street Address" value=""  />
                            <span class="seller_street_nameError err"></span>
                         </div>
					</div>
					
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Country:</label>
                            <select name="seller_country_id" id="seller_country_id" onchange="getSellState(this.value)" class="slt_areaa_ful">
                                <option value="">N/A</option>
                                @foreach($countries as $list)
                                <option
                                    value="{{ $list->id }}"
                                    {{ (old('pcountry', $PropertyAddress->prop_country ?? '') == $list->id) ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="seller_country_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>State/Region:</label>
                            <select name="seller_state_id" id="seller_state_id" onchange="getSellerCity(this.value)"  class="slt_areaa_ful">
								<option value=""></option>
							</select>
                            <span class="seller_state_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>City:</label>
                            <select name="seller_city_id" id="seller_city_id" class="slt_areaa_ful">
								<option value=""></option>
							</select>
                            <span class="seller_city_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>ZIP/Postal Code:</label>
                            <input type="text" name="seller_zip_code" id="" placeholder="ZIP/Postal Code" value=""  />
                            <span class="seller_zip_codeError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Phone NO</label>
                            <input type="text" name="seller_phone" id="" placeholder="Enter Phone No." value=""  />
                            <span class="seller_phoneError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Email id.</label>
                            <input type="email" name="" id="seller_email" placeholder="Enter Email ID" value=""  />
                            <span class="seller_emailError err"></span>
                         </div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Full Address of the Seller -->


		<!-- Full Address of the Agent (if Applicable) -->
		<div class="Description">
			<div class="hd_res_listsss">
				<h2 style="float: left;">
					Full Address of the Agent (if Applicable)
				</h2>
				<!--<button type="button" class="btn btn-primary" onClick="copyPropertyAddress()" style="float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>-->
			</div>
			<div class="all_frm_list">
				<div class="row">
				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Name</label>
                            <input type="text" name="agent_name" id="" placeholder="Name" value=""  />
                            <span class="agent_nameError err"></span>
                         </div>
					</div>

				    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Sector / Street No. / Address:</label>
                            <input type="text" name="agent_street_name" id="agent_street_name" placeholder="Street Address" value=""  />
                            <span class="agent_street_nameError err"></span>
                         </div>
					</div>
					
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Country:</label>
							<select name="agent_country_id" id="agent_country_id" onchange="getAgentState(this.value)" class="slt_areaa_ful">
                                <option value="">N/A</option>
                                @foreach($countries as $list)
                                <option
                                    value="{{ $list->id }}"
                                    {{ (old('pcountry', $PropertyAddress->prop_country ?? '') == $list->id) ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="agent_country_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>State/Region:</label>
                            <select name="agent_state_id" id="agent_state_id" onchange="getAgentCity(this.value)" class="slt_areaa_ful">
								<option value=""></option>
							</select>
                            <span class="agent_state_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>City:</label>
                            <select name="agent_city_id" id="agent_city_id" class="slt_areaa_ful">
								<option value=""></option>
							</select>
                            <span class="agent_city_idError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>ZIP/Postal Code:</label>
                            <input type="text" name="agent_zip_code" id="" placeholder="ZIP/Postal Code" value=""  />
                            <span class="agent_zip_codeError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Phone NO</label>
                            <input type="text" name="agent_phone" id="" placeholder="ZIP/Postal Code" value=""  />
                            <span class="agent_phoneError err"></span>
                         </div>
					</div>
					
					<div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Email id.</label>
                            <input type="text" name="agent_email" id="" placeholder="Enter Email ID" value=""  />
                            <span class="agent_emailError err"></span>
                         </div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Full Address of the Agent (if Applicable) -->


		<!-- Document Of Property, Agents & Seller -->
		<div class="Description">
			<div class="hd_res_listsss">
				<h2 style="float: left;">
					Document Of Property, Agents & Seller
				</h2>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploaddocuments" style="float: right;"><i class="fa fa-upload"></i> Upload Document</button>
			</div>
			<div class="all_frm_list">
				<div class="row">
				    <div class="col-lg-4 col-12">
					  <div class="ad_multipal_araea">
					   <h4>Document of Agents  <span class="ad_pert_users"><a href="javascript:void(0);"><i class="fa fa-picture-o"></i></a></span></h4>
					   <div class="ad_und_boxx">
					    <ul id="agent_docs">
						</ul>
					   </div>
					  </div>
					</div>

				    <div class="col-lg-4 col-12">
					  <div class="ad_multipal_araea">
					   <h4>Document of Seller  <span class="ad_pert_users"><a href="javascript:void(0);"><i class="fa fa-picture-o"></i></a></span></h4>
					   <div class="ad_und_boxx">
					    <ul id="seller_docs">
						</ul>
					   </div>
					  </div>
					</div>

				    <div class="col-lg-4 col-12">
					  <div class="ad_multipal_araea">
					   <h4>Property Documents  <span class="ad_pert_users"><a href="javascript:void(0);"><i class="fa fa-picture-o"></i></a></span></h4>
					   <div class="ad_und_boxx">
					    <ul id="property_docs">
						</ul>
					   </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div id="hidden-file-inputs"></div>
		<!-- End Document Of Property, Agents & Seller -->
		<button type="submit" class="btn btn-primary" >Save Property</button>
		<br><br>
        </form>
		
	   <!--<div class="tanksss">-->
	   <!-- <div class="ftr_thknsss">-->
	   <!--  <div class="lgo_partss"><img src="https://1crapp.allproject.online/home/img/logo 1.png" alt=""></div>-->
	   <!--  <p>Prepared using 1CRAPP.COM , Just with Few Click You Too Can Create it.. lt's Free! <a href="javascript:void(0);" class="ex_btn_areaa">Explore More <i class="fa fa-chevron-circle-right"></i></a></p>-->
	   <!-- </div>-->
	   <!-- </div>-->
		
	  
	</div>
</section>
   
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 




		<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>
		<script>
		 var opts = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.3, // The line thickness
  radiusScale: 0.9, // Relative radius
  pointer: {
    length: 0.42, // // Relative to gauge radius
    strokeWidth: 0.029, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6F6EA0',   // Colors
  colorStop: '#C0C0DB',    // just experiment with them
  strokeColor: '#EEEEEE',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  // renderTicks is Optional
  // renderTicks: {
  //   divisions: 0,
  //   divWidth: 0.1,
  //   divLength: 0.41,
  //   divColor: '#333333',
  //   subDivisions: 0,
  //   subLength: 0.14,
  //   subWidth: 3.1,
  //   subColor: '#ffffff'
  // },
  staticZones: [
   {strokeStyle: "#F03E3E", min: 70, max: 80}, // Red from 70 to 80
   {strokeStyle: "#FFDD00", min: 80, max: 90}, // Yellow 80 to 90
   {strokeStyle: "#30B32D", min: 90, max: 100}, // Green 90 to 100
  ],
  staticLabels: {
  font: "10px sans-serif",  // Specifies font
  labels: [10, 80, 90, 100],  // Print labels at these values
  color: "#000000",  // Optional: Label text color
  fractionDigits: 0  // Optional: Numerical precision. 0=round off.
},

};
var target = document.getElementById('foo'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.setMinValue(70);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = 10; // set animation speed (32 is default value)
gauge.set(92); // set actual value
		</script>

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


function setOption(cat, callback = null) {
    if (cat == 'Residentail') {
        var newOptions = {
            "Flat/Apartment": "Flat/Apartment",
            "Duplex": "Duplex",
            "Villas": "Villas",
            "Plot(Approved)": "Plot(Approved)",
            "Plot(Unapproved)": "Plot(Unapproved)",
            "Other": "Other"
        };
    } else if (cat == 'Commercial') {
        var newOptions = {
            "Retail/Shops": "Retail/Shops",
            "Office Space": "Office Space",
            "Studio Apartment": "Studio Apartment",
            "Food Court": "Food Court",
            "Virtual Space": "Virtual Space",
            "Other": "Other"
        };
    } else if (cat == 'Agriculture') {
        var newOptions = {
            "Agriculture": "Agriculture"
        };
    } else {
        var newOptions = {
            "Industrial": "Industrial"
        };
    }


    var $el = $("#pcategorytype");
    $el.empty(); // remove old options
    $.each(newOptions, function(key, value) {
        $el.append($("<option></option>")
            .attr("value", value).text(key));
    });

    if (callback) {
        callback();
    }
}
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

<script>
function validate() {
    let flag = true;
    $('.err').html('');
    var form = document.f1;
    // step 1
    const property_name = form.property_name.value;
    if (!property_name) {
        $('.property_nameError').text('Property name is required.');
        flag = false;
    }
    const owner_name = form.owner_name.value;
    if (!owner_name) {
        $('.owner_nameError').text('Owner Name is required.');
        flag = false;
    }
    const location = form.location.value;
    if (!location) {
        $('.locationError').text('Location is required.');
        flag = false;
    }
    const date_of_booking = form.date_of_booking.value;
    if (!date_of_booking) {
        $('.date_of_bookingError').text('Date of Booking is required.');
        flag = false;
    }
    const date_of_registry = form.date_of_registry.value;
    if (!date_of_registry) {
        $('.date_of_registryError').text('Date of Registry is required.');
        flag = false;
    }
    const date_of_possession = form.date_of_possession.value;
    if (!date_of_possession) {
        $('.date_of_possessionError').text('Date of Possession is required.');
        flag = false;
    }
    const gross_payment = form.gross_payment.value;
    if (!gross_payment) {
        $('.gross_paymentError').text('Gross Payment is required.');
        flag = false;
    }
    // step 2
    
    const property_type = form.property_type.value;
    if (!property_type) {
        $('.property_typeError').text('Property category is required.');
        flag = false;
    }
    const parking = form.parking.value;
    if (!parking) {
        $('.parkingError').text('Parking is required.');
        flag = false;
    }
    const no_of_parking = form.no_of_parking.value;
    if (!no_of_parking) {
        $('.no_of_parkingError').text('No. of parking is required.');
        flag = false;
    }
    const pcategorytype = form.pcategorytype.value;
    if (!pcategorytype) {
        $('.pcategorytypeError').text('Property type is required.');
        flag = false;
    }
    const property_size = form.property_size.value;
    if (!pcategorytype) {
        $('.property_sizeError').text('Property size is required.');
        flag = false;
    }
    const property_size_type = form.property_size_type.value;
    if (!property_size_type) {
        $('.property_sizeError').text('Property size type is required.');
        flag = false;
    }
    const property_unit = form.property_unit.value;
    if (!property_unit) {
        $('.property_unitError').text('Property unit is required.');
        flag = false;
    }
    const current_status = form.current_status.value;
    if (!current_status) {
        $('.current_statusError').text('Property status is required.');
        flag = false;
    }
    const bedrooms = form.bedrooms.value;
    if (!bedrooms) {
        $('.bedroomsError').text('No of bedrooms field is required.');
        flag = false;
    }
    const bathrooms = form.bathrooms.value;
    if (!bathrooms) {
        $('.bathroomsError').text('No of bathroom field is required.');
        flag = false;
    }
    const built_year = form.built_year.value;
    if (!built_year) {
        $('.built_yearError').text('Built Year field is required.');
        flag = false;
    }
    // const transaction_type = form.transaction_type.value;
    // if (!transaction_type) {
    //     $('.transaction_typeError').text('Transaction type field is required.');
    //     flag = false;
    // }
    // const prop_unit = form.prop_unit.value;
    // if (!prop_unit) {
    //     $('.prop_unitError').text('Property Unit field is required.');
    //     flag = false;
    // }
    
    // const tower_no = form.tower_no.value;
    // if (!tower_no) {
    //     $('.tower_noError').text('Tower number field is required.');
    //     flag = false;
    // }
    // const project_name = form.project_name.value;
    // if (!project_name) {
    //     $('.project_nameError').text('Project Name is required.');
    //     flag = false;
    // }
    // const building_name = form.building_name.value;
    // if (!building_name) {
    //     $('.building_nameError').text('Building Name is required.');
    //     flag = false;
    // }
    
    
    const prop_country = form.prop_country.value;
    if (!prop_country) {
        $('.prop_countryError').text('Property country is required.');
        flag = false;
    }
    const prop_state = form.prop_state.value;
    if (!prop_state) {
        $('.prop_stateError').text('Property state is required.');
        flag = false;
    }
    const prop_city = form.prop_city.value;
    if (!prop_city) {
        $('.prop_cityError').text('Property city is required.');
        flag = false;
    }
    const street_no = form.street_no.value;
    if (!street_no) {
        $('.street_noError').text('Street Name is required.');
        flag = false;
    }
    const prop_zip_code = form.prop_zip_code.value;
    if (!prop_zip_code) {
        $('.prop_zip_codeError').text('Property Zip Code is required.');
        flag = false;
    }
    const prop_google_location = form.prop_google_location.value;
    if (!prop_google_location) {
        $('.prop_google_locationError').text('Property Google Location is required.');
        flag = false;
    }
    
    // seller address
    const seller_name = form.seller_name.value;
    if (!seller_name) {
        $('.seller_nameError').text('Seller name is required.');
        flag = false;
    }
    const seller_street_name = form.seller_street_name.value;
    if (!seller_street_name) {
        $('.seller_street_nameError').text('Seller street name is required.');
        flag = false;
    }
    const seller_country_id = form.seller_country_id.value;
    if (!seller_country_id) {
        $('.seller_country_idError').text('Seller country is required.');
        flag = false;
    }
    const seller_state_id = form.seller_state_id.value;
    if (!seller_state_id) {
        $('.seller_state_idError').text('Seller state is required.');
        flag = false;
    }
    const seller_city_id = form.seller_city_id.value;
    if (!seller_city_id) {
        $('.seller_city_idError').text('Seller city is required.');
        flag = false;
    }
    const seller_zip_code = form.seller_zip_code.value;
    if (!seller_zip_code) {
        $('.seller_zip_codeError').text('Seller zip code is required.');
        flag = false;
    }
    const seller_phone = form.seller_phone.value;
    if (!seller_phone) {
        $('.seller_phoneError').text('Seller phone is required.');
        flag = false;
    }
    const seller_email = form.seller_email.value;
    if (!seller_email) {
        $('.seller_emailError').text('Seller email id is required.');
        flag = false;
    }
    
    // agent
    const agent_name = form.agent_name.value;
    if (!agent_name) {
        $('.agent_nameError').text('Agent Name is required.');
        flag = false;
    }
    const agent_street_name = form.agent_street_name.value;
    if (!agent_street_name) {
        $('.agent_street_nameError').text('Agent street name is required.');
        flag = false;
    }
    const agent_country_id = form.agent_country_id.value;
    if (!agent_country_id) {
        $('.agent_country_idError').text('Agent country is required.');
        flag = false;
    }
    const agent_state_id = form.agent_state_id.value;
    if (!agent_state_id) {
        $('.agent_state_idError').text('Agent state is required.');
        flag = false;
    }
    const agent_city_id = form.agent_city_id.value;
    if (!agent_city_id) {
        $('.agent_city_idError').text('Agent city is required.');
        flag = false;
    }
    const agent_zip_code = form.agent_zip_code.value;
    if (!agent_zip_code) {
        $('.agent_zip_codeError').text('Agent zip code is required.');
        flag = false;
    }
    const agent_phone = form.agent_phone.value;
    if (!agent_phone) {
        $('.agent_phoneError').text('Agent phone is required.');
        flag = false;
    }
    const agent_email = form.agent_email.value;
    if (!agent_email) {
        $('.agent_emailError').text('Agent email id is required.');
        flag = false;
    }
    return flag;
}

</script>
<!--// ------------------------- Property-------------------------------------->
<script>
// get state
function getState(id, callback = null) {
    var URL = '{{url("get-state-by-country")}}/' + id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-state').html(response);
            if (callback) {
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
// get city
function getCity(id, callback = null) {
        var URL = '{{url("get-city-by-state")}}/' + id;
        $.ajax({
            url: URL,
            type: "GET",
            success: function(response) {
                $('#cp-city').html(response);
                if (callback) {
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
<!--// ------------------------- seller-------------------------------------->
<script>
// get state
function getSellState(id, callback = null) {
    var URL = '{{url("get-state-by-country")}}/' + id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#seller_state_id').html(response);
            if (callback) {
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
// get city
function getSellerCity(id, callback = null) {
        var URL = '{{url("get-city-by-state")}}/' + id;
        $.ajax({
            url: URL,
            type: "GET",
            success: function(response) {
                $('#seller_city_id').html(response);
                if (callback) {
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
<!--// ------------------------- agent-------------------------------------->
<script>
// get state
function getAgentState(id, callback = null) {
    var URL = '{{url("get-state-by-country")}}/' + id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#agent_state_id').html(response);
            if (callback) {
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
// get city
function getAgentCity(id, callback = null) {
        var URL = '{{url("get-city-by-state")}}/' + id;
        $.ajax({
            url: URL,
            type: "GET",
            success: function(response) {
                $('#agent_city_id').html(response);
                if (callback) {
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
<script>
// document.getElementById('uploadDocForm').addEventListener('submit', function (e) {
//     e.preventDefault();

//     const party = document.getElementById('party').value;
//     const docType = document.getElementById('docType').value;
//     const file = document.getElementById('uploadFile').files[0];

//     if (!file) {
//         alert('Please select a file');
//         return;
//     }

//     const targetInputId = `${party}_${docType}`; // e.g., agent_aadhar_card
//     let existingInput = document.getElementById(targetInputId);

//     if (existingInput) {
//         existingInput.remove(); // remove if already exists (for update)
//     }

//     // Create visible clone file input for proper form submission
//     const newInput = document.createElement('input');
//     newInput.type = 'file';
//     newInput.name = targetInputId;
//     newInput.id = targetInputId;
//     newInput.style.display = 'none';

//     // Set file using DataTransfer
//     const dt = new DataTransfer();
//     dt.items.add(file);
//     newInput.files = dt.files;

//     // Append to hidden container
//     document.getElementById('hidden-file-inputs').appendChild(newInput);

//     alert(`Hidden file input created: ${targetInputId}`);
//     this.reset(); // optional: reset form
// });
</script>
<script>
document.getElementById('uploadDocForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const party = document.getElementById('party').value;
    const docType = document.getElementById('docType');
    const docTypeText = docType.options[docType.selectedIndex].text;
    const file = document.getElementById('uploadFile').files[0];

    if (!file) {
        alert('Please select a file');
        return;
    }

    const key = `${party}_${docType.value}`; // e.g. agent_pan_card

    // Remove previous hidden input with same key if exists
    const existingInput = document.getElementById(key);
    if (existingInput) existingInput.remove();

    // Create new hidden input
    const newInput = document.createElement('input');
    newInput.type = 'file';
    newInput.name = key;
    newInput.id = key;
    newInput.style.display = 'none';

    const dt = new DataTransfer();
    dt.items.add(file);
    newInput.files = dt.files;

    document.getElementById('hidden-file-inputs').appendChild(newInput);

    // === Append to the visible list ===
    const ul = document.getElementById(`${party}_docs`);
    if (ul) {
        // Remove existing <li> for same doc type if exists
        const existingLi = document.querySelector(`#${party}_docs li[data-doc="${docType.value}"]`);
        if (existingLi) existingLi.remove();

        const li = document.createElement('li');
        li.setAttribute('data-doc', docType.value); // for future reference/removal
        li.innerHTML = `<span class="bg_u_clr">${docTypeText}</span>`;
        ul.appendChild(li);
    }

    // alert(`${docTypeText} uploaded under ${party}`);
    this.reset();
    hideDocModal('hideDocModal');
});

function hideDocModal(modal_id){
    const modalElement = document.getElementById(modal_id);
    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
    modalInstance.hide();
}
</script>



@include('front.layouts.footer')


