
@include('front.layouts.header')
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right;">
          <span aria-hidden="true">&times;</span>
        </button>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </div>
  </div>
</div>

<style>
 .prp_analyes .lsting_proprty h3 {
    font-size: 22px;
    font-weight: 500;
}
.prp_analyes .titlss_partss {
    display: inline-block;
    width: 100%;
	margin-bottom:20px;
	margin-top:15px;
}
.prp_analyes .titlss_partss p {
    font-size: 18px;
    color: #1877f1;
    margin: 0 0 0px;
}
.prp_analyes .titlss_partss span.blk_text {
    color: #333;
}
.prp_analyes .titlss_partss span.txt_fildss {
    font-size: 15px;
}
.br-0{border:none !important;}

.prp_analyes .prp_bntsss ul li a {
padding: 6px 8px;
    font-size: 12px;
    line-height: 18px;
}
.prp_analyes .prp_bntsss ul li {
    margin-right: 3px;
}
.prp_analyes .prp_bntsss ul li:last-child {
    margin-right: 0px;
}

.table-responsive>.table-bordered {
    border: 1px solid #ddd;
}



.ys_no li {
    cursor: pointer;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle {
    opacity: 0;
    position: absolute;
    left: -99999px;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label {
    height: 25px;
    line-height: 25px;
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
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label:before,
input[type="checkbox"].toggle + label:hover:before {
    content: " ";
    position: absolute;
    top: 2px;
    left: 2px;
    width: 21px;
    height: 21px;
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
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label .off,
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label .on {
    color: #fff;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label .off {
    margin-left: 26px;
    display: inline-block;
    font-size: 14px;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle + label .on {
    display: none;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:checked + label .off {
    display: none;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:checked + label .on {
    margin-right: 26px;
    display: inline-block;
    font-size: 14px;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:checked + label,
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:focus:checked + label {
    background-color: #4a83cc;
}
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:checked + label:before,
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:checked + label:hover:before,
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:focus:checked + label:before,
.prp_analyes .magan_y_no .choss_araes .yesNoButton input[type="checkbox"].toggle:focus:checked + label:hover:before {
    background-position: 0 0;
    top: 2px;
    left: 100%;
    margin-left: -24px;
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


.prp_analyes .magan_y_no {
    float: left;
    width: 33%;
    display: inline-block;
}
.prp_analyes .magan_y_no .choss_araes {
    width: 100%;
    display: inline-block;
}
.prp_analyes .magan_y_no .choss_araes .lft_cntts {
    float: left;
    width: 100%;
}
.prp_analyes .magan_y_no .choss_araes .lft_cntts p {
    font-size: 12px;
    margin: 0;
}


.proprt_box_sec.bothss.full_areaa.bh_bs_shteets {margin-top: 20px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts {display: table; width: 100%;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx {float:left; width:9%; position:absolute; height:100%; background: #ffe000; z-index:1; top:0;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {width: auto; transform: rotateZ(-90deg); height: 0; text-wrap: nowrap; padding: 0px 0px; position: absolute; top: 50%; left: -58px; font-size:12px;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss.prchssn {left: -28px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch {float: right; width:100%;}

.tlt_area_of_numbr {background: #9acde1; display: inline-block; width: 100%; padding:5px;}
.tlt_area_of_numbr ul {list-style: none; padding: 0; margin: 0;}
.tlt_area_of_numbr ul li {float: left; padding: 10px; color: #000; font-size: 15px; border-right: #000000 solid 1px; width:18%; font-weight: 600;}
.tlt_area_of_numbr ul li.ful_widths {width: 100% !important;}
.tlt_area_of_numbr ul li:last-child {border: none; text-align: center; width: 82%;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 p.icoo {float: right; position: relative;
    top: 10px; left: -4px;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top span.shr_al_parts {
    position: relative; left: 18px; top: 1px; color: #1c5299; cursor:pointer;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top {position:relative; left:-5px;
    z-index:1; margin:0; padding-left:0; width:10%; border-radius:0;  padding-right:0;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top .tooltip {left:32px; top: 20px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 span.cnt_aressss {border-left: #edeaea solid 1px; padding-left: 10px;
    width: 100%;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss.duboolss_top {padding: 0; border-top: none !important;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss.duboolss_top:before {bottom: 0 !important; top: inherit;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss.duboolss_top .unddrlstt span.py_titalls {
    width:92%; font-weight:600; padding-left: 11.3%; font-12px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss.duboolss_top .unddrlstt span.mnss_fldss {
    font-size: 14px; position: relative; left: -16px; padding: 0;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs {width: 155px; position:relative; font-size:12px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6.accordion-button span.price_lststs i {right: 5px !important;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs i {
    font-size: 12px; position: absolute; right: -5px; top: 10px; cursor: pointer;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 86%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.managess_cnts {
    line-height: 34px;
    font-size: 12px;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {width:12.3% !important;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6.accordion-button span.cnt_aressss {width: 88%;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item {padding: 0;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion-body .mn_ulderss .unddrlstt span.price_lststs {width: 114px !important; position:relative;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion-body .mn_ulderss .unddrlstt span.price_lststs i {font-size: 12px; position: absolute; right: -5px; top: 10px; cursor: pointer;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {padding-left: 14%;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt h6 {font-size: 13px;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {width: 122px !important; position:relative;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header span.price_lststs i {
    right: 7px;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs i {
    font-size: 12px; position: absolute; right: -5px; top: 10px; cursor: pointer;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.duboolss_dblls:before {
    background: #000; position: absolute; height: 1px; content: ''; width: 110%; bottom: 0; right: -10px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.duboolss_dblls:after {
    background: #000; position: absolute; height: 1px; content: ''; width: 110%; bottom: 2px; right: -10px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top span.nm_counttts {position: relative; left: 13px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss .unddrlstt h6 .con-tooltip.top span.nm_counttts1 {
    left: 6px !important;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.al_tx_blue .unddrlstt span.cnt_aressss span.managess_cnts {
    color: #000;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.al_tx_blue .unddrlstt span.cnt_aressss span.managess_cnts_sm_text {
    color: #3a3a3a;
    line-height: 18px;
    font-size: 12px;
    font-weight: 500;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.al_tx_blue .unddrlstt span.cnt_aressss span.mnss_fldss {
    color: #1c5299;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.al_tx_blue .unddrlstt span.price_lststs {
    color: #1c5299;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top .tooltip p {
    font-size: 12px;
}


.proprt_box_sec.bothss .dibydss_cntss#charts_all_prtss #para_gr .un_listststs ul li {
    text-align: center;
}
.proprt_box_sec.bothss .dibydss_cntss#charts_all_prtss #piechart {
    max-width: 340px;
	width:100%;
	padding-left: 30px;
    margin: 0 auto;
    margin-bottom: 20px;
}

.proprt_box_sec.bothss#al_hei_mnges .dibydss_cntss {padding:0; min-height:auto;}



.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx.unr_dr_box {
    width: 72%;
}
.proprt_box_sec.bothss.full_areaa #margess_bx .col-lg-1 {
    padding-right: 0;
    width: 6.9999%;
    flex: 0 0 6.9999%;
    max-width: 6.9999%;
}
.proprt_box_sec.bothss.full_areaa #margess_bx .col-lg-11 {
    padding-left: 0;
    flex: 0 0 92.9999%;
    max-width: 92.9999%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch#bs_wirth_full {
    width: 100%;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top#gap_managess {
    width: auto;
    position: absolute;
    left: 1px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 .con-tooltip.top#gap_managess .tooltip {
    left: 21px;
    top: 20px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss {
    border-bottom: #edeaea solid 1px;
    padding: 0px 10px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 span.cnt_aressss span.managess_cnts {
    font-size: 12px;
    line-height: 36px;
}

.hdlinggs {
    text-align: center;
    margin-top: 2%;
}
#holdings_cost {
    text-align: center;
    max-width: 260px;
    margin: 0 auto;
    margin-top: -10px;
}

.us_pre_usings {
    background: #6d9eeb;
    text-align: center;
    padding: 12px 0;
    font-weight: 500;
    font-size: 15px;
	color:#fff;
}

.proprt_box_sec.bothss .dibydss_cntss#charts_all_prtss #net_operating_income {
    max-width: 340px;
    margin: 0 auto;
    margin-bottom: 20px;
	padding-left:40px;
}


.p_mitters canvas#foo {
    width: 100%;
    background: #fff;
    height: 100%;
}
.tlt_area_of_numbr .un_mtter {
    text-align: center;
	position:relative;
}
.tlt_area_of_numbr .un_mtter p {
    font-size: 18px;
    font-weight: 600;
    margin: 13px 0 3px;
}

.tlt_area_of_numbr .un_mtter span.sld_bttnss {
    position: absolute;
    right: 7px;
    top: 27%;
    display: inline-block;
}
.tlt_area_of_numbr .un_mtter span.sld_bttnss a {
    border: #f94554 solid 2px;
    color: #fff;
	background:#f94554;
    padding: 8px 12px;
    border-radius: 4px;
    font-weight: 700;
}
.tlt_area_of_numbr .un_mtter span.sld_bttnss a:hover{background:#f94554; color:#fff;}

.tlt_area_of_numbr .un_mtter p:last-child {
    margin: 0;
}

.bg_araea {
    background: #f3f3f3;
}

.bg_yelll {
    background: #ffe000 !important;
}
.bor_none{border:none !important;}

.proprt_box_sec h3 span.editts {
    display: inline-block;
    color: #fff;
       font-size: 18px;
    padding-left: 5px;
}
.proprt_box_sec h3 span.editts i {
    cursor: pointer;
}
.red_brd_list {
    position: relative;
}
.red_brd_list:before {
    position: absolute;
    content: '';
    width: 108%;
    height: 1px;
    background: #000;
    left: 0;
    top: -1px;
}
.red_brd_list:after {
    position: absolute;
    content: '';
    width: 108%;
    height: 1px;
    background: #000;
    left: 0;
    top: 1px;
}

.tanksss .thnkss_al_partss {
    border: #0e3992 solid 1px;
    text-align: center;
    padding: 20px;
}
.tanksss .thnkss_al_partss .lgo_partss {
    max-width: 210px;
    margin: 0 auto;
    width: 100%;
    margin-bottom: 30px;
}
.tanksss .thnkss_al_partss .lgo_partss img {
    width: 100%;
    max-width: 210px;
}
.tanksss .thnkss_al_partss h4 {
    margin: 0 0 20px;
    font-size: 30px;
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
.tanksss .ftr_thknsss p {
    text-align: center;
    margin: 0;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
}
#cost-of-purchase .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#cost-of-purchase .apexcharts-toolbar {display: none;}

#extra-cost .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#extra-cost .apexcharts-toolbar {display: none;}

#cd-registrations .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#cd-registrations .apexcharts-toolbar {display: none;}

#improvement-cost .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#improvement-cost .apexcharts-toolbar {display: none;}

#misclanious .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#misclanious .apexcharts-toolbar {display: none;}

#holdings-cost .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#holdings-cost .apexcharts-toolbar {display: none;}

#income-cost .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#income-cost .apexcharts-toolbar {display: none;}

#expenses-cost .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#expenses-cost .apexcharts-toolbar {display: none;}

#purchase-cost-cop .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#purchase-cost-cop .apexcharts-toolbar {display: none;}

#pre-emi-costs-phc .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#pre-emi-costs-phc .apexcharts-toolbar {display: none;}

#extra-charges-ec .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#extra-charges-ec .apexcharts-toolbar {display: none;}

#cd-registration-ec .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#cd-registration-ec .apexcharts-toolbar {display: none;}

#improvent-cost-ic .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#improvent-cost-ic .apexcharts-toolbar {display: none;}

#m-o-charges .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#m-o-charges .apexcharts-toolbar {display: none;}

#holding-cost-tb .apexcharts-legend.apexcharts-align-center.position-right {display: none;}
#holding-cost-tb .apexcharts-toolbar {display: none;}


#tabs_pie .tab-wrapper.part_lsstt {
    width: 100%;
}
#tabs_pie .tab-wrapper.part_lsstt ul.tabs {
    display: block;
}
#tabs_pie .tab-wrapper.part_lsstt li.tab-link {
    width: 50%;
    display: block;
    text-wrap: nowrap;
    font-size: 11px;
    margin: 5px 0 12px;
}
#tabs_pie .tab-wrapper.part_lsstt li.tab-link:last-child {
    width: 100%;
    margin-right:0px;
	text-align:center;
}

#tabs_pie .tab-wrapper {
  text-align: center;
  display: block;
  margin: auto;
  max-width: 500px;
}

#tabs_pie .tabs {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
}

#tabs_pie .tab-link {
margin: 20px 0 0;
    list-style: none;
    padding: 0px 0px;
    color: #aaa;
    cursor: pointer;
    font-weight: 700;
    transition: all ease 0.5s;
    text-align: center;
}

#tabs_pie .tab-link:hover {
  color: #999;
  border-color: #999;
}

#tabs_pie .tab-link.active {
  color: #333;
}



#tabs_pie .content-wrapper {
  padding:0px 0px;
}

#tabs_pie .tab-content {
  display: none;
  text-align: center;
  color: #888;
  font-weight: 300;
  font-size: 15px;
  opacity: 0;
  transform: translateY(15px);
  animation: fadeIn 0.5s ease 1 forwards;
}

#tabs_pie .tab-content.active {
  display: block;
}

@keyframes fadeIn {
  100% {
    opacity: 1;
    transform: none;
  }
}

#scroolls {
    padding: 10px;
}

#scroolls .slirr_scrlle .middiss_parts {
    max-width: 100px;
    border: #ccc solid 1px;
    margin: 0 auto;
    margin-bottom: 20px;
    text-align: center;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2px 0;
}
#scroolls .slirr_scrlle .middiss_parts .value {
    font-size: 18px;
    color: #6c6c6c;
	margin-right: 5px;
}
#scroolls .slirr_scrlle {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
	position:relative;
}
#scroolls .slirr_scrlle .tittlsss {
    font-size: 15px;
    font-weight: 700;
    left: 0;
	color:#1c539a;
    position: absolute;
	padding-left:24px;
}
#scroolls .slirr_scrlle .Printss {
    float: right;
    position: absolute;
    right: 5px;
    top: 2px;
    font-size: 20px;
}
#scroolls .slirr_scrlle .Printss i {
    color: #1c539a;
}

#scroolls .slirr_scrlle .con-tooltip.top {
    float: left;
    margin-left: 0;
    position: relative;
    top: -4px;
    padding-left: 0;
}

#scroolls .slirr_scrlle .slider {
  appearance: none;  /* Override default CSS styles */
  width: 100%; /* Full-width */
  height: 20px; /* Specified height */
  background: #ebe9e7; /* Grey background */
  outline: none; /* Remove outline */
  border-radius: 5px;
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
#scroolls .slirr_scrlle .slider::-webkit-slider-thumb {
  appearance: none; /* Override default look */
  width: 30px; /* Set a specific slider handle width */
  height: 30px; /* Slider handle height */
  background: #1c539a; /* Green background */
  border-radius: 10%;
  cursor: pointer; /* Cursor on hover */
}

#scroolls .slirr_scrlle .slider::-moz-range-thumb {
  appearance: none; /* Override default look */
  width: 30px; /* Set a specific slider handle width */
  height: 30px; /* Slider handle height */
  background: #1c539a; /* Green background */
  border-radius: 10%;
  cursor: pointer; /* Cursor on hover */
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.other_parts_bx#bs_wirth_full .mn_ulderss {
    padding: 0 5px 0 20px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.other_parts_bx#bs_wirth_full .mn_ulderss #gap_managess {
    left: 10px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.other_parts_bx#bs_wirth_full .mn_ulderss .unddrlstt h6 {
    font-weight: 500;
}
button.alluser.btn_partss {
    padding: 9px 30px;
    border: none;
    font-size: 16px;
    letter-spacing: 0.4px;
}

.apexcharts-toolbar {
    display: none;
}
.apexcharts-legend.apexcharts-align-center.position-right {
    display: none;
}
#tabs_pie .tab-wrapper.part_lsstt li.tab-link:nth-child(2) {
    width: 50%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full {
    width: 100%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full .mn_ulderss h6 {
    color: #333;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full .mn_ulderss h6 span.price_lststs {
    border: none;
    width: 100%;
    text-align: right;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full .mn_ulderss h6 span.cnt_aressss.bor_none {
    width: auto;
    text-wrap-mode: nowrap;
}

.proprt_box_sec.bothss#al_hei_mnges .dibydss_cntss#two_boths_prtss .table-responsive11#both_ar_parts .lists_tablssts.purrssch {
    width: 100%;
}
.proprt_box_sec.bothss#al_hei_mnges .dibydss_cntss#two_boths_prtss .table-responsive11#both_ar_parts .lists_tablssts.purrssch h6 {
    color: #333;
    font-weight: 100;
}

#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -10px;
	font-size: 12px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -110px;
	font-size: 12px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 span.cnt_aressss span.managess_cnts {
    width: 100%;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 100%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.sm_boxx {
    width: 133px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.mng_fisetss {
    position: absolute;
    display: flex;
    right: 14px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.mng_fisetss span.mnss_fldss.plsh {
    padding-right: 2px;
    padding-left: 1px;
    font-size: 19px;
}
#holding_cst_arae_runningss .unddrlstt.last_tlt_parts .con-tooltip.top {
    width: 12.3% !important;
}
#holding_cst_arae_runningss .unddrlstt.last_tlt_parts span.cnt_aressss {
    display: flex;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.al_tx_blue .unddrlstt span.price_lststs.red {
    color: #ff0000 !important;
}

.proprt_box_sec h3.manag_cnt_areaa {
    position: relative;
}
.proprt_box_sec h3.manag_cnt_areaa span.right_edt {
    position: absolute;
    right: 10px;
    font-size: 14px;
}
.proprt_box_sec h3.manag_cnt_areaa span.right_edt a{color:#fff;}
.proprt_box_sec h3.manag_cnt_areaa span.right_edt i {
    background: #fff;
    padding: 2px 4px;
    color: #1c539a;
    border-radius: 3px;
    margin-left: 3px;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss:last-child .unddrlstt h6 {
    font-weight: 600 !important;
}
.lists_tablssts .unddrlstt h6 span.mnss_fldss.sigma_i.managess.fltooo {
    float: inherit;
    top: 0;
    right: -15px;
    padding: 0 5px;
}
.lists_tablssts .unddrlstt h6 span.mnss_fldss.sigma_i {
    margin-right: 2px;
    padding-right: 5px;
    font-size: 12px;
    background: #d9eaf1;
    width: 30px;
    height: 20px;
    text-align: center;
    font-weight: 800;
    line-height: 20px;
    position: relative;
    top: 7px;
}
.lists_tablssts .unddrlstt h6 span.mnss_fldss.sigma_i.managess {
    width: 16px;
    margin: 0;
    padding: 0;
}

#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch {
    width: 100%;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -58px;
	font-size: 12px;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch {
    width: 100%;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -15px;
	font-size: 12px;
}


#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -48px;
	font-size: 12px;
}
#return_rations_b_f_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -117px;
    font-size: 12px;
}
#all_tables_partss_area table tr th {
    padding: 0;
}
#all_tables_partss_area table tr th {
    padding: 0;
    font-weight: 600;
    font-size: 12px;
	text-align: center;
	vertical-align: middle;
}
#all_tables_partss_area table tr th tr td {
    font-size: 12px;
    text-align: center;
}
#all_tables_partss_area .br_d_{border:none;}
#all_tables_partss_area .pd_0{padding:none;}

#all_tables_partss_area table tr td {
    font-size: 12px;
    line-height: 16px;
	vertical-align: middle;
}
.h_100 {
    height: 100%;
}

#all_tables_partss_area td.green_box {
    background: #5cbf10;
    color: #fff;
}

#all_tables_partss_area td.red_box {
    background: #ff0000;
    color: #fff;
}

#manages_in_dtss .col-lg-2.col-4 span.edttt.bth_alsss {border-radius: 9px;}
.proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-35px;}
.property_desc.als_show_ar.investment_return_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-58px;}
.property_desc.als_show_ar.financial_ration_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-52px;}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss.duboolss_top#btm_manages:before {
    display: none;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#dubbal_brodd {
    position: relative;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#dubbal_brodd:before {
    width: 91%;
    height: 1px;
    background: #000;
    content: '';
    position: absolute;
    right: 0;
    top: 0;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#dubbal_brodd:after {
    width: 91%;
    height: 1px;
    background: #000;
    content: '';
    position: absolute;
    right: 0;
    top: 2px;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#dubbal_brodd_sigalls {
    position: relative;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#dubbal_brodd_sigalls:before {
    width: 91%;
    height: 1px;
    background: #000;
    content: '';
    position: absolute;
    right: 0;
    top: 0;
}


.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss.dubols_linenns span.py_titalls {
    width: 92%;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss span.rig_parts {
    font-size: 10px;
    float: right;
    padding-right: 3px;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss .unddrlstt {
    display: table;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss#btm_set_bordd {
    border-bottom: #000 solid 1px;
}

.lists_tablssts .unddrlstt h6 .red_txtext {
    color: #ff0000;
    font-weight: 600;
    font-size: 13px !important;
}
.lists_tablssts .unddrlstt h6 .black_txtext {
    color: #000;
    font-weight: 500;
}
.lists_tablssts .unddrlstt h6 .blue_txtext {
    color: #1378f7;
    font-weight: 500;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 span.cnt_aressss span.managess_cnts.cnt_line_manages {
    line-height: 15px;
    padding-top: 5px;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss span.managess_cnts.cnt_line_manages {
    line-height: 16px;
}
#holding_cst_arae_runningss #charts_all_prtss {
    padding: 48px 0;
}
#full_refinnace_arae #charts_all_prtss {
    padding: 100px 0;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 11.6% !important;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs {
    width: 152px;
}

#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 12%;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.spans_areaa {
    width: 117px !important;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 87%;
}

#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 11.7% !important;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 87%;
}

.fu_widthh{width:100% !important;}

#valution_arar .proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -7px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss#mng_space_boxx {
    padding-right: 0px;
    position: relative;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss#mng_space_boxx i {
    right: 20%;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 9%;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 78px !important;
    position: relative;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt h6 {
    display: flex;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt h6 span.tlt_diss_scripss {
    width: 59.5%;
}


#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 11.7% !important;}
	
#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {width: 87%;}

#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {padding-left: 11%;}

#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 118px !important;
}

#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 12%;
}
#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 112px !important;
}

#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 12%;
}
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 112px !important;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 11%;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 118px !important;
}

#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.grssses {
    width: 131px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.mnthss {
    width: 130px;
}

#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.sm_boxx {
    width: 131px;
}



@media (min-width: 481px) and (max-width: 767px) {
 #manages_in_dtss .col-lg-5.col-4 {padding-right: 0;}
}

#return_rations_b_f_arar .dibydss_cntss.filttere#two_boths_prtss {
    display: block !important;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 0;
    flex-wrap: inherit;
}

@media (min-width: 320px) and (max-width: 480px) {
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width:16% !important;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 100%;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.manage_cash_raea {
    width: 130px;
}
.proprt_box_sec.bothss.full_areaa #margess_bx .col-lg-1 {
    padding-right: 0;
    width: 10%;
    flex: 0 0 10%;
    max-width: 10%;
}	
.proprt_box_sec.bothss.full_areaa #margess_bx .col-lg-11 {
    padding-left: 0;
    flex: 0 0 90%;
    max-width: 90%;
}	

