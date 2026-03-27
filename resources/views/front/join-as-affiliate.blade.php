@php
use App\Models\JoinAsAffiliateModel;
$data = JoinAsAffiliateModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->first();
@endphp

@include('web.common.header')
<!-- Video Modal -->
<div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog set_y_vdo">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{{ url('home/img/close.svg')}}" alt="" /></span></button>
      <div class="modal-body"> 
	  <iframe width="100%" height="500" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=ONYzyvHZAE1RdK-o" frameborder="0" allowfullscreen></iframe>	
      </div>
    </div>
  </div>
</div>
<!-- End Video Modal -->

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Jion Reffer Or Promote And Earn</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Affiliate</span>
   </div>
  </div>
</section> 


<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="binng_araes earn_area">
                <div class="earn_bx">

                    <!-- DYNAMIC TITLE -->
                    <h4>{{ $data->title ?? '' }}</h4>

                    <!-- DYNAMIC SHORT DESCRIPTION -->
                    <p>{!! $data->short_description ?? '' !!}</p>

                    <div class="row">

                        <!-- DYNAMIC IMAGE BLOCK 1 -->
                        <div class="col-lg-4">
                            <div class="earn_bxx">
                                <img src="{{ $data->image ?? '' }}" alt="" />
                                <span class="cntss_araea">{{ $data->image_title ?? '' }}</span>
                            </div>
                        </div>

                        <!-- DYNAMIC IMAGE BLOCK 2 -->
                        <div class="col-lg-4">
                            <div class="earn_bxx">
                                <img src="{{ $data->image1 ?? '' }}" alt="" />
                                <span class="cntss_araea">{{ $data->image_title1 ?? '' }}</span>
                            </div>
                        </div>

                        <!-- DYNAMIC IMAGE BLOCK 3 -->
                        <div class="col-lg-4">
                            <div class="earn_bxx">
                                <img src="{{ $data->image2 ?? '' }}" alt="" />
                                <span class="cntss_araea">{{ $data->image_title2 ?? '' }}</span>
                            </div>
                        </div>

                    </div>

                    <!-- STATIC SECTION (DO NOT CHANGE) -->
                    <div class="lnk_s_bntt al_qusess_topup">
                        <a href="javascript:void(0);" class="bntss blue_bg">Generate affiliate link  
                            <span class="quess" tooltip="Hi dfsd dfsdfs" flow="down">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </a>
                    </div>

                </div>

                <!-- STATIC SECTION (DO NOT CHANGE) -->
                <div class="share_araea">
                    <h4>Share your your link</h4>
                    <ul>
                        <li><a href="#"><img src="{{ url('home/img/facebook.png')}}" alt="" /></a></li>
                        <li><a href="#"><img src="{{ url('home/img/instagram.png')}}" alt="" /></a></li>
                        <li><a href="#"><img src="{{ url('home/img/twitter.png')}}" alt="" /></a></li>
                        <li><a href="#"><img src="{{ url('home/img/what-up.png')}}" alt="" /></a></li>
                        <li><a href="#"><img src="{{ url('home/img/messanger.png')}}" alt="" /></a></li>
                    </ul>

                    <div class="shr_linkss al_qusess_topup">
                        <input type="text" value="https://product.propertydealsinsight.com/signup.referralSourceRamj2743" />
                        <button type="submit">Copy & share 
                            <span class="quess" tooltip="Hi" flow="down">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- STATIC END -->

            </div>
        </div>
    </div>
</div>

<!-- VIDEO SECTION (DYNAMIC) -->
<section class="vedioo">
    <div class="container">
        <h4 class="mb-4">
            {{ $data->video_title ?? '' }}
            <!-- <span class="red_tx">{{ $data->video_subtitle ?? '' }}</span> -->
        </h4>

        <p>{{ $data->video_subtitle2 ?? 'Just by 3 simple steps' }}</p>

        <div class="you_tb_arra">
            <iframe width="100%" height="350"
                src="{{ $data->video_url ?? '' }}"
                allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- End Video Elements -->

