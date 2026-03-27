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




#tsts_mlts .it_emms {
    display: inline-block;
    width: 100%;
}

#tsts_mlts .it_emms input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

#tsts_mlts .it_emms label {
    cursor: pointer;
    position: relative;
    right: -7px;
    float: right;
}

#tsts_mlts .it_emms label:before {
    content: '';
    -webkit-appearance: none;
    background-color: transparent;
    border: 2px solid #0079bf;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 10px;
    display: inline-block;
    position: absolute;
    vertical-align: middle;
    cursor: pointer;
    right: 0;
    margin-right: 5px;
}

#tsts_mlts .it_emms input:checked + label:after {
    content: '';
    display: block;
    position: absolute;
    top: 2px;
    right: 14px;
    width: 6px;
    height: 14px;
    border: solid #0079bf;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}



.plp_slt_readlt .plp_sc_step {
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
}
.plp_slt_readlt .plp_sc_step ul {
    list-style: none;
    margin: 0 auto;
    display: table;
}
.plp_slt_readlt .plp_sc_step ul li{
    float:left;
    margin-right: 20px;
}
.plp_slt_readlt .plp_sc_step ul li:last-child{margin-right:0;}
.plp_slt_readlt .plp_sc_step ul li {
    float: left;
    margin-right: 20px;
    border: #ccc solid 1px;
    padding: 7px 30px;
    display: inline-block;
    border-radius: 4px;
    font-weight: 600;
    font-size: 16px;
}
.plp_slt_readlt .plp_sc_step ul li.act_typess {
    border: #20b450 solid 1px;
    color: #ffffff;
    background: #20b450;
}

.plp_slt_readlt .stp_contetnt {
    text-align: center;
    margin-bottom: 30px;
}
.plp_slt_readlt .stp_contetnt p {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
}
.plp_slt_readlt .stp_contetnt p span.nxt_block {
    display: block;
}
.plp_slt_readlt .stp_contetnt h2 {
    font-size: 24px;
    font-weight: 700;
    max-width: 720px;
    width: 100%;
    margin: 0 auto;
    line-height: 30px;
    margin-bottom: 0;
}
.plp_slt_readlt .stp_contetnt .sm_tx_colr {
    font-size: 15px;
    color: #b1a9a9;
}

.clk_btnns_plp {
    margin-top: 30px;
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




.paginettoin {
    display: inline-block;
    width: 100%;
    margin-top: 30px;
}
.paginettoin ul {
    background: #fff;
    list-style: none;
    padding: 10px 20px;
    margin: 0 auto;
    display: table;
    border-radius: 5px;
}
.paginettoin ul li {
    float: left;
    margin-right: 25px;
}
.paginettoin ul li a {
    font-size: 16px;
    line-height: 27px;
    font-weight: 600;
}
.paginettoin ul li a i {
    font-size: 25px;
    -webkit-text-stroke: 1px #ffffff;
}


.paginettoin ul li:last-child {
    margin-right:0px;
}

.blk_araes{display:block;}
.mngss {
    width: auto !important;
}
.red_tx {color:#f94554 !important;}
.blues_tx {color:#1c5299 !important;}
.grenss_tx {color:#20b450 !important;}
.yel_txt {color: #ddb806 !important;}
.cut_pricess {text-decoration: line-through; margin-right: 2px;}
.bg_red {
    background: #e46050 !important;
}

.ribbon-wrap {
    width: 150px;
    height: 150px;
    position: absolute;
    top: -1px;
    left: -1px;
    pointer-events: none;
}
.ribbon {
    width: 160px;
    font-size: 13px;
    text-align: center;
    padding: 8px 0;
    color: #fff;
    position: absolute;
    transform: rotate(-45deg);
    right: -17px;
    top: 9%;
    left: -47px;
}

.hd_listst {
    margin-bottom: 12px;
    display: inline-block;
    width: 100%;
    font-size: 17px;
    font-weight: 700;
}
.hd_listst span.cartss {
    float: right;
    font-size: 16px;
    background: #1c5299;
    color: #fff;
    padding: 3px 15px;
    display: inline-block;
    border-radius: 30px;
}
.hd_listst span.cartss span.countss {
    display: inline-block;
    text-align: center;
    border-radius: 50px;
    font-size: 14px;
}

.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms {
    margin: 0;
    padding: 0;
    border: none;
}

.plp_slt_readlt .stp_contetnt#tsts_mlts {
    display: inline-block;
    width: 100%;
    text-align: left;
    margin: 40px 0 0;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul {
    margin: 0;
    padding: 0;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {
    float: left;
    margin-right:30px;
	list-style: none;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label {
    margin: 0;
    padding-left: 30px;
    position: relative;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label:before {
    left: 0;
    width: 22px;
    top: -1px;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label:after {
    left: 9px;
}


#tsts_mlts .it_emms .add-read-more.show-less-content .second-section,
#tsts_mlts .it_emms .add-read-more.show-less-content .read-less {
   display: none;
}

#tsts_mlts .it_emms .add-read-more.show-more-content .read-more {
   display: none;
}

#tsts_mlts .it_emms .add-read-more .read-more,
#tsts_mlts .it_emms .add-read-more .read-less {
font-weight: 600;
    margin-left: 2px;
    color: #f94554;
    cursor: pointer;
}

#tsts_mlts .it_emms .add-read-more{
    max-width: 100%;
    width: 100%;
    margin: 0 auto;
    margin-bottom: 10px;
    font-weight: 600;
}

#tsts_mlts .it_emms .thk_arara {
    text-align: center;
}
#tsts_mlts .it_emms .thk_arara h2 {
    margin: 0 0 7px;
    font-weight: 700;
    font-size: 24px;
}
#tsts_mlts .it_emms .thk_arara p.grenss_tx {
    font-size: 17px;
    font-weight: 600;
}

#tsts_mlts .it_emms .boths_gfts {
    display: inline-block;
    width: 100%;
	margin-bottom:22px;
}
#tsts_mlts .it_emms .boths_gfts .giftss {
    float: left;
    width: 50%;
}
#tsts_mlts .it_emms .boths_gfts .giftss i {
    font-size: 52px;
    color: #ffa700;
    position: relative;
    top: -6px;
}

