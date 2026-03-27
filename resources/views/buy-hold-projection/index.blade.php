@include('front.layouts.header')


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

.prp_analyes .prp_bntsss ul li select#optionss {
    padding: 6px 4px;
    font-size: 12px;
    line-height: 18px;
    border: #4a83cc solid 1px;
    border-radius: 20px;
    color: #4a83cc;
    cursor: pointer;
}
.prp_analyes .prp_bntsss ul li select#optionss:focus{outline:none;}


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

.proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts {display: inline-block; width: 100%;}
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
    width:92%; font-weight: 800; padding-left: 11.3%; font-12px;}

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
    color: #1c5299;
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
    background: #f9e7b5 !important;
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
#holding_cst_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -20px;
	font-size: 12px;
}

#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .lists_tablssts.purrssch {
    width: 100%;
}
#full_refinnace_arae .proprt_box_sec.bothss .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {
    left: -72px;
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
    top: -11px;
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
 #para_gr .un_listststs ul li a{font-size : 10px}

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

#manages_in_dtss .col-lg-2.col-4 span.edttt.bth_alsss {border-radius: 9px;}
.proprt_box_sec.bothss.bh_bs_shteets .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-35px;}
.property_desc.als_show_ar.investment_return_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-58px;}
.property_desc.als_show_ar.financial_ration_criterias .dibydss_cntss.filttere .table-responsive11#both_ar_parts .vr_t_txtx .unddr_cntss {left:-52px;}


@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}
.chartjs-render-monitor{animation:chartjs-render-animation 1ms}
.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}
.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}
.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}

.propfixsd.new_propertyy.hollss .con-tooltip.top p.icoo i {top: -1px;}

@media (min-width: 481px) and (max-width: 767px) {
 #manages_in_dtss .col-lg-5.col-4 {padding-right: 0;}	
}

@media (min-width: 320px) and (max-width: 480px) {
 #manages_in_dtss .col-lg-5.col-4 {padding-right: 0;}
 #manages_in_dtss .col-lg-2.col-4 span.edttt.bth_alsss {padding: 0 15px; border-radius: 9px;}
 #manages_in_dtss .col-lg-5.col-4 .form-group input {padding: 0px 10px;}
}


@supports (position: sticky) {
  .sticky_und {
    position: sticky;
    top: 120px;
	z-index: 99;
  }
}



.sidebar {

}
..fixed {
  position: fixed;
  top: 0;
}

</style>



