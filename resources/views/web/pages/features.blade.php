
@include('web.common.header')
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />

  <div class="midils_contnts">
   <div class="medilss"><h4>Features</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Features</span>
   </div>
  </div>
</section>

<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
                        <p>1CR APP Features can help to jump-start your collaboration efforts. It's super easy to use & free plans available.</p>
                    </div>
                </div>
                @foreach($features as $feature)
                    <div class="col-lg-6">
                        <div class="fur_boxx_cnt">
                            <div class="us_mg_arara">
                                <img src="{{ ASSETS_PATH.$feature->image }}" alt="Feature Image" />
                            </div>

                            <div class="us_cntentts">
                                <h5>{{ $feature->title }}</h5>
                                <p>{{ $feature->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<!-- Get Started. it's Free -->

<section class="al_sec_araea str_14 mt-5">
    <div class="container">
        <div class="free_trailss">
            <img src="{{ url('home/img/free-trial.png')}}" class="mb_not_sh" alt="" />

            <div class="contents_frt">
                <div class="cnt_leftsss">
                    <div class="medilss">
                        <h5>Get Started. it's Free</h5>

                        <p>No credit card required</p>
                    </div>
                </div>

                <div class="bntss_leftsss">
                    <a href="javascript:void(0);" class="alluser">Start For Free <img src="{{ url('home/img/arrow_right.svg')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Get Started. it's Free -->

<div class="container">
    <div class="row mt-2">
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
@include('web.common.footer')