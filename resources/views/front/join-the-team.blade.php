
@include('web.common.header')
<style>
 .careers_aar .container.wd_area {
    max-width: 1091px;
}
.form_boths {
    border: #000 solid 1px;
    border-radius: 10px;
    display: flex;
    background: #fff;
}

.form_boths .fr_lenth {
    width: 28.333%;
    position: relative;
    margin-right: 1%;
    border-right: #525252 solid 1px;
}
.form_boths .fr_lenth:nth-child(3){ border-right:none;}
.form_boths .fr_lenth img {
    position: absolute;
    width: 20px;
    top: 14px;
    left: 10px;
}
.form_boths .fr_lenth input {
    width: 100%;
    border: none;
    padding:12px 33px;
    border-radius: 8px;
}
.form_boths .fr_lenth input:focus{outline:none; border:none;}

.form_boths .fr_lenth select {
    width: 100%;
    border: none;
    padding:12px 33px;
    border-radius: 8px;
	cursor:pointer;
}
.form_boths .fr_lenth select:focus{outline:none; border:none;}
.form_boths .fr_srch {
    width: 13%;
}
.form_boths .fr_srch button {
    background: #194d94;
    width: 100%;
    font-size: 18px;
    height: 48px;
    border: none;
    border-radius: 0 8px 8px 0px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}


.bx_lis_main {
    background: #fff;
    border: #000 solid 1px;
    border-radius: 10px;
    padding: 10px;
    display: inline-block;
    width: 100%;
	margin-bottom: 20px;
}
.bx_lis_main .cnt_mtrr {
    margin-bottom: 20px;
    display: inline-block;
    width: 100%;
}
.bx_lis_main .cnt_mtrr .ic_bths {
    float: left;
    margin-right: 15px;
    width: 50px;
    height: 40px;
    border-radius: 5px;
    background: #E3E3E3;
    text-align: center;
}
.bx_lis_main .cnt_mtrr .ic_bths img {
    margin: 0 auto;
    position: relative;
    top: 9px;
}
.bx_lis_main .cnt_mtrr .cnt_unddrs {
    float: left;
    max-width:970px;
    width: 100%;
}
.bx_lis_main .cnt_mtrr .cnt_unddrs h5 {
    margin: 0 0 3px;
    font-size: 18px;
    color: #000;
    font-weight: 600;
}
.bx_lis_main .cnt_mtrr .cnt_unddrs p {
    margin: 0;
    font-size: 12px;
    font-weight: 400;
    line-height: 18px;
}
.bx_lis_main .bnt_alss_arae {
    display: inline-block;
    width: 100%;
}
.bx_lis_main .bnt_alss_arae button.bg_graa {
    margin-right: 10px;
    background: #e3e3e3;
    border: none;
    padding: 10px 20px;
    display: inline-block;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
}
.bx_lis_main .bnt_alss_arae button.bg_graa:focus {
    background: #194d94;
    color: #fff;
    border: none;
    outline: none;
}

.bx_lis_main .bnt_alss_arae .right_arae {
    float: right;
}
.bx_lis_main .bnt_alss_arae .right_arae button.bg_orng{
    background: #194d94;
    border: none;
	color:#fff;
    padding: 10px 20px;
    display: inline-block;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
}

.bx_lis_main .cnt_mtrr .cnt_unddrs h5 span.prissz {
    float: right;
    font-size: 16px;
    font-weight: 700;
}
.bx_lis_main .cnt_mtrr .cnt_unddrs h5 span.prissz span.yerss {
    color: #b3b3b3;
    font-weight: 400;
}

.av_lcntxt h4 {
    margin: 0 0 15px;
    text-align: center;
    font-size: 30px;
    font-weight: 700;
}
.add-read-more.show-less-content .second-section,
.add-read-more.show-less-content .read-less {
   display: none;
}

.add-read-more.show-more-content .read-more {
   display: none;
}

.add-read-more .read-more,
.add-read-more .read-less {
   font-weight: bold;
   margin-left: 2px;
   color: blue;
   cursor: pointer;
}

.add-read-more{
  max-width: 1060px;
  font-size:15px;
  width: 100%;
  margin: 0 auto;
}

