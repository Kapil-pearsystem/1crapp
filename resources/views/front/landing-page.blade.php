@php
use App\Models\LandingBannerModel;
use App\Models\LandingBannerImageModel;
use App\Models\LandingLocationModel;

// Fetch active banner
$banner = LandingBannerModel::with('images')
            ->where(['status'=> 1, 'created_by'=> app('currentAgent')->id])
            ->orderBy('launch_date', 'desc')
            ->first();

// Fetch active locations
$locations = LandingLocationModel::where(['status'=> 1, 'created_by'=> app('currentAgent')->id])->get();
@endphp

@include('web.common.header')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/css/lightgallery.min.css'>

<!-- Form Modal -->
<div id="sub_m_al_frms" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Best Deals Ending Soon.!</h4>
            </div>
            <div class="modal-body">
                <div class="frm_al_suprtsss">
                    <form action="">
                        <div class="form-group marges_ic">
                            <i class="fa fa-user"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="First Name" required="" />
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-envelope"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="Enail ID" required="" />
                        </div>
                        <div class="form-group marges_ic">
                            <i class="fa fa-building"></i>
                            <select class="slt_al_arra">
                                <option value="">Select Company / Organisation</option>
                            </select>
                        </div>

                        <div class="form-group marges_ic">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="" value="" class="form-control" placeholder="Contact No" required="" />
                        </div>

                        <div class="form-group marges_ic">
                            <i class="fa fa-sitemap"></i>
                            <select class="slt_al_arra">
                                <option value="">Request For</option>
                            </select>
                        </div>

                        <div class="form-group marges_ic">
                            <i class="fa fa-server"></i>
                            <textarea name="" id="" cols="3" rows="3" class="form-control" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" value="Submit Now" class="btn-submit2">Yes Wisit To Apply Now!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form Modal -->

<div id="landing_page">   

<!---- Banner Area ---->
<section class="bnr_al_bg">
 <div class="container">
  <div class="top_bgr_bith_ara">
   <div class="sm_logo">
    <a href="javascript:void(0);">
        <img class="logo" src="{{ url('home/img/logo 1.png') }}" alt="Logo" />
    </a>
   </div>
   <div class="bg_logo_araea">
    <h3>{{ $banner->title ?? 'Boost Your Business Profits' }}</h3>
    <p>{{ $banner->subtitle ?? 'Using Our 360 Virtual Tours' }}</p>
   </div>
   <div class="sm_logo">
    <a href="javascript:void(0);">
        <img class="logo" src="{{ url('home/img/logo 1.png') }}" alt="Logo" />
    </a>
   </div>
  </div>
 </div>
 
 <div class="container">
  <div class="owl-carousel owl-theme" id="slidersss">
    @if($banner && $banner->images)
        @foreach($banner->images as $img)
        <div class="item">
            <img src="{{ $img->image_url }}" alt="Banner Image" />
        </div>
        @endforeach
    @else
        <div class="item">
            <img src="{{ url('home/img/pro_perty_bg.jpg') }}" alt="Default Banner" />
        </div>
    @endif
  </div>
  
  <div class="row mt-5 mb-5">
   <div class="col-lg-3">
    <div class="lun_box">
        <p>Launch: {{ $banner->launch_date ? \Carbon\Carbon::parse($banner->launch_date)->format('M Y') : 'TBA' }}</p>
        <p>Exp Poss: {{ $banner->expiry_date ? \Carbon\Carbon::parse($banner->expiry_date)->format('M Y') : 'TBA' }}</p>
    </div>
   </div>
   
   <div class="col-lg-6">
    <div class="plyss">
        <h5>Promo Video</h5>
        @if($banner && $banner->promo_video_url)
            <a href="{{ $banner->promo_video_url }}" class="al_btn_show" target="_blank">
                {{ $banner->cta_button_text ?? "YES! I'm Ready For Rapid Growth" }}
            </a>
        @else
            <a href="javascript:void(0);" class="al_btn_show">
                {{ $banner->cta_button_text ?? "YES! I'm Ready For Rapid Growth" }}
            </a>
        @endif
    </div>
   </div>
   
   <div class="col-lg-3">
    <div class="lun_box">
        <p>REPA : {{ $banner->repa_number ?? 'TBA' }}</p>
        <p><a href="javascript:void(0);">Cross Check</a></p>
    </div>
   </div>
  </div>
  
 </div>
</section>
<!---- End Banner Area ---->