#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.sm_boxx.pricesss {
    width: 143px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.pricesss1 {
    width: 158px;
}
	
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.sm_boxx {
    width: 133px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.last_purchess {
    width: 147px;
}
#holding_cst_arae_runningss .lists_tablssts .unddrlstt h6 span.mnss_fldss {
        padding-right: 7px;
    }
	
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 106px !important;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 94px !important;
}
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 13.3% !important;
}
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 85%;
}	
	
#purchase_terms_area_prt .dibydss_cntss.filttere {
    display: block !important;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 0;
    flex-wrap: inherit;
}
#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 12.5% !important;
}
#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 85%;
}
#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 111px !important;
}	
#purchase_terms_area_prt .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt {
    padding-left: 12%;
}

#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 13.3% !important;
}
#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 85%;
}
#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 106px !important;
}

#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top {
    width: 11% !important;
}
#holding_cst_arae_runningss .unddrlstt.last_tlt_parts .con-tooltip.top {
    width: 11.7% !important;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .unddrlstt.accordion-header h6 span.cnt_aressss {
    width: 93.5%;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt h6 span.tlt_diss_scripss {
    width: 64%;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt span.price_lststs {
    width: 88px !important;
}
	
#holding_cst_arae_runningss .col-lg-7.pr-0 {padding-right: 15px !important;}
#holding_cst_arae_runningss .dibydss_cntss.filttere {display:block !important; width:100%; overflow-x:scroll; overflow-y:hidden; white-space:nowrap;
    padding: 0; flex-wrap: inherit;}	
.purchase_terms#al_hei_mnges .col-lg-7.pr-0 {padding-right: 15px !important;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx.unr_dr_box {width: 55%;}
.proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left: -37px; font-size: 10px;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .lists_tablssts .mn_ulderss:last-child .unddrlstt h6 {font-weight: 600 !important; font-size: 12px;}


.purchase_terms.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
left: -44px;
        font-size: 11px;
        letter-spacing: 1px;
}

