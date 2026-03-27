@include('web.common.header')
 
<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>About Us</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>About Us</span>
        </div>
    </div>
</section>
 
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="al_pages_contentstst abt_pgss">
                        <!-- <h4>Our Story</h4> -->
 
                        {!! $about->description ?? '<p>Content coming soon...</p>' !!}
                    </div>
 
                    @if($about && ($about->leadership || $about->leadership_image))
                        <div class="led_area_alss">
                            <h4>{{ $about->leadership }}</h4>
 
                            @if(!empty($about->leadership_image))
                                <img src="{{ $about->leadership_image }}" alt="Leadership Image" style="max-width:150px;">
                            @endif
 
                            @if($about->name)
                                <p>{{ $about->name }}</p>
                            @endif
 
                            @if($about->designation)
                                <span>{{ $about->designation }}</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
 {!! $about->footer_content ?? '
 <div class="af_li_at">
    <div class="container">
        <div class="alf_cntentss">
            <h3>Need To Get In With Us?</h3>
            <a href="javascript:void(0);" class="snd">Send Us A Message</a>
            <p>
                <a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> Download our press kit</a>
                <a href="javascript:void(0);"><i class="fa fa-chain-broken"></i> Join our affiliate program</a>
            </p>
        </div>
    </div>
</div>' !!}
 
@include('web.common.footer')