<!---- Location Area ---->
<section class="al_sec_araea mt_50p lc_ar_paert">
 <div class="container">
  <div class="row">
   @forelse($locations as $loc)
   <div class="col-lg-2 col-6">
    <div class="lk_bokss_als">
        <h6><img src="{{ $loc->image }}" alt="{{ $loc->title }}" /></h6>
        <h5>{{ $loc->title }}</h5>
        <p>{!! $loc->description !!}</p>
    </div>
   </div>
   @empty
   <div class="col-12 text-center">
       <p>No locations found.</p>
   </div>
   @endforelse
  </div>
 </div>
</section>
<!---- Location Area ---->

  
  
<!-- TOP MENU -->
<section class="landing_tbdss">
    <div class="container">
        <div class="als_pg_bntss">
            <div class="tab-wrapper">
                <ul class="tabs">
                    <li class="tab-link active frt_araas" data-tab="1"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></li>
                    <li class="tab-link" data-tab="2">Walk Through</li>
                    <li class="tab-link" data-tab="3">Location</li>
                    <li class="tab-link" data-tab="4">Projects Features</li>
                    <li class="tab-link" data-tab="5">Site Plan</li>
                    <li class="tab-link" data-tab="6">Floor Plan</li>
                    <li class="tab-link" data-tab="7">Amenities</li>
                    <li class="tab-link" data-tab="8">Gallary</li>
                    <li class="tab-link" data-tab="9">Payment Plan</li>
                    <li class="tab-link" data-tab="10">Testimonial</li>
                    <li class="tab-link n_btn_sc_a_v" data-tab="11" data-toggle="modal" data-target="#sub_m_al_frms">Schedule a Visit</li>
                </ul>
            </div>
  
			
            <div class="content-wrapper">
			    <!---- About Us Area ---->
                <div id="tab-1" class="tab-content active">
                    <div class="bgr_area">
                        <div class="container">
						 <div class="row">
						  <div class="col-lg-6">
						   <div class="you_tb_arra">
							  <iframe width="100%" height="350" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							 </div>
						  </div>
						  <div class="col-lg-6">
						   <div class="abt_cont_arrars mb_top_spass">
							 <h4>About Builder:</h4>			 
							 <p class="add-read-more show-less-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
						   </div>
						  </div>
						 </div>
						
						  
						</div>
					</div>
				</div>	
			    <!---- End About Us Area ---->
			
			    <!-- Walk Through -->
                <div id="tab-2" class="tab-content">
                    <div class="bgr_area">
                        <div class="container">
						   <div class="part_heddings">Project walkthrough/Video/Virtual Tour</div>
                           <div class="row">
						    <div class="col-lg-8">
							 <div class="you_tb_arra">
							  <iframe width="100%" height="450" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							 </div>
							</div>
						    <div class="col-lg-4">
							 <div class="frm_al_suprtsss">
							  <div class="frm_titless">
							   <h4>Best Deals Ending Soon.!</h4>
							   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							  </div>
							  <form action="">
							   <div class="form-group marges_ic">
							    <i class="fa fa-user"></i>
								<input type="text" name="" value="" class="form-control" placeholder="First Name" required="">
							   </div>
							   <div class="form-group marges_ic">
							    <i class="fa fa-envelope"></i>
								<input type="text" name="" value="" class="form-control" placeholder="Enail ID" required="">
							   </div>
							   <div class="form-group marges_ic">
							    <i class="fa fa-building"></i>
								<select class="slt_al_arra">
								 <option value="">Select Company / Organisation</option>
								</select>
							   </div>
							   
							   <div class="form-group marges_ic">
							    <i class="fa fa-phone"></i>
								<input type="text" name="" value="" class="form-control" placeholder="Contact No" required="">
							   </div>
							   
							   <div class="form-group marges_ic">
							    <i class="fa fa-sitemap"></i>
								<select class="slt_al_arra">
								 <option value="">Request For</option>
								</select>
							   </div>
							   
							   <div class="form-group marges_ic">
							    <i class="fa fa-server"></i>
								<textarea name="" id="" cols="3" rows="3" class="form-control" placeholder="Message" required=""></textarea>
							   </div>
							   
							   <div class="form-group">
							    <button type="submit" value="Submit Now" class="btn-submit2">Yes Wisit To Apply Now!</button>
							   </div>
							   
							  </form> 
							 
							 </div>
							</div>
						   </div>
					   </div>                    
					</div>
                </div>
				<!-- End Walk Through -->
				
				<!-- Project Location -->
                <div id="tab-3" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Project Location</div>
						   
						   
						   <div class="owl-carousel owl-theme" id="three_stapss_1">
							    <!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
							  </div>
						
						   
						   
						   
						   
						   <div class="cnt_loc_al_suprt">
						    <div class="part_heddings">Location Advantages</div>
							<ul>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
							</ul>
						   </div>
					   </div>                    
					</div>
				</div>
				<!-- End Project Location -->
				
				<!-- Project Highlights/Key Features -->
                <div id="tab-4" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Project Highlights/Key Features</div>
						   <div class="row">
						    <!--- Item List --->
						    <div class="col-lg-4">
							 <div class="cnt_loc_al_suprt ful_arars">
							  <ul>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							  </ul>
						     </div>
							</div>
							<!--- End Item List --->
							
						    <!--- Item List --->
						    <div class="col-lg-4">
							 <div class="cnt_loc_al_suprt ful_arars">
							  <ul>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							  </ul>
						     </div>
							</div>
							<!--- End Item List --->
							
						    <!--- Item List --->
						    <div class="col-lg-4">
							 <div class="cnt_loc_al_suprt ful_arars">
							  <ul>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							   <li><img src="{{ url('home/img/tik_rt.png')}}" alt="" class="rt_tikss_ic" /> Lorem Ipsum is simply dummy text of. </li>
							  </ul>
						     </div>
							</div>
							<!--- End Item List --->
						   </div>
						   
						   
						   
					   </div>                    
					</div>
				</div>
				<!-- End Project Highlights/Key Features -->
				
				<!-- Project Site Plan -->
                <div id="tab-5" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Project Site Plan</div>
						   
						    <div class="owl-carousel owl-theme" id="three_stapss_2">
							    <!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
							  </div>

						   
						</div>                    
					</div>
				</div>
				<!-- End Project Site Plan -->
				
				<!-- Project Site Plan -->
                <div id="tab-6" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Project/Property Floor Plan</div>
						   
						      <div class="owl-carousel owl-theme" id="three_stapss">
							    <!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <h5>2 BHK-1150 SQ Feet, Type-A</h5>
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <h5>3 BHK-1180 SQ Feet</h5>
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <h5>150 Villa, Ground Floor</h5>
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
							  </div>
						
						</div>                    
					</div>
				</div>
				<!-- End Project/Property Floor Plan -->
				
				<!-- Amenities Available -->
                <div id="tab-7" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Amenities Available</div>
						   <div class="ami_t_listst">
						    <ul>
							 <li><img src="{{ url('home/img/power_icon.png')}}" alt="" /> Power Back Up</li>
							 <li><img src="{{ url('home/img/lift_up_icon.png')}}" alt="" /> Lift</li>
							 <li><img src="{{ url('home/img/water_rain_icon.png')}}" alt="" /> Rain Water Harvesting</li>
							 <li><img src="{{ url('home/img/power_icon.png')}}" alt="" /> Power Back Up</li>
							 <li><img src="{{ url('home/img/lift_up_icon.png')}}" alt="" /> Lift</li>
							 <li><img src="{{ url('home/img/water_rain_icon.png')}}" alt="" /> Rain Water Harvesting</li>
							 <li><img src="{{ url('home/img/power_icon.png')}}" alt="" /> Power Back Up</li>
							 <li><img src="{{ url('home/img/lift_up_icon.png')}}" alt="" /> Lift</li>
							 <li><img src="{{ url('home/img/water_rain_icon.png')}}" alt="" /> Rain Water Harvesting</li>
							 <li><img src="{{ url('home/img/power_icon.png')}}" alt="" /> Power Back Up</li>
							 <li><img src="{{ url('home/img/lift_up_icon.png')}}" alt="" /> Lift</li>
							 <li><img src="{{ url('home/img/water_rain_icon.png')}}" alt="" /> Rain Water Harvesting</li>
							</ul>
						   </div>
						</div>                    
					</div>
				</div>
				<!-- End Amenities Available -->
				
				<!-- Gallary Construction Update -->
                <div id="tab-8" class="tab-content">
				  <div class="bgr_area">
					<div class="container">
						<div class="part_heddings">Gallary Construction Update <span class="lst_tades">Last Update: 20th July 2023</span></div>
						<div id="thm_glrry">
							<div id="aniimated-thumbnials" class="slider-for">
								<a href="{{ url('home/img/pro_perty_bg.jpg')}}"><img src="{{ url('home/img/pro_perty_bg.jpg')}}" /></a>
								<a href="{{ url('home/img/pro_perty_bg.jpg')}}"><img src="{{ url('home/img/pro_perty_bg.jpg')}}" /></a>
								<a href="{{ url('home/img/pro_perty_bg.jpg')}}"><img src="{{ url('home/img/pro_perty_bg.jpg')}}" /></a>
								<a href="{{ url('home/img/pro_perty_bg.jpg')}}"><img src="{{ url('home/img/pro_perty_bg.jpg')}}" /></a>
							</div>
							<div class="slider-nav">
								<div class="item-slick">
									<img src="{{ url('home/img/pro_perty_bg.jpg')}}" alt="Alt" />
								</div>
								<div class="item-slick">
									<img src="{{ url('home/img/pro_perty_bg.jpg')}}" alt="Alt" />
								</div>
								<div class="item-slick">
									<img src="{{ url('home/img/pro_perty_bg.jpg')}}" alt="Alt" />
								</div>
								<div class="item-slick">
									<img src="{{ url('home/img/pro_perty_bg.jpg')}}" alt="Alt" />
								</div>
							</div>
						</div>
					</div>
			 	 </div>
				</div>
				<!-- End Gallary Construction Update -->
				
				<!-- Price List & Payment Plan -->
                <div id="tab-9" class="tab-content">
				   <div class="bgr_area">
                        <div class="container">
                           <div class="part_heddings">Price List & Payment Plan  <span class="lst_tades">Effect From : 01st December 2023</span></div>
						   
						      <div class="owl-carousel owl-theme" id="twoss_stapss">
							    <!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <h5>Price List</h5>
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
								
								<!--- Itam List ---->
								<div class="item">
								 <div class="pro_al_suprt">
								  <h5>Payment Plan</h5>
								  <div class="pro_mgs"><img src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></div>
								  <p data-toggle="modal" data-target="#sub_m_al_frms">Download <i class="fa fa-file-pdf-o"></i></p>
								 </div>
								</div>
								<!--- End Itam List ---->
							  </div>
						
						</div>                    
					</div>
				</div>
				<!-- End Price List & Payment Plan -->
								
				<!-- What clients are saying about our 1cr app -->
                <div id="tab-10" class="tab-content">
				 <div class="bgr_area">
                        <div class="container" id="testimnlls">
                           <div class="al_sec_araea testy_bx">
							<div class="testi_bgr">
								<h4>What clients are saying about our 1cr app</h4>
							</div>
							<div class="al_text_box">
								<div class="container">
									<div class="owl-carousel owl-theme" id="testimonials">
										<div class="item">
											<div class="it_emms">
												<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
												<h3>Mr. Amit Kumar Yadav</h3>
												<p class="mb-0"><strong>Designation, Company</strong></p>
												<p><strong>Location</strong></p>
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="revisss">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="w_numbber">
												 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
												 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
												</div>
												<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
											</div>
										</div>

										<div class="item">
											<div class="it_emms">
												<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
												<h3>Mr. Amit Kumar Yadav</h3>
												<p class="mb-0"><strong>Designation, Company</strong></p>
												<p><strong>Location</strong></p>
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="revisss">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="w_numbber">
												 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
												 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
												</div>
												<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
											</div>
										</div>

										<div class="item">
											<div class="it_emms">
												<div class="usr_mgss"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
												<h3>Mr. Amit Kumar Yadav</h3>
												<p class="mb-0"><strong>Designation, Company</strong></p>
												<p><strong>Location</strong></p>
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="revisss">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="w_numbber">
												 <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0">
												 <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
												</div>
												<div class="snd_btnns"><a href="javascript:void(0);"><i class="fa fa-play-circle-o"></i> Watch Video</a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					   
					   </div>                    
					</div>
				</div>
				<!-- End What clients are saying about our 1cr app -->
				
	
				<!---- Book Now ---->
				 <div class="bk_sec_area mt-5">
				  <div class="get_strs">			   
				   <p>Still Want To Know More?</p>
				   <p>Schedule A Call Below.</p>
				   <h4><a href="javascript:void(0);">Book Now</a></h4>
				  </div>
				 </div>
			    <!---- End Book Now ---->
            </div>
        </div>
    </div>
</section>
<!-- END TOP MENU -->



</div>

@include('front.layouts.footer')


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/js/lightgallery-all.min.js'></script>
<script>
 $(function() {
  $('#aniimated-thumbnials').lightGallery({
    thumbnail: true,
  });
// Card's slider
  var $carousel = $('.slider-for');

  $carousel
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      adaptiveHeight: true,
      asNavFor: '.slider-nav'
    });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    variableWidth: true
  });


});
</script>
<script>
 $(document).ready(function(){
     function AddReadMore() {
      //This limit you can set after how much characters you want to show Read More.
      var carLmt = 600;
      // Text to show when text is collapsed
      var readMoreTxt = " ...Read More";
      // Text to show when text is expanded
      var readLessTxt = " Read Less";


      //Traverse all selectors with this class and manupulate HTML part to show Read More
      $(".add-read-more").each(function () {
         if ($(this).find(".first-section").length)
            return;

         var allstr = $(this).text();
         if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
         }
      });

      //Read More and Read Less Click Event binding
      $(document).on("click", ".read-more,.read-less", function () {
         $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
      });
   }

   AddReadMore();
});
</script>