#tsts_mlts .it_emms .boths_gfts .qerrst {
    float: left;
    width: 50%;
    text-align: right;
}
#tsts_mlts .it_emms .boths_gfts .qerrst img {
    max-width: 42px;
    float: right;
}

.al_text_box .ad_personnals div#testimonials .owl-stage-outer {
    padding-bottom: 10px;
}
#tsts_mlts .it_emms.giftts {
    border: #1c5299 solid 4px;
    border-radius: 10px;
    box-shadow: 4px 4px 4px #246bcba8;
}

@media (min-width: 481px) and (max-width: 767px) {
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {margin-right: 17px; margin-bottom: 17px;}
}

@media (min-width: 320px) and (max-width: 480px) {
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {margin-right: 17px; margin-bottom: 17px;}
}
</style>

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Add Personal</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Add Personal</span>
        </div>
    </div>
</section>

<div class="plp_slt_readlt">
<form action="">
<div class="container">
    <div class="stp_contetnt" id="tsts_mlts">
	  <div class="row">
	   <div class="col-lg-12">
	    <div class="hd_listst">Add Personal Thanks You Letter <span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss">1</span></span></div>
	   </div>
	</div>
</div>



<div class="mt-3">
    <div class="mt-4" id="tsts_mlts">
	    
        <div class="qu_bx_partss">		   
            <!--- What clients are saying about our 1cr app --->

    <div class="al_text_box">
        <div class="ad_personnals">
            <div class="owl-carousel owl-theme" id="testimonials">
                <div class="item">
                    <div class="it_emms giftts">
                        <div class="boths_gfts">
                         <div class="giftss"><i class="fa fa-gift" aria-hidden="true"></i></div>
                         <div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
                        </div>						
					    <div class="thk_arara">
						 <h2>Thanks You</h2>
						 <p class="grenss_tx">XXXXXX (Name)</p>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						
						<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
						<h5>Thanks You</h5>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
						<p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>
						
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
					</div>
                </div>

                <div class="item">
                    <div class="it_emms giftts">
                        <div class="boths_gfts">
                         <div class="giftss"><i class="fa fa-gift" aria-hidden="true"></i></div>
                         <div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
                        </div>						
					    <div class="thk_arara">
						 <h2>Thanks You</h2>
						 <p class="grenss_tx">XXXXXX (Name)</p>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						
						<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
						<h5>Thanks You</h5>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
						<p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>
						
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
					</div>
                </div>

                <div class="item">
                    <div class="it_emms giftts">
                        <div class="boths_gfts">
                         <div class="giftss"><i class="fa fa-gift" aria-hidden="true"></i></div>
                         <div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
                        </div>						
					    <div class="thk_arara">
						 <h2>Thanks You</h2>
						 <p class="grenss_tx">XXXXXX (Name)</p>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						
						<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
						<h5>Thanks You</h5>
						<h3>Mr. Amit Kumar Yadav</h3>
						<p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
						<p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>
						
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<!--- End What clients are saying about our 1cr app --->
		</div>
    

	</div>
</div>
</form>
</div>

@include('front.layouts.footer')