<div class="container mt-5">
    <div class="row mt-4">
        @include('front.layouts.detail-sidebar')
        <div class="col-12 col-sm-9 property_desc als_show_ar prp_analyes">
            <div class="row mb-4">
			
			 <div class="col-lg-5">
				 <div class="lsting_proprty purch_list_conts" id="alss_pgesss">
                        <h3>Buy, Refinance & Hold Projection</h3>
                        <p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> Buy Hold Projection</p>
                    </div>
				</div>
			    <div class="col-lg-7">				
				 <div class="magan_y_no">
				  <div class="choss_araes">
					<div class="lft_cntts">
						<p>Any Extra Debt Paydown?</p>
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
							<a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> Export </a>
						</li>
						<li>
						 <select id="optionss">
						  <option value="">Show Milestones</option>
						 </select>
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
				    <p>Buy, Refinance & Hold > B.S. Buildtehc-A-201- <span class="blk_text">Property Analysis</span></p>
					<span class="txt_fildss">This page shows the purchase brekdown, holding costs, cash flow and investment returns for this property.</span>
				 </div>
				</div>
				
				
				<!----- Box Area ---->
				 <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Cash Needed</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold">$ 11,946</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Cash Flow</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold">$ 211/mo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">Cap Rate</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 7.2%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">ROI</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 682.8%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">GRM</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 6.75</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body padding-h-20 padding-v-15 text-center">
                                            <div class="text-uppercase font-size-12 gray property-quick-stats-label">COC</div>
                                            <div class="blue property-quick-stats-value">
                                                <span class="bold"> 8.6%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                <!----- End Box Area ---->
				
				
				<div class="col-lg-12">
				 <div class="table-responsive">
				  <table class="table table-bordered mb-0" style="font-size: 11px;">
					<thead>
						<tr>
							<th style="text-align: center; font-size: 13px;">Refinance or Optimise year</th>
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
				</div>
				
			
			
                <div class="col-lg-12">
                    <div class="propfixsd new_propertyy hollss mt-4">
                        <div class="table-responsive table-fixed-labels properties-comparison-table">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
                                <tbody>
                                    <tr class="ta_heightts sidebar">
                                        <td class="text-left" style="background:#ffe000; color:#000;">Years</td>
                                    </tr>
                                </tbody>
								                              
                               
                                <!---- 1 SNAPSHOT OF PROPERTY PERFORMANCE  ----->
                                @include('buy-hold-projection.side-menu.snapshot-property')
                                <!---- End 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <!---- 2 INCOME ----->
                                @include('buy-hold-projection.side-menu.income')
                                <!---- End 2 INCOME ----->
                                                                
                                <!---- 3 EXPENSES  ----->
                                @include('buy-hold-projection.side-menu.expenses',['MainProperty' => $MainProperty])
                                <!---- End 3 EXPENSES ----->
                                                                
                                <!---- 4 CASH FLOW  ----->
                                @include('buy-hold-projection.side-menu.cash-flow',['MainProperty' => $MainProperty])
                                <!---- End 4 CASH FLOW  ----->

                                <!---- 5 Bank Loans & Debts  ----->
                                @include('buy-hold-projection.side-menu.bank-loans-debts')
                                <!---- End Bank Loans & Debts  ----->
                                                                
                                <!---- 5 CUMMULATIVE DEBT PAYDOWN  ----->
                                @include('buy-hold-projection.side-menu.cummulative-debt-paydown')
                                <!---- End CUMMULATIVE DEBT PAYDOWN  ----->
                                                                
                                <!----  6 EQUITY ACCUMULATIONS  ----->
                                @include('buy-hold-projection.side-menu.equity-accumulation')
                                <!----  End 6 EQUITY ACCUMULATIONS  ----->
                                
                                <!----  11 SALES & RETURN ANALYSIS  ----->
                                @include('buy-hold-projection.side-menu.sales-return-analysis')
                                <!----  End 11 SALES & RETURN ANALYSIS ----->
                                
                                <!----  7 NNUAL RETURN ANALYSIS   ----->
                                @include('buy-hold-projection.side-menu.nnual-return-analysis')
                                <!----  End 7 NNUAL RETURN ANALYSIS  ----->
                                
                                <!---- 8 ROI ANALYSIS  ----->
                                @include('buy-hold-projection.side-menu.roi-analysis')
                                <!---- End 8 ROI ANALYSIS  ----->
                                
                                <!----  9 ROE ANALYSIS  ----->
                                @include('buy-hold-projection.side-menu.roe-analysis')
                                <!----  End 9 ROE ANALYSIS ----->
                                
                                <!----  10 GROSS RETURNS  ----->
                                @include('buy-hold-projection.side-menu.gross-return')
                                <!----  End 10 GROSS RETURNS ----->
                                                                
                                <!----  12 TAX BENEFITS & DEDUCTIONS  ----->
                                @include('buy-hold-projection.side-menu.tax-benefits-deductions')
                                <!----  End 12 TAX BENEFITS & DEDUCTIONS ----->
                                
                                <!----  13 INVESTMENT RETURNS  ----->
                                @include('buy-hold-projection.side-menu.investment-returns')
                                <!----  End 13 INVESTMENT RETURNS ----->
                                
                                <!----  14 FINANCIAL RATIOS  ----->
                                @include('buy-hold-projection.side-menu.financial-ratios')
                                <!----  End 14 FINANCIAL RATIOS ----->
                            </table>
                        </div>

                        <div class="table-responsive table-fixed-labels properties-comparison-table secendss">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed">

                                <tbody>
                                    @include('buy-hold-projection.table-header.header')
                                    @include('buy-hold-projection.table-header.header-value')
                                    @include('buy-hold-projection.table-header.year-header',['MainProperty' => $MainProperty])
                                </tbody>
                                @php
                                    // dd($MainProperty);
                                @endphp
                                <!---- 1 SNAPSHOT OF PROPERTY PERFORMANCE  ----->
                                @include('buy-hold-projection.table-body.snapshot-property',['MainProperty' => $MainProperty])
                                <!---- End 1 SNAPSHOT OF PROPERTY PERFORMANCE ----->

                                <!---- 2 INCOME ----->
                                @include('buy-hold-projection.table-body.income',['MainProperty' => $MainProperty])
                                <!---- End 2 INCOME ----->
                                
                                <!---- 3 EXPENSES ----->
                                @include('buy-hold-projection.table-body.expenses',['MainProperty' => $MainProperty])
                                <!---- End 3 EXPENSES ----->
                                
                                <!---- 4 CASH FLOW ----->
                                @include('buy-hold-projection.table-body.cash-flow')
                                <!---- End 4 CASH FLOW ----->

                                <!---- 5 Bank Loans & Debts ----->
                                @include('buy-hold-projection.table-body.bank-loans-debts',['MainProperty' => $MainProperty])
                                <!---- End 4 CASH FLOW ----->
                                
                                <!---- 5 CUMMULATIVE DEBT PAYDOWN ----->
                                @include('buy-hold-projection.table-body.cummulative-debt-paydown')
                                <!---- End 5 CUMMULATIVE DEBT PAYDOWN ----->
                                                                
                                <!---- 6 EQUITY ACCUMULATIONS ----->
                                @include('buy-hold-projection.table-body.equity-accumulation',['MainProperty' => $MainProperty])
                                <!---- End 6 EQUITY ACCUMULATIONS ----->

                                <!----  11 SALES & RETURN ANALYSIS ----->
                                @include('buy-hold-projection.table-body.sales-return-analysis',['MainProperty' => $MainProperty])
                                <!----  End 11 SALES & RETURN ANALYSIS ----->
                                
                                <!---- 7 NNUAL RETURN ANALYSIS ----->
                                @include('buy-hold-projection.table-body.annual-return-analysis',['MainProperty' => $MainProperty])
                                <!---- End 7 NNUAL RETURN ANALYSIS ----->
                                                                
                                <!---- 8 ROI ANALYSIS ----->
                                @include('buy-hold-projection.table-body.roi-analysis',['MainProperty' => $MainProperty])
                                <!---- End 8 ROI ANALYSIS ----->
                                
                                <!----  9 ROE ANALYSIS ----->
                                @include('buy-hold-projection.table-body.roe-analysis',['MainProperty' => $MainProperty])
                                <!---- End 9 ROE ANALYSIS ----->
                                                                
                                <!----  10 GROSS RETURNS ----->
                                @include('buy-hold-projection.table-body.gross-return',['MainProperty' => $MainProperty])
                                <!---- End 10 GROSS RETURNS ----->
                                
                                <!----  12 TAX BENEFITS & DEDUCTIONS ----->
                                @include('buy-hold-projection.table-body.tax-benefits-deductions',['MainProperty' => $MainProperty])
                                <!---- End  12 TAX BENEFITS & DEDUCTIONS ----->
                                
                                <!----  13 INVESTMENT RETURNS ----->
                                @include('buy-hold-projection.table-body.investment-returns',['MainProperty' => $MainProperty])                                
                                <!----  End 13 INVESTMENT RETURNS ----->
                                
                                <!----  14 FINANCIAL RATIOS ----->
                                @include('buy-hold-projection.table-body.financial-ratios',['MainProperty' => $MainProperty])
                                <!----  End 14 FINANCIAL RATIOS ----->
                            </table>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-12 mt-5">
				 <div class="propfixsd new_propertyy hollss">
				  <canvas id="ROIROEHoldingPeriod"></canvas>
				 </div>
				</div>
				
				<div class="col-lg-12 mt-4">
				 <div class="propfixsd new_propertyy hollss">
				  <canvas id="ProfitHoldingPeriod"></canvas>
				 </div>
				</div>

				<div class="col-lg-12 mt-4">
				 <div class="propfixsd new_propertyy hollss">
				  <canvas id="EquityOverTime"></canvas>
				 </div>
				</div>
				
				<div class="col-lg-12 mt-4">
				 <div class="propfixsd new_propertyy hollss">
				  <canvas id="CashFlowOverTime"></canvas>
				 </div>
				</div>
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
	 
