<?php
    use App\Models\OurClientsModel;
    $clients = OurClientsModel::where(['status'=> 1,'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(12)->get();
?>
<!--- What clients are saying about our 1cr app --->
<section class="al_sec_araea testy_bx mg_bg_setss what_cl" id="">
    <div class="testi_bgr">
        <h4>What clients are saying about our 1cr app</h4>
    </div>
    <div class="al_text_box">
        <div class="container">
            <div class="owl-carousel owl-theme" id="testimonials">
                @foreach($clients as $key=>$client)
                <div class="item">
                    <div class="it_emms">
						<div class="usr_mgss"><img src="{{ ASSETS_PATH.$client->image }}" alt="" /></div>
						<h3>{{ $client->name }}</h3>
                        <p class="mb-0"><strong>{{ $client->designation }}, {{ $client->company }}</strong></p>
                        <p><strong>{{ $client->location }}</strong></p>
                        <p class="dis_part">{{ $client->about }}</p>
                        <div class="revisss">
                            @for($i=1; $i>=5; $i++)
                                @if($i<= $client->rating)
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                @endif
                            @endfor
                            <!-- <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i> -->
                        </div>
						<div class="w_numbber">
						 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B{{ $client->contact }}&amp;text=Hi&amp;app_absent=0">
						 <i class="fa fa-whatsapp"></i> +91 {{ $client->contact }}</a>
						</div>
						
						<div class="snd_btnns">
						     @if(!empty($client->video))
                                <a href="{{ $client->video }}" >
                                    <i class="fa fa-play-circle-o"></i> Watch Video
                                </a>
                            @else
                                <a href="javascript:void(0);" style="pointer-events: none; opacity: 0.6;">
                                    <i class="fa fa-play-circle-o"></i> No Video
                                </a>
                            @endif
					    </div>
					</div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!--- End What clients are saying about our 1cr app --->
