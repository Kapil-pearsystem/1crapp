@include('web.common.header')

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

.add_paymmntss a {
    background: #f94755;
    padding: 3px 10px;
    color: #fff;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
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
.grea_bg1{background:#e9e9e9 !important;}
.yellowe_bg{background:#ffdd00 !important;}
.bluess_bg{background:#6490cb !important;}
.reds_bg{background:#f94554 !important;}
.tx_read{color:#f94554 !important; font-weight:600;}
.tx_white{color:#fff !important;}
.tx_bluess{color:#6490cb !important; font-weight:600;}
.brd_none{border:none !important;}
.brd_right{border-right:1px solid #ddd !important;}
.brd_left{border-left:1px solid #ddd !important;}
.brd_bottom{border-bottom:1px solid #ddd !important;}
.arow_rt_parts{text-align: right !important; background: #bbe4ed !important;     font-size: 11px !important;}
.fnt_size{font-size: 11px !important; padding-left: 3px !important; padding-right: 3px !important;}
.tx_right{text-align:right !important;}
.tx_left{text-align:left !important;}

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

a.abt_dnwn {
    background: #f94554;
    padding: 3px 10px 2px 10px;
    display: inline-block;
    color: #fff;
    font-weight: 500;
    font-size: 12px;
    border-radius: 30px;
}

select.abt_dnwn {
    background: #f94554;
    border: none;
    color: #fff;
    border-radius: 20px;
    padding: 1px 0px 1px 5px;
    font-weight: 700;
    cursor: pointer;
    font-size: 11px;
}
select.abt_dnwn:focus{outline:none;}

.proprt_box_sec.bothss#suport_al_areaa {
    margin: 0;
    box-shadow: none;
    border: none;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss {
    padding: 0;
    min-height: auto;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.acr_liststst .accordion-item {
    padding: 0;
}

.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: auto;
    margin-right: 10px;
}

.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.managess_cnts {
    line-height: 34px;
    font-size: 14px;
    padding-right: 30px;
    color: #000;
    font-weight: 500;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.acr_liststst .accordion-item .unddrlstt h6 {
    font-weight: 500;
    color: #000000;
    font-size: 14px;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss .unddrlstt h6 span.price_lststs {
    border-left: #edeaea solid 1px;
    padding-left: 10px;
    width: auto;
    padding-right: 10px;
}

.lists_tablssts .unddrlstt h6 i.fa.fa-angle-down {
    background: #bedaff;
    padding: 0 5px;
    border-radius: 2px;
    cursor: pointer;
    position: absolute;
    right:0%;
    top: 10px;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.acr_liststst .accordion-item .unddrlstt span.manag_space_areaa {
    padding-right: 10px;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.acr_liststst .accordion-item .unddrlstt span.price_lststs {
    width: 188px;
    text-align: left;
}

.bothss_itemms {
    display: inline-block;
    width: 100%;
}
.bothss_itemms #suport_al_areaa {
    width: 54.4%;
    float: left;
}

.usr_likts .urs_bx_rgss{margin-bottom:0;}
.usr_likts .urs_bx_rgss .cnt_txt_bx a.dwn_ldss {
    background: #fff;
    color: #000;
    padding: 7px 13px;
    display: inline-block;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
	margin-top:15px;
}
.usr_likts .urs_bx_rgss .mg_bx_araeae a.dwn_ldss{
	    background: #fff;
    color: #000;
    padding: 7px 13px;
    display: inline-block;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
	margin-top:15px;
}




.abt_dnwn.dropdown button.dropbtn {
    background: #f94554;
    border: none;
    padding: 2px 7px;
    color: #fff;
    font-weight: 500;
    border-radius: 30px;
    font-size: 12px;
}
.abt_dnwn.dropdown button.dropbtn i {
    font-size: 11px;
    margin-right: 1px;
}
.abt_dnwn.dropdown {
  position: relative;
  display: inline-block;
}

.abt_dnwn.dropdown .dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: auto;
    z-index: 1;
    left: 2px;
}

.abt_dnwn.dropdown .dropdown-content a {
    color: black;
    padding: 7px 8px;
    text-decoration: none;
    display: block;
    font-size: 12px;
}

.abt_dnwn.dropdown .dropdown-content a:hover {background-color: #f1f1f1}

.abt_dnwn.dropdown:hover  .dropdown-content {
  display: block;
}

.abt_dnwn.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}


@media (min-width: 481px) and (max-width: 767px) {
.mb_view_hides{display:none !important;}
.modal-content.all_frm_list .all_frm_list.p-0.mb-0 {
    padding: 0 !important;
}
.table-responsive>.table-bordered {
        border: 0;
        width: 100%;
        display: contents;
}	
table.table.table-bordered.tst_cam_listst tr td {
    text-wrap-mode: nowrap;
}
	
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: block; width: 40%; margin: 0 auto;
        margin-top: 10px;}

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


.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button.actsss:last-child {
    margin-right: 0;
}
.all_supportss_modalss .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button.actsss {
    font-size: 13px;
    padding: 8px 10px;
    margin-right: 5px;
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

.all_frm_list .form-group.managsss1 i.fa.fa-inr {
    position: absolute;
    left: 12px;
    bottom: 13px;
    font-size: 14px;
    color: #767676;
}
.all_frm_list .form-group.managsss1 i.fa.fa-percent {
    position: absolute;
    right: 12px;
    bottom: 13px;
    font-size: 14px;
    color: #767676;
}

@media (min-width: 320px) and (max-width: 480px) {
.mb_view_hides{display:none !important;}
.modal-content.all_frm_list .all_frm_list.p-0.mb-0 {
    padding: 0 !important;
}
.table-responsive>.table-bordered {
        border: 0;
        width: 100%;
        display: contents;
}
table.table.table-bordered.tst_cam_listst tr td {
    text-wrap-mode: nowrap;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.acr_liststst .accordion-item .unddrlstt span.price_lststs {
    width: 126px;
}
.proprt_box_sec.bothss#suport_al_areaa .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.managess_cnts {
    width: 100%;
}

.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: inline-block; margin-top: 10px;}
}
.fade {
    opacity: 999;
}
.modal-dialog-centered {
    margin-top: 10%;
}

</style>
<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="addindomess" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="add-income-form">
                <!-- CSRF if needed -->              
				<div class="hd_res_listsss">
                    <h2>Add Income</h2>
                </div>
                <div id="addIncomeMsg" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Income</label>
                                <select id="party" name="income_type" class="currencyInput">
                                    <option value="1">Active Earning</option>
                                    <option value="2">Passive Earning</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Source Income</label>
                                <input type="text" name="income_source" placeholder="Name" class="browsss" required="" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" name="amount" placeholder="Amount" class="browsss" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" class="close-modal" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
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
<!-- End Modal -->
<!-- edit income -->
<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="editindomess" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="edit-income-form">
                <!-- CSRF if needed -->              
				<div class="hd_res_listsss">
                    <h2>Edit Income</h2>
                </div>
                <input type="hidden" name="id" id="income_id" />
                <div id="editIncomeMsg" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Income</label>
                                <select id="party" name="income_type" class="currencyInput income_type">
                                    <option value="1">Active Earning</option>
                                    <option value="2">Passive Earning</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Source Income</label>
                                <input type="text" name="income_source" id="income_source" placeholder="Name" class="browsss" required="" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" name="amount" id="income_amount" placeholder="Amount" class="browsss" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);"  class="close-modal" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Update</button>
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
<!-- End Modal -->
 
<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="addSpendableAmount" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="add-spendable-amount-form" onsubmit="return postSpandableAmount()" name="f2">
                <!-- CSRF if needed -->              
				<div class="hd_res_listsss">
                    <h2 id="spandable_amount_title">Add Upfront Savings Amount </h2>
                </div>
                <input type="hidden" id="spandable_amount_id" name="spandable_amount_id"/>
                <div id="addSpendableAmountMsg" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="form-group managsss1">
                                <label>Financial Freedom Account</label>
								<i class="fa fa-percent">%</i>
                                <input  type="text" id="ffa_id" min="0" maxLength="5" name="ffa" placeholder="25" class="browsss percent-field finance-percent" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group managsss1">
                                <label>Emergency Saving Account</label>
								<i class="fa fa-percent">%</i>
                                <input  type="text" id="esa_id" min="0" maxLength="5" name="esa" placeholder="25" class="browsss percent-field finance-percent"  required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group managsss1">
                                <label>Fun & Education Account</label>
								<i class="fa fa-percent">%</i>
                                <input type="text" id="fea_id" min="0" maxLength="5" name="fea" placeholder="25" class="browsss percent-field finance-percent" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group managsss1">
                                <label>Spiritual & Fulfilment Account</label>
								<i class="fa fa-percent">%</i>
                                <input type="text" id="sfa_id" min="0" maxLength="5" name="sfa" placeholder="25" class="browsss percent-field finance-percent" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" class="close-modal" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
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
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="addexpenses" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="add-expenses-form">
                <!-- CSRF if needed -->              
				<div class="hd_res_listsss">
                    <h2>Add Expenses</h2>
                </div>
                <div id="addExpensesMsg" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Expenses Name?</label>
                                <input type="text" name="expenses_name" placeholder="Name" class="browsss" required="" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>% of Net Spandable Amount</label>
								<i class="fa fa-percent">%</i>
                                <input type="text" min="0" maxLength="2" name="spandable_percent" placeholder="10" class="browsss percent-field current-spandable-percent" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Current Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" readonly name="current_amount" placeholder="Current Amount" class="browsss  current-spandable-amount" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Required Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" name="required_amount" placeholder="Required Amount" class="browsss" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" class="close-modal" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
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
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="editexpensesmodal" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		    <form id="edit-expenses-form">
                <!-- CSRF if needed -->              
				<div class="hd_res_listsss">
                    <h2>Edit Expenses</h2>
                </div>
                <input type="hidden" id="expenses_id" name="id"/>
                <div id="editExpensesMsg" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Expenses Name?</label>
                                <input type="text" name="expenses_name" id="expenses_name" placeholder="Name" class="browsss" required="" />
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>% of Net Spandable Amount</label>
								<i class="fa fa-percent">%</i>
                                <input type="text" id="spandable_percent" min="0" maxLength="2" name="spandable_percent" placeholder="10" class="browsss percent-field current-spandable-percent" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Current Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" readonly name="current_amount" id="expenses_current_amount" placeholder="Current Amount" class="browsss current-spandable-amount" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group managsss1">
                                <label>Required Amount</label>
								<i class="fa fa-inr"></i>
                                <input type="text" name="required_amount" id="expenses_required_amount" placeholder="Required Amount" class="browsss" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" class="close-modal" data-dismiss="modal" aria-label="Close">Cancel</a>
                                            <button type="submit" class="actsss">Update</button>
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
<!-- End Modal -->
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Personal Budget Management ( PBM )</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Personal Budget Management ( PBM )</span>
   </div>
  </div>
</section>  

<section class="dash_board_pages">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered tst_cam_listst">
                <tbody>
				   
                    <tr>
                        <td colspan="5" width="76%" class="yellowe_bg tx_left"><img src="https://1crapp.allproject.online/home/img/logo 1.png" width="40" alt="" /> <b>Personal Budget Management : XXXXXX (Ramjee Meena)</b></td>
                        <td class="yellowe_bg">
						 <a href="javascript:void(0);" class="abt_dnwn"><i class="fa fa-share-alt"></i> Share</a> &
						 <a href="javascript:void(0);" class="abt_dnwn"><i class="fa fa-cloud-download"></i> Download</a>
						</td>
                    </tr>
					
					

                    <tr>
                        <td colspan="6" class="bluess_bg tx_left">
						 <b>Part |: Monthly Income</b>
						 <a href="javascript:void(0);" class="abt_dnwn float-right" data-toggle="modal" data-target="#addindomess"><i class="fa fa-plus-square"></i> Add Income</a>
						</td>
                    </tr>
					
					<tr>
				    <td colspan="6" class="p-0 brd_none">
					 <table class="table table-bordered tst_cam_listst mb-0">
					   
					<tr>
                        <td width="68%" colspan="6" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0">
							<tbody id="income_data"></tbody>
                                <tr>
                                    <td colspan="6" class="bluess_bg tx_left">
                                        <b>Upfront Savings</b>
                                        <a href="javascript:void(0);" class="abt_dnwn float-right" data-toggle="modal" data-target="#addSpendableAmount" id="spandable_table_title"><i class="fa fa-plus-square"></i> Add Upfront Savings</a>
                                    </td>	 									
                                </tr>
                                
                                <tr>
                                    <td>(1)</td>
                                    <td colspan="3" class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
									   <td class="brd_none brd_right brd_bottom" width="43%">Financial Freedom Account </td>
									   <td class="brd_none brd_right brd_bottom" width="43%" id="ffa_percent">0%</td>
									   <td class="brd_none brd_bottom" width="13%">-</td>
									  </tr>
									 </table> 
									</td>
                                    <td width="14.9%" id="ffa_amount">₹0.00</td>           									
                                </tr>
                                
								<tr>
                                    <td width="12%">(2)</td>
                                    <td width="41.2%" colspan="3" class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
									   <td class="brd_none brd_right brd_bottom" width="43%">Emergency Saving Account</td>
									   <td class="brd_none brd_right brd_bottom" width="43%" id="esa_percent">0%</td>
									   <td class="brd_none brd_bottom" width="13%">-</td>
									  </tr>
									 </table> 
									</td>
                                    <td width="14.9%"  id="esa_amount">₹0.00</td>                                     
                                </tr>

                                <tr>
                                    <td>(3)</td>
                                    <td colspan="3" class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
									   <td class="brd_none brd_right brd_bottom" width="43%">Fun & Education Account</td>
									   <td class="brd_none brd_right brd_bottom" width="43%"  id="fea_percent">0%</td>
									   <td class="brd_none brd_bottom" width="13%">-</td>
									  </tr>
									 </table> 
									</td>
                                    <td width="14.9%" id="fea_amount">₹0.00</td>   									
                                </tr>

                                <tr>
                                    <td>(4)</td>
                                    <td colspan="3" class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
									   <td class="brd_none brd_right brd_bottom" width="43%">Spiritual & Fulfilment Account</td>
									   <td class="brd_none brd_right brd_bottom" width="43%"  id="sfa_percent">0%</td>
									   <td class="brd_none brd_bottom" width="13%">-</td>
									  </tr>
									 </table> 
									</td>
                                    <td width="14.9%" id="sfa_amount">₹0.00</td>   									
                                </tr>

                                <tr>
                                    <td colspan="4" class="tx_right brd_none"><b>Net Spandable Amount (RSA)</b></td>
                                    <td id="total_spandable_amount">₹0.00</td> 	 									
                                </tr>
					    </table>
					   </td>
					   <td width="32%" colspan="6" class="p-0 brd_none mb_view_hides" style="background: #003250;">
					    <div class="usr_likts">
					<div class="urs_bx_rgss d_bluee">
						<div class="cnt_txt_bx">
							<h4>Get Free e-Book!</h4>
							<p>Ultimote 4 Step Guide: How to be the agent of choice?</p>
							<a href="javascript:void(0);" class="dwn_ldss">Download</a>
						</div>

						<div class="mg_bx_araeae">
							<img src="https://kapil.1crapp.com/home/img/bk_images.png" alt="">
						</div>
					</div>
					
				</div>
					   </td>
					  </tr>
					 </table>
					</td>
				   </tr>

                   
                    
			   </tbody>
            </table>

            <table class="table table-bordered tst_cam_listst">
                <tbody>
					<tr>
                        <td colspan="6" class="bluess_bg tx_left">
						 <b>Part 2: Expenses</b>
						 <a href="javascript:void(0);" class="abt_dnwn float-right" data-toggle="modal" data-target="#addexpenses"><i class="fa fa-plus-square"></i> Add Expenses</a>
						</td>
                    </tr>

                   
                    <tr>
                        <td colspan="6" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td width="15%"><b>Current</b></td>
                                    <td width="13.7%"><b>Required</b></td>
                                    <td width="9.2%"><b>Magic Maney</b></td>                                 
                                    <td width="8.9%"><b>Action</b></td>                                 
                                </tr>
								
								<tr>
                                    <td colspan="6" class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0 ">
                                            <tbody id="expenses_data"></tbody>     
                                        </table>
                                    </td>
                                </tr>

                                
                            </table>
                        </td>
                    </tr>
					
					
                </tbody>
            </table>
        
		
		
		    <table class="table table-bordered tst_cam_listst">
                <tbody>
					
					<tr>
                        <td colspan="6" class="bluess_bg tx_left"><b>Part 3: Budget Analysis</b></td>
                    </tr>

                   
					
					<tr>
				    <td colspan="6" class="p-0 brd_none">
					 <table class="table table-bordered tst_cam_listst mb-0">
					   
					<tr>
                        <td width="50%" colspan="6" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0">						
								<tr>
                                    <td width="40%" class="tx_left"><b>Net Spendable Amount</b></td>                                   
									<td class="tx_left" id="total_spandable_amount_data">₹0.00</td>                                     
                                </tr>

                                <tr>
                                    <td class="tx_left"><b>Current Expenses ( - )</b></td>
                                    <td class="tx_left" id="total_current_amount_data">₹0.00</td>           									
                                </tr>
                                <tr>
                                    <td width="40%" class="tx_left"><b>Remaining Spendable Amount ( + )</b></td>                                   
									<td class="tx_left" id="total_remaining_spandable_amount_data">₹0.00</td>                                     
                                </tr>
                                <tr>
                                    <td class="tx_left"><b>Less Required Expenses</b></td>
                                    <td class="tx_left" id="total_required_amount_data">₹0.00</td>           									
                                </tr>
                                <tr>
                                    <td class="tx_left"><b >Total Magic Money</b></td>
                                    <td class="tx_left" ><span class="yellowe_bg p-2"><b id="total_magic_amount_data">₹0.00</b></span></td>           									
                                </tr>
                                <tr>
                                    <td class="tx_left bg-primary"><b>Total Surplus/Deficit</b></td>                                    
									<td class="tx_left bg-primary" ><b id="total_surplus_deficit_data">₹0.00</b>/-</td>									
                                </tr>                            
					    </table>
					   </td>
					   <td width="50%" colspan="6" class="p-0 brd_none mb_view_hides" style="background: #003250;">
					    <div class="usr_likts">
					<div class="urs_bx_rgss d_bluee">
						<div class="cnt_txt_bx">
							<h4>Get Free e-Book!</h4>
							<p>Ultimote 4 Step Guide: How to be the agent of choice?</p>
							
						</div>
						<div class="mg_bx_araeae text-right">
							<a href="javascript:void(0);" class="dwn_ldss">Download</a>
						</div>
					</div>
					
				</div>
					   </td>
					  </tr>
					 </table>
					</td>
				   </tr>
					
					
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
<script src='https://cdn2.hubspot.net/hubfs/476360/Chart.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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

<!-- cash flow  -->
<script>
    $('.close').on('click', function() {
        $(this).closest('.modal').modal('hide');
    });
    $('.close-modal').on('click', function() {
        $(this).closest('.modal').modal('hide');
    });
    $(document).ready(function() {
        loadData();
    });
    function loadData(){
        loadIncomes();
        getSpandableAmount();
        loadExpenses();
        loadNetData();
    }
    document.getElementById('add-income-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('pbm.save-income') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadData(); // Load assets after saving
                    $('#addIncomeMsg').text('Income saved successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('add-income-form').reset();
                        $('#addindomess').modal();
                        document.querySelector('#addindomess .close, #addindomess [data-dismiss="modal"]').click();
                        $('#addIncomeMsg').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    document.getElementById('edit-income-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('pbm.save-income') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadData(); // Load assets after saving
                    $('#editIncomeMsg').text('Income updated successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('edit-income-form').reset();
                        $('#editindomess').modal();
                        document.querySelector('#editindomess .close, #editindomess [data-dismiss="modal"]').click();
                        $('#editIncomeMsg').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    document.getElementById('edit-cash-flow-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-cashflow') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadData(); // Load assets after saving
                    $('#successMessageCashFlowEdit').text('Cashflow updated successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('edit-cash-flow-form').reset();
                        $('#edit-cashflow').modal();
                        document.querySelector('#edit-cashflow .close, #edit-cashflow [data-dismiss="modal"]').click();
                        $('#successMessageCashFlowEdit').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    function loadIncomes() {
        fetch("{{ route('pbm.get-income') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    document.querySelector('#income_data').innerHTML = data.data;
                }
            })
            .catch(error => console.log(error));
    }
    // edit cashflow
    function editIncome(id) {
        fetch("{{ url('pbm/get-income-by-id') }}/" + id, {
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    var incomedata = data.data;
                    $('#income_id').val(incomedata.id);
                    $('.income_type').val(incomedata.income_type);
                    $('#income_source').val(incomedata.income_source);
                    $('#income_amount').val(incomedata.amount);
                    var myModal = new bootstrap.Modal(document.getElementById('editindomess'));
                    myModal.show();
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    }
    function deleteIncome(id) {
        if (confirm("Are you sure you want to delete this income?")) {
            fetch("{{ url('pbm/delete-income') }}/" + id, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === true) {
                        loadData(); // Reload assets after deletion
                    } else {
                        alert("Something went wrong");
                    }
                })
                .catch(error => console.log(error));
        }
    }
</script>
<script>
document.addEventListener('input', function () {
    let total = 0;
    let isValid = true;

    document.querySelectorAll('.finance-percent').forEach(input => {
        let value = Number(input.value);

        // ❌ Individual field > 100
        if (value > 100) {
            input.value = 0;
            alert('Each value cannot be greater than 100');
            isValid = false;
        }

        total += value;
    });

    // ❌ Total > 100
    if (total > 100) {
        alert('Total percentage cannot exceed 100');
        
    }
});
function postSpandableAmount() {

    let spandable_amount_id = parseInt(document.f2.spandable_amount_id.value) || 0;
    let esa = parseInt(document.f2.esa.value) || 0;
    let ffa = parseInt(document.f2.ffa.value) || 0;
    let fea = parseInt(document.f2.fea.value) || 0;
    let sfa = parseInt(document.f2.sfa.value) || 0;

    let total = esa + ffa + fea + sfa;

    if (total > 100) {
        $('#addSpendableAmountMsg').text('Please enter valid value (Total must be 100 or less)');
        return false; // ❗ stop execution
    }

    $('#addSpendableAmountMsg').text('');

    let formData = new FormData();
    formData.append('spandable_amount_id', spandable_amount_id);
    formData.append('esa', esa);
    formData.append('ffa', ffa);
    formData.append('fea', fea);
    formData.append('sfa', sfa);

    fetch("{{ route('pbm.save-spandable-amount') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {
            
            $('#addSpendableAmountMsg').text('Spandable Amount saved successfully');

            setTimeout(() => {
                document.getElementById('add-spendable-amount-form').reset();
                document.querySelector('#addSpendableAmount .close, #addSpendableAmount [data-dismiss="modal"]').click();
                $('#addSpendableAmountMsg').text('');
                loadData();
            }, 2000);
        } else {
            alert(data.message || "Something went wrong");
        }
    })
    .catch(error => console.log(error));

    return false;
}
function getSpandableAmount() {
    fetch("{{ route('pbm.get-spandable-amount') }}", {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {

            const spandable = data.data;
            
            const income = parseFloat(data.total_incomes) || 0;

            const esaPercent = parseFloat(spandable.esa) || 0;
            const ffaPercent = parseFloat(spandable.ffa) || 0;
            const feaPercent = parseFloat(spandable.fea) || 0;
            const sfaPercent = parseFloat(spandable.sfa) || 0;
            if (spandable) {
                $('#spandable_amount_title').text('Edit Spandable Amount.');
                $('#spandable_table_title').html('<i class="fa fa-pencil"></i> Edit Upfront Savings');
                $('#spandable_amount_id').val(spandable.id);

                $('#esa_id').val(parseFloat(spandable.esa));
                $('#ffa_id').val(parseFloat(spandable.ffa));
                $('#fea_id').val(parseFloat(spandable.fea));
                $('#sfa_id').val(parseFloat(spandable.sfa));
            }

            // Calculate amounts
            const esaAmount = (income * esaPercent) / 100;
            const ffaAmount = (income * ffaPercent) / 100;
            const feaAmount = (income * feaPercent) / 100;
            const sfaAmount = (income * sfaPercent) / 100;
            const totalSpanded = esaAmount+ffaAmount+feaAmount+sfaAmount;

            // Show percentages
            $('#esa_percent').text(esaPercent + '%');
            $('#ffa_percent').text(ffaPercent + '%');
            $('#fea_percent').text(feaPercent + '%');
            $('#sfa_percent').text(sfaPercent + '%');

            // Show calculated amounts
            $('#esa_amount').text('₹'+esaAmount.toFixed(2));
            $('#ffa_amount').text('₹'+ffaAmount.toFixed(2));
            $('#fea_amount').text('₹'+feaAmount.toFixed(2));
            $('#sfa_amount').text('₹'+sfaAmount.toFixed(2));
            // total
            $('#total_spandable_amount').text('₹'+totalSpanded.toFixed(2));
            // console.log(spandable);
        } else {
            alert(data.message || "No data found!");
        }
    })
    .catch(error => console.log(error));

    return false;
}
// expenses load
document.getElementById('add-expenses-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    fetch("{{ route('pbm.save-expenses') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === true) {
                loadData(); // Load assets after saving
                $('#addExpensesMsg').text('Expenses saved successfully');
                // Wait 2 seconds, then reset + close modal
                setTimeout(() => {
                    document.getElementById('add-expenses-form').reset();
                    $('#addexpenses').modal();
                    document.querySelector('#addexpenses .close, #addexpenses [data-dismiss="modal"]').click();
                    $('#addExpensesMsg').text('');
                }, 2000); // 2000 ms = 2 seconds
            } else {
                $('#addExpensesMsg').text(data.msg).css('color', 'red');
                // alert("Something went wrong");
            }
        })
        .catch(error => console.log(error));
});
// get Expenses
function loadExpenses() {
    fetch("{{ route('pbm.get-expenses') }}")
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {
            document.querySelector('#expenses_data').innerHTML = data.data;
        }
    })
    .catch(error => console.log(error));
}

// edit Expenses
function editExpenses(id){
    fetch("{{ url('pbm/get-expenses-by-id') }}/" + id, {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {
            var expensesdata = data.data;
            // console.log(expensesdata);
            $('#expenses_id').val(expensesdata.id);
            $('#expenses_name').val(expensesdata.expenses_name);
            $('#expenses_current_amount').val(expensesdata.current_amount);
            $('#expenses_required_amount').val(expensesdata.required_amount);
            var expensesModal = new bootstrap.Modal(document.getElementById('editexpensesmodal'));
            expensesModal.show();
        } else {
            alert("Something went wrong");
        }
    })
    .catch(error => console.log(error));
}

// update expenses

document.getElementById('edit-expenses-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    fetch("{{ route('pbm.save-expenses') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === true) {
                loadData(); // Load assets after saving
                $('#editExpensesMsg').text('Expenses updated successfully');
                // Wait 2 seconds, then reset + close modal
                setTimeout(() => {
                    document.getElementById('add-expenses-form').reset();
                    $('#editexpensesmodal').modal();
                    document.querySelector('#editexpensesmodal .close, #editexpensesmodal [data-dismiss="modal"]').click();
                    $('#editExpensesMsg').text('');
                }, 2000); // 2000 ms = 2 seconds
            } else {
                $('#editExpensesMsg').text(data.msg).css('color', 'red');
                // alert("Something went wrong");
            }
        })
        .catch(error => console.log(error));
});

// delete expenses
function deleteExpenses(id) {
    if (confirm("Are you sure you want to delete this expenses?")) {
        fetch("{{ url('pbm/delete-expenses') }}/" + id, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadData(); // Reload assets after deletion
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    }
}
// get total
function loadNetData() {
    fetch("{{ route('pbm.load-total') }}")
    .then(response => response.json())
    .then(data => {
        if (data.status === true) {
            var remaining_spandable = data.total_spandable_amount - data.total_current_amount;
            var surplus_deficit = remaining_spandable + data.total_magic_amount;
            $('#total_spandable_amount_data').text('₹'+data.total_spandable_amount);
            $('#total_current_amount_data').text('₹'+data.total_current_amount);
            $('#total_remaining_spandable_amount_data').text('₹'+remaining_spandable);
            $('#total_required_amount_data').text('₹'+data.total_required_amount);
            $('#total_magic_amount_data').text('₹'+data.total_magic_amount);
            $('#total_surplus_deficit_data').text('₹'+surplus_deficit);
        }
    })
    .catch(error => console.log(error));
}
</script>
<script>
$(document).on('input', '.current-spandable-percent', function () {

    let percent = parseFloat($(this).val());
    if (isNaN(percent)) percent = 0;

    // Get nearest form / modal / container
    let container = $(this).closest('form, .modal, .row');

    // Get total spandable amount (remove ₹ and commas)
    let totalText = $('#total_spandable_amount').text().replace(/[₹,]/g, '');
    let totalAmount = parseFloat(totalText);

    if (isNaN(totalAmount)) totalAmount = 0;

    // Calculate amount
    let calculatedAmount = (totalAmount * percent) / 100;

    // Set value in amount field (2 decimals)
    container.find('.current-spandable-amount').val(calculatedAmount.toFixed(2));
});
</script>



@include('front.layouts.footer')


