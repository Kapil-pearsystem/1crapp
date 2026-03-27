@include('web.common.header')
<style>
    table.table.table-bordered.tst_cam_listst tr th {
        border-top: #dddddd solid 1px;
    }
    table.table.table-bordered.tst_cam_listst tr td {
        vertical-align: middle;
        font-size: 13px;
        text-align: center;
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
    table.table.table-bordered.tst_cam_listst tr td a.link:last-child {
        margin-right: 0px;
    }
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
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28), 0 0 0 20px rgba(128, 128, 128, 0.1);
    }
    input:checked+.switch {
        background: #72da67;
    }
    input:checked+.switch::before {
        left: 27px;
        background: #fff;
    }
    input:checked+.switch:active::before {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.28), 0 0 0 20px rgba(0, 150, 136, 0.2);
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
        font-weight: 600;
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
        margin-bottom: 20px;
    }
    .dash_board_pages .data_add_by:last-child {
        margin-bottom: 0;
    }
    .dash_board_pages .data_add_by table {
        background: #fff;
        margin-bottom: 0;
    }
    .dash_board_pages .data_add_by .ad_show {
        background: #fff;
        padding: 5px;
        margin-bottom: 5px;
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
    .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {
        margin-right: 0;
    }
    .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .icnn {
        width: 30px;
        height: 25px;
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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
    }
    .data_add_by .dropdown-content a {
        color: black;
        padding: 5px 16px;
        text-decoration: none;
        display: block;
        font-size: 13px;
    }
    .dropdown-content a:hover {
        background-color: #ddd;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
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
    .grea_bg {
        background: #e9e9e9 !important;
        font-size: 11px !important;
    }
    .grea_bg1 {
        background: #e9e9e9 !important;
    }
    .yellowe_bg {
        background: #ffdd00 !important;
    }
    .bluess_bg {
        background: #6490cb !important;
    }
    .reds_bg {
        background: #f94554 !important;
    }
    .tx_read {
        color: #f94554 !important;
        font-weight: 600;
    }
    .tx_white {
        color: #fff !important;
    }
    .tx_bluess {
        color: #6490cb !important;
        font-weight: 600;
    }
    .brd_none {
        border: none !important;
    }
    .brd_right {
        border-right: 1px solid #ddd !important;
    }
    .brd_left {
        border-left: 1px solid #ddd !important;
    }
    .brd_bottom {
        border-bottom: 1px solid #ddd !important;
    }
    .brd_top {
        border-top: 1px solid #ddd !important;
    }
    .arow_rt_parts {
        text-align: right !important;
        background: #bbe4ed !important;
        font-size: 11px !important;
    }
    .fnt_size {
        font-size: 11px !important;
        padding-left: 3px !important;
        padding-right: 3px !important;
    }
    .tx_right {
        text-align: right !important;
    }
    .tx_left {
        text-align: left !important;
    }
    .tx_f_size {
        font-size: 18px !important;
        padding: 0 10px !important;
        font-weight: 800;
    }
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
    .manages_widthsss {
        width: 8%;
        font-size: 10px !important;
    }
    a.sm_right_vdooos {
        float: right;
        display: inline-block;
        width: 8%;
    }
    a.sm_right_vdooos img {
        width: 100%;
    }
    a.abt_dnwn {
        background: #f94554;
        padding: 3px 10px 2px 10px;
        display: inline-block;
        color: #fff;
        font-weight: 500;
        font-size: 12px;
        border-radius: 30px;
    }
    .btm_list_areaaas {
        display: inline-block;
        width: 100%;
        margin: 5px 0 10px;
    }
    .btm_list_areaaas ul {
        display: table;
        margin: 0 auto;
        list-style: none;
    }
    .btm_list_areaaas ul li {
        font-weight: 700;
        color: #4a4a4a;
        position: relative;
        padding: 5px 15px 5px 20px;
        border: #ccc solid 1px;
        border-radius: 3px;
        float: left;
        margin-right: 5px;
    }
    .btm_list_areaaas ul li:last-child {
        margin-right: 0;
    }
    .btm_list_areaaas ul li:before {
        width: 8px;
        height: 8px;
        background: #1c5299;
        content: '';
        position: absolute;
        border-radius: 100px;
        top: 11px;
        left: 7px;
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
    .all_frm_list .form-group.managsss1 i.fa.fa-inr {
        position: absolute;
        left: 12px;
        bottom: 13px;
        font-size: 14px;
        color: #767676;
    }
    .fade {
        opacity: 999;
    }
    .modal-dialog-centered {
        margin-top: 10%;
    }
    @media (min-width: 481px) and (max-width: 767px) {
        .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {
            width: 100%;
            margin-right: 0;
            margin-bottom: 5px;
        }
        .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {
            margin-bottom: 0px;
        }
        .modal-content.all_frm_list .all_frm_list.p-0.mb-0 {
            padding: 0 !important;
        }
        .h_titless {
            font-size: 18px;
        }
        .tanksss .ftr_thknsss .lgo_partss {
            position: relative;
            top: 0;
            left: 0;
            margin: 0 auto;
            margin-bottom: 10px;
        }
        .tanksss .ftr_thknsss p {
            margin: 0 10px;
            font-size: 14px;
        }
        .tanksss .ftr_thknsss p a.ex_btn_areaa {
            float: inherit;
            padding: 5px 13px;
            position: relative;
            right: 0;
            top: 0;
            display: block;
            width: 40%;
            margin: 0 auto;
            margin-top: 10px;
        }
        table.table.table-bordered.tst_cam_listst tr td {
            text-wrap-mode: nowrap;
        }
    }
    @media (min-width: 320px) and (max-width: 480px) {
        .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {
            width: 100%;
            margin-right: 0;
            margin-bottom: 5px;
        }
        .dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {
            margin-bottom: 0px;
        }
        .modal-content.all_frm_list .all_frm_list.p-0.mb-0 {
            padding: 0 !important;
        }
        .h_titless {
            font-size: 18px;
        }
        .tanksss .ftr_thknsss .lgo_partss {
            position: relative;
            top: 0;
            left: 0;
            margin: 0 auto;
            margin-bottom: 10px;
        }
        .tanksss .ftr_thknsss p {
            margin: 0 10px;
            font-size: 14px;
        }
        .tanksss .ftr_thknsss p a.ex_btn_areaa {
            float: inherit;
            padding: 5px 13px;
            position: relative;
            right: 0;
            top: 0;
            display: inline-block;
            margin-top: 10px;
        }
        table.table.table-bordered.tst_cam_listst tr td {
            text-wrap-mode: nowrap;
        }
        #wdth_maness {
            width: 37% !important;
        }
        #wdth_manesss {
            width: 31.8% !important;
        }
        #wdth_maness1 {
            width: 35% !important;
        }
        #wdth_maness2 {
            width: 27% !important;
        }
        #wdth_maness11 {
            width: 11% !important;
        }
        #wdth_maness12 {
            width: 12% !important;
        }
        #wdth_maness13 {
            width: 13% !important;
        }
        .btm_list_areaaas ul {
            display: flex;
            margin: 0 auto;
            list-style: none;
            width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;
            padding: 0;
            flex-wrap: inherit;
        }
        .btm_list_areaaas ul li {
            padding: 5px 5px 5px 15px;
            font-size: 10px;
        }
        .btm_list_areaaas ul li:before {
            width: 5px;
            height: 5px;
            top: 9px;
            left: 3px;
        }
    }
