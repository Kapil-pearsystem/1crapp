@php 
    use App\Models\BannerModel;
    $banners = BannerModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
@endphp
<section class="bnr_al_bg" style="background: url('home/img/sld_imgss.png') no-repeat; background-size: cover;">
 <div class="container">
  <div class="owl-carousel owl-theme" id="slidersss">
    @foreach($banners as $banner)
    <div class="item">
       <div class="md_cntectss">
            <h3>{{ $banner->title }}</h3>
            <p>{{ $banner->description }}</p>
            <div class="btn_newsss">
            <a href="{{ $banner->start_free_trial_link??'#' }}" class="bl_drks"  @if($banner->start_link_new_tab == 1) target="_blank" @endif>Start free trial</a>
            <a href="{{ $banner->talk_to_expert_link??'#' }}" @if($banner->talk_to_expert_link_new_tab == 1) target="_blank" @endif>Talk to an expert</a>
            </div>
	   </div>
	   <div class="lft_mg_araes">
	        <img src="{{ ASSETS_PATH.$banner->left_image }}" alt="" />
	   </div>

	   <div class="rgt_mg_araes">
	        <img src="{{ ASSETS_PATH.$banner->right_image }}" alt="" />
	   </div>
    </div>
    @endforeach
  </div>
 </div>
</section>