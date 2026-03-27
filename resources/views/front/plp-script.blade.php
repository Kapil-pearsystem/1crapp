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
.plp_scriptss .stp_contetnt h2 {
    font-size: 24px;
    font-weight: 700;
    max-width: 720px;
    width: 100%;
    margin: 0 auto;
    line-height: 30px;
    margin-bottom: 0;
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



.plp_scriptss .stp_one_prts {
    background: #f3f3f3;
    padding: 30px;
}
.plp_scriptss .stp_one_prts .cnt_box_araee {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
}
.plp_scriptss .stp_one_prts .cnt_box_araee h4 {
    margin: 0 0 15px;
    font-size: 28px;
    font-weight: 700;
}
.plp_scriptss .stp_one_prts .cnt_box_araee p {
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 15px;
}
.plp_scriptss .stp_one_prts .cnt_box_araee a.al_btn_sprt {
    background: #f94554;
    font-size: 16px;
    padding: 10px 20px;
    color: #fff;
    display: inline-block;
    border-radius: 4px;
    font-weight: 600;
	margin-top:20px;
}

.plp_scriptss .stp_one_prts .cnt_box_araee .stp_on_mgs {
    width: 100%;
    height: 433px;
    overflow: hidden;
}
.plp_scriptss .stp_one_prts .cnt_box_araee .stp_on_mgs img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.plp_scriptss .get_nd_blogss {
margin-top: 30px;
    padding: 50px 0;
    background: #f3f3f3;
    display: inline-table;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
	display:relative;
}

.plp_scriptss .get_nd_blogss .stap_slidd {
    max-width: 600px;
    margin: 0 auto;
    margin-bottom: 30px;
}
.plp_scriptss .get_nd_blogss .stap_slidd .cr_logo {
    width: 120px;
    height: 120px;
    overflow: hidden;
    margin: 0 auto;
    margin-bottom: 20px;
}
.plp_scriptss .get_nd_blogss .stap_slidd .cr_logo img {
    width: 100%;
}
.plp_scriptss .get_nd_blogss .stap_slidd h2 {
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 15px;
}
.plp_scriptss .get_nd_blogss .stap_slidd h4 {
    margin: 0 0 15px;
    font-size: 18px;
    line-height: 22px;
}
.plp_scriptss .get_nd_blogss .stap_slidd p {
    font-size: 16px;
    margin: 0;
}

.multisteps-form__progress {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}

.multisteps-form__progress-btn {
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  position: relative;
  padding-top: 20px;
  color:rgb(215 215 215 / 70%);
  text-indent: -9999px;
  border: none;
  background-color: transparent;
  outline: none !important;
  cursor: pointer;
}
@media (min-width: 500px) {
  .multisteps-form__progress-btn {
    text-indent: 0;
  }
}
.multisteps-form__progress-btn:before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 13px;
  height: 13px;
  content: "";
  transform: translateX(-50%);
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  border: 2px solid currentColor;
  border-radius: 50%;
  background-color: #fff;
  box-sizing: border-box;
  z-index: 3;
}
.multisteps-form__progress-btn:after {
  position: absolute;
  top: 5px;
  left: calc(-50% - 13px / 2);
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  display: block;
  width: 100%;
  height: 2px;
  content: "";
  background-color: currentColor;
  z-index: 1;
}
.multisteps-form__progress-btn:first-child:after {
  display: none;
}
.multisteps-form__progress-btn.js-active {
  color: #91df13;
}
.multisteps-form__progress-btn.js-active:before {
  transform: translateX(-50%) scale(1.2);
  background-color: currentColor;
}

.multisteps-form__form {
  position: relative;
}

