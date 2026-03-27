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
    max-width: 350px;
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
.red_tx {color:#f94554 !important;}
.blues_tx {color:#1c5299 !important;}
.grenss_tx {color:#20b450 !important;}
</style>


<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Property Lookout Pitch</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Property Lookout Pitch</span>
        </div>
    </div>
</section>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="makr_plc_lst">
                        <h4>Now Buy & sell Your Property with 100% Confidence. & Love</h4>

                        <div class="row">
                            <div class="col-lg-3 col-3">
                                <div class="lgo_partss"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
                            </div>

                            <div class="col-lg-6 col-6">
                                <div class="md_areaa_cntts plp-introll">
                                    <h5>Now Getting & Analysis of your first or next property propsal from any brokers is easy.</h5>

                                    <p>just follow three simple & easy steps.</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-3">
                                <div class="lgo_partss"><img src="{{ url('home/img/sat_lgoo.jpg')}}" alt="" /></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="owl-carousel owl-theme" id="sliderssmain">
                        <!----- Slider Item ---->
                        <div class="item">
                            <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
                        </div>
                        <!----- End Slider Item ---->

                        <!----- Slider Item ---->
                        <div class="item">
                            <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
                        </div>
                        <!----- End Slider Item ---->

                        <!----- Slider Item ---->
                        <div class="item">
                            <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
                        </div>
                        <!----- End Slider Item ---->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Elements -->
<section class="vedioo plp_introlls">
    <div class="container">
        <h4 class="mb-4"><span class="red_tx">Create</span> <span class="blues_tx">,</span> Share <span class="blues_tx">& </span> <span class="grenss_tx">Accept</span></h4>
		<p class="capital_tx"><span>That's All</span></p>		
		<h6>All it Takes is just one minute to crate your first or next PLP.</h6>
		
        <div class="video_parts">
            <video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
                <source id="mp4" src="{{ url('home/img/vdiio.mp4')}}" type="video/mp4" />
            </video>
        </div>
    </div>
</section>
<!-- End Video Elements -->

<div class="container plp_introl">
 <div class="row">
  <!---- Itam List --->
  <div class="col-lg-4">
   <div class="stp_boxs">
    <i class="fa fa-dropbox"></i>
    <h3>Step-1</h3>
	<p>Create your PLP Using 1CR APP with ease.</p>
   </div>
  </div>
  <!--- End Item List --->

  <!---- Itam List --->
  <div class="col-lg-4">
   <div class="stp_boxs">
    <i class="fa fa-certificate"></i>
    <h3>Step-2</h3>
	<p>Select your favorate realtor from a list of hundreds of top ethical and professional realtors & send the PLP at a ease of Click</p>
   </div>
  </div>
  <!--- End Item List --->

  <!---- Itam List --->
  <div class="col-lg-4">
   <div class="stp_boxs">
    <i class="fa fa-user"></i>
    <h3>Step-3</h3>
	<p>Receive, analys & accept best proposal from multiple options sent by realtors.</p>
   </div>
  </div>
  <!--- End Item List --->
  
  
  <div class="col-lg-12">
   <div class="clk_btnns_plp">
    <a href="{{ url('plp-script') }}">
	 Yes. Let's Create My PLP
     <span>In just 3 Easy & Simple Steps</span>
	 <i class="fa fa-chevron-circle-right"></i>
	</a>
   </div>
   <div class="btm_text_plp">
    <span class="mdl_parts">No, Thanks. i can do thi smy own way and get conenct with right realtors. i dont needs this advanced system for finding my nest best property.</span>
   </div>
  </div>
  
 </div>
</div>




@include('front.layouts.footer')