</style>
<!-- Modal -->
<div class="modal fade all_supportss_modalss" id="adddates" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="pntDateForm">
                    @csrf
                    <input type="hidden" name="id" id="pnt_dates_id" />
                    <div class="hd_res_listsss">
                        <h2>PNT Dates</h2>
                    </div>
                    <div id="successMessageDates" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Last Year Date</label>
                                    <input type="date" name="last_year_date" id="last_year_date_id" placeholder="Enter Last Year Date" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>This Year Date</label>
                                    <input type="date" name="this_year_date" id="this_year_date_id" placeholder="Enter This Year Date" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Current Date</label>
                                    <input type="date" name="current_year_date" id="current_year_date_id" placeholder="Enter Current Date" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal">Cancel</a>
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
<div class="modal fade all_supportss_modalss" id="addmore1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="pntForm">
                    @csrf
                    <div class="hd_res_listsss">
                        <h2>Add Asset</h2>
                    </div>
                    <div id="successMessage" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Asset Name?</label>
                                    <input type="text" name="asset_name" placeholder="Name" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="last_year_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="this_year_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="current_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal">Cancel</a>
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
<div class="modal fade all_supportss_modalss" id="editmore1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="pntFormEdit">
                    @csrf
                    <input type="hidden" name="id" id="assets_id" />
                    <div class="hd_res_listsss">
                        <h2 id="assets_title">Edit Asset</h2>
                    </div>
                    <div id="EditsuccessMessage" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Asset Name?</label>
                                    <input type="text" name="asset_name" id="assets_name" placeholder="Name" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="last_year_amount" id="last_year_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="this_year_amount" id="this_year_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="number" name="current_amount" id="current_amount" placeholder="Amount" class="browsss" required />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal">Cancel</a>
                                                <button type="submit" class="actsss assets_action">Update</button>
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
<div class="modal fade all_supportss_modalss" id="add-liabilities" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="add-liabilities-form">
                    @csrf
                    <div class="hd_res_listsss">
                        <h2>Add Liability </h2>
                    </div>
                    <div id="successMessageLibility" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Liability Name?</label>
                                    <input type="text" name="liability_name" placeholder="Name" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="last_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="this_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="current_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
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
<!-- Modal edit liability -->
<div class="modal fade all_supportss_modalss" id="edit-liabilities" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="edit-liabilities-form">
                    @csrf
                    <input type="hidden" name="id" id="liability_id" />
                    <div class="hd_res_listsss">
                        <h2>Edit Liability </h2>
                    </div>
                    <div id="successMessageLibilityEdit" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Liability Name?</label>
                                    <input type="text" name="liability_name" id="liability_name" placeholder="Name" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="last_year_amount" id="liability_last_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="this_year_amount" id="liability_this_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="current_amount" id="liability_current_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
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
<div class="modal fade all_supportss_modalss" id="add-cash-flow" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="add-cash-flow-form">
                    @csrf
                    <div class="hd_res_listsss">
                        <h2>Add Annual Gross Cash Flow</h2>
                    </div>
                    <div id="successMessageCashFlow" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Cash Flow Name?</label>
                                    <input type="text" name="cashflow_name" placeholder="Name" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="last_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="this_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="current_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
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
<div class="modal fade all_supportss_modalss" id="edit-cashflow" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="frm_filedds">
                <form id="edit-cash-flow-form">
                    @csrf
                    <input type="hidden" name="id" id="cashflow_id" />
                    <div class="hd_res_listsss">
                        <h2>Edit Annual Gross Cash Flow</h2>
                    </div>
                    <div id="successMessageCashFlowEdit" style="color: green; font-weight: bold; margin-bottom: 10px;"></div>
                    <div class="all_frm_list p-0 mb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Cash Flow Name?</label>
                                    <input type="text" name="cashflow_name" id="cashflow_name" placeholder="Name" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt Last Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="last_year_amount" id="cashflow_last_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Amt This Year</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="this_year_amount" id="cashflow_this_year_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group managsss1">
                                    <label>Current Amount</label>
                                    <i class="fa fa-inr"></i>
                                    <input type="text" name="current_amount" id="cashflow_current_amount" placeholder="Amount" class="browsss" required="" />
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="form-group managsss1">
                                    <div class="roll_lst">
                                        <div class="rit_raea">
                                            <div class="bntt_cn">
                                                <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
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
        <div class="medilss">
            <h4>Personal Networth Tracking ( PNT )</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Personal Networth Tracking ( PNT )</span>
        </div>
    </div>