#holding_cst_arae_runningss #charts_all_prtss {padding: 15px 0;}
#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
           left: -25px;
        font-size: 11px;
        letter-spacing: 1px;
}
#financing_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full .mn_ulderss h6 span.cnt_aressss.bor_none {
    width: 70%;
}
#valution_arar .proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -20px;
        font-size: 11px;
        letter-spacing: 1px;
}
#holding_cst_arae_runningss .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
   left: -133px;
        font-size: 11px;
        letter-spacing: 1px;
}
#property_anaylsis_pages .proprt_box_sec h3 {
    font-size: 12px;
        padding: 8px 0;
        font-weight: 600;
}
.proprt_box_sec h3.manag_cnt_areaa span.right_edt a {
    font-size: 12px;
}
#property_anaylsis_pages #cash_flow_araea h3.manag_cnt_areaa {
    text-align: left;
    padding-left: 15px;
}

#full_refinnace_arae .dibydss_cntss.filttere {
    display: block !important;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 0;
    flex-wrap: inherit;
}
#full_refinnace_arae .col-lg-7.pr-0 {padding-right: 15px !important;}

#full_refinnace_arae #charts_all_prtss {
    padding: 0px 0 10px;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -77px;
        font-size: 11px;
        letter-spacing: 1px;
}
.prp_bntsss ul li a {
        padding: 6px 10px !important;
    }
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch.two_part_bxx#bs_wirth_full .mn_ulderss h6 span.cnt_aressss.bor_none {
    width: 70%;
}
#refinnace_loan_d_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
            left: -54px;
        font-size: 11px;
        letter-spacing: 1px;
}
#cash_flow_araea .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
            left: -27px;
        font-size: 11px;
        letter-spacing: 1px;
}
h6#singallls {
    padding: 10px 0 !important;
}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt h6 span.tlt_diss_scripss#sm_parts_areae {
    width: 72% !important;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch .mn_ulderss .unddrlstt span.price_lststs.spans_areaa {
    width: 107px !important;
}

#cash_flow_araea .dibydss_cntss.filttere {
    display: block !important;
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 0;
    flex-wrap: inherit;
}
#cash_flow_araea .col-lg-7.pr-0 {padding-right: 15px !important;}
#return_rations_b_f_arar .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -140px;
        font-size: 11px;
        letter-spacing: 1px;
}
.purchase_criterias .proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
        left: -51px;
        font-size: 11px;
        letter-spacing: 1px;
}
.valuation_criterias .proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
        left: -52px;
        font-size: 11px;
        letter-spacing: 1px;
}
.cash_flow_criterias .proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
        left: -54px;
        font-size: 11px;
        letter-spacing: 1px;
}
.property_desc.als_show_ar.investment_return_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
            left: -77px;
        font-size: 11px;
        letter-spacing: 1px;
}
.property_desc.als_show_ar.financial_ration_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
left: -71px;
        font-size: 11px;
        letter-spacing: 1px;
}
#property_anaylsis_pages .property_desc.als_show_ar.prp_analyes {
    padding-top: 15px;
}
#property_anaylsis_pages .property_desc.als_show_ar.prp_analyes .lsting_proprty h3 {
    font-size: 18px;
}
#property_anaylsis_pages .prp_analyes .magan_y_no {
    width: 100%;
}
#property_anaylsis_pages .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts .unddrlstt h6 span.cnt_aressss {
    padding-right: 10px;
}
	
 #manages_in_dtss .col-lg-5.col-4 {padding-right: 0;}
 #manages_in_dtss .col-lg-2.col-4 span.edttt.bth_alsss {padding: 0 15px; border-radius: 9px;}
 #manages_in_dtss .col-lg-5.col-4 .form-group input {padding: 0px 10px;}
}


.tlt_vlu_areea {
    text-align: left;
    font-size: 15px;
    font-weight: 600;
    color: #3f99e7;
    padding: 10px 10px;
    background: #f1f1f1;
}

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .accordion .accordion-item .con-tooltip.top{width: 12% !important;}
.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .mn_ulderss.acr_liststst#holding_cost_running .accordion-body .mn_ulderss .unddrlstt h6 span.tlt_diss_scripss#sm_parts_areae {
    width: 74%;
}

.tx_black{color:#000 !important; font-weight:500 !important;}
h6#singallls {
    padding: 30px 0;
}
</style>

<!-- Modal -->
<div class="modal fade" id="vidoo_partss" role="dialog">
    <div class="modal-dialog" id="cent_screenss">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <iframe id="video" width="100%" height="315" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>



    <!--PEN HEADER-->
