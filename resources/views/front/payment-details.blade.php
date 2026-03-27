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
.tx_blak{color:#000 !important;}
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

.show_boxxx#itemisedPaidAmount {
    display: none;
}
.show_boxxx.active#itemisedPaidAmount {
    display: block;
}

.yesNoButton input[type="checkbox"].toggle {
    opacity: 0;
    position: absolute;
    left: -99999px;
}
.yesNoButton input[type="checkbox"].toggle + label {
    height: 40px;
    line-height: 40px;
    background-color: red;
    padding: 0px 16px;
    border-radius: 60px;
    display: inline-block;
    position: relative;
    cursor: pointer;
    -moz-transition: all 0.25s ease-in;
    -o-transition: all 0.25s ease-in;
    -webkit-transition: all 0.25s ease-in;
    transition: all 0.25s ease-in;
    -moz-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
    -webkit-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
    box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
}
.yesNoButton input[type="checkbox"].toggle + label:before,
input[type="checkbox"].toggle + label:hover:before {
    content: " ";
    position: absolute;
    top: 2px;
    left: 2px;
    width: 46px;
    height: 36px;
    background: #fff;
    z-index: 2;
    -moz-transition: all 0.25s ease-in;
    -o-transition: all 0.25s ease-in;
    -webkit-transition: all 0.25s ease-in;
    transition: all 0.25s ease-in;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    border-radius: 50px;
}
.yesNoButton input[type="checkbox"].toggle + label .off,
.yesNoButton input[type="checkbox"].toggle + label .on {
    color: #fff;
}
.yesNoButton input[type="checkbox"].toggle + label .off {
    margin-left: 46px;
    display: inline-block;
}
.yesNoButton input[type="checkbox"].toggle + label .on {
    display: none;
}
.yesNoButton input[type="checkbox"].toggle:checked + label .off {
    display: none;
}
.yesNoButton input[type="checkbox"].toggle:checked + label .on {
    margin-right: 46px;
    display: inline-block;
}
.yesNoButton input[type="checkbox"].toggle:checked + label,
.yesNoButton input[type="checkbox"].toggle:focus:checked + label {
    background-color: #4a83cc;
}
.yesNoButton input[type="checkbox"].toggle:checked + label:before,
.yesNoButton input[type="checkbox"].toggle:checked + label:hover:before,
.yesNoButton input[type="checkbox"].toggle:focus:checked + label:before,
.yesNoButton input[type="checkbox"].toggle:focus:checked + label:hover:before {
    background-position: 0 0;
    top: 2px;
    left: 100%;
    margin-left: -48px;
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


#addpaymentss{opacity:1;}
#addpaymentss:before {background: #00000075; content: ''; width: 100%; height: 100%; position: absolute;}
#addpaymentss .modal-dialog.modal-dialog-centered {position:fixed; left:50%; top:50%; transform: translate(-50%, -50%); display: flex; justify-content: center; align-items: center; width:94%; margin:0;}

#addpaymentss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button {font-size:14px; color:#000; border:#1c5299 solid 1px; padding:8px 25px; display:inline-block; border-radius:50px; margin-right:15px;}


@media (min-width: 481px) and (max-width: 767px) {
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
	
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: block; width: 40%; margin: 0 auto;
        margin-top: 10px;}
}

@media (min-width: 320px) and (max-width: 480px) {
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
	
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: inline-block; margin-top: 10px;}

}

.fade{
    opacity: 1;
}
</style>


<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="videotutorialmodal" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
 </div> 