<script src='https://cdn2.hubspot.net/hubfs/476360/Chart.js'></script>



<script>
$(document).ready(function() {
  var $window = $(window);  
  var $sidebar = $(".sidebar"); 
  var $sidebarHeight = $sidebar.innerHeight();   
  var $footerOffsetTop = $(".footer").offset().top; 
  var $sidebarOffset = $sidebar.offset();
  
  $window.scroll(function() {
    if($window.scrollTop() > $sidebarOffset.top) {
      $sidebar.addClass("fixed");   
    } else {
      $sidebar.removeClass("fixed");   
    }    
    if($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
      $sidebar.css({"top" : -($window.scrollTop() + $sidebarHeight - $footerOffsetTop)});        
    } else {
      $sidebar.css({"top": "0",});  
    }    
  });   
});
</script>




<script>
const xValues = [1,2,3,4,5,6];

new Chart("ROIROEHoldingPeriod", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [100,200,300,400,500,600],
      borderColor: "red",
	  label: 'ROI',
      fill: false
    }, { 
      data: [100,150,250,300,350,400],
      borderColor: "blue",
	  label: 'ROE',
      fill: false
    },]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "ROI & ROE vs. Holding Period",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: 'Holding Period (Years)'
          },
		  }],
	}
  }
});


const xValues1 = [1,2,3,4,5,6];