<div id="property_anaylsis_pages">	
    <div class="container mt-5">
        <div class="row mt-4">
             @include('front.layouts.detail-sidebar')
            <!--start full details -->
            <div class="col-12 col-sm-9 property_desc als_show_ar prp_analyes">
			   <div class="row mb-4">
			    <div class="col-lg-5">
				 <div class="lsting_proprty">
                    <h3>Buy & Sale </h3>
                 </div>
				</div>
			    <div class="col-lg-7">
				 <div class="magan_y_no">
				  <div class="choss_araes">
					<div class="lft_cntts">
						<p>Any Extra Debt paydown? </p>
					</div>
					<div class="yesNoButton" style="width: 100%;">
						<input type="checkbox" class="toggle" id="toggle11" autocomplete="off" />
						<label for="toggle11">
							<span class="on">Yes</span>
							<span class="off">No</span>
						</label>
					</div>
				  </div>
	             </div>



				 <div class="prp_bntsss">
					<ul>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit Property </a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-pie-chart"></i> Buy Refinance & Hold Projection </a>
						</li>
					</ul>
				</div>

				</div>


				<div class="col-lg-12 mt-4" id="itemisedPaidAmount" style="display:none;">
				<div class="row">
				<div class="col-lg-12">
				<div class="all_frm_list">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group managsss1 lot_sz">
								<label>Total</label>
								<span class="currencyInputprefix rupess1">₹</span>
								<input class="currencyInput" type="text" id="totalPaidAmountInput2" placeholder="" value="1000000" oninput="" required="" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="choss_araes">
								<div class="lft_cntts" style="width: 100%;">
									<p>Itemised Extra Debt Paydown</p>
								</div>
								<div class="yesNoButton" style="width: 100%;">
									<input type="checkbox" class="toggle" id="toggle13" autocomplete="off" />
									<label for="toggle13">
										<span class="on">Yes</span>
										<span class="off">No</span>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-5" id="itemisedPurchaseCost" style="display: none;">
						<div class="col-lg-12">
							<!-- Itemized purchase Costs  -->
                           <form action="">
							<div class="itm_cost_prch">
								<div class="hd_res_listsss">
									<h2>
										Detailed Transitions
										<span class="rit_mg">
											<button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#DetailedTransitions">
												<img src="https://1crapp.allproject.online/img/ad_bk.png" alt="" />
											</button>
										</span>
									</h2>
								</div>
								<div class="all_frm_list mb-0" style="padding:0 !important;">
									 <!---- Item List ---->
									  <div class="row" id="manages_in_dtss">
									   <div class="col-lg-12">
										<div class="form-group mb-0">
											<label>1st Extra Payment Made</label>
										</div>
                                       </div>

									   <div class="col-lg-5 col-4">
										<div class="form-group managsss1">
											<span class="currencyInputprefix">₹</span>
											<input class="currencyInput" type="text" placeholder="" value="500000" required="" />
										</div>
									   </div>
									   <div class="col-lg-5 col-4">
										<div class="form-group managsss1">
											<input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="" placeholder="30-11-2024" value="" class="datePickerDefault" />
										</div>
									   </div>

									    <div class="col-lg-2 col-4">
										<div class="form-group managsss1">
											<span class="edttt bth_alsss">
												<a href="javascript:void(0);"><img src="https://1crapp.allproject.online/img/edit.png" alt="" /></a>
												<a href="javascript:void(0);"><i class="fa fa-trash"></i></a>
											</span>
										</div>
									   </div>
									  </div>
									<!---- End Item List ---->

									<!---- Item List ---->
									  <div class="row" id="manages_in_dtss">
									   <div class="col-lg-12">
										<div class="form-group mb-0">
											<label>1st Extra Payment Made</label>
										</div>
                                       </div>

									   <div class="col-lg-5 col-4">
										<div class="form-group managsss1">
											<span class="currencyInputprefix">₹</span>
											<input class="currencyInput" type="text" placeholder="" value="500000" required="" />
										</div>
									   </div>
									   <div class="col-lg-5 col-4">
										<div class="form-group managsss1">
											<input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="" placeholder="30-11-2024" value="" class="datePickerDefault" />
										</div>
									   </div>

									    <div class="col-lg-2 col-4">
										<div class="form-group managsss1">
											<span class="edttt bth_alsss">
												<a href="javascript:void(0);"><img src="https://1crapp.allproject.online/img/edit.png" alt="" /></a>
												<a href="javascript:void(0);"><i class="fa fa-trash"></i></a>
											</span>
										</div>
									   </div>
									  </div>
									<!---- End Item List ---->

									<div class="btm_coststs">
										<span class="tltss">Total</span> <span class="pricss">₹ <span id="totalItemizedPaidAmt">500</span> </span>
									</div>

									<div class="mr_c_test mt-4"><button type="submit" class="alluser btn_partss" value="">Save</button></div>
								</div>
							</div>
                            </form>
							<!-- End Itemized purchase Costs -->
						</div>
					</div>
				</div>

			    </div>
			    </div>
			    </div>



				<div class="col-lg-12">
				 <div class="titlss_partss">
				    <p>Buy & Sale > B S Build Tech > A-201 <span class="blk_text">Buy & Sale Analysis</span></p>
					<span class="txt_fildss">This page shows the purchase brekdown, holding costs, and profit analysis for this property.</span>
				 </div>
				</div>


				<!----- Box Area ---->
				 <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Cash Needed</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold">$ 11,946</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Total Profit </div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold">$ 23,688</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

								<div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">ROI</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 170.7%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Annualized Roi</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 682.8%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Holding Cost (PM)</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 25000/Month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">COC</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 8.6%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Purchase Price</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 4500000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                <!----- End Box Area ---->



				<!---<div class="col-lg-12">
				 <div class="table-responsive">
				  <table class="table table-bordered mb-0" style="font-size: 11px;">
					<thead>
						<tr>
							<th style="text-align: center; font-size: 13px;">Refinance Year</th>
							<th style="text-align: center; font-size: 13px;">Amount Refinanced</th>
							<th style="text-align: center; font-size: 13px;">Gross EMI</th>
							<th style="text-align: center; font-size: 13px;">Cash Flow Just</th>
							<th style="text-align: center; font-size: 13px;">ROI</th>
							<th style="text-align: center; font-size: 13px;">ROE</th>
							<th style="text-align: center; font-size: 13px;">Cash Out</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="p-0">
							 <table width="100%">
							  <tr>
							   <td>11th</td>
							  </tr>
							  <tr>
							   <td>2035 Onwards</td>
							  </tr>
							 </table>
							</td>
							<td class="p-0">
							 <table width="100%" height="73">
							  <tr>
							   <td class="br-0" align="center" valign="middle" colspan="2">50,616</td>
							  </tr>
							 </table>
							</td>
							<td class="p-0">
							 <table width="100%">
							  <tr>
							   <td>Before</td>
							   <td>After</td>
							  </tr>
							  <tr>
							   <td>4,939</td>
							   <td>4,939</td>
							  </tr>
							 </table>
							</td>

							<td class="p-0">
							 <table width="100%">
							  <tr>
							   <td>Before</td>
							   <td>After</td>
							  </tr>
							  <tr>
							   <td>35,438</td>
							   <td>35,368</td>
							  </tr>
							 </table>
							</td>

							<td class="p-0">
							 <table width="100%">
							  <tr>
							   <td>Before</td>
							   <td>After</td>
							  </tr>
							  <tr>
							   <td>15%</td>
							   <td>18%</td>
							  </tr>
							 </table>
							</td>

							<td class="p-0">
							 <table width="100%">
							  <tr>
							   <td>Before</td>
							   <td>After</td>
							  </tr>
							  <tr>
							   <td>16%</td>
							   <td>21%</td>
							  </tr>
							 </table>
							</td>

							<td class="p-0">
							 <table width="100%" height="73">
							  <tr>
							   <td class="br-0" align="center" valign="middle" colspan="2">76,844</td>
							  </tr>
							 </table>
							</td>
						</tr>
					</tbody>
				  </table>
                 </div>
				</div>--->



			   </div>






