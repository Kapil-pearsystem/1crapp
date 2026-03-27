@include('web.common.header')

<style>

.step_main#mng_mg_aprtss_n {
    position: relative;
    padding-top: 0px;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.parsonal_priess{padding-top: 40px;}
.parsonal_priess .usr_al_supr_bx {display: block; width: 100%; max-width: 400px; margin: 0 auto; position: relative;}
.parsonal_priess .usr_al_supr_bx.mange_tops {margin-top: 10px;}
.parsonal_priess .usr_al_supr_bx.mange_tops .und_boxx_ess {margin:0;}
.mrtop{margin-top:30px !important;}

.parsonal_priess .usr_al_supr_bx .us_mgss {margin: 0 auto; display: block; text-align: center; width: 90px; height: 90px; border: #0e3992 solid 2px; border-radius: 100px; padding:0px; overflow: hidden;}
.parsonal_priess .usr_al_supr_bx .us_mgss img {
    width: 75%;
}
.parsonal_priess .usr_al_supr_bx.mange_tops .us_mgss {
    position: relative;
    top: 10px;
    background: #fff;
    z-index: 1;
}

.parsonal_priess .usr_al_supr_bx .und_boxx_ess {display: inline-block;
    width: 100%;
    padding: 20px 20px;
    text-align: center;
    border: #1c5299 solid 2px;
    border-radius: 15px;
    margin-top: 13px;
    position: relative;
    background: #e2e7f2;
    box-shadow: 5px 5px 0px #1c5299;}
	
.parsonal_priess .usr_al_supr_bx .und_boxx_ess span.tp_usrss { background: #0e3992;
    color: #fff;
    padding: 4px 10px;
    display: inline-block;
    position: absolute;
    top: -15px;
    left: 0;
    right: 0;
    margin: 0 auto;
    max-width: 150px;
    font-size: 14px;
    border-radius: 3px;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ac_user {
    font-size: 20px;
    font-weight: 700;
    margin-top: 5px;
	position:relative;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ac_user span.vddoprtsss {
    position: absolute;
    width: auto;
    display: inline-block;
	right:0;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ac_user span.vddoprtsss a.sm_right_vdooos {
    margin-right: 5px;
    display: inline-block;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ac_user span.vddoprtsss a i {
    color: #000;
    font-size: 20px;
    position: relative;
    top: 2px;
}

.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ac_user span.vddoprtsss img {
    width: auto;
}

.parsonal_priess .usr_al_supr_bx .und_boxx_ess .ap_us_tx{
	    font-size: 18px;
    font-weight: 700;
    margin-top: 2px;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .us_textxt {
    color: #000;
    font-size: 14px;
    font-weight: 600;
    margin-top: 4px;
}
.parsonal_priess .usr_al_supr_bx .und_boxx_ess .us_textxt p {
    font-size: 16px;
    font-weight: 700;
    text-decoration: underline;
    margin: 0;
}

.parsonal_priess .usr_al_supr_bx .und_boxx_ess .pris_data {
    margin-top: 7px;
    font-weight: 700;
    color: #000;
}
.justy_centr {
    justify-content: center;
}

.parsonal_priess .usr_al_supr_bx.both_manages .und_boxx_ess {
    margin-top:0px;
}
.parsonal_priess .usr_al_supr_bx.both_manages .us_mgss {
    position: relative;
    top: 10px;
    background: #fff;
    z-index: 1;
}
.parsonal_priess .main_pmp_araea {
display: flex;
    width: 100%;
    position: relative;
    padding-top: 30px;
    z-index: 1;
}
.parsonal_priess .main_pmp_araea img.shw_arrow {
    position: absolute;
    top: 0;
}

.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa {
    float: left;
    width: 110px;
    margin-right: 10px;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa:last-child {
    margin-right: 0;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess {
    padding: 10px;
    height: 135px;
}

.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ac_user {
    font-size: 12px;
    margin: 0;
    font-weight: 800;
	text-align:left;
    line-height: 16px;
}

.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ac_user span.vddoprtsss {
    width: auto;
    top: 0;
	right: -6px;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ac_user span.vddoprtsss a.sm_right_vdooos {
    margin-right: 2px;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ac_user span.vddoprtsss a.sm_right_vdooos img {
    width: 12px;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ac_user span.vddoprtsss a i {
    font-size: 12px;
	top:0;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .ap_us_tx {
    font-size: 12px;
    margin-top: 4px;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa .und_boxx_ess .pris_data {
    font-size: 13px;
    margin-top: 3px;
    font-weight: 800;
}

.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa.sm_box_areaa.wdt_adds {
    width: 48.5%;
}
.parsonal_priess .main_pmp_araea .usr_al_supr_bx.sm_box_areaa.sm_box_areaa.wdt_adds .und_boxx_ess .ac_user {
    font-size: 15px;
    margin: 0;
    font-weight: 800;
    text-align: left;
    line-height: 20px;
    padding-right: 30px;
}

.mng_mg_aprtss {
    position: relative;
    padding-top: 40px;
}
.mng_mg_aprtss img.shw_arrow {
    position: absolute;
    top: 0;
}

#mng_mg_aprtss_n {
    position: relative;
    padding-top:0px;
}
#mng_mg_aprtss_n img.shw_arrow1 {
    position: absolute;
    top: 0;
}
#mng_mg_aprtss_n img.shw_arrow_neees {
    position: absolute;
    right:0px;
}
#mng_mg_aprtss1 {
    position: relative;
    padding-top:50px;
}
#mng_mg_aprtss1 img.shw_arrow1 {
    position: absolute;
    top: -26%;
}

#mng_mg_aprtss2 {
    position: relative;
    padding-top:50px;
}
#mng_mg_aprtss2 img.shw_arrow1 {
    position: absolute;
    top: 0%;
}

.mng_mg_aprtss_nn{
	position: relative;
}
.mng_mg_aprtss_nn img.shw_arrow1 {
    position: absolute;
    bottom: 0;
	top:inherit !important;
}
.persoal_area .hddingss_araea {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
    background: #e2e7f2;
    box-shadow: 5px 5px 0px #1c5299;
    border: #1c5299 solid 2px;
    padding: 15px 10px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: 800;
}

@media (min-width: 481px) and (max-width: 767px) {
.step_main#mng_mg_aprtss_n {position: relative; padding-top: 0px; max-width: 1100px; overflow: scroll; width: 100%;}	
.step_main#mng_mg_aprtss_n #step_1 {width: 1100px;}	
.step_main#mng_mg_aprtss_n #step_2 {width: 1100px;}
.step_main#mng_mg_aprtss_n .step_3#mng_mg_aprtss1 {width: 1100px;}	
#mng_mg_aprtss2 img.shw_arrow1 {position: absolute; top: 0%; left: 0; right: 0; margin: 0 auto;}
#mng_mg_aprtss_n img.shw_arrow_neees {position: absolute; right:-135%;}
}

@media (min-width: 320px) and (max-width: 480px) {
.step_main#mng_mg_aprtss_n {position: relative; padding-top: 0px; max-width: 1100px; overflow: scroll; width: 100%;}	
.step_main#mng_mg_aprtss_n #step_1 {width: 1100px;}	
.step_main#mng_mg_aprtss_n #step_2 {width: 1100px;}
.step_main#mng_mg_aprtss_n .step_3#mng_mg_aprtss1 {width: 1100px;}	
#mng_mg_aprtss2 img.shw_arrow1 {position: absolute; top: 0%; left: 0; right: 0; margin: 0 auto;}
#mng_mg_aprtss_n img.shw_arrow_neees {position: absolute; right:-213%;}
.mng_mg_aprtss img.shw_arrow {position: absolute; top: 5px; left: -8px;}
}


</style>
<!-- Modal -->
<div class="modal fade" id="videotutorialmodal" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
 </div> 
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Personal Money Path</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Personal Money Path</span>
   </div>
  </div>
</section>  


<section class="mrtop persoal_area">
 <div class="container">
  <div class="hddingss_araea"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /> PERSONAL MONEY PARTH ( PMP ) </div>
 </div>
</section>

<section class="parsonal_priess mrtop step_main" id="mng_mg_aprtss_n">
    <img src="{{ url('home/img/lst_list_full_n2.png')}}" class="shw_arrow_neees" alt="" />
    <div class="container mng_mg_aprtss_nn" id="step_1">
	    <img src="{{ url('home/img/both_rt_lf_n.png')}}" class="shw_arrow1" alt="" />
        <div class="row justy_centr">
		 <div class="col-lg-6 col-6" id="mng_mg_aprtss_n">
		  <div class="usr_al_supr_bx">
		   <div class="us_mgss"><img src="{{ url('home/img/labour_ic_pars.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <span class="tp_usrss">Labour</span>
            <div class="ac_user red_tx">Active Earning <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"></a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx grenss_tx ">(AE)</div>
            <div class="us_textxt">i.e. Salary, Wages, <p>(You Works For Money)</p></div>
            <div class="pris_data">{Rs. 150000/-} (Monthly)</div>
		   </div>
		  </div>
		  </div>


		  <div class="col-lg-6 col-6">
		  <div class="usr_al_supr_bx">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <span class="tp_usrss">Assets</span>
            <div class="ac_user red_tx">Passive Earning  <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"></a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx grenss_tx ">(PE)</div>
            <div class="us_textxt">i.e. Real Estate / MF / Stocks <p>(Money Works For You)</p></div>
            <div class="pris_data">{Rs. 0/-} {Monthly}</div>
		   </div>
		  </div>
		 </div>

		 <div class="col-lg-6">
		  <div class="usr_al_supr_bx mange_tops">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <div class="ac_user red_tx mt-0">Cash Flow <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="pris_data">{Rs. 150000/-} {Monthly}</div>
		   </div>
		  </div>
		 </div>
		 
		</div>
	</div>
	
	
	
	
	    <div class="container mng_mg_aprtss" id="step_2">
		<img src="{{ url('home/img/dotss_mg.png')}}" class="shw_arrow" alt="" />
        <div class="row justy_centr">
		 <div class="col-lg-4 col-4">
		  <div class="usr_al_supr_bx both_manages">
		   <div class="us_mgss"><img src="{{ url('home/img/labour_ic_pars.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
            <div class="ac_user red_tx">Consumtion <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx red_tx">[40%]</div>
            <div class="pris_data">{Rs. 60000/-} Monthly</div>
		   </div>
		  </div>
		  
		  <div class="main_pmp_araea">
		   <img src="{{ url('home/img/three_arrow_dotss.png')}}" class="shw_arrow" alt="" />
		   <div class="usr_al_supr_bx sm_box_areaa">
		    <div class="und_boxx_ess">
             <div class="ac_user">Required Spending <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a> 
			 <a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
             <div class="ap_us_tx red_tx">{RSA}</div>
             <div class="ap_us_tx">[30%]</div>
             <div class="pris_data">Rs.18000/-</div>
		    </div>
		   </div>

		   <div class="usr_al_supr_bx sm_box_areaa">
		    <div class="und_boxx_ess">
             <div class="ac_user">Spiritual & Fulfilment <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a> 
			 <a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
             <div class="ap_us_tx red_tx">{SFA}</div>
             <div class="ap_us_tx">[5%]</div>
             <div class="pris_data">Rs.3000/-</div>
		    </div>
		   </div>
		   
		   <div class="usr_al_supr_bx sm_box_areaa">
		    <div class="und_boxx_ess">
             <div class="ac_user">Fun & Education investment <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			 <a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
             <div class="ap_us_tx red_tx">{FEA}</div>
             <div class="ap_us_tx">[5%]</div>
             <div class="pris_data">Rs.3000/-</div>
		    </div>
		   </div>
		  </div>
		  
		  </div>


		  <div class="col-lg-4 col-4">
		  <div class="usr_al_supr_bx both_manages">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
            <div class="ac_user grenss_tx">Investment (FFA)  <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx red_tx">[50%]</div>
            <div class="pris_data">{Rs.75000/-} Monthly</div>
		   </div>
		  </div>
		 </div>

		  <div class="col-lg-4 col-4">
		  <div class="usr_al_supr_bx both_manages">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
            <div class="ac_user">Savings (ESA)  <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx red_tx">[10%]</div>
            <div class="pris_data">{Rs.15000/-} Monthly</div>
		   </div>
		  </div>
		  
		  <div class="main_pmp_araea">
		   <img src="{{ url('home/img/two_arrow_dotss.png')}}" class="shw_arrow" alt="" />
		   <div class="usr_al_supr_bx sm_box_areaa wdt_adds">
		    <div class="und_boxx_ess">
             <div class="ac_user">Planned Emergency Saving <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a> 
			 <a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
             <div class="ap_us_tx red_tx">{PEA}</div>
		    </div>
		   </div>

		   <div class="usr_al_supr_bx sm_box_areaa wdt_adds">
		    <div class="und_boxx_ess">
             <div class="ac_user">Un-Planned Emergency Saving <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a> 
			 <a href="https://www.ramjeemeena.com/" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
             <div class="ap_us_tx red_tx">{UPEA}</div>
		    </div>
		   </div>


		  </div>
		  
		 </div>


		 
		</div>
	</div>


    <div class="container step_3" id="mng_mg_aprtss1">
	    <img src="{{ url('home/img/two_bothss_n.png')}}" class="shw_arrow1" alt="" />
        <div class="row justy_centr">
		 <div class="col-lg-6 col-6">
		  <div class="usr_al_supr_bx">
		   <div class="us_mgss"><img src="{{ url('home/img/labour_ic_pars.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <span class="tp_usrss">Indirect Investment</span>
            <div class="ac_user red_tx">Passive Investment <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="javascript:void(0);"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx red_tx ">{PI}</div>
            <div class="us_textxt">{i.e. MF, Stocks, FD's. REIT's, SIP's}</div>
            <div class="pris_data">{Rs.15000/-} Monthly</div>
			<span class="tp_usrss1">They Control Them</span>
		   </div>
		  </div>
		  </div>


		  <div class="col-lg-6 col-6">
		  <div class="usr_al_supr_bx">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <span class="tp_usrss">Direct Investment</span>
            <div class="ac_user grenss_tx">Active Investment  <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"> </a>
			<a href="javascript:void(0);"><i class="fa fa-external-link"></i></a></span></div>
            <div class="ap_us_tx grenss_tx ">{AI}</div>
            <div class="us_textxt">{i.e. Business, Private Lending, Real Estate Investment}</div>
            <div class="pris_data">{Rs.80000/-} Monthly</div>
			<span class="tp_usrss1">They Control Them</span>
		   </div>
		  </div>
		 </div>

		 <div class="col-lg-6" id="mng_mg_aprtss2">
		  <img src="{{ url('home/img/upojit_dost_n.png')}}" class="shw_arrow1" alt="" />
		  <div class="usr_al_supr_bx mange_tops">
		   <div class="us_mgss"><img src="{{ url('home/img/passive_earning.png')}}" alt="" /></div>
		   <div class="und_boxx_ess">
		    <div class="ac_user mt-0">Financial Returns From All Your Investment <span class="vddoprtsss"><a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="{{ url('home/img/vvdio_ic.png')}}"></a>
			<a href="javascript:void(0);"><i class="fa fa-external-link"></i></a></span></div>
			<div class="ac_user">(Direct Or Indirect As Above)</div>
            <div class="pris_data red_tx">{Rs.95000/-} Monthly</div>
		   </div>
		  </div>
		 </div>
		 
		</div>
	</div>

</section>
   
	 



@include('front.layouts.footer')