</section>
<section class="dash_board_pages">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered tst_cam_listst">
                <tbody>
                    <tr>
                        <td colspan="4" width="76%" class="yellowe_bg tx_left"><b>Personal Networth Tracking : Ramjee Meena</b></td>
                        <td class="yellowe_bg">
                            <a href="javascript:void(0);" class="abt_dnwn"><i class="fa fa-share-alt"></i> Share</a> &
                            <a href="javascript:void(0);" class="abt_dnwn"><i class="fa fa-cloud-download"></i> Download</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="reds_bg tx_white"><b>Personal Networth Traking WorksSheet</b></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                <tr>
                                    <td width="22%"><img src="https://1crapp.allproject.online/home/img/logo 1.png" class="logo" alt="" /></td>
                                    <td width="32%" class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tr>
                                                <td class="brd_none brd_bottom">
                                                    <b>As on</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 brd_none">
                                                    <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                                        <tr>
                                                            <td class="brd_none brd_bottom brd_right">
                                                                <b>Last Year</b>
                                                            </td>
                                                            <td class="brd_none brd_bottom">
                                                                <b>This Year</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="brd_none brd_right">
                                                                <b id="last_year_date">{{ date('01 F Y', strtotime('first day of january last year')) }}</b>
                                                            </td>
                                                            <td class="brd_none">
                                                                <b id="this_year_date">{{ date('01 F Y', strtotime('first day of january this year')) }}</b>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="p-0" width="14%">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tbody>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        <b>Annual</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none">
                                                        <b>% Increase</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="p-0" width="16%">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tbody>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        <b>Current</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        <b>Total</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none">
                                                        <b id="current_year_date">{{ date('d F Y') }}</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tbody>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        <b>YTD%</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none">
                                                        <b>% Increase</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tbody>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        <b>Action</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none brd_bottom">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="brd_none">
                                                        <a href="javascript:void(0);" class="abt_dnwn" data-toggle="modal" data-target="#adddates" id="pnt_dates_button_id"><i class="fa fa-plus-circle"></i> Dates </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr class="grea_bg">
                                    <td class="tx_read tx_f_size tx_left">Assets</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><a href="javascript:void(0);" class="abt_dnwn" data-toggle="modal" data-target="#addmore1"><i class="fa fa-plus-circle"></i> Add Asset </a></td>
                                </tr>
                                <tbody id="assetData"></tbody>
                                <tr class="grea_bg">
                                    <td class="tx_f_size tx_left">Total Assts</td>
                                    <td class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tr class="grea_bg">
                                                <td class="brd_none brd_bottom brd_right" id="total_last_year_amount">₹0.00</td>
                                                <td class="brd_none brd_bottom" id="total_this_year_amount">₹0.00</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td id="annual_percentage_change">0.00%</td>
                                    <td id="total_current_amount">₹0.00</td>
                                    <td id="ytd_percentage_change">0.00%</td>
                                    <td id="ytd_percentage_change"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                <tr class="grea_bg">
                                    <td width="22%" class="tx_read tx_f_size tx_left" id="wdth_maness">Liabilities</td>
                                    <td width="30%" id="wdth_maness1">&nbsp;</td>
                                    <td width="14%">&nbsp;</td>
                                    <td width="12%">&nbsp;</td>
                                    <td width="12%">&nbsp;</td>
                                    <td>
                                        <a href="javascript:void(0);" class="abt_dnwn" data-toggle="modal" data-target="#add-liabilities"><i class="fa fa-plus-circle"></i> Add Liability </a>
                                    </td>
                                </tr>
                                <tbody id="liabilityData"></tbody>
                                <!-- <tr>
                                    <td class="tx_left"><b>Car Loands</b></td>
                                    <td class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none brd_top">
                                      <tr>
                                       <td class="brd_none brd_bottom brd_right">₹200,00</td>
                                       <td class="brd_none brd_bottom">₹100,00</td>
                                      </tr>
                                     </table>
                                    </td>
                                    <td>-50%</td>
                                    <td>₹500.00</td>
                                    <td>400.00%</td>
                                </tr>
								<tr>
                                    <td class="tx_left"><b>Credit Card Debt</b></td>
                                    <td class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
                                       <td class="brd_none brd_bottom brd_right">₹200,00</td>
                                       <td class="brd_none brd_bottom">₹100,00</td>
                                      </tr>
                                     </table>
                                    </td>
                                    <td>-50%</td>
                                    <td>₹500.00</td>
                                    <td>400.00%</td>
                                </tr>
								<tr>
                                    <td class="tx_left"><b>Mortgage Debt (Loans Balance)</b></td>
                                    <td class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
                                       <td class="brd_none brd_bottom brd_right">₹200,00</td>
                                       <td class="brd_none brd_bottom">₹100,00</td>
                                      </tr>
                                     </table>
                                    </td>
                                    <td>-50%</td>
                                    <td>₹500.00</td>
                                    <td>400.00%</td>
                                </tr>
								<tr>
                                    <td class="tx_left"><b>Other Debt</b></td>
                                    <td class="p-0 brd_none">
                                     <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                      <tr>
                                       <td class="brd_none brd_bottom brd_right">₹200,00</td>
                                       <td class="brd_none brd_bottom">₹100,00</td>
                                      </tr>
                                     </table>
                                    </td>
                                    <td>-50%</td>
                                    <td>₹500.00</td>
                                    <td>400.00%</td>
                                </tr> -->
                                <tr class="grea_bg">
                                    <td class="tx_f_size tx_left">Total Liability</td>
                                    <td class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tr class="grea_bg">
                                                <td class="brd_none brd_bottom brd_right" id="total_liability_last_year_amount">₹0.00</td>
                                                <td class="brd_none brd_bottom" id="total_liability_this_year_amount">₹0.00</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td id="annual_liability_percentage_change">0.00%</td>
                                    <td id="total_liability_current_amount">₹0.00</td>
                                    <td id="ytd_liability_percentage_change">0.00%</td>
                                    <td id="ytd_liability_percentage_change"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--- Net Worth --->
                    <tr>
                        <td colspan="5" class="p-0 brd_none">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                <tr class="reds_bg">
                                    <td width="22%" class="tx_white tx_f_size tx_left" id="wdth_manesss">Net Worth</td>
                                    <td width="32%" class="p-0 brd_none" id="wdth_maness2">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none brd_top">
                                            <tr class="reds_bg">
                                                <td class="brd_none brd_bottom brd_right tx_white" id="total_networth_last_year_amount">₹6,200</td>
                                                <td class="brd_none brd_bottom tx_white" id="total_networth_this_year_amount">₹0.00</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="tx_white annual_networth_percentage_change" width="14%" id="wdth_maness11">42%</td>
                                    <td class="tx_white total_networth_current_amount" width="16%" id="wdth_maness12">₹16,800</td>
                                    <td class="tx_white ytd_networth_percentage_change" id="wdth_maness13">62.50%</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                <tr class="grea_bg">
                                    <td width="22%" class="tx_read tx_f_size tx_left" id="wdth_maness">Annual Gross Cash Flow</td>
                                    <td width="25%" id="wdth_maness1">&nbsp;</td>
                                    <td width="14%">&nbsp;</td>
                                    <td width="12%">&nbsp;</td>
                                    <td width="12%">&nbsp;</td>
                                    <td>
                                        <a href="javascript:void(0);" class="abt_dnwn" data-toggle="modal" data-target="#add-cash-flow"><i class="fa fa-plus-circle"></i> Add Cash Flow </a>
                                    </td>
                                </tr>
                                <tbody id="cashflowData"></tbody>
                                <tr class="grea_bg">
                                    <td class="tx_f_size tx_left">Annual Gross Cash Flow</td>
                                    <td class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
                                            <tr class="grea_bg">
                                                <td class="brd_none brd_bottom brd_right" id="total_cashflow_last_year_amount">₹0.00</td>
                                                <td class="brd_none brd_bottom" id="total_cashflow_this_year_amount">₹0.00</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td id="annual_cashflow_percentage_change">0.00%</td>
                                    <td id="total_cashflow_current_amount">₹0.00</td>
                                    <td id="ytd_cashflow_percentage_change">0.00%</td>
                                    <td id=""></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--- End Net Worth --->
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <div class="propfixsd new_propertyy hollss">
                <canvas id="ROIROEHoldingPeriod"></canvas>
                <div class="btm_list_areaaas">
                    <ul>
                        <li>Market Value</li>
                        <li>Total Accumulated Equity</li>
                        <li>Total Accumulated Cash Flow</li>
                    </ul>
                </div>
            </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        fetch("{{ route('get-chart-data') }}")
            .then(response => response.json())
            .then(res => {
                if (!res.status) return;
                new Chart("ROIROEHoldingPeriod", {
                    type: "line",
                    data: {
                        labels: res.labels,
                        datasets: [{
                                label: 'Market Value (Assets)',
                                data: res.assets,
                                borderColor: "red",
                                fill: false
                            },
                            {
                                label: 'Total Accumulated Equity (Liability)',
                                data: res.liability,
                                borderColor: "blue",
                                fill: false
                            },
                            {
                                label: 'Total Accumulated Cash Flow',
                                data: res.cashflow,
                                borderColor: "green",
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: "Multi-Year Financial Model Graphical Overview",
                            fontSize: 16
                        },
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        scales: {
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Year'
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Amount'
                                },
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => console.error(error));
    });
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
        limitMax: true, // If false, max value increases automatically if value > maxValue
        limitMin: true, // If true, the min value of the gauge will be fixed
        colorStart: '#6F6EA0', // Colors
        colorStop: '#C0C0DB', // just experiment with them
        strokeColor: '#EEEEEE', // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true, // High resolution support
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
        staticZones: [{
                strokeStyle: "#F03E3E",
                min: 70,
                max: 80
            }, // Red from 70 to 80
            {
                strokeStyle: "#FFDD00",
                min: 80,
                max: 90
            }, // Yellow 80 to 90
            {
                strokeStyle: "#30B32D",
                min: 90,
                max: 100
            }, // Green 90 to 100
        ],
        staticLabels: {
            font: "10px sans-serif", // Specifies font
            labels: [10, 80, 90, 100], // Print labels at these values
            color: "#000000", // Optional: Label text color
            fractionDigits: 0 // Optional: Numerical precision. 0=round off.
        },
    };
    var target = document.getElementById('foo'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 100; // set max gauge value
    gauge.setMinValue(70); // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 10; // set animation speed (32 is default value)
    gauge.set(92); // set actual value
</script>
<script>
    $('[name=tab]').each(function(i, d) {
        var p = $(this).prop('checked');
        //   console.log(p);
        if (p) {
            $('article').eq(i)
                .addClass('on');
        }
    });
    $('[name=tab]').on('change', function() {
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
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
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
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    var $el = $(".fitter");
    var $ee = $(".show_data");
    $el.click(function(e) {
        e.stopPropagation();
        $(".show_data").toggleClass('active');
    });
    $(document).on('click', function(e) {
        if (($(e.target) != $el) && ($ee.hasClass('active'))) {
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
    $(document).ready(function() {
        loadAssets();
    });
    document.getElementById('pntForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-pnt') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadAssets(); // Load assets after saving
                    $('#successMessage').text('Asset saved successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('pntForm').reset();
                        $('#addmore1').modal();
                        document.querySelector('#addmore1 .close, #addmore1 [data-dismiss="modal"]').click();
                        $('#successMessage').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    document.getElementById('pntFormEdit').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-pnt') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadAssets(); // Load assets after saving
                    $('#EditsuccessMessage').text('Asset updated successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('pntForm').reset();
                        $('#editmore1').modal('hide');
                        document.querySelector('#editmore1 .close, #editmore1 [data-dismiss="modal"]').click();
                        $('#EditsuccessMessage').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    // JavaScript to load assets after saving
    function loadAssets() {
        fetch("{{ route('pnt-assets') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    let last = parseFloat(data.last_year_amount);
                    let thisYear = parseFloat(data.this_year_amount);
                    let current = parseFloat(data.current_amount);
                    let percent = 0; // annual % change
                    let current_percent = 0; // YTD % change
                    // Annual percentage change: ((thisYear - last) / last) * 100
                    if (last > 0) {
                        percent = ((thisYear - last) / last) * 100;
                        percent = percent.toFixed(2) + '%';
                    }
                    // YTD percentage change: ((current - thisYear) / thisYear) * 100
                    if (thisYear > 0) {
                        current_percent = ((current - thisYear) / thisYear) * 100;
                        current_percent = current_percent.toFixed(2) + '%';
                    }
                    $('#total_last_year_amount').text('₹' + data.last_year_amount);
                    $('#total_this_year_amount').text('₹' + data.this_year_amount);
                    $('#total_current_amount').text('₹' + data.current_amount);
                    $('#annual_percentage_change').text(percent);
                    $('#ytd_percentage_change').text(current_percent);
                    document.querySelector('#assetData').innerHTML = data.data;
                }
            })
            .catch(error => console.log(error));
    }
    function deleteAsset(id) {
        if (confirm("Are you sure you want to delete this asset?")) {
            fetch("{{ url('delete-pnt-asset') }}/" + id, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === true) {
                        loadAssets(); // Reload assets after deletion
                    } else {
                        alert("Something went wrong");
                    }
                })
                .catch(error => console.log(error));
        }
    }
    function editAsset(id) {
        fetch("{{ url('get-pnt-asset') }}/" + id, {
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    var asset = data.data;
                    $('#assets_id').val(asset.id);
                    $('#assets_name').val(asset.asset_name);
                    $('#last_year_amount').val(asset.last_year_amount);
                    $('#this_year_amount').val(asset.this_year_amount);
                    $('#current_amount').val(asset.current_amount);
                    //    $('#editmore1').modal('show');
                    var myModal = new bootstrap.Modal(document.getElementById('editmore1'));
                    myModal.show();
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    }
    $('.close').on('click', function() {
        $(this).closest('.modal').modal('hide');
    });
</script>
<!-- liability -->
<script>
    $(document).ready(function() {
        loadLiability();
    });
    document.getElementById('add-liabilities-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-liability') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadLiability(); // Load assets after saving
                    $('#successMessageLibility').text('Liability saved successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('pntForm').reset();
                        $('#add-liabilities').modal();
                        document.querySelector('#add-liabilities .close, #add-liabilities [data-dismiss="modal"]').click();
                        $('#successMessageLibility').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    // Edit Liability
    document.getElementById('edit-liabilities-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-liability') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadLiability(); // Load assets after saving
                    $('#successMessageLibilityEdit').text('Liability updated successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('pntForm').reset();
                        $('#edit-liabilities').modal();
                        document.querySelector('#edit-liabilities .close, #edit-liabilities [data-dismiss="modal"]').click();
                        $('#successMessageLibilityEdit').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    // JavaScript to load assets after saving
    function loadLiability() {
        fetch("{{ route('get-liability') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    let last = parseFloat(data.last_year_amount);
                    let thisYear = parseFloat(data.this_year_amount);
                    let current = parseFloat(data.current_amount);
                    let percent = 0; // annual % change
                    let current_percent = 0; // YTD % change
                    // Annual percentage change: ((thisYear - last) / last) * 100
                    if (last > 0) {
                        percent = ((thisYear - last) / last) * 100;
                        percent = percent.toFixed(2) + '%';
                    }
                    // YTD percentage change: ((current - thisYear) / thisYear) * 100
                    if (thisYear > 0) {
                        current_percent = ((current - thisYear) / thisYear) * 100;
                        current_percent = current_percent.toFixed(2) + '%';
                    }
                    $('#total_liability_last_year_amount').text('₹' + data.last_year_amount);
                    $('#total_liability_this_year_amount').text('₹' + data.this_year_amount);
                    $('#total_liability_current_amount').text('₹' + data.current_amount);
                    $('#annual_liability_percentage_change').text(percent);
                    $('#ytd_liability_percentage_change').text(current_percent);
                    document.querySelector('#liabilityData').innerHTML = data.data;
                }
            })
            .catch(error => console.log(error));
    }
    function editLibility(id) {
        fetch("{{ url('get-pnt-libility') }}/" + id, {
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    var liability = data.data;
                    $('#liability_id').val(liability.id);
                    $('#liability_name').val(liability.liability_name);
                    $('#liability_last_year_amount').val(liability.last_year_amount);
                    $('#liability_this_year_amount').val(liability.this_year_amount);
                    $('#liability_current_amount').val(liability.current_amount);
                    var myModal = new bootstrap.Modal(document.getElementById('edit-liabilities'));
                    myModal.show();
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    }
    function deleteLiability(id) {
        if (confirm("Are you sure you want to delete this liability?")) {
            fetch("{{ url('delete-pnt-liability') }}/" + id, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === true) {
                        loadLiability(); // Reload assets after deletion
                    } else {
                        alert("Something went wrong");
                    }
                })
                .catch(error => console.log(error));
        }
    }
</script>
<script>
    $('document').ready(function() {
        fetch("{{ route('get-networth') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    let last = parseFloat(data.last_year_amount);
                    let thisYear = parseFloat(data.this_year_amount);
                    let current = parseFloat(data.current_amount);
                    let percent = 0; // annual % change
                    let current_percent = 0; // YTD % change
                    // Annual percentage change: ((thisYear - last) / last) * 100
                    if (last > 0) {
                        percent = ((thisYear - last) / last) * 100;
                        percent = percent.toFixed(2) + '%';
                    }
                    // YTD percentage change: ((current - thisYear) / thisYear) * 100
                    if (thisYear > 0) {
                        current_percent = ((current - thisYear) / thisYear) * 100;
                        current_percent = current_percent.toFixed(2) + '%';
                    }
                    $('#total_networth_last_year_amount').text('₹' + data.last_year_amount);
                    $('#total_networth_this_year_amount').text('₹' + data.this_year_amount);
                    $('.total_networth_current_amount').text('₹' + data.current_amount);
                    $('.annual_networth_percentage_change').text(percent);
                    $('.ytd_networth_percentage_change').text(current_percent);
                }
            })
            .catch(error => console.log(error));
    });
</script>
<!-- cash flow  -->
<script>
    $(document).ready(function() {
        loadCashFlow();
    });
    document.getElementById('add-cash-flow-form').addEventListener('submit', function(e) {
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
                    loadCashFlow(); // Load assets after saving
                    $('#successMessageCashFlow').text('Cashflow saved successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('add-cash-flow-form').reset();
                        $('#add-cash-flow').modal();
                        document.querySelector('#add-cash-flow .close, #add-cash-flow [data-dismiss="modal"]').click();
                        $('#successMessageCashFlow').text('');
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
                    loadCashFlow(); // Load assets after saving
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
    function loadCashFlow() {
        fetch("{{ route('get-cashflow') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    let last = parseFloat(data.last_year_amount);
                    let thisYear = parseFloat(data.this_year_amount);
                    let current = parseFloat(data.current_amount);
                    let percent = 0; // annual % change
                    let current_percent = 0; // YTD % change
                    // Annual percentage change: ((thisYear - last) / last) * 100
                    if (last > 0) {
                        percent = ((thisYear - last) / last) * 100;
                        percent = percent.toFixed(2) + '%';
                    }
                    // YTD percentage change: ((current - thisYear) / thisYear) * 100
                    if (thisYear > 0) {
                        current_percent = ((current - thisYear) / thisYear) * 100;
                        current_percent = current_percent.toFixed(2) + '%';
                    }
                    $('#total_cashflow_last_year_amount').text('₹' + data.last_year_amount);
                    $('#total_cashflow_this_year_amount').text('₹' + data.this_year_amount);
                    $('#total_cashflow_current_amount').text('₹' + data.current_amount);
                    $('#annual_cashflow_percentage_change').text(percent);
                    $('#ytd_cashflow_percentage_change').text(current_percent);
                    document.querySelector('#cashflowData').innerHTML = data.data;
                }
            })
            .catch(error => console.log(error));
    }
    // edit cashflow
    function editCashFlow(id) {
        fetch("{{ url('get-pnt-cashflow') }}/" + id, {
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    var cashflow = data.data;
                    $('#cashflow_id').val(cashflow.id);
                    $('#cashflow_name').val(cashflow.cashflow_name);
                    $('#cashflow_last_year_amount').val(cashflow.last_year_amount);
                    $('#cashflow_this_year_amount').val(cashflow.this_year_amount);
                    $('#cashflow_current_amount').val(cashflow.current_amount);
                    var myModal = new bootstrap.Modal(document.getElementById('edit-cashflow'));
                    myModal.show();
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    }
    function deleteCashFlow(id) {
        if (confirm("Are you sure you want to delete this cashflow?")) {
            fetch("{{ url('delete-cashflow') }}/" + id, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === true) {
                        loadCashFlow(); // Reload assets after deletion
                    } else {
                        alert("Something went wrong");
                    }
                })
                .catch(error => console.log(error));
        }
    }
</script>
<!-- // PNT Dates -->
<script>
    document.getElementById('pntDateForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch("{{ route('save-pnt-dates') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    loadPntDates(); // Load assets after saving
                    $('#successMessageDates').text('PNT Dates saved successfully');
                    // Wait 2 seconds, then reset + close modal
                    setTimeout(() => {
                        document.getElementById('add-cash-flow-form').reset();
                        $('#adddates').modal();
                        document.querySelector('#adddates .close, #adddates [data-dismiss="modal"]').click();
                        $('#successMessageDates').text('');
                    }, 2000); // 2000 ms = 2 seconds
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error => console.log(error));
    });
    $('document').ready(function() {
        loadPntDates();
    });
    function loadPntDates() {
        fetch("{{ route('get-pnt-dates') }}")
            .then(response => response.json())
            .then(data => {
                if (data.status === true) {
                    var pnt_dates = data.data;
                    if (pnt_dates.last_year_date) {
                        $('#pnt_dates_button_id').html('<i class="fa fa-pencil"></i> Dates ');
                        $('#pnt_dates_id').val(pnt_dates.id);
                        $('#last_year_date').text(formatDate(pnt_dates.last_year_date));
                        $('#last_year_date_id').val(pnt_dates.last_year_date);
                    }
                    if (pnt_dates.this_year_date) {
                        $('#this_year_date').text(formatDate(pnt_dates.this_year_date));
                        $('#this_year_date_id').val(pnt_dates.this_year_date);
                    }
                    if (pnt_dates.current_year_date) {
                        $('#current_year_date').text(formatDate(pnt_dates.current_year_date));
                        $('#current_year_date_id').val(pnt_dates.current_year_date);
                    }
                }
            })
            .catch(error => console.log(error));
    }
    function formatDate(dateStr) {
        let date = new Date(dateStr);
        return date.toLocaleDateString('en-GB', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
    }
</script>
@include('front.layouts.footer')