<!-- Purchase --->
<div class="property_desc als_show_ar" id="purchase_terms_area_prt">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets purchase_terms mt-0" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Purchase Terms</div></div>
                        </div>
                    </div>
                </div>

			    <div class="col-lg-11">
				<h3>Purchase Terms</h3>
				<div class="row">
                <div class="col-lg-7 pr-0">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="lists_tablssts purrssch">
                                <!----- Item ----->
                                <div class="mn_ulderss">
                                    <div class="unddrlstt">
                                        <h6>
                                            <!-- Tolltip -->
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>
                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>
                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>
                                            <!-- End Tolltip -->
                                            <span class="cnt_aressss"><span class="managess_cnts">Basic Purchase Price</span></span> <span class="price_lststs">₹ 3,000,000 <i class="fa fa-pencil"></i></span>
                                        </h6>
                                    </div>
                                </div>
                                <!----- End Item ----->

								<!----- Item ----->
                                <div class="mn_ulderss">
                                    <div class="unddrlstt">
                                        <h6>
                                            <!-- Tolltip -->
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>
                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>
                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>
                                            <!-- End Tolltip -->
                                            <span class="cnt_aressss"><span class="managess_cnts">Construction (for plots) </span> <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">₹ 2,000,000</span>
                                        </h6>
                                    </div>
                                </div>
                                <!----- End Item ----->
								
								
								<!----- Amount Financed ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><span class="managess_cnts">Amount Financed </span> <span class="mnss_fldss plsh">-</span></span>
                                                    <span class="price_lststs">₹4,000,000</span>
                                                </h6>

                                              
											</div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Amount Financed ---->
								

                                <!----- Down Payment ----->
                                <div class="mn_ulderss">
                                    <div class="unddrlstt">
                                        <h6 class="bluuuue">
                                            <!-- Tolltip -->
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>
                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>
                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>
                                            <!-- End Tolltip -->
                                            <span class="cnt_aressss"><span class="managess_cnts">Down Payment</span> <span class="mnss_fldss">=</span></span>
                                            <span class="price_lststs">₹1,000,000 </span>
                                        </h6>
                                    </div>
                                </div>
                                <!----- End Down Payment ----->


                                <!----- Sub Purchase Cost ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><span class="managess_cnts">Purchase Cost - COP</span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></i> <span class="mnss_fldss plsh">+</span></span>
                                                    <span class="price_lststs">₹150,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Sub Purchase Cost -COP ---->

                                <!----- Sub Pre EMI Costs -PHC ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><span class="managess_cnts">Pre EMI Cost - PHC</span>
													 <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1"></i> <span class="mnss_fldss plsh">+</span>
													</span>
                                                    <span class="price_lststs">₹125,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Sub Pre EMI Costs -PHC ---->

                                <!----- Sub Extra Charges -EC ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss">
													 <span class="managess_cnts">Extra Charges-EC </span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2"></i> <span class="mnss_fldss plsh">+</span>
													 </span>
                                                    <span class="price_lststs">₹225,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Extra Charges -EC ---->

                                <!----- Sub CD Registration -EC ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss">
													 <span class="managess_cnts">CD Registration Cost (CDR Cost) </span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3"></i>
													 <span class="mnss_fldss plsh">+</span></span>
                                                    <span class="price_lststs">₹95,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Sub CD Registration -EC ---->

                                <!----- Sub Improvent Cost -IC ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><span class="managess_cnts">Improvent Cost -IC </span>
													<i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4"></i> <span class="mnss_fldss plsh">+</span></span>
                                                    <span class="price_lststs">₹100,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne4" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Sub Improvent Cost -IC ---->

                                <!----- Sub M & O Charges ---->
                                <div class="mn_ulderss acr_liststst">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="unddrlstt accordion-header" id="headingOne">
                                                <h6>
                                                    <!-- Tolltip -->
                                                    <div class="con-tooltip top">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><span class="managess_cnts">M & O Charges </span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5"></i> <span class="mnss_fldss plsh">+</span></span>
                                                    <span class="price_lststs">₹35,000 <i class="fa fa-pencil"></i></span>
                                                </h6>

                                                <div id="collapseOne5" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mn_ulderss">
                                                            <div class="unddrlstt">
                                                                <h6><span class="manag_space_areaa">Services3</span> <span class="price_lststs">₹ 330,840</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----- End Sub M & O Charges ---->

                                <!----- Total Investment ----->
                                <div class="mn_ulderss dubols_linenns" id="dubbal_brodd">
                                    <div class="unddrlstt">
                                        <h6>
										<!-- Tolltip -->
                                            <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>
                                                <div class="tooltip">
                                                    <h5>Purchase Price</h5>
                                                    <p>The amount you're paying to purchase a property.</p>
                                                </div>
                                            </div>
                                            <!-- End Tolltip -->
                                            <span class="py_titalls">Gross Cash Need/Invested </span>
                                            <span class="mnss_fldss">=</span>

                                            <span class="price_lststs">-₹ 270,000</span>
                                        </h6>
                                    </div>
                                </div>
								<!----- End Total Investment ----->


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="dibydss_cntss puchsssse pb-4" id="charts_all_prtss">
                        <div class="row">
                            <div class="col-lg-12 col-12">
								<div id="tabs_pie" class="mt-4">
									<div class="content-wrapper">
										<div id="tab-1" class="tab-content active">
											<div class="flexElement" id="purchase-cost-cop"></div>
										</div>
										<div id="tab-2" class="tab-content">
											<div class="flexElement" id="pre-emi-costs-phc"></div>
										</div>
										<div id="tab-3" class="tab-content">
											<div class="flexElement" id="extra-charges-ec"></div>
										</div>
										<div id="tab-4" class="tab-content">
											<div class="flexElement" id="cd-registration-ec"></div>
										</div>
										<div id="tab-5" class="tab-content">
											<div class="flexElement" id="improvent-cost-ic"></div>
										</div>
										<div id="tab-6" class="tab-content">
											<div class="flexElement" id="m-o-charges"></div>
										</div>
										<div id="tab-7" class="tab-content">
											<div class="flexElement" id="holding-cost-tb"></div>
										</div>
									</div>

									<div class="tab-wrapper part_lsstt">
										<ul class="tabs">
											<li class="tab-link active" data-tab="1">Purchase Cost -COP <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="2">Pre EMI Costs -PHC <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="3">Extra Charges -EC <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="4">CD Registration -EC <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="5">Improvent Cost -IC <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="6">M & O Charges <i class="fa fa-pencil"></i></li>
											<li class="tab-link" data-tab="7">Holding Cost <i class="fa fa-pencil"></i></li>
										</ul>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
               </div>
            </div>
        </div>

</div>
<!-- End Purchase --->

<!-- Financing  --->
<div class="property_desc als_show_ar" id="financing_arar">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Financing</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11">
				    <h3>Financing</h3>
					<!------ Holding Cost ----->
                    <div class="row">
                        <div class="col-lg-6">
						   <div class="dibydss_cntss filttere" id="two_boths_prtss">
								<div class="table-responsive11" id="both_ar_parts">
									<div class="lists_tablssts purrssch">
										<!----- Sub Holding Cost ---->
										<div class="mn_ulderss acr_liststst">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="unddrlstt accordion-header" id="headingOne">
														<h6>
														    <!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Total Financed Amount </span>
															<i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp1" aria-expanded="true" aria-controls="collapseOnestp1"></i>
															</span>
															<span class="price_lststs">Rs. 5400000/-</span>
														</h6>

														<div id="collapseOnestp1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
															<div class="accordion-body">
																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6><span class="manag_space_areaa">Services1</span> <span class="price_lststs">₹ 330,840</span></h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6><span class="manag_space_areaa">Services2</span> <span class="price_lststs">₹ 330,840</span></h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6><span class="manag_space_areaa">Services3</span> <span class="price_lststs">₹ 330,840</span></h6>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!----- End Sub Holding Cost ---->


										<!----- Current Market Price (CMP) ----->
										<div class="mn_ulderss">
											<div class="unddrlstt">
												<h6>
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts">Loan to Value</span></span>
													<span class="price_lststs">80%</span>
												</h6>
											</div>
										</div>
										<!----- End Current Market Price (CMP) ----->

										<!----- Current Market Price (CMP) ----->
										<div class="mn_ulderss">
											<div class="unddrlstt">
												<h6>
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts">Loan to Value</span></span> <span class="price_lststs">80%</span>
												</h6>
											</div>
										</div>
										<!----- End Current Market Price (CMP) ----->
									</div>
								</div>
							</div>

					   </div>

                        <div class="col-lg-6">
                            <div class="dibydss_cntss filttere">
                                <div class="table-responsive11" id="both_ar_parts">
                                    <div class="lists_tablssts purrssch other_parts_bx two_part_bxx" id="bs_wirth_full">
                                        <!----- Inter=st Part Of The Rank FMI ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Financing of: </span></span>
                                                    <span class="price_lststs">60% of BPP, & 80% of Const. Cost</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Inter=st Part Of The Rank FMI ----->

										<!----- Taxes ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Laon Type: </span></span>
                                                    <span class="price_lststs">Amortizing, 20 Years</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Taxes ----->

										<!----- Taxes ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Interest Rate: </span></span>
                                                    <span class="price_lststs">12.5%</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Taxes ----->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ End Holding Cost ----->
			   </div>
            </div>
        </div>
</div>
<!-- End Valuation  --->

<!-- Valution  --->
<div class="property_desc als_show_ar" id="valution_arar">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Valution</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11">
				    <h3>Valution</h3>
					<!------ Holding Cost ----->
                    <div class="row">
                        <div class="col-lg-6">
						   <div class="tlt_vlu_areea">Valution</div>
						   <div class="dibydss_cntss filttere">
                                <div class="table-responsive11" id="both_ar_parts">
                                    <div class="lists_tablssts purrssch other_parts_bx two_part_bxx" id="bs_wirth_full">
                                        <!----- Inter=st Part Of The Rank FMI ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">After Improvement Value:</span></span>
                                                    <span class="price_lststs">Rs.7000000</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Inter=st Part Of The Rank FMI ----->

										<!----- Taxes ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Basic Purchase Price Per Sq feet: </span></span>
                                                    <span class="price_lststs">Rs. 5000</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Taxes ----->
                                    </div>
                                </div>
                            </div>
					   </div>

                        <div class="col-lg-6">
						    <div class="tlt_vlu_areea">Area : 1000 Sq Feet</div>
                            <div class="dibydss_cntss filttere">
                                <div class="table-responsive11" id="both_ar_parts">
                                    <div class="lists_tablssts purrssch other_parts_bx two_part_bxx" id="bs_wirth_full">
                                        <!----- Inter=st Part Of The Rank FMI ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Basic Purchase Price Per Sq feet : </span></span>
                                                    <span class="price_lststs">Rs. 5000</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Inter=st Part Of The Rank FMI ----->

										<!----- Taxes ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6>
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none"><span class="managess_cnts">Improvement cost Per Sq Feet : </span></span>
                                                    <span class="price_lststs">Rs. 500</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Taxes ----->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ End Holding Cost ----->
			   </div>
            </div>
        </div>
</div>
<!-- End Valution  --->