.multisteps-form__panel {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  opacity: 0;
  visibility: hidden;
}
.multisteps-form__panel.js-active {
  height: auto;
  opacity: 1;
  visibility: visible;
}
.multisteps-form__panel[data-animation=scaleOut] {
  transform: scale(1.1);
}
.multisteps-form__panel[data-animation=scaleOut].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  transform: scale(1);
}
.multisteps-form__panel[data-animation=slideHorz] {
  left: 50px;
}
.multisteps-form__panel[data-animation=slideHorz].js-active {
  transition-property: all;
  transition-duration: 0.25s;
  transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
  transition-delay: 0s;
  left: 0;
}
.multisteps-form__panel[data-animation=slideVert] {
  top: 30px;
}
.multisteps-form__panel[data-animation=slideVert].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  top: 0;
}
.multisteps-form__panel[data-animation=fadeIn].js-active {
  transition-property: all;
  transition-duration: 0.3s;
  transition-timing-function: linear;
  transition-delay: 0s;
}
.multisteps-form__panel[data-animation=scaleIn] {
  transform: scale(0.9);
}
.multisteps-form__panel[data-animation=scaleIn].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  transform: scale(1);
}
.multisteps-form__content input.multisteps-form__input.form-control {
    height: 42px;
    font-size: 15px;
}
.multisteps-form__content select.multisteps-form__select.form-control {
    height: 42px;
    font-size: 15px;
}

.multisteps-form__content textarea.multisteps-form__textarea.form-control {
    font-size: 15px;
	height:150px;
}