<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="addpaymentss" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		  <form action="{{ route('payment-details.save') }}" id="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_market_id" value="{{ $property->id }}">

                <div class="hd_res_listsss">
                    <h2>Particular/Purpose</h2>
                </div>
                <div class="all_frm_list p-0 mb-0">
				    <div class="row">
					 <div class="col-lg-4">
					  <div class="form-group managsss1">
                        <label>Amount </label>
                        <span class="currencyInputprefix">₹</span>
                        <input name="amount" id="" class="currencyInput" type="text" placeholder="Amount" value="" required="" />
                      </div>
					 </div>
					 
					 <div class="col-lg-4">
					  <div class="form-group managsss1">
                       <label>Date</label>
                       <input name="date" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                      </div>
					 </div>
					 
					 <div class="col-lg-4">
					  <div class="form-group">
                       <label>Payment Mode</label>
                       <select name="payment_mode" class="currencyInput">
					    <option value="">Select Transtion Mode</option>
                        <option value="Cash">Cash</option>
                        <option value="By Netbanking">By Netbanking</option>
                        <option value="By Check">By Check</option>
					   </select>
                      </div>
					 </div>

					 <div class="col-lg-12">
					  <div class="form-group">
                       <label>Source of Funding</label>
                       <select name="funding_source" class="currencyInput">
					    <option value="">Select Transtion Mode</option>
					    <option value="offline">Offline</option>
					    <option value="online">Online</option>
					   </select>
                      </div>
					 </div>
					 
					  <div class="col-lg-12">
					  <div class="form-group managsss1">
                       <label>Transaction Proof*</label>
                       <input name="transaction" id="" type="file" placeholder="" value="" class="currencyInput browsss" />
                       <div id="preview_transaction" class="mt-2">
            @if(old('old_transaction_proof'))
                <a href="{{ asset(old('old_transaction_proof')) }}" download title="Download Transaction Proof">
                    <i class="fa fa-download text-primary"></i> Download Existing File
                </a>
            @endif
        </div>
                            <input type="hidden" name="old_transaction_proof" id="old_transaction_proof">

                      </div>
					 </div>

					 <div class="col-lg-12">
					  <div class="form-group managsss1">
                       <label>Receipt From Seller**</label>
                       <input name="receipt" id="" type="file" placeholder="" value="" class="currencyInput browsss" />
                       <div id="preview_receipt" class="mt-2">
            @if(old('old_receipt_from_seller'))
                <a href="{{ asset(old('old_receipt_from_seller')) }}" download title="Download Seller Receipt">
                    <i class="fa fa-download text-primary"></i> Download Existing File
                </a>
            @endif
        </div>
                            <input type="hidden" name="old_receipt_from_seller" id="old_receipt_from_seller">

                      </div>
					 </div>

					 <div class="col-lg-12">
					  <div class="form-group managsss1">
                       <label>Remarks</label>
                       <input name="remark" id="" type="text" placeholder="Enter here the Purpose for Making This payment or any Remarks" value="" class="currencyInput" />
                      </div>
					 </div>


					 
					 <div class="col-lg-12 mt-4">
					  <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss yellowe_bg tx_blak">Save & Add Next</button>
                                            <!-- <button type="submit" class="actsss">Save & Exit</button> -->
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
   <div class="medilss"><h4>Payment Details</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Payment Details</span>
   </div>
  </div>
</section>  

<section class="dash_board_pages">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered tst_cam_listst">
               <tbody>
    <!-- Header Row -->
    <tr>
        <td colspan="7">
            Payment Details of the Property - FY-2020/01 ({{ $property->name ?? 'Property Name' }})
        </td>
        <td colspan="3">
            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i></a>&nbsp;
            <a href="javascript:void(0);">Share & Download</a>
        </td>
    </tr>

    <!-- Ownership and Location Row -->
    <tr>
        <td class="yellowe_bg">Ownership</td>
        <td class="yellowe_bg">{{ $property->owner_name ?? 'Ramawtar' }}</td>
        <td class="yellowe_bg">Location</td>
        <td colspan="3" class="yellowe_bg">{{ $property->location ?? 'Noida' }}</td>
        <td class="yellowe_bg">
            <a href="javascript:void(0);" class="sm_right_vdooos siz_vdoo" data-toggle="modal" data-target="#videotutorialmodal">
                <img src="https://1crapp.allproject.online/img/video-tutorial-new.png" alt="Video">
            </a>
        </td>
        <td colspan="3" class="yellowe_bg add_paymmntss">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#addpaymentss">+ Add Payment</a>
        </td>
    </tr>

    <!-- Table Headings -->
    <tr>
        <td class="grea_bg" width="3%">S.No</td>
        <td class="grea_bg" width="12%">Particulars Purpose</td>
        <td class="grea_bg" width="10%">Amount</td>
        <td class="grea_bg" width="10%">Date</td>
        <td class="grea_bg" width="10%">Mode</td>
        <td class="grea_bg" width="14%">Source (From Drop Down)</td>
        <td class="grea_bg" width="13%">Transaction Proof (Bank)</td>
        <td class="grea_bg" width="11%">Receipts (From Seller)</td>
        <td class="grea_bg" width="6%">Remarks</td>
        <td class="grea_bg" width="10%">Action</td>
    </tr>

    @php $total = 0; @endphp

    @forelse($payments as $index => $payment)
        @php $total += $payment->amount; @endphp
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ ucwords($payment->remarks ?? '—') }}</td>
            <td>₹{{ number_format($payment->amount) }}</td>
            <td>{{ \Carbon\Carbon::parse($payment->paid_date)->format('d-m-Y') }}</td>
            <td>{{ ucwords($payment->payment_mode) }}</td>
            <td>{{ ucwords($payment->funding_source) }}</td>
            <td>
                @if($payment->transition_proof)
                    <a href="{{ asset($payment->transition_proof) }}" download title="Download Transaction Proof">
                        <i class="fa fa-download text-primary"></i>
                    </a>
                @else
                    —
                @endif
            </td>
            <td>
                @if($payment->seller_receipt)
                    <a href="{{ asset($payment->seller_receipt) }}" download title="Download Seller Receipt">
                        <i class="fa fa-download text-primary"></i>
                    </a>
                @else
                    —
                @endif
            </td>
            <td>{{ $payment->remarks ?? '—' }}</td>
            <td>
                <a href="javascript:void(0);" onclick="editPrice({{ $payment->id }})">
                    <i class="fa fa-pencil"></i>
                </a>&nbsp;
                <a href="javascript:void(0);" onclick="deletePayment({{ $payment->id }})">
                    <i class="fa fa-trash"></i>
                </a>&nbsp;
                <a href="{{ route('payment.pdf', ['propertyId' => $property->id]) }}" target="_blank">
                    <i class="fa fa-download"></i>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10" class="text-center">No payment records found.</td>
        </tr>
    @endforelse

    <!-- Total Row -->
    @if(count($payments) > 0)
    <tr>
        <td colspan="2" class="text-right"><strong>Total</strong></td>
        <td colspan="8"><strong>₹{{ number_format($total) }}</strong></td>
    </tr>
    @endif