<!-- Holding - Cost (Pre Rentout Perirod) For 5 Month (Duration Form Possession & Rent Out)  --->
<div class="property_desc als_show_ar" id="holding_cst_arae_runningss">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Holding Cost/Running Cost* Befofre Refinance</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11">
				    <h3>Holding Cost/Running Cost* Befofre Refinance</h3>
					<!------ Holding Cost ----->
                    <div class="row">
                        <div class="col-lg-7 pr-0">
                            <div class="dibydss_cntss filttere">
                                <div class="table-responsive11" id="both_ar_parts">

								    <!--- Fitter Slider --->
								    <div id="scroolls">									   
									   <div class="slirr_scrlle">
									     <!-- Tolltip -->
										   <div class="con-tooltip top">
											<p class="icoo"><i class="fa fa-question"></i></p>
											 <div class="tooltip">
											  <h5>Purchase Price</h5>
											  <p>The amount you're paying to purchase a property.</p>
											 </div>
											</div>
										  <!-- End Tolltip -->
									     <div class="tittlsss">Holding Period</div>
									     <div class="middiss_parts"><div class="value">0</div><span>Month</span></div>
										 <div class="Printss"><i class="fa fa-print"></i></div>
									     <input type="range" min="0" max="12" value="0" class="slider" id="range">										 
                                       </div>
								     </div>
									<!--- End Fitter Slider --->


									<div class="dibydss_cntss filttere">
										<div class="table-responsive11" id="both_ar_parts">
											<div class="lists_tablssts purrssch">									
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Taxes</span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 18,362</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->
												
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Current Market Price (CMP)</span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 7,500,000</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->
											
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Current Market Price (CMP)</span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 7,500,000</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->
											
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Current Market Price (CMP) </span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 7,500,000</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->
											
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Current Market Price (CMP)</span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 7,500,000</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->
											
												<!----- Item Area ----->
												<div class="mn_ulderss">
													<div class="unddrlstt">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Current Market Price (CMP) </span></span>
															<span class="mnss_fldss sigma_i">Σ</span>
															<span class="mnss_fldss">+</span>
															<span class="price_lststs">₹ 7,500,000</span>
														</h6>
													</div>
												</div>
												<!----- End Item Area ----->

												<!----- Item Area ---->
												<div class="mn_ulderss acr_liststst spac_mngg" id="holding_cost_running">
													<div class="accordion" id="accordionExample">
														<div class="accordion-item">
															<div class="unddrlstt accordion-header" id="headingOne">
																<h6>
																	<!-- Tolltip -->
																	<div class="con-tooltip top">
																		<p class="icoo"><i class="fa fa-question"></i></p>
																		<div class="tooltip">
																			<h5>Purchase Price</h5>
																			<p>The amount you're paying to purchase a property.</p>
																		</div>
																	</div>
																	<!-- End Tolltip -->
																	<span class="cnt_aressss" id="mng_space_boxx"><span class="managess_cnts">Pre EMI Cost 
																	</span>
																	 <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneanalist" aria-expanded="true" aria-controls="collapseOneanalist"></i> 
																	 <span class="mng_fisetss">
																	 
																	 <span class="mnss_fldss sigma_i managess">Σ</span>
																	 <span class="mnss_fldss plsh">+</span>
																	 </span>
																	</span>
																	<span class="price_lststs last_purchess">₹125,000 </span>
																</h6>

																<div id="collapseOneanalist" class="accordion-collapse pricc_lists collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
																	<div class="accordion-body">
																		<div class="mn_ulderss">
																			<div class="unddrlstt">
																				<h6>
																				 <span class="tlt_diss_scripss" id="sm_parts_areae">Services1</span> 
																				 <span class="price_lststs flt_riight">₹330,840</span>
																				</h6>
																			</div>
																		</div>

																		<div class="mn_ulderss">
																			<div class="unddrlstt">
																				<h6>
																				<span class="tlt_diss_scripss" id="sm_parts_areae">Services2</span> 
																				 <span class="price_lststs flt_riight">₹330,840</span>
																				</h6>
																			</div>
																		</div>

																		<div class="mn_ulderss">
																			<div class="unddrlstt">
																				<h6>
																				 <span class="tlt_diss_scripss" id="sm_parts_areae">Services3</span> 
																				 <span class="price_lststs flt_riight">₹ 330,840</span>
																				</h6>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!----- End Item Area ---->

												<!---- Cash Flow Monthly/Yearly ---->
												<div class="mn_ulderss duboolss_top spac_mngg" id="btm_manages">
													<div class="unddrlstt last_tlt_parts">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															 <span class="cnt_aressss">
															 <span class="managess_cnts">Total Holding Cost </span>
															 <span class="mnss_fldss">=</span></span>
															 <span class="price_lststs pricesss1">₹ 228,000 </span>
														</h6>
													</div>
												</div>
												<!---- End Cash Flow Monthly/Yearly ---->
											</div>
										</div>
									</div>

								</div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="dibydss_cntss puchsssse" id="charts_all_prtss">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
									    <div class="hdlinggs mt-4">Holding Cost <i class="fa fa-pencil"></i></div>
										<div class="flexElement mt-2" id="holdings-cost"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ End Holding Cost ----->
			   </div>
            </div>
        </div>
</div>
<!-- End Holding - Cost (Pre Rentout Perirod) For 5 Month (Duration Form Possession & Rent Out)  --->


<!-- Sales & Profits - Click Here  --->
<div class="property_desc als_show_ar" id="full_refinnace_arae">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Sales & Profits - Click Here</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11">
				    <h3>Sales & Profits</h3>
					<!------ Full Refinnace & Cash Out Analysys ----->
                    <div class="row">
                        <div class="col-lg-7 pr-0">
							<div class="dibydss_cntss filttere">
								<div class="table-responsive11" id="both_ar_parts">
									<div class="lists_tablssts purrssch">
										<!----- Basic Sale Price - BSP ----->
										<div class="mn_ulderss bg_araea">
											<div class="unddrlstt">
												<h6>
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts fu_widthh">Basic Sale Price - BSP</span></span> <span class="price_lststs">₹ 5,788,125 <i class="fa fa-pencil"></i></span>
												</h6>
											</div>
										</div>
										<!----- End Basic Sale Price - BSP ----->	
										
										<!----- Selling Cost ---->
										<div class="mn_ulderss acr_liststst">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="unddrlstt accordion-header" id="headingOne">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Selling Cost</span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp" aria-expanded="true" aria-controls="collapseOnestp"></i> <span class="mnss_fldss plsh">-</span></span>
															<span class="price_lststs">₹115,763 <i class="fa fa-pencil"></i></span>
														</h6>

														<div id="collapseOnestp" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
															<div class="accordion-body">
																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services1</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services2</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services3</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!----- End Selling Cost ---->
										

										<!----- Net Sales Price (NSP) ----->
										<div class="mn_ulderss" id="dubbal_brodd">
											<div class="unddrlstt">
												<h6 class="bluuuue">
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts">Net Sales Price (NSP)</span> <span class="mnss_fldss plsh">=</span></span>
													<span class="price_lststs">₹5,672,362 </span>
												</h6>
											</div>
										</div>
										<!----- End Net Sales Price (NSP) ----->

										<!---- Holding Cost For 03 Years ---->
										<div class="mn_ulderss">
											<div class="unddrlstt">
												<h6>
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts">Holding Cost For 03 Years </span> <span class="mnss_fldss">-</span></span><span class="price_lststs">₹1,415,187 </span>
												</h6>
											</div>
										</div>
										<!---- End Holding Cost For 03 Years ---->

										
										<!----- Balance Loan Repayment ---->
										<div class="mn_ulderss acr_liststst">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="unddrlstt accordion-header" id="headingOne">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Balance Loan Repayment</span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp" aria-expanded="true" aria-controls="collapseOnestp"></i> <span class="mnss_fldss plsh">-</span></span>
															<span class="price_lststs">₹3,454,622 <i class="fa fa-pencil"></i></span>
														</h6>

														<div id="collapseOnestp" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
															<div class="accordion-body">
																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services1</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services2</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services3</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!----- End Balance Loan Repayment ---->
										
										<!----- Cash Invested ---->
										<div class="mn_ulderss acr_liststst">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="unddrlstt accordion-header" id="headingOne">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															<span class="cnt_aressss"><span class="managess_cnts">Cash Invested</span> <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp" aria-expanded="true" aria-controls="collapseOnestp"></i> <span class="mnss_fldss plsh">-</span></span>
															<span class="price_lststs">₹3,454,622 </span>
														</h6>

														<div id="collapseOnestp" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
															<div class="accordion-body">
																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services1</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services2</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>

																<div class="mn_ulderss">
																	<div class="unddrlstt">
																		<h6>
																		 <span class="manag_space_areaa">Services3</span> 
																		 <span class="price_lststs spans_areaa">₹ 330,840</span>
																		</h6>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!----- End Cash Invested ---->
										
										<!----- Total Profit ----->
										<div class="mn_ulderss" id="dubbal_brodd">
													<div class="unddrlstt last_tlt_parts">
														<h6>
															<!-- Tolltip -->
															<div class="con-tooltip top">
																<p class="icoo"><i class="fa fa-question"></i></p>
																<div class="tooltip">
																	<h5>Purchase Price</h5>
																	<p>The amount you're paying to purchase a property.</p>
																</div>
															</div>
															<!-- End Tolltip -->
															 <span class="cnt_aressss">
															 <span class="managess_cnts red">TOTAL PROFIT</span>
															 <span class="mnss_fldss red">=</span></span>
															 <span class="price_lststs pricesss1 red">₹ -927,447 </span>
														</h6>
													</div>
										</div>
										<!----- End Total Profit ----->

                                        <!--- Post -tax Profit ---->
										<div class="mn_ulderss">
											<div class="unddrlstt">
												<h6 class="bluuuue">
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts tx_black">Post -tax Profit</span></span>
													<span class="price_lststs tx_black">₹ 649,213 </span>
												</h6>
											</div>
										</div>
										<!--- End Post -tax Profit ---->										
										
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-5">
                            <div class="dibydss_cntss puchsssse">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
									    <div class="hdlinggs mt-4">Selling Costs</div>
										<div class="flexElement mt-2" id="sales-profits"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ End Full Refinnace & Cash Out Analysys ----->
			   </div>
            </div>
        </div>
</div>
<!-- End Sales & Profits - Click Here  --->

<!-- Investment Returns  --->
<div class="property_desc als_show_ar" id="refinnace_loan_d_arar">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
            <div class="row" id="margess_bx">
                <div class="col-lg-1">
                    <div class="dibydss_cntss filttere">
                        <div class="table-responsive11" id="both_ar_parts">
                            <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Investment Returns</div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11">
				    <h3 class="manag_cnt_areaa">Investment Returns</h3>
					<!------ Holding Cost ----->
                    <div class="row">
                        <div class="col-lg-6">
						   <div class="dibydss_cntss filttere" id="two_boths_prtss">
								<div class="table-responsive11" id="both_ar_parts">
									<div class="lists_tablssts purrssch">

										<!----- Current Market Price (CMP) ----->
										<div class="mn_ulderss">
											<div class="unddrlstt">
												<h6 id="singallls">
													<!-- Tolltip -->
													<div class="con-tooltip top">
														<p class="icoo"><i class="fa fa-question"></i></p>
														<div class="tooltip">
															<h5>Purchase Price</h5>
															<p>The amount you're paying to purchase a property.</p>
														</div>
													</div>
													<!-- End Tolltip -->
													<span class="cnt_aressss"><span class="managess_cnts">Return on Investment</span></span> <span class="price_lststs">119.8%</span>
												</h6>
											</div>
										</div>
										<!----- End Current Market Price (CMP) ----->
									</div>
								</div>
							</div>

					   </div>

                        <div class="col-lg-6">
                            <div class="dibydss_cntss filttere">
                                <div class="table-responsive11" id="both_ar_parts">
                                    <div class="lists_tablssts purrssch other_parts_bx two_part_bxx" id="bs_wirth_full">
										<!----- Taxes ----->
                                        <div class="mn_ulderss">
                                            <div class="unddrlstt">
                                                <h6 id="singallls">
												    <!-- Tolltip -->
                                                    <div class="con-tooltip top" id="gap_managess">
                                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                                        <div class="tooltip">
                                                            <h5>Purchase Price</h5>
                                                            <p>The amount you're paying to purchase a property.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Tolltip -->
                                                    <span class="cnt_aressss bor_none" id="singallls"><span class="managess_cnts">Annualized ROI: </span></span>
                                                    <span class="price_lststs">179.7%</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!----- End Taxes ----->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ End Holding Cost ----->
			   </div>
            </div>
        </div>