<!--- How does it works? ---->
    {!! $data->description ?? '' !!}
<!--- End How does it works? ---->	


<!--- Earn and Grow with us --->
<div class="container vedioo">
  <h4 class="jn_alls">Earn and <span class="red_tx"><u>Grow</u></span> with us</h4>
  <p>Fill in your details below to become an affiliate now</p>
 <div class="frm_al_suprtsss join_wth">
    <form action="{{ route('affiliate.save') }}" method="POST">
    @csrf
        <div class="form-group marges_ic">
            <i class="fa fa-user"></i>
            <input type="text" name="first_name" value="" class="form-control" placeholder="First Name" required="" />
        </div>
        <div class="form-group marges_ic">
            <i class="fa fa-envelope"></i>
            <input type="text" name="email" value="" class="form-control" placeholder="Enail ID" required="" />
        </div>
 
        <div class="form-group marges_ic">
            <i class="fa fa-phone"></i>
            <input type="text" name="contact_no" value="" class="form-control" placeholder="Contact No" required="" />
        </div>
 
        <div class="form-group marges_ic">
            <i class="fa fa-building"></i>
            <select class="slt_al_arra" name="monthly_referrals">
                <option value="">Approx Monthly Referrals?</option>
                <option value="1-10">1–10</option>
            <option value="10-50">10–50</option>
            <option value="50-100">50–100</option>
            <option value="100+">100+</option>
            </select>
        </div>
 
        <div class="form-group marges_ic">
            <i class="fa fa-server"></i>
            <textarea name="message" id="" cols="3" rows="3" class="form-control" placeholder="Message" required=""></textarea>
        </div>
 
        <div class="form-group">
            <button type="submit" value="Submit Now" class="btn-submit2">Yes. I Want To Earn Some Extra Income.
             <span>Please Approve Me</span>
            </button>
        </div>
       
        <div class="form-group">
         <div class="jn_btn_cntss">
          <p>By signingup. you agree to or <a href="javascript:void(0);">term of use</a> and <a href="javascript:void(0);">privacy policy</a></p>
          <p>Already have an Account <a href="javascript:void(0);">Login Now</a></p>
         </div>
        </div>
    </form>
 
 </div>
</div>
<!--- End Earn and Grow with us --->
@php
use App\Models\FaqModel;

// Affiliate page data
$data = JoinAsAffiliateModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->first();

// Fetch FAQs dynamically
$faqs = FaqModel::orderBy('id','asc')->get();
@endphp

<!--- Frequently Asked Questions ---->
<div class="container">		
    <div class="accordion_container">        
        <div class="al_sec_ctxt text-center">
            <h2>Frequently Asked Questions</h2>
        </div>

        {{-- Loop through all FAQs dynamically --}}
        @foreach($faqs as $faq)
            <div class="man_boxx">
                <div class="accordion_head">
                    {{ $faq->title }}
                    <span class="plusminus">+</span>
                </div>
                <div class="accordion_body" style="display: none;">
                    <div class="mt_datat">
                        {!! $faq->description !!}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
<!--- End Frequently Asked Questions ---->




<!---- Help ---->
@php
        $needhelp = \App\Models\NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
@endphp
<section class="al_sec_araea mt_50p pb-0">
@include('web.pages.need-help')
</section>
<!---- Help ---->


@include('front.layouts.footer')

		<script>
		$(document).ready(function () {
			//toggle the component with class accordion_body
			$(".accordion_head").click(function () {				
				if ($('.accordion_body').is(':visible')) {
					$(".accordion_body").slideUp(300);
					$(".plusminus").text('+');
					$('.accordion_head').removeClass('clr_tx');
				}
				if ($(this).next(".accordion_body").is(':visible')) {
					$(this).next(".accordion_body").slideUp(300);
					$(this).children(".plusminus").text('+');
				} else {
					$(this).next(".accordion_body").slideDown(300);
					$(this).addClass('clr_tx').siblings().removeClass('clr_tx');
					$(this).children(".plusminus").text('-');
				}
			});
		});
		</script>