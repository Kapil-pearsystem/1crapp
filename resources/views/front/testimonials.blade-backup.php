<?php
    use App\Models\TestimonialsModel;
	$testimonials = TestimonialsModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->limit(6)->get();
?>
@include('web.common.header')
<style>
#tsts_mlts .it_emms {
    background: #fff;
    padding: 20px;
    position: relative;
    border: #ebebeb solid 1px;
    margin-top: 30px;
}

#tsts_mlts .it_emms .usr_mgss {
    width: 90px;
    height: 90px;
    overflow: hidden;
    border-radius: 100px;
    margin: 0 auto;
    margin-bottom:20px;
}
#tsts_mlts .it_emms .usr_mgss img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
#tsts_mlts .it_emms h3 {
    margin: 0 0 10px;
    text-align: center;
    font-size: 20px;
    font-weight: 700;
}
#tsts_mlts .it_emms h4 {
    margin: 0 0 10px;
    text-align: center;
    font-size: 17px;
    font-weight: 700;
}
#tsts_mlts .it_emms h5 {
    margin: 0 0 10px;
    text-align: center;
    font-size: 15px;
    font-weight: 700;
}
#tsts_mlts .it_emms p {
    margin: 0 0 15px;
    text-align: center;
    font-size: 14px;
}
#tsts_mlts .it_emms .revisss {
    text-align: center;
    font-size: 13px;
    margin-bottom:10px;
	    color: #FFCB20;
}
#tsts_mlts .it_emms .whatsup {
    text-align: center;
    font-weight: 700;
    font-size: 15px;
    margin-bottom: 10px;
}
#tsts_mlts .it_emms .ustt{text-align:center;}
#tsts_mlts .it_emms .ustt img {
    width: auto;     margin: 0 auto;
}
#tsts_mlts .it_emms .ustt a.viido {
    background: #0e3992;
    color: #fff;
    padding: 7px 20px;
    display: block;
    border-radius: 5px;
}

#tsts_mlts .it_emms .snd_btnns {
    display: inline-block;
    width: 100%;
}
#tsts_mlts .it_emms .snd_btnns a {
    background: #4d920e;
    width: 100%;
    display: block;
    text-align: center;
    padding: 8px 0;
    border-radius: 5px;
    font-size: 14px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
}
.w_numbber {
    margin-bottom: 10px;
    text-align: center;
    font-weight: 600;
    font-size: 16px;
}
</style>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Testimonials</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Testimonials</span>
   </div>
  </div>
</section> 

    
<section class="dash_board_pages spaceses" id="tsts_mlts">
    <div class="container">
	 <div class="row scrool_parts">
     @foreach($testimonials as $key=>$testimonial)
	  <!--- Item List --->
      <div class="col-lg-4">
	   <div class="it_emms">
			<div class="usr_mgss"><img src="{{ ASSETS_PATH.$testimonial->image }}" alt="" /></div>
			<h3>{{ $testimonial->name }}</h3>
			<p class="mb-0"><strong>{{ $testimonial->designation }}, {{ $testimonial->company }}</strong></p>
			<p><strong>{{ $testimonial->location }}</strong></p>
			<p class="dis_part">{{ $testimonial->about }}</p>
			<div class="revisss">
                @for($i=1; $i>=5; $i++)
                    @if($i<= $testimonial->rating)
				        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star-o"></i>
                    @endif
                @endfor
			</div>
			<div class="w_numbber">
			 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B{{ $testimonial->contact }}&amp;text=Hi&amp;app_absent=0">
             <i class="fa fa-whatsapp"></i> +91 {{ $testimonial->contact }}</a>
			</div>
<div class="snd_btnns">
    @if(!empty($testimonial->video))
        <a href="{{ $testimonial->video }}">
            <i class="fa fa-play-circle-o"></i> Watch Video
        </a>
    @else
        <a href="javascript:void(0);" style="pointer-events: none; opacity: 0.6;">
            <i class="fa fa-play-circle-o"></i> No Video
        </a>
    @endif
</div>		</div>
	  </div>
      <!--- End Item List --->
    @endforeach

	 </div>

	 <div class="mr_c_test"><a href="#testimonials_sections" class="alluser">More Customers Testimonials.</a></div>
    </div>
</section>


@include('front.layouts.footer')