</div>
<!-- End Investment Returns  --->




<!-- Purchase Criterias  --->
<div class="property_desc als_show_ar purchase_criterias" id="all_tables_partss_area">
    <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
        <div class="row" id="margess_bx">
            <div class="col-lg-1">
                <div class="dibydss_cntss filttere">
                    <div class="table-responsive11" id="both_ar_parts">
                        <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Purchase Criterias</div></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-11">
                <h3>Purchase Criterias</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Property Purchase Criteria
                                </th>
                                <th>
                                    <table class="table mb-0">
                                        <tr>
                                            <td>Your Asset's Performance</td>
                                        </tr>
                                        <tr>
                                            <td class="br_d_ p-0">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Requiment</td>
                                                        <td>Actiual</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Criteria Status</th>
                                <th>
                                    Action Your need to take Immediate
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss green_box"><i class="fa fa-check"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/emoji_ico1.png')}}" class="ico_parts" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss red_box"><i class="fa fa-times"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/v_dio_icoss.png')}}" class="ico_parts" data-toggle="modal" data-target="#vidoo_partss" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Purchase Criterias  --->


<!-- Valuation Criterias  --->
<div class="property_desc als_show_ar valuation_criterias" id="all_tables_partss_area">
    <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
        <div class="row" id="margess_bx">
            <div class="col-lg-1">
                <div class="dibydss_cntss filttere">
                    <div class="table-responsive11" id="both_ar_parts">
                        <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Valuation Criterias</div></div>
                    </div>
                </div>
            </div>

		   <div class="col-lg-11">
                <h3>Valuation Criterias</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Property Purchase Criteria
                                </th>
                                <th>
                                    <table class="table mb-0">
                                        <tr>
                                            <td>Your Asset's Performance</td>
                                        </tr>
                                        <tr>
                                            <td class="br_d_ p-0">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Requiment</td>
                                                        <td>Actiual</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Criteria Status</th>
                                <th>
                                    Action Your need to take Immediate
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss green_box"><i class="fa fa-check"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/emoji_ico1.png')}}" class="ico_parts" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss red_box"><i class="fa fa-times"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/v_dio_icoss.png')}}" class="ico_parts" data-toggle="modal" data-target="#vidoo_partss" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Valuation Criterias  --->



<!-- Cash Flow Criterias  --->
<div class="property_desc als_show_ar cash_flow_criterias" id="all_tables_partss_area">
    <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
        <div class="row" id="margess_bx">
            <div class="col-lg-1">
                <div class="dibydss_cntss filttere">
                    <div class="table-responsive11" id="both_ar_parts">
                        <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Cash Flow Criterias</div></div>
                    </div>
                </div>
            </div>

		   <div class="col-lg-11">
                <h3>Cash Flow Criterias</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Property Purchase Criteria
                                </th>
                                <th>
                                    <table class="table mb-0">
                                        <tr>
                                            <td>Your Asset's Performance</td>
                                        </tr>
                                        <tr>
                                            <td class="br_d_ p-0">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Requiment</td>
                                                        <td>Actiual</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Criteria Status</th>
                                <th>
                                    Action Your need to take Immediate
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss green_box"><i class="fa fa-check"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/emoji_ico1.png')}}" class="ico_parts" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss red_box"><i class="fa fa-times"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/v_dio_icoss.png')}}" class="ico_parts" data-toggle="modal" data-target="#vidoo_partss" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cash Flow Criterias  --->


<!-- Investment Return Criterias  --->
<div class="property_desc als_show_ar investment_return_criterias" id="all_tables_partss_area">
    <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
        <div class="row" id="margess_bx">
            <div class="col-lg-1">
                <div class="dibydss_cntss filttere">
                    <div class="table-responsive11" id="both_ar_parts">
                        <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Investment Return Criterias</div></div>
                    </div>
                </div>
            </div>

		   <div class="col-lg-11">
                <h3>Investment Return Criterias</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Property Purchase Criteria
                                </th>
                                <th>
                                    <table class="table mb-0">
                                        <tr>
                                            <td>Your Asset's Performance</td>
                                        </tr>
                                        <tr>
                                            <td class="br_d_ p-0">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Requiment</td>
                                                        <td>Actiual</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Criteria Status</th>
                                <th>
                                    Action Your need to take Immediate
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss green_box"><i class="fa fa-check"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/emoji_ico1.png')}}" class="ico_parts" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss red_box"><i class="fa fa-times"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/v_dio_icoss.png')}}" class="ico_parts" data-toggle="modal" data-target="#vidoo_partss" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Investment Return Criterias  --->


<!-- Financial Ration Criterias  --->
<div class="property_desc als_show_ar financial_ration_criterias" id="all_tables_partss_area">
    <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="al_hei_mnges">
        <div class="row" id="margess_bx">
            <div class="col-lg-1">
                <div class="dibydss_cntss filttere">
                    <div class="table-responsive11" id="both_ar_parts">
                        <div class="vr_t_txtx unr_dr_box"><div class="unddr_cntss">Financial Ration Criterias</div></div>
                    </div>
                </div>
            </div>

		   <div class="col-lg-11">
                <h3>Financial Ration Criterias</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Property Purchase Criteria
                                </th>
                                <th>
                                    <table class="table mb-0">
                                        <tr>
                                            <td>Your Asset's Performance</td>
                                        </tr>
                                        <tr>
                                            <td class="br_d_ p-0">
                                                <table class="table mb-0">
                                                    <tr>
                                                        <td>Requiment</td>
                                                        <td>Actiual</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Criteria Status</th>
                                <th>
                                    Action Your need to take Immediate
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss green_box"><i class="fa fa-check"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/emoji_ico1.png')}}" class="ico_parts" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>Basic Purchase Price - BPP</td>
                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td><_</td>
                                            <td>₹4,500.000</td>
                                            <td>₹4,200.000</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0 h_100">
                                        <tr>
                                            <td class="tiksss red_box"><i class="fa fa-times"></i></td>
                                            <td>Meeting</td>
                                        </tr>
                                    </table>
                                </td>

                                <td class="br_d_ p-0">
                                    <table class="table mb-0">
                                        <tr>
                                            <td><img src="{{ url('home/img/v_dio_icoss.png')}}" class="ico_parts" data-toggle="modal" data-target="#vidoo_partss" alt="" /></td>
                                            <td>No Action Needed. DoingGreat I Keep it up I Show this message in popup. this message should.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Investment Return Criterias  --->




	   </div>
    </div>
    </div>
    </div>






    @include('front.layouts.footer')

    @include('front.layouts.footer_new')




<div class="modal fade" id="DetailedTransitions" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedPaidAmtForm" method="POST">
                <div class="hd_res_listsss">
                    <h2>Detailed Transitions</h2>
                </div>
                <div class="all_frm_list p-0 mb-0">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkPaidAmt active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkPaidAmt" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix">₹</span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% of Sales Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="SellingCostRollIntoLoanCreateYes" onclick="RollIntoLoan('SellingCost','Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="SellingCostRollIntoLoanCreateNo" onclick="RollIntoLoan('SellingCost','Create','No')">No</a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
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





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js"></script>
<script src="js/line_chart.js"></script>
<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>


<script>
$(document).ready(function(){
    var url = $("#video").attr('src');

    $("#video").attr('src', '');

    $("#myModal").on('shown.bs.modal', function(){
        $("#video").attr('src', url);
    });

    $("#myModal").on('hide.bs.modal', function(){
        $("#video").attr('src', '');
    });
});
</script>

<script>
    function RollIntoLoan(section,formAction,action){
        if(section == 'SellingCost'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoan').val(1);
                    $('#SellingCostRollIntoLoanCreateYes').css('color','blue');
                    $('#SellingCostRollIntoLoanCreateNo').css('color','black');
                }
                if(action == 'No'){
                    $('#itemizedPaidAmtInLoan').val(0);
                    $('#SellingCostRollIntoLoanCreateYes').css('color','black');
                    $('#SellingCostRollIntoLoanCreateNo').css('color','blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoanEdit').val(1);
                    $('#SellingCostRollIntoLoanEditYes').css('color','blue');
                    $('#SellingCostRollIntoLoanEditNo').css('color','black');
                }
                if(action == 'No'){
                    $('#itemizedPaidAmtInLoanEdit').val(0);
                    $('#SellingCostRollIntoLoanEditYes').css('color','black');
                    $('#SellingCostRollIntoLoanEditNo').css('color','blue');
                }
            }
        }
    }



    function opencontractsellmodal() {
        $('#contractsellmodal').modal('show');
    }

    $('.tabLinkPaidAmtEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');
        $("#itemizedPaidAmtTypeEdit").val(tabID);
    });



    $("#toggle").on('change', function() {
        $("#financeToggleDiv").toggle();
    });
    $("#toggle11").on('change', function() {
        $("#itemisedPaidAmount").toggle();
    });
    $("#toggle13").on('change', function() {
        $("#itemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
    });

	function updateTotalPaidAmountDiv(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
    }

    function updateTotalPaidAmountDivAllItemized(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
        $('#totalPaidAmountInput2').val(val)
        $("#totalItemizedPaidAmt").text(val);
    }

    function updateTotalPurchasedAmountDiv(val){
        $('#totalPurchasedAmountInput').val(val)
    }


	function RollIntoLoan(formAction,action){
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoanEdit').val(1);
                    $('#paidAmtInLoanYesEdit').css('color', 'blue');
                    $('#paidAmtInLoanNoEdit').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedPaidAmtInLoanEdit').val(0);
                    $('#paidAmtInLoanNoEdit').css('color', 'blue');
                    $('#paidAmtInLoanYesEdit').css('color', 'black');
                }
            }

            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoan').val(1);
                    $('#paidAmtInLoanYesCreate').css('color', 'blue');
                    $('#paidAmtInLoanNoCreate').css('color', 'black');
                }

                if(action == 'No'){
                    $('#itemizedPaidAmtInLoan').val(0);
                    $('#paidAmtInLoanNoCreate').css('color', 'blue');
                    $('#paidAmtInLoanYesCreate').css('color', 'black');
                }
            }
        }
