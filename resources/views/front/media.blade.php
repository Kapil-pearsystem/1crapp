<?php
    use App\Models\MediaModel;
 $media = MediaModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('date', 'DESC')->get();          
?>
@include('web.common.header')

<style>
.media_all_pgs {
    margin-bottom: 60px;
}
.media_all_pgs .tp_filtters {
    display: inline-block;
    width: 100%;
	margin-bottom:20px;
}
.media_all_pgs .tp_filtters ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.media_all_pgs .tp_filtters ul li {
    float: left;
    margin-right: 20px;
    font-weight: 700;
    font-size: 17px;
}
.brd_come {
    background: #e9e9e9;
    padding: 5px 10px;
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
    font-size: 15px;
}

.main_lst_parts {
    display: inline-block;
    width: 100%;
}
.main_lst_parts .un_lst_ptsss {
    background: #fff;
    padding: 10px;
    display: inline-block;
    width: 100%;
    box-shadow: 0px 0px 10px #e7e7e7;
	    margin-bottom: 15px;
}

.main_lst_parts .un_lst_ptsss .cnt_us_r_parts {
    display: inline-block;
    width: 100%;
}
.main_lst_parts .un_lst_ptsss .cnt_us_r_parts h6 {
    font-size: 16px;
    line-height: 22px;
    margin: 0 0 10px;
}
.main_lst_parts .un_lst_ptsss .cnt_us_r_parts p {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
}
.main_lst_parts .un_lst_ptsss .cnt_us_r_parts p span{
    float:right;
}
.main_lst_parts .un_lst_ptsss .pats_mgs {
    width: 100%;
    height: 120px;
    overflow: hidden;
    border-radius: 5px;
}
.main_lst_parts .un_lst_ptsss .pats_mgs img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Media</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Media</span>
        </div>
    </div>
</section>


<div class="container mt-5 media_all_pgs">

    <div class="brd_come">
	    Results 1 - {{ count($media) }} of about {{ count($media) }}
	</div>

	<div class="main_lst_parts">

        @forelse($media as $row)
        <div class="un_lst_ptsss">
            <div class="row">

                <!-- Left: Title + Date -->
                <div class="col-lg-4">
                    <div class="cnt_us_r_parts">
                        <h6>{{ $row->title }}</h6>

                        <p>
                            {{ $row->short_description ?? '---' }}
                            <span class="dtss">
                                {{ $row->date ? date('M d, Y', strtotime($row->date)) : '' }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Image -->
                <div class="col-lg-3">
                    <div class="pats_mgs">
                        <img src="{{ $row->image ?? url('home/img/default.png') }}" alt="">
                    </div>
                </div>

                <!-- Description -->
                <div class="col-lg-5">
                    <div class="rd_mors_cnts">
                        {!! Str::limit(strip_tags($row->description), 150) !!}
                    </div>
                </div>

            </div>
        </div>

        @empty
        <p>No Media Found.</p>
        @endforelse

	</div>

</div>

<!-- Video Elements -->
@php
    $video = \App\Models\Cms::where(['slug'=> 'watch-a-demo-below', 'created_by'=> app('currentAgent')->id])->first(); 
   
@endphp

<section class="vedioo" id="bg_grea_all">
    <div class="container">
        <h4>{{ $video->title ?? 'Watch A Demo Below...' }}</h4>
        <div class="video_parts">
            @if($video && !empty($video->image))
                <video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
                    <source src="{{ asset('admin/img/' . $video->image) }}" type="video/mp4" />
                </video>
            @else
                <p>No video available.</p>
            @endif
        </div>
    </div>
</section>
<!-- End Video Elements -->


<!---- Get Started. It's Free ---->
@php
    $getStarted = \App\Models\CalltoActionModel::where(['section'=> 1, 'created_by'=> app('currentAgent')->id])->where('status', 1)->first();
@endphp
@if($getStarted)
<section class="get_nd_blogss mt-0">
 <div class="container">
  <div class="get_strs">
   <h4><a href="{{ $getStarted->left_link_url ?? 'javascript:void(0)' }}" target="{{ $getStarted->left_link_new_tab ? '_blank' : '_self' }}">
                {{ $getStarted->left_link_title }}
            </a></h4>
   <p>{{ $getStarted->title }}</p>
   <p>{{ $getStarted->description }}</p>
  </div>
  </div>
</section>
@endif
<!---- End Get Started. It's Free ---->



<!-- Trusted by over 350,000 professionals worldwide -->

@php
    $freeTrial = \App\Models\CalltoActionModel::where(['section'=> 4, 'created_by'=> app('currentAgent')->id])->where('status', 1)->first();
@endphp
<!-- Trusted by over 350,000 professionals worldwide -->
 @if($freeTrial)
<section class="al_sec_araea str_14">
    <div class="container">
        <div class="free_trailss">
<img src="{{ asset('admin/' . $freeTrial->image) }}" class="mb_not_sh" alt="" style="width: 100%; height: 200px;" />
            <div class="contents_frt">
                <div class="cnt_leftsss">
                    <div class="medilss">
                        <h5>{{ $freeTrial->title }}</h5>
                        <p>{{ $freeTrial->description }}</p>
                    </div>
                </div>
                <div class="bntss_leftsss">
<a href="{{ $freeTrial->left_link_url ?? 'javascript:void(0)' }}"
                       target="{{ $freeTrial->left_link_new_tab ? '_blank' : '_self' }}"
                       class="alluser">
                       {{ $freeTrial->left_link_title ?? 'Sign up for free' }}
                       <img src="{{ url('home/img/arrow_right.svg') }}" alt="→" />
                    </a>                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- End Trusted by over 350,000 professionals worldwide -->

@include('web.pages.what-client-are-saying')


<!---- Get Started. It's Free ---->
@php
    $getStarted = \App\Models\CalltoActionModel::where(['section'=> 1, 'created_by'=> app('currentAgent')->id])->where('status', 1)->first();
@endphp
@if($getStarted)
<section class="get_nd_blogss mt-0">
 <div class="container">
  <div class="get_strs">
   <h4><a href="{{ $getStarted->left_link_url ?? 'javascript:void(0)' }}" target="{{ $getStarted->left_link_new_tab ? '_blank' : '_self' }}">
                {{ $getStarted->left_link_title }}
            </a></h4>
   <p>{{ $getStarted->title }}</p>
   <p>{{ $getStarted->description }}</p>
  </div>
  </div>
</section>
@endif
<!---- End Get Started. It's Free ---->



<!---- Help ---->
@php
        $needhelp = \App\Models\NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
@endphp
<section class="al_sec_araea mt_50p pb-0">
@include('web.pages.need-help')
</section>
<!---- Help ---->


@include('front.layouts.footer')