.get_nd_blogss {
    background: #3246c8;
    margin-top: 50px;
    padding: 30px 0;
    text-align: center;
}
.get_nd_blogss .get_strs {
    width: 100%;
    margin: 0 auto;
    max-width: 525px;
    color: #fff;
}
.get_nd_blogss .get_strs h4 {
    margin: 0 0 25px;
}
.get_nd_blogss .get_strs h4 a {
    background: #f94554;
    display: inline-block;
    padding: 10px 40px;
    font-size: 18px;
    font-weight: 700;
    border-radius: 4px;
}
.get_nd_blogss .get_strs h4 a:hover{color:#fff;}
.get_nd_blogss .get_strs p {
    font-size: 15px;
    margin: 0 0 15px;
}

.get_nd_blogss .get_strs p:last-child {
    margin: 0;
}
</style>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Join The Team</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Join The Team</span>
   </div>
  </div>
</section> 

    



<section class="dash_board_pages">
<div class="container">
 <div class="av_lcntxt">
  <h4>Available Jobs</h4>
  <p class="add-read-more show-less-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
</p>
 </div>
</div>
</section>

<section class="dash_board_pages careers_aar">
    <div class="container wd_area">
        <form action="">
            <div class="form_boths">
                <div class="fr_lenth">
                    <img src="{{ url('home/img/search_ic_sm.svg')}}" alt="" />
                    <input type="text" name="" id="" value="" placeholder="Job Title" required="" />
                </div>
                <div class="fr_lenth">
                    <img src="{{ url('home/img/cl_location.svg')}}" alt="" />
                    <input type="text" name="" id="" value="" placeholder="Location" required="" />
                </div>
                <div class="fr_lenth">
                    <img src="{{ url('home/img/suitcase-alt_ic_sm.svg')}}" alt="" />
                    <select>
                        <option value="">Job Type</option>
                    </select>
                </div>
                <div class="fr_srch">
                    <button type="submit" value="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container wd_area mr_top_20">
        <!--- Apply List --->
        <div class="bx_lis_main">
            <div class="cnt_mtrr">
                <div class="ic_bths"><img src="{{ url('home/img/suitcase-alt_ic_sm.svg')}}" alt="" /></div>
                <div class="cnt_unddrs">
                    <h5>Seniar Software Engineer  <span class="prissz">$60k-100k <span class="yerss">/ Year</span></span></h5>
                    <p>Share Your Contact Details With Us And One Of Our Experts Will Get In Touch With You</p>
                </div>
            </div>
            <div class="bnt_alss_arae">
                <button type="text" class="bg_graa" value="">Full time</button>
                <button type="text" class="bg_graa" value="">Engineering</button>
                <button type="text" class="bg_graa lst" value="">San Francisco</button>
                <div class="right_arae">
                    <button type="text" class="bg_orng" value="">Apply Now</button>
                </div>
            </div>
        </div>
        <!--- End Apply List --->

        <!--- Apply List --->
        <div class="bx_lis_main">
            <div class="cnt_mtrr">
                <div class="ic_bths"><img src="{{ url('home/img/suitcase-alt_ic_sm.svg')}}" alt="" /></div>
                <div class="cnt_unddrs">
                    <h5>Seniar Software Engineer  <span class="prissz">$60k-100k <span class="yerss">/ Year</span></span></h5>
                    <p>Share Your Contact Details With Us And One Of Our Experts Will Get In Touch With You</p>
                </div>
            </div>
            <div class="bnt_alss_arae">
                <button type="text" class="bg_graa" value="">Full time</button>
                <button type="text" class="bg_graa" value="">Engineering</button>
                <button type="text" class="bg_graa lst" value="">San Francisco</button>
                <div class="right_arae">
                    <button type="text" class="bg_orng" value="">Apply Now</button>
                </div>
            </div>
        </div>
        <!--- End Apply List --->

        <!--- Apply List --->
        <div class="bx_lis_main">
            <div class="cnt_mtrr">
                <div class="ic_bths"><img src="{{ url('home/img/suitcase-alt_ic_sm.svg')}}" alt="" /></div>
                <div class="cnt_unddrs">
                    <h5>Seniar Software Engineer  <span class="prissz">$60k-100k <span class="yerss">/ Year</span></span></h5>
                    <p>Share Your Contact Details With Us And One Of Our Experts Will Get In Touch With You</p>
                </div>
            </div>
            <div class="bnt_alss_arae">
                <button type="text" class="bg_graa" value="">Full time</button>
                <button type="text" class="bg_graa" value="">Engineering</button>
                <button type="text" class="bg_graa lst" value="">San Francisco</button>
                <div class="right_arae">
                    <button type="text" class="bg_orng" value="">Apply Now</button>
                </div>
            </div>
        </div>
        <!--- End Apply List --->
    </div>


</section>

<section class="get_nd_blogss">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>

<section class="nd_blogss">
 <div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
                        <h3>Need Help?</h3>

                        <p>Explore our resources to quickly get started with Flowlu business management software</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Book online demo</p>

                            <a href="javascript:void(0);">Get a demo</a>
                        </div>

                        <img src="{{ url('home/img/hlp_1.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Find the answers</p>

                            <a href="javascript:void(0);">Knowledge base</a>
                        </div>

                        <img src="{{ url('home/img/hlp_2.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Ask questions</p>

                            <a href="javascript:void(0);">Support chat</a>
                        </div>

                        <img src="{{ url('home/img/hlp_3.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</section>



@include('front.layouts.footer')