</script>
<script>
    $('.tabLinkPaidAmt').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedPaidAmtType").val(tabID);
    });

    $('.tabLinkPaidAmtEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedPaidAmtTypeEdit").val(tabID);
    });

</script>

<script>
    @if(isset($PurchaseChartData['labels']))
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($PurchaseChartData['labels']),
                datasets: [{
                    data: @json($PurchaseChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(99, 255, 220, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(99, 255, 220, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif
    @if(isset($extraCostChartData['labels']))
        var ctx = document.getElementById('extraCostpieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($extraCostChartData['labels']),
                datasets: [{
                    data: @json($extraCostChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif

    @if(isset($improvementCostChartData['labels']))
        var ctx = document.getElementById('improvementCostChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($improvementCostChartData['labels']),
                datasets: [{
                    data: @json($improvementCostChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif

    @if(isset($ImportantMilestonepieChartData['labels']))
        var ctx = document.getElementById('ImportantMilestonepieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($ImportantMilestonepieChartData['labels']),
                datasets: [{
                    data: @json($ImportantMilestonepieChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif

    @if(isset($holdingCostChartData['labels']))
        var ctx = document.getElementById('holdingCostpieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($holdingCostChartData['labels']),
                datasets: [{
                    data: @json($holdingCostChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif

    @if(isset($salesProfitsChartData['labels']))
        var ctx = document.getElementById('salesprofitspieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($salesProfitsChartData['labels']),
                datasets: [{
                    data: @json($salesProfitsChartData['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(99, 255, 220, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(99, 255, 220, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    @endif
</script>
    <script>
        function deleteProperty(id){
            $('#prop_deleteid').val(id);
            $('#property_delete_modal').modal('show');
        }

        function archiveProperty(id){
            $('#prop_archiveid').val(id);
            $('#property_archive_modal').modal('show');
        }

        function restoreProperty(id){
            $('#prop_restoreid').val(id);
            $('#property_restore_modal').modal('show');
        }


    @if(Session::has('success'))
    function load(){
        $('#successModal').modal('show');
    }
    window.onload = load;
    @endif



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


<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.22.0/dist/apexcharts.min.js" type="text/javascript"></script>
<script>
var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [37, 47, 63],
    labels: ["Services1", "Services2", "Services3"],
};
var chart = new ApexCharts(document.querySelector("#purchase-cost-cop"), options);
chart.render();

<!------  End purchase cost cop ---------->


var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [37, 47, 53, 66],
    labels: ["Services1", "Services2", "Services3", "Services4"],
};
var chart = new ApexCharts(document.querySelector("#pre-emi-costs-phc"), options);
chart.render();

<!------  End pre emi costs phc ---------->


var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [40, 50, 63, 76],
    labels: ["Services1", "Services2", "Services3", "Services4"],
};
var chart = new ApexCharts(document.querySelector("#extra-charges-ec"), options);
chart.render();

<!------  End extra-charges-ec ---------->


var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [40, 50, 63],
    labels: ["Services1", "Services2", "Services3"],
};
var chart = new ApexCharts(document.querySelector("#cd-registration-ec"), options);
chart.render();

<!------  End cd-registration-ec ---------->


var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [40, 50],
    labels: ["Services1", "Services2"],
};
var chart = new ApexCharts(document.querySelector("#improvent-cost-ic"), options);
chart.render();

<!------  End improvent-cost-ic ---------->


var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [40, 50, 50,],
    labels: ["Services1", "Services2", "Services3"],
};
var chart = new ApexCharts(document.querySelector("#m-o-charges"), options);
chart.render();

<!------  End m-o-charges ---------->

var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [40, 70, 90,],
    labels: ["Services1", "Services2", "Services3"],
};
var chart = new ApexCharts(document.querySelector("#holding-cost-tb"), options);
chart.render();

<!------  End m-o-charges ---------->


var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 30, 50],
    labels: ["Roof casting", "Exterior Sideing", "Exterior Sideing", "Exterior Sideing", "Park facing Parking", "Exterior Sideing"],
};
var chart = new ApexCharts(document.querySelector("#cost-of-purchase"), options);
chart.render();

<!------  End cost-of-purchase ---------->

var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 30, 50],
    labels: ["Roof casting", "Exterior Sideing", "Exterior Sideing", "Exterior Sideing", "Park facing Parking", "Exterior Sideing"],
};
var chart = new ApexCharts(document.querySelector("#extra-cost"), options);
chart.render();

<!------  End extra-cost ---------->


var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 30, 50],
    labels: ["Roof casting", "Exterior Sideing", "Exterior Sideing", "Exterior Sideing", "Park facing Parking", "Exterior Sideing"],
};
var chart = new ApexCharts(document.querySelector("#cd-registrations"), options);
chart.render();

<!------  End CD Registrations ---------->


var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 30, 50],
    labels: ["Roof casting", "Exterior Sideing", "Exterior Sideing", "Exterior Sideing", "Park facing Parking", "Exterior Sideing"],
};
var chart = new ApexCharts(document.querySelector("#improvement-cost"), options);
chart.render();

<!------  End Improvement Cost ---------->

var options = {
    chart: {
        height: 230,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 50],
    labels: ["Refinance Cost", "Other Misclanious Expenses", "Projects & Property Charges", "Search Report Charges", "Finance (Bank Loan) Cost"],
};
var chart = new ApexCharts(document.querySelector("#misclanious"), options);
chart.render();

<!------  End Improvement Cost ---------->

var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20, 50],
    labels: ["Interest Part Of The Rank FMI", "Taxes", "Utilites Charges", "Yiaintonance Cilafges", "Property Management"],
};
var chart = new ApexCharts(document.querySelector("#holdings-cost"), options);
chart.render();

<!------  End holdings Cost ---------->


<!------  Admin Insurance ---------->
var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15, 20],
    labels: ["Interest Part Of The Rank FMI", "Taxes", "Utilites Charges", "Yiaintonance Cilafges"],
};
var chart = new ApexCharts(document.querySelector("#admin-insurance"), options);
chart.render();

<!------  End Admin Insurance ---------->



<!------  Admin Insurance ---------->
var options = {
    chart: {
        height: 270,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [11, 13, 15],
    labels: ["Interest Part Of The Rank FMI", "Taxes", "Utilites Charges"],
};
var chart = new ApexCharts(document.querySelector("#sales-profits"), options);
chart.render();

<!------  End Admin Insurance ---------->


var options = {
    chart: {
        height: 280,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [45, 55],
    labels: ["Roof casting", "Roof casting"],
};
var chart = new ApexCharts(document.querySelector("#income-cost"), options);
chart.render();

<!------  End Income Cost ---------->


var options = {
    chart: {
        height: 280,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [25, 35, 45, 55, 75],
    labels: ["Expenses", "Property Management", "Leasing Cost", "Utilites Charges", "Maintencence Cilafges"],
};
var chart = new ApexCharts(document.querySelector("#expenses-cost"), options);
chart.render();

<!------  End Income Cost ---------->


<!------ Income ---------->
var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [37, 47, 53, 66],
    labels: ["Services1", "Services2", "Services3", "Services4"],
};
var chart = new ApexCharts(document.querySelector("#income-charts"), options);
chart.render();

<!------  End Income ---------->

<!------ Expenses ---------->
var options = {
    chart: {
        height: 320,
        type: "pie",
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: false,
                zoom: false,
                zoomin: false,
                zoomout: false,
                pan: false,
                reset: false,
            },
            autoSelected: "zoom",
        },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
            click: function (event, chartContext, config) {
                console.log(config.dataPointIndex + " " + config.seriesIndex);
            },
        },
    },
    series: [37, 47, 53],
    labels: ["Services1", "Services2", "Services3"],
};
var chart = new ApexCharts(document.querySelector("#expenses-charts"), options);
chart.render();

<!------  End Expenses ---------->

</script>


<script>
let slider = document.getElementById("range");
let value = document.querySelector(".value");
value.innerHTML = slider.value; // Display the default slider value

function calcValue() {
  valuePercentage = (slider.value / slider.max)*100;
    slider.style.background = `linear-gradient(to right, #008ffb ${valuePercentage}%, #ebe9e7 ${valuePercentage}%)`;
}

// Update the current slider value (each time you drag the slider handle)
slider.addEventListener('input', function(){
  calcValue();
  value.textContent = this.value;
})

calcValue();
</script>

<script>
 $('.tab-link').click( function() {
	var tabID = $(this).attr('data-tab');
	$(this).addClass('active').siblings().removeClass('active');
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');
 });
</script>

<style>
    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }

    button.btn.btn-clear.list-controls-btn-compact.blue {
    background: #0e3992;
    width: 100%;
    color: #fff;
}
button.btn.btn-clear.list-controls-btn-compact {
    background: #cccccc;
    width: 100%;
    color: #fff;
}

button.btn.btn-clear.list-controls-btn-compact:focus {
    outline: 0px auto-webkit-focus-ring-color !important;
}

.btn_sltss .ex_prt {
    background: #0e3992;
    width: 100%;
    padding: 4px 30px;
    color: #fff;
    font-size: 16px;
    border-radius: 3px;
    border: 0;
}
.proprt_box_sec h3 {
background: #1c539a;
    text-align: center;
    padding: 12px 0;
    margin: 0;
    color: #fff;
    font-size: 16px;
    display: block;
    font-weight: 500;
}
.blue.property-quick-stats-value {
    font-size: 14px;
}
.text-uppercase.font-size-12.gray.property-quick-stats-label {
    font-size: 14px;
    color: #1c539a;
    font-weight: bold;
}
.als_show_ar .lists_tablssts .unddrlstt h6 p.icoo i {
    font-size: 13px;
    position: relative;
    top: -1px;
    line-height: 15px;
}
.analysis-subtitle {
    font-size: 14px;
    color: #5e5151;
    margin-bottom: 40px;
}

.als_show_ar .tooltip h5 {
    background: #2a5d9f;
    }

    #para_gr .un_listststs ul li {
    float: left;
    width: 50%;
    display: inline-block;
    border: none;
    font-size: 10px;
    padding: 5px 0;
    font-weight: normal;
}
 #para_gr .un_listststs ul li a{
font-size : 10px
}

.proprt_box_sec table.table.borddr_mngss tr td {

    font-weight: normal;
    }

    tr.redtotal td {
    color: red;
    font-weight: bold !important;
}

tr.redtotal {
    border-top: double;
}

</style>