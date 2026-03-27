
@include('web.common.header')

<style>
 .alls_tabsst {
    width: 100%;
}
.lgo_partss img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.lgo_partss {
    width: 100%;
    height: 130px;
    overflow: hidden;
}

.fl_lstst {
    display: inline-block;
    width: 100%;
    margin-top: 25px;
}
.fl_lstst ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.fl_lstst ul li {
    float: left;
    font-size: 13px;
    margin-right: 15px;
}
.fl_lstst ul li:last-child {
    margin-right:0px;
}
.fl_lstst ul li span.rd_bold {
    font-weight: 600;
    color: #cb0000;
}
.frm_bothss ul li {
    float: left;
    margin-right:4%;
}




.plp_quesst {
    border: #e3e3e3 solid 1px;
    padding: 15px;
    border-radius: 10px;
	display: inline-block;
    width: 100%;
}
.plp_quesst ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.plp_quesst ul li {
    float: left;
    width: 20%;
    text-align: center;
}
.plp_quesst ul li span.plp_bx_partsss {
    border: #ededed solid 1px;
    padding: 5px 20px;
    display: inline-block;
    border-radius: 20px;
    background: #1c5299;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
}

.vedioo p.capital_tx {
    text-transform: uppercase;
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 25px;
}

.makr_plc_lst .md_areaa_cntts.plp-introll h5 {
    margin: 0 0 10px;
    font-size: 17px;
    font-weight: 600;
    line-height: 23px;
}
.makr_plc_lst .md_areaa_cntts.plp-introll p {
    font-size: 17px;
    margin: 0;
}

.vedioo.plp_introlls h4 {
    text-transform: uppercase;
}
.vedioo p.capital_tx span {
    border-bottom: #f94554 solid 2px;
}
.vedioo.plp_introlls h6 {
    margin: 0 0 25px;
    font-size: 18px;
}


.plp_introl .stp_boxs {
    border: #e3e3e3 solid 1px;
    padding: 15px;
    text-align: center;
    border-radius: 4px;
    min-height: 200px;
}
.plp_introl .stp_boxs h3 {
    margin: 15px 0 10px;
    font-weight: 600;
    font-size: 20px;
    color: #fb6554;
}
.plp_introl .stp_boxs p {
    margin: 0;
    font-size: 15px;
    font-weight: 500;
}

.plp_introl .stp_boxs i {
    font-size: 36px;
    color: #333;
}



.clk_btnns_plp {
    margin-top: 50px;
    text-align: center;
    margin-bottom: 25px;
}
.clk_btnns_plp a {
    background: #fb6554;
    padding: 10px 60px 10px 40px;
    display: inline-block;
    color: #fff;
    border-radius: 50px;
    position: relative;
    font-size: 18px;
    font-weight: 600;
    max-width: max-content;
    width: 100%;
}
.clk_btnns_plp a span {
    display: block;
    font-size: 13px;
    color: #ffdf00;
}
.clk_btnns_plp a i {
    position: absolute;
    top: 19px;
    right: 20px;
    font-size: 25px;
}
.btm_text_plp {
    text-align: center;
}
.btm_text_plp span.mdl_parts {
    max-width: 550px;
    display: inline-block;
    width: 100%;
}

.plp_scriptss .plp_sc_step {
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
}
.plp_scriptss .plp_sc_step ul {
    list-style: none;
    margin: 0 auto;
    display: table;
}
.plp_scriptss .plp_sc_step ul li{
    float:left;
    margin-right: 20px;
}
.plp_scriptss .plp_sc_step ul li:last-child{margin-right:0;}
.plp_scriptss .plp_sc_step ul li {
    float: left;
    margin-right: 20px;
    border: #ccc solid 1px;
    padding: 7px 30px;
    display: inline-block;
    border-radius: 4px;
    font-weight: 600;
    font-size: 16px;
}
.plp_scriptss ul li.act_typess {
    border: #20b450 solid 1px;
    color: #ffffff;
    background: #20b450;
}
.plp_scriptss .stp_contetnt {
    text-align: center;
    margin-bottom: 30px;
}
.plp_scriptss .stp_contetnt p {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
}
.plp_scriptss .stp_contetnt p span.nxt_block {
    display: block;
}
.nxt_block {
    display: block;
}
.plp_scriptss .stp_contetnt h2 {
    font-size: 24px;
    font-weight: 700;
    max-width: 720px;
    width: 100%;
    margin: 0 auto;
    line-height: 30px;
    margin-bottom: 0;
}


.plp_scriptss .stp_contetnt h5 {
    font-size: 16px;
    max-width: 550px;
    margin: 0 auto;
    line-height: 20px;
}

.plp_scriptss .fild_s_manegss {
    text-align: center;
    margin-bottom: 30px;
}

.plp_scriptss .fild_s_manegss p {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 10px;
}
.plp_scriptss .fild_s_manegss p span {
    font-size: 22px;
}
.plp_scriptss .fild_s_manegss span {
    font-size: 16px;
    max-width: 850px;
    width: 100%;
    display: inline-block;
}
.plp_scriptss .fild_s_manegss h4 {
    margin-top: 20px;
    margin-bottom: 0;
    font-weight: 700;
}