button.ml-auto.js-btn-next {
    background: transparent;
    border: none;
    color: #1c5299;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 15px;
}
button.ml-auto.js-btn-next:focus {
    border: none;
    outline: none;
    color: #215dad;
}
button.js-btn-prev {
    background: transparent;
    border: none;
    color: #1c5299;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 15px;
}
button.js-btn-prev:focus{
	border: none;
    outline: none;
    color: #215dad;
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
                <li>Step-2</li>
                <li>Step-3</li>
            </ul>
        </div>

        
    </div>
	
	<div class="container mt-3 pageform_t" id="stapone">
	
	<div class="stp_contetnt">
            <p>Thanks For Opting <span class="red_tx">1CR APP</span> <span class="nxt_block">As your first or next PLP Creator Partner.</span></p>
            <h2>Your Are Just Few Short Answers Aways From getting Your PLP. Please take This Small Survery to help us to to Help you.</h2>
        </div>
	 <div class="stp_one_prts">
	  <div class="row">
	   <div class="col-lg-7">
	    <div class="cnt_box_araee">
		 <div class="middilss">
		  <h4>Meet Your Own 1CR Super Coach</h4>
		  <p>Do you need help with your personal finances?</p>
		  <p>Maybe investing or retirement planning? Perhaps you want to create or grow your business?</p>
		  <p>Don't do anything until you take my free quiz for your next step toward financial freedom.</p>         
		  <a href="javascript:void(0);" class="al_btn_sprt" onclick="openstapone1()">Start Your Quiz Now !</a>
		 </div>
		</div>
	   </div>
	   <div class="col-lg-5">
	    <div class="stp_on_mgs">
		 <img src="{{ url('home/img/stp_onesss.jpg')}}" alt="" />
		</div>
	   </div>   
	  </div>
	 </div>
	</div>
	
	<div class="get_nd_blogss pageform_t" id="stapone1" style="display:none;">
	 <div class="container">
	  <div class="stap_slidd">
	   <div class="cr_logo"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
	   <h2>Want Your Own Person PLP ?</h2>
	   <h4>Do you need help finding the best realtor to help you in finding best cash flow generating property ?</h4>
	   <p>Take this short survey to crate your own first or next Property Lookout pitch.</p>
	  </div>
	  </div>
	  
	  <div class="container overflow-hidden">
      <!--multisteps-form-->
      <div class="multisteps-form">
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-7 m-auto">
            <form class="multisteps-form__form">
              <!-- Stap 1 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-12">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Enter Name" />
                    </div>
                  </div>
                  <div class="button-row d-flex mt-5">
                    <button class="ml-auto js-btn-next" type="button" title="Next" onclick="opensprossnav()">Next</button>
                  </div>
                </div>
              </div>
              <!-- End Stap 1 -->
			  
			  <!-- Stap 2 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
				
				<div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-12">
                      <input class="multisteps-form__input form-control" type="text" placeholder="example@example." />
                    </div>
                  </div>
				  <div class="button-row d-flex mt-5">
                    <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
			  </div>
              <!-- End Stap 2 -->
			  
			  <!-- Stap 3 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  <div class="row">
                    <div class="col-6 col-sm-12 mt-4 mt-sm-0">
                      <select class="multisteps-form__select form-control">
                        <option selected="selected">State City</option>
                        <option>Delhi</option>
                        <option>Noida</option>
                        <option>Agra</option>
                        <option>Mumbai</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 3 -->
			  
			  <!-- Stap 4 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd
				  
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 4 -->
			  
			  <!-- Stap 5 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd dfsdf
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 5 -->
			  
			  <!-- Stap 6 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd dsfsd sdfsd
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 6 -->
			  
			  <!-- Stap 7 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd dsfsd sdfsd gdfgdf
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 7 -->
			  
			  <!-- Stap 8 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd dsfsd sdfsd gdfgdf dfdsfsd
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 8 -->
			  
			  <!-- Stap 9 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  sdfsdfsd dsfsd sdfsd gdfgdf dfdsfsd dfdsfsd
				  
				  <div class="row">
                    <div class="button-row d-flex mt-5 col-12">
                      <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Stap 9 -->
			  
			  <!-- Stap 10 -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Before we get started...</h3>
				<p>Give us your best email address so we can send you the next step in your journey toward financial freedom.</p>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <textarea class="multisteps-form__textarea form-control" placeholder="Additional Comments and Requirements"></textarea>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto" type="button" title="Send" onclick="openstapone2()">Submit</button>
                  </div>
                </div>
              </div>
			  <!-- End Stap 10 -->
            </form>
          </div>
        </div>
      
	    <!-- Progress Bar -->
        <div class="row mt-4 pageform_t" id="pross_nevs" style="display:none;">
          <div class="col-12 col-lg-8 ml-auto mr-auto mt-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
              <button class="multisteps-form__progress-btn" type="button" title="">&nbsp;</button>
            </div>
          </div>
        </div>
		<!--End Progress Bar -->
	  </div>
    </div>
  
	  
	</div> 



     <div class="container mt-5 pageform_t" id="stapone2" style="display:none;">
	  <div class="fild_s_manegss">
	   <p><span class="red_tx mngss">" Great.</span> <span class="grenss_tx mngss">Mr.YYYYY</span></p>
	   <span>Now the next step is: as soon as the last question is arrived....you will show a message like below...</span>
       <p class="mt-4">“ Your PLP is almost ready. with your next click, it will be ready for your final Review.. Please Read it word for word and if needed edit it again just by clicking on the edit button. </p>
	   
	   <h4 class="red_tx">OK. I AM READY TO GO THROUGH MY PLP.. PLEASE TAKE ME TO THAT <i class="fa fa-chevron-circle-right"></i></h4>
	  </div>
	  
	   <div class="clk_btnns_plp">
		<a href="javascript:void(0);" onclick="openstapone3()">
		 OK. I AM READY TO GO THROUGH MY PLP .. <br>PLEASE TAKE ME TO THAT
		 <span>{ Please show me. i am excited }</span>
		 <i class="fa fa-chevron-circle-right"></i>
		</a>
	   </div>

	  
	 </div>

	<!---- Done Part ----->
	<div class="container pageform_t" id="stapone3" style="display:none;">
	 <div class="done_fildds">
	  <h6><span class="dn_tik">DONE <i class="fa fa-check-circle"></i></span></h6>
	  <div class="fild_s_manegss"><p>Great <span class="grenss_tx mngss">YYYYYYYYYYY</span></p>
	   <span class="sm_fnt_clrr">(PLP Creators Name)</span>
	  </div>


	  <div class="dn_cnt_prtss">Hera is your Property Lookout Pitch <span class="blk_araes">Ready for Sending</span> to <span class="red_tx">1CR APP</span> Recommended <u>Realtors</u> for getting Best Proposals.
	 </div>
	 
	 
	 <div class="un_sres_cnts">
	  <h3>YOUR PLP</h3>
	  <p>Go though it carefully</p>
	  
	  <div class="mtr_cnt_tx">
		<div class="editsss">Edit PLP <i class="fa fa-pencil"></i></div>
	   <p>Hello Mr. <span class="red_tx">YYYYYY</span> (Amit Kumar yadav this Name will be taken fro the below list which is data available in dash bard.) 
	   </p>
	   
	   <p>I am <span class="yel_txt">01-XXXXXXX</span> (Ramjee - Name) From <span class="yel_txt">02-XXXXXXXXX</span> (Panipat - Place, city).</p>
	   
	   <p>Currently work with <span class="yel_txt">03-XXXXXXXXXX</span> (Company name or Department)</p>
	   
	   <p>I am Looking For a <span class="yel_txt">04-XXXXXXXX</span> (Ready to Movelunder construction whatever is applicable), <span class="yel_txt">05-XXXXXX</span> (Residential), <span class="yel_txt">06-XXXXXXXX</span> (3 bhk / 2bhk / 4bhk & SIR etc), <span class="yel_txt">07-XXXX</span> (Flat / plot / shop) in <span class="yel_txt">08-XXXXX</span> (noida-city) from from a reputed <span class="yel_txt">09-evelopers/Buider</span> (under Construction) or <span class="yel_txt">10-Owners</span> (for ready to move).</p>
	   
	   <p>Just to let you know that my budlget is in the range of approx. <span class="yel_txt">11-XXXXXXXXX</span> (Rs 40 to 50 lakhs) and I am Planning to Buy this Property In Next <span class="yel_txt">12-XXXXXXX</span> (30 Day).</p>
	   
	   
	   <p>Further please note that I am looking for a Discount of at least <span class="yel_txt">13-XXXXXXX</span> (i.e. 10%) on market rate. and it should have a Good potential to rent Out Immediately after the Possession in case of (Under Construction Propertys).</p>
	   
	   <p>I will be glab if you can send me a detailed proposal for some properties which meets my initial creteria mentioned above.</p>
	   
	   <p>Note : to Reply Back, You have submit the proposal using <span class="red_tx"><u>1CR APP</u></span> it self.</p>
	   
	   <p>I have my account hare and will look and do detailed analyses of your proposal hare.</p>
	   
	   
	   <p><span class="blk_araes">Regards</span> <span class="yel_txt">13-XXXXXX</span> <span class="editsss1">Edit PLP <i class="fa fa-pencil"></i></span></p>
	   
	  </div>
	  
	 </div>
	 
	 <div class="clk_btnns_plp">
		<a href="{{ url('plp-select-realtors') }}">
		 Ok. Let Me Choose My Realtors
		 <span>From the 1CR APP Recommended Realtors </span>
		 <i class="fa fa-chevron-circle-right"></i>
		</a>
	   </div>
	 
	</div>

	</div>
	<!---- End Done Part ----->

</div>


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
 //DOM elements
const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  //check if we clicked on `PREV` or NEXT` buttons
  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  //find active panel
  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  //set active step and active panel onclick
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

//SETTING PROPER FORM HEIGHT ONLOAD
window.addEventListener('load', setFormHeight, false);

//SETTING PROPER FORM HEIGHT ONRESIZE
window.addEventListener('resize', setFormHeight, false);

//changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});
</script>

@include('front.layouts.footer')