</tbody>

            </table>
        </div>
		

    
	   <div class="tanksss">
	    <div class="ftr_thknsss">
	     <div class="lgo_partss"><img src="https://1crapp.allproject.online/home/img/logo 1.png" alt=""></div>
	     <p>Prepared using 1CRAPP.COM , Just with Few Click You Too Can Create it.. lt's Free! <a href="javascript:void(0);" class="ex_btn_areaa">Explore More <i class="fa fa-chevron-circle-right"></i></a></p>
	    </div>
	    </div>
		
		
	  
	</div>
</section>
   
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 




		<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>
        <script>
function deletePayment(id) {
    if (!confirm("Are you sure you want to delete this payment?")) {
        return;
    }

    $.ajax({
        url: '/payment-details/' + id,
        type: 'DELETE',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            alert(response.message);
            location.reload(); // Refresh the page or re-render the table
        },
        error: function(xhr) {
            alert('Failed to delete payment.');
        }
    });
}
</script>

		<script>
function editPrice(id) {
    $('#addpaymentss form')[0].reset();
    $('input[name="id"]').remove();

    // Clear previous previews
    $('#preview_transaction').html('');
    $('#preview_receipt').html('');

    $.ajax({
        url: '/payment-details/' + id + '/edit',
        method: 'GET',
        success: function (response) {
            // Populate form
            $('input[name="amount"]').val(response.amount);
            $('input[name="date"]').val(response.paid_date);
            $('select[name="payment_mode"]').val(response.payment_mode);
            $('select[name="funding_source"]').val(response.funding_source);
            $('input[name="remark"]').val(response.remarks);
            $('input[name="property_market_id"]').val(response.property_market_id);

            // Append hidden ID
            $('<input>').attr({
                type: 'hidden',
                name: 'id',
                value: response.id
            }).appendTo('#addpaymentss form');

            // Set old file paths
            $('input[name="old_transaction_proof"]').val(response.transition_proof);
$('input[name="old_receipt_from_seller"]').val(response.seller_receipt);

$('#preview_transaction').html(
    response.transition_proof
        ? `<a href="/${response.transition_proof}" download><i class="fa fa-download text-primary"></i> Download Existing File</a>`
        : '—'
);

$('#preview_receipt').html(
    response.seller_receipt
        ? `<a href="/${response.seller_receipt}" download><i class="fa fa-download text-primary"></i> Download Existing File</a>`
        : '—'
);

            // Show modal
            $('#addpaymentss').modal('show');
        },
        error: function () {
            alert('Error fetching payment data.');
        }
    });
}
</script>


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
		</>

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