.plp_scriptss .done_fildds {
    text-align: center;
    border: #ebebeb solid 1px;
    padding: 30px 20px;
    margin-top: 40px;
    border-radius: 5px;
}
.plp_scriptss .done_fildds h6 {
    margin: 0 0 15px;
}
.plp_scriptss .done_fildds h6 span.dn_tik {
    background: #2eb450;
    padding: 10px 35px;
    display: inline-block;
    color: #fff;
    border-radius: 30px;
    position: relative;
    font-weight: 700;
    font-size: 14px;
}
.plp_scriptss .done_fildds h6 span.dn_tik i {
    font-size: 30px;
    position: absolute;
    right: 3px;
    top: 2px;
}
.plp_scriptss .done_fildds .fild_s_manegss {
    margin-bottom: 20px;
}
.plp_scriptss .done_fildds .fild_s_manegss p {
    margin-bottom: 5px;
    margin-top: 20px;
}
.plp_scriptss .done_fildds .fild_s_manegss span.sm_fnt_clrr {
    color: #adadad;
    font-size: 14px;
    text-decoration: underline;
}
.plp_scriptss .done_fildds .dn_cnt_prtss {
    font-size: 24px;
    font-weight: 700;
}

.plp_scriptss .done_fildds .un_sres_cnts {
    margin-top: 40px;
    background: #f1f1f1;
    padding: 25px 25px;
	position:relative;
}
.plp_scriptss .done_fildds .un_sres_cnts .editsss {
    position: absolute;
    right: 20px;
    top: -40px;
    background: #f94554;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
}
.plp_scriptss .done_fildds .un_sres_cnts .editsss1 {
    background: #f94554;
    padding: 5px 15px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
    position: absolute;
    left: 250px;
    right: 0;
    width: 110px;
    margin: 0 auto;
    top: 18px;
}
.plp_scriptss .done_fildds .un_sres_cnts h3 {
    font-size: 32px;
    font-weight: 700;
    margin: 0 0 10px;
}
.plp_scriptss .done_fildds .un_sres_cnts p {
    font-size: 20px;
    font-weight: 600;
    font-style: italic;
    margin-bottom: 20px;
}


.plp_scriptss .done_fildds .un_sres_cnts .mtr_cnt_tx {
    display: inline-block;
    width: 100%;
	position: relative;
}
.plp_scriptss .done_fildds .un_sres_cnts .mtr_cnt_tx p {
    margin-bottom: 20px;
    font-style: normal;
    font-size: 16px;
    font-weight: 500;
	    position: relative;
}
.plp_scriptss .done_fildds .un_sres_cnts .mtr_cnt_tx p:last-child{margin-bottom:0;}


.sco_tx_cnt {
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
}
.sco_tx_cnt p {
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 500;
}
#tsts_mlts .mr_c_test .alluser i {
    position: relative;
    left: 10px;
    top: 2px;
    font-size: 20px;
    -webkit-text-stroke: 1px #1c5299;
}

.blk_araes{display:block;}
.mngss {width: auto !important;}
.red_tx {color:#f94554 !important;}
.blues_tx {color:#1c5299 !important;}
.grenss_tx {color:#20b450 !important;}
.yel_txt {color: #ddb806 !important;}
</style>


<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Property Look Out Pitch</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Property Look Out Pitch</span>
        </div>
    </div>
</section>
<div class="plp_scriptss">
<div class="container mt-5">
 <div class="plp_sc_step">
  <ul>
   <li class="act_typess">Step-1</li>
   <li class="act_typess">Step-2</li>
   <li class="act_typess">Step-3</li>
  </ul>
 </div>
 
 <div class="stp_contetnt mb-0">
  <div class="congrat_mgs"><img src="{{ url('home/img/congra_mgs.jpg')}}" alt="" /></div> 
  <p><span class="nxt_block grenss_tx">Congratulations</span> <span class="red_tx">Mr. YYYYYYYYYYY</span></p>  
  <h5>Your PLP Has Been Sent to Realtors. they are woking on it to find your best properties and offer you the best Proposal.</h5>  
 </div>
</div>


<!-- Video Elements -->
<section class="vedioo plp_introlls" id="tsts_mlts">
    <div class="container">
        <h4 class="mb-4"><span class="nxt_block red_tx mb-3">What Next?</span> Please watch the Vedio Below.</h4>
		
        <div class="video_parts">
            <video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
                <source id="mp4" src="{{ url('home/img/vdiio.mp4')}}" type="video/mp4" />
            </video>
        </div>
    </div>
	<div class="mr_c_test mt-0"><a href="{{ url('login') }}" class="alluser">Visit Your Dashboard <i class="fa fa-arrow-circle-o-right"></i></a></div>
</section>
<!-- End Video Elements -->


<div class="container">
<div class="sco_tx_cnt">
 <p>Please Jion & Follow us best insights, tips, tricks and Strategies on Real Estate Cash Flow properties & Inside Investments Mastery related Knowledge.</p>
 
 <div class="social_lk_partss">
					 <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-youtube-play"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-whatsapp"></i></a>				 
					 <a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>				 
					</div>
</div>
</div>


</div>




@include('front.layouts.footer')