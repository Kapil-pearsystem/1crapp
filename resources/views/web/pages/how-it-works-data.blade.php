@php
use App\Models\HowItWorkModel;

$step1 = HowItWorkModel::where([
    'category' => 1,
    'step' => 1,
    'created_by'=> app('currentAgent')->id
])->first();

$images = [];
if (!empty($step1?->images)) {
    $images = explode(',', $step1->images);
}
@endphp


{{-- -------------------------
     IF DYNAMIC AVAILABLE
-------------------------- --}}
@if($step1)
<section class="al_sec_araea how_alls_prgp mt-5">
    <div class="container how_it_mb">
        <div class="row">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step1->title }}</h5>
                        {!! $step1->description !!}
                        
                        <div class="sld_btn_als">
                            <a href="{{ $step1->btn_link ?? 'javascript:void(0);' }}">Register Now For FREE !</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                @if(count($images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/'.$step1->images) }}" class="bg_al_cntxt">
                    </div>
                @else
                    <div class="owl-carousel owl-theme" id="how_it_scrools">
                        @foreach($images as $key=>$image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/' . $image) }}" class="bg_al_cntxt" alt="{{ $key }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ---------------------------------
    ELSE SHOW YOUR STATIC CONTENT
---------------------------------- --}}
@else

{{-- STATIC SECTION 1 --}}
<section class="al_sec_araea pb-0">
    <div class="container">
        <h4 class="text-left">HOW IT WORKS</h4>
    </div>
</section>

<section class="al_sec_araea how_alls_prgp">
    <div class="container how_it_mb">
        <div class="row">
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 1 - OBTAIN</h5>
                        <p>Register or Login to 1CR APP and Post the Tentative Details...</p>

                        <ul>
                            <li>Register or Login to 1CR APP. it's Free For Life.</li>
                            <li>Enter Loan Details, Basic Purchase Price...</li>
                            <li>Enter Refinance Details & Future projection...</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="owl-carousel owl-theme" id="how_it_scrools">
                    <div class="item">
                        <div class="mg_sclrr_ss">
                            <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                        </div>
                    </div>

                    <div class="item">
                        <div class="mg_sclrr_ss">
                            <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                        </div>
                    </div>

                    <div class="item">
                        <div class="mg_sclrr_ss">
                            <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endif

<!--- End Step 1 - OBTAIN ---->
@php
$step2 = HowItWorkModel::where([
    'category' => 1,
    'step' => 2,
    'created_by'=> app('currentAgent')->id
])->first();

$s2_images = [];
if (!empty($step2?->images)) {
    $s2_images = explode(',', $step2->images);
}
@endphp


{{-- -------------------------
     IF DYNAMIC AVAILABLE
-------------------------- --}}
@if($step2)
<section class="al_sec_araea how_alls_prgp mt_50">
    <div class="container how_it_mb">
        <div class="row">

            <div class="col-lg-6">
                @if(count($s2_images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/' . $step2->images) }}" class="bg_al_cntxt" alt="">
                    </div>
                @else
                    <div class="owl-carousel owl-theme" id="how_it_scrools2">
                        @foreach($s2_images as $key=>$image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/' . $image) }}" class="bg_al_cntxt" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step2->title }}</h5>
                        {!! $step2->description !!}
                        <div class="sld_btn_als">
                            <a href="{{ $step2->btn_link ?? 'javascript:void(0);' }}">Register Now For FREE !</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- -------------------------
     ELSE SHOW STATIC CONTENT
-------------------------- --}}
@else
<section class="al_sec_araea how_alls_prgp mt_50">
    <div class="container how_it_mb">
        <div class="row">

            <div class="col-lg-6">
                <div class="mg_sclrr_ss">
                    <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 2- OPERATE</h5>
                        <p>Get into the dashboard and analyse the property performance and future Projection.</p>

                        <ul>
                            <li>Get the Data for Latest year</li>
                            <li>Find the ratios & Return for One year</li>
                            <li>Get to Know Future Projection & All Graphics and Bar Diagram</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif

<!--- End Step 2- OPERATE ---->
@php
$step3 = HowItWorkModel::where([
    'category' => 1,
    'step' => 3,
    'created_by'=> app('currentAgent')->id
])->first();

$s3_images = [];
if (!empty($step3?->images)) {
    $s3_images = explode(',', $step3->images);
}
@endphp

{{-- -------------------------
     IF DYNAMIC AVAILABLE
-------------------------- --}}
@if($step3)
<section class="al_sec_araea how_alls_prgp mt_50">
    <div class="container how_it_mb">
        <div class="row">

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step3->title }}</h5>
                        {!! $step3->description !!}
                        <div class="sld_btn_als">
                            <a href="{{ $step3->btn_link ?? 'javascript:void(0);' }}">Register Now For FREE !</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                @if(count($s3_images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/'.$step3->images) }}" class="bg_al_cntxt" alt="">
                    </div>
                @else
                    <div class="owl-carousel owl-theme" id="how_it_scrools3">
                        @foreach($s3_images as $key=>$image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/' . $image) }}" class="bg_al_cntxt" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>

{{-- -------------------------
     ELSE STATIC CONTENT
-------------------------- --}}
@else
<section class="al_sec_araea how_alls_prgp mt_50">
    <div class="container how_it_mb">
        <div class="row">

            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 3- OPTIMISE</h5>
                        <p>Get into the dashboard and analyse the property performance and future Projection.</p>

                        <ul>
                            <li>Get the Data for Latest year</li>
                            <li>Find the ratios & Return for One year</li>
                            <li>Get to Know Future Projection & All Graphics and Bar Diagram</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mg_sclrr_ss">
                    <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                </div>
            </div>

        </div>
    </div>
</section>
@endif

<!--- End Step 3- OPTIMISE ---->

@php
    $seeHow = \App\Models\CalltoActionModel::where(['section'=> 2, 'created_by'=> app('currentAgent')->id])->where('status', 1)->first();
@endphp
@if($seeHow)
<section class="al_sec_araea mt_50">
    <div class="container">
        <div class="see_how_areaa">
            <div class="see_h_are_ct">
                <div class="mediaa">
                    <img src="{{ url('home/img/1cr_lgo.png')}}" alt="" />
                    <h5>{{ $seeHow->title }}</h5>
                    <p>
<a href="{{ $seeHow->left_link_url ?? 'javascript:void(0)' }}" class="alluser"
                           target="{{ $seeHow->left_link_new_tab ? '_blank' : '_self' }}">
                            {{ $seeHow->left_link_title ?? 'Sign up for free' }}
                            <img src="{{ url('home/img/arrow_right.svg') }}" alt="" />
                        </a>                    </p>
                </div>
            </div>
            <div class="mg_ara_stl">
                <img src="{{ url('home/img/see_how.png')}}" alt="" class="ovr_m" />
                <div class="und_mgss"><img src="{{ asset('admin/' . $seeHow->image) }}" alt="" /></div>
                <div class="socialss">
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/chn_ico.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/twi_tter.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/face_book.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/insta_gr.png')}}" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@php
    $step4 = HowItWorkModel::where([
        'category' => 2,
        'step' => 1,
        'created_by'=> app('currentAgent')->id
    ])->first();

    $s4_images = [];
    if (!empty($step4?->images)) {
        $s4_images = explode(',', $step4->images);
    }
@endphp

<section class="al_sec_araea how_alls_prgp mt_50">
   <div class="container">
        <h4 class="text-left">Plus you can</h4>
   </div>

    {{-- -------------------------
         IF DYNAMIC AVAILABLE
    -------------------------- --}}
    @if($step4)
    <div class="container how_it_mb">
        <div class="row">

            <!-- TEXT -->
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step4->title }}</h5>
                        {!! $step4->description !!}
                        <div class="sld_btn_als">
                            <a href="{{ $step4->btn_link ?? 'javascript:void(0);' }}">Register Now For FREE !</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-lg-6">
                @if(count($s4_images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/'. $step4->images) }}" class="bg_al_cntxt" alt="">
                    </div>
                @else
                    <div class="owl-carousel owl-theme" id="how_it_scrools4">
                        @foreach($s4_images as $key => $image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/'.$image) }}" class="bg_al_cntxt" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
			</div>

        </div>
    </div>

    {{-- -------------------------
         ELSE STATIC CONTENT
    -------------------------- --}}
    @else
    <div class="container how_it_mb">
        <div class="row">

            <!-- STATIC TEXT -->
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 1</h5>
                        <p>Register or Login to 1CR APP and Post the Tentative Details of the property Purchase. You can use 1CR APP as well.</p>

						<ul>
						 <li>Register or Login to 1CR APP. It's Free For Life. 90% Users don't even need to upgrade.</li>
						 <li>Enter Loan Details, Basic Purchase Price, Possession Charges, Extra Charges & Improvement Charges</li>
						 <li>Enter Gross Monthly Rent, Vacancy Rate, Other Income</li>
						</ul>

						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
                    </div>
                </div>
            </div>

            <!-- STATIC IMAGE -->
			<div class="col-lg-6">
                <div class="mg_sclrr_ss">
				  <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
				</div>
			</div>

        </div>
    </div>
    @endif
</section>

<!--- End Step 1 ---->
@php
    $step5 = HowItWorkModel::where([
        'category' => 2,
        'step' => 2,
        'created_by'=> app('currentAgent')->id
    ])->first();

    $s5_images = [];
    if (!empty($step5?->images)) {
        $s5_images = explode(',', $step5->images);
    }
@endphp

<section class="al_sec_araea how_alls_prgp mt_50p">

    {{-- -------------------------
         IF DYNAMIC AVAILABLE
    -------------------------- --}}
    @if($step5)
    <div class="container how_it_mb">
        <div class="row">

            <!-- IMAGE -->
            <div class="col-lg-6">
                @if(count($s5_images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/'. optional($step5)->images) }}" class="bg_al_cntxt" alt="Step 2 Image" />
                    </div>
                @else
                    <div class="owl-carousel owl-theme" id="how_it_scrools5">
                        @foreach($s5_images as $key => $image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/'.$image) }}" class="bg_al_cntxt" alt="{{ $key }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
			</div>

            <!-- TEXT -->
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step5->title ?? '' }}</h5>
                        <p>{!! $step5->description ?? 'Description not available.' !!}</p>
                        <div class="sld_btn_als">
                            <a href="{{ $step5->btn_link ?? 'javascript:void(0);' }}">Register Now For FREE !</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- -------------------------
         ELSE STATIC CONTENT
    -------------------------- --}}
    @else
    <div class="container how_it_mb">
        <div class="row">

            <!-- STATIC IMAGE -->
            <div class="col-lg-6">
                <div class="mg_sclrr_ss">
                    <img src="https://1crapp.allproject.online/home/img/recapt.jpg" class="bg_al_cntxt" alt="">
                </div>
            </div>

            <!-- STATIC TEXT -->
            <div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 2</h5>
                        <p>Get into the dash board and alleys the property performance and future projection.</p>

                        <ul>
                            <li>Get the Data for Latest year</li>
                            <li>Find the ratios & Return for One year</li>
                            <li>All Graphics and Bar Diagram</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif

</section>

<!--- End Step 2 ---->
@php
    $step6 = HowItWorkModel::where([
        'category' => 2,
        'step' => 3,
        'created_by'=> app('currentAgent')->id
    ])->first();

    $s6_images = [];
    if (!empty($step6?->images)) {
        $s6_images = explode(',', $step6->images);
    }
@endphp

<section class="al_sec_araea how_alls_prgp pb-0 mt_50p">

    {{-- -------------------------
         IF DYNAMIC AVAILABLE
    -------------------------- --}}
    @if($step6)
    <div class="container how_it_mb">
        <div class="row">

            <!-- TEXT -->
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>{{ $step6->title ?? '' }}</h5>
                        <p>{!! $step6->description ?? 'Description not available.' !!}</p>

                        <div class="sld_btn_als">
                            <a href="{{ $step6->btn_link ?? 'javascript:void(0);' }}">
                                Register Now For FREE !
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- IMAGE -->
			<div class="col-lg-6">
                @if(count($s6_images) < 2)
                    <div class="mg_sclrr_ss">
                        <img src="{{ asset('admin/'. optional($step6)->images) }}"
                             class="bg_al_cntxt" alt="Step 6 Image" />
                    </div>
                @else
    				<div class="owl-carousel owl-theme" id="how_it_scrools6">
                        @foreach($s6_images as $key => $image)
                            <div class="item">
                                <div class="mg_sclrr_ss">
                                    <img src="{{ asset('admin/'.$image) }}"
                                         class="bg_al_cntxt" alt="{{ $key }}" />
                                </div>
                            </div>
                        @endforeach
    				</div>
				@endif
			</div>

        </div>
    </div>

    {{-- -------------------------
         ELSE SHOW STATIC CONTENT
    -------------------------- --}}
    @else
    <div class="container how_it_mb">
        <div class="row">

            <!-- STATIC TEXT -->
			<div class="col-lg-6">
                <div class="h_prp_cnt">
                    <div class="medilsss">
                        <h5>Step 3</h5>
                        <p>Register &amp; Login to 1CR APP. You can use 1CR APP as well.</p>

                        <ul>
                            <li>Share the report with your circle to get better feedback.</li>
                            <li>Use the interactive report with dynamic parameters to see the effect on your returns.</li>
                            <li>Compare rental &amp; sold properties in the area with peers to understand performance.</li>
                        </ul>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut elementum elit. Nulla pharetra sem id nisi ornare, eget porta eros vehicula. Morbi vel nisl finibus, porta lacus eget, lobortis enim.</p>
                    </div>
                </div>
            </div>

            <!-- STATIC IMAGE -->
			<div class="col-lg-6">
                <div class="mg_sclrr_ss">
				    <img src="https://1crapp.allproject.online/home/img/recapt.jpg"
                         class="bg_al_cntxt" alt="">
				</div>
			</div>

        </div>
    </div>
    @endif

</section>

<!--- End Step 3 ---->