new Chart("ProfitHoldingPeriod", {
  type: "line",
  data: {
    labels: xValues1,
    datasets: [{ 
      data: [100,200,300,400,500,600],
      borderColor: "red",
      fill: false
    },]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Profit vs. Holding Period",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: 'Holding Period (Years)'
          },
		  }],
	}
  }
});



const xValues2 = [2,4,6,8,10,12,14,16,18,20,22,24,26,28,30];

new Chart("EquityOverTime", {
  type: "line",
  data: {
    labels: xValues2,
    datasets: [{ 
      data: [50,70,100,120,150,180,200,220,300,400,450,500,550,600,650],
      borderColor: "blue",
	  label: 'Property Value',
      fill: false
    }, { 
      data: [100,170,200,220,250,280,300,320,350,500,550,600,650,700,750],
      borderColor: "red",
	  label: 'Loan Balance',
      fill: false
    },{
      data: [200,270,300,320,350,380,350,420,650,700,850,900,950,1000,1150],
      borderColor: "green",
	  label: 'Total Equity',
      fill: false
    }]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Equity Over Time",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: 'Holding Period (Years)'
          },
		  }],
	}
  }
});


const xValues3 = [2,4,6,8,10,12,14,16,18,20,22,24,26,28,30];

new Chart("CashFlowOverTime", {
  type: "line",
  data: {
    labels: xValues3,
    datasets: [{ 
      data: [50,70,100,120,150,180,200,220,300,400,450,500,550,600,650],
      borderColor: "blue",
	  label: 'Operating Income',
      fill: false
    }, { 
      data: [100,170,200,220,250,280,300,320,350,500,550,600,650,700,750],
      borderColor: "red",
	  label: 'Operating Expenses',
      fill: false
    },{
      data: [200,270,300,320,350,380,350,420,650,700,850,900,950,1000,1150],
      borderColor: "green",
	  label: 'Cash Flow',
      fill: false
    }]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Cash Flow Over Time",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: 'Holding Period (Years)'
          },
		  }],
	}
  }
});

</script>




<script>
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








