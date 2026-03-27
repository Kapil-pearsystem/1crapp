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






#tsts_mlts .it_emms input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

#tsts_mlts .it_emms label {
  position: relative;
  cursor: pointer;
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

<div class="plp_slt_readlt">
<div class="container mt-5">
  <div class="plp_sc_step">
  <ul>
   <li class="act_typess">Step-1</li>
   <li class="act_typess">Step-2</li>
   <li>Step-3</li>
  </ul>
 </div>
 
 <div class="stp_contetnt">
  <p>Well Done <span class="grenss_tx">Mr. YYYYYYYYY</span>
  <span class="nxt_block sm_tx_colr">{you are just two steps away}</span></p>
  <h2>Please Choose one or More <span class="red_tx"><u>Realtors</u></span> form the <span class="red_tx"><u>1CR APP</u></span> Recommended List below.</h2>  
 </div>
 

</div>


<div class="container mt-5">
    <div class="mt-4" id="tsts_mlts">
        <div class="qu_bx_partss">
            <div class="row">
                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_1" name="" />
						<label for="ck_1">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->

                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_2" name="" />
						<label for="ck_2">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->

                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_3" name="" />
						<label for="ck_3">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->

                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_4" name="" />
						<label for="ck_4">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->

                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_5" name="" />
						<label for="ck_5">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->

                <!--- Item List --->
                <div class="col-lg-4">
                    <div class="it_emms">
					    <input type="checkbox" class="ck_bx_box" id="ck_6" name="" />
						<label for="ck_6">
                        <div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
                        <h3>Mr. Amit Kumar Yadav</h3>
                        <p><strong>Services at</strong>: Gurgoun, Noida, Delhi, Gr. Noida. Yamuna Expressway</p>
                        <p><strong>Deals in</strong>: Residential, Commecial, Industnal, Agncuiture Plus Renting Services and Sale & Purchase</p>
                        <div class="snd_btnns"><a href="javascript:void(0);">Send Your PLT To This Broker</a></div>
						</label>
                    </div>
                </div>
                <!--- End Item List --->
            </div>
        
		 <div class="paginettoin">
		  <ul>
		   <li><a href="javascript:void(0);"><i class="fa fa-caret-square-o-left"></i></a></li>
		   <li><a href="javascript:void(0);">Previous</a></li>
		   <li><a href="javascript:void(0);">Next</a></li>
		   <li><a href="javascript:void(0);"><i class="fa fa-caret-square-o-right"></i></a></li>
		  </ul>
		 </div>
		</div>
    
	    <div class="clk_btnns_plp">
		 <a href="{{ url('plp-submitted') }}">
		  Go To Final Step
		  <span>Get Started</span>
		  <i class="fa fa-chevron-circle-right"></i>
		 </a>
	    </div>
	</div>
</div>
</div>

@include('front.layouts.footer')