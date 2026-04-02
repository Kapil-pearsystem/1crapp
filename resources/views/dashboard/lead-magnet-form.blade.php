@include('front.layouts.user-header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
.txt_araea {
  width: 100%;
  padding: 0px 15px;
  height: 100px;
  font-size: 15px;
  border: #0e3992 solid 1px;
  border-radius: 10px;
}
</style>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>Lead Magnet Page</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Lead Magnet Page</span>
   </div>
  </div>
</section>
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
				<div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Create Lead Magnet Page</h3>
                        <a href="{{ route('lead-magnet') }}">
                            <button class="btn btn-primary"><i class="fa fa-eye"></i> View Page</button>
                        </a>
                    </div>
					<div class="binng_araes my_proffs">
                        <form action="{{ route('leadmagnet.store') }}" method="post" enctype="multipart/form-data">
						<div class="al_frm_bx">
								@csrf
								<h5>Page Information</h5>
								@if($errors->any())
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p class="text-danger">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                @if(session('success'))
                                    <p class="text-success">{{ session('success') }} </p>
                                @endif
								<div class="row">
								   <input type="hidden" name="id" value="{{ isset($details->id) ? $details->id : '' }}"/>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Page URL<span class="red">*</span></label>
											<input type="text" placeholder="i.e. useridabc" class="inp_araea" name="page_url" value="{{ isset($details->page_url) ? $details->page_url : '' }}" required=""/>
											<small id="user_msg"></small>
										</div>
                                        
									</div>
									<div class="col-lg-7">
										<div class="form-group">
											<label>Pre Headline<span class="red">*</span></label>
											<input type="text" placeholder="i.e. useridabc" class="inp_araea" name="pre_headline" value="{{ isset($details->pre_headline) ? $details->pre_headline : '' }}" required=""/>
											<small id="user_msg"></small>
										</div>
									</div>
                                    
                                    <div class="col-lg-1 swich_bntts">
                                        <label>Visible</label>
                                        <div class="block_araea">
                                            <label class="switch">
                                                <input type="checkbox" name="pre_headline_visible" @if(isset($details->pre_headline_visible) && $details->pre_headline_visible == 1) checked @endif value="1" />
                                                <small></small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
										<div class="form-group">
											<label>HeadLine<span class="red">*</span></label>
											<input type="text" placeholder="Enter Headline" class="inp_araea" name="headline" value="{{ isset($details->headline) ? $details->headline : '' }}" required=""/>
											<small id="user_msg"></small>
										</div>
									</div>
                                    <div class="col-lg-1 swich_bntts">
                                        <label>Visible</label>
                                        <div class="block_araea">
                                            <label class="switch">
                                                <input type="checkbox" name="headline_visible" value="1" @if(isset($details->headline_visible) && $details->headline_visible == 1) checked @endif/>
                                                <small></small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-11">
										<div class="form-group">
											<label>Post HeadLine</label>
											<textarea placeholder="Enter Headline" class="txt_araea" name="post_headline">{{ isset($details->post_headline) ? $details->post_headline : '' }}</textarea>
											<small id="user_msg"></small>
										</div>
									</div>
                                    <div class="col-lg-1 swich_bntts">
                                        <label>Visible</label>
                                        <div class="block_araea">
                                            <label class="switch">
                                                <input type="checkbox" name="post_headline_visible" value="1" @if(isset($details->post_headline_visible) && $details->post_headline_visible == 1) checked @endif/>
                                                <small></small>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    
									
								</div>
							
						</div>
						<div class="al_frm_bx" id="company-section">
                            <div class="row">
                                <div class="col-lg-10"><h5>Bullets</h5></div>
                                <div class="col-lg-2 swich_bntts" style="float:right !important;">
                                    <label>Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="bullet_status" value="1" @if(isset($details->bullet_status) && $details->bullet_status == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php for($i = 1; $i <= 6; $i++){?>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Bullet {{ $i }}</label>
                                            <input type="text" placeholder="Enter Bullet {{ $i }}" class="inp_araea"  name="bullet{{ $i }}" value="{{ isset($details->{'bullet'.$i}) ? $details->{'bullet'.$i} : '' }}" />
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
						</div>
						<div class="al_frm_bx">
                            <h5>Media & Countdown</h5>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Media Type</label>
                                        <select name="media_type" class="slt_areaa" onchange="setMediaInput(this.value)">
                                            <option value="">Select</option>
                                            <option value="video" {{ (isset($details->media_type) && $details->media_type == 'video') ? 'selected' : '' }}>Video</option>
                                            <option value="image" {{ (isset($details->media_type) && $details->media_type == 'image') ? 'selected' : '' }}>Image</option>
                                            <option value="link"  {{ (isset($details->media_type) && $details->media_type == 'link') ? 'selected' : '' }}>Embed Link</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- LINK INPUT -->
                                <div class="col-lg-5" id="media_link" style="display:none;">
                                    <div class="form-group">
                                        <label>Media URL</label>
                                        <input type="text" 
                                            class="inp_araea" 
                                            name="media_path" 
                                            value="{{ isset($details->media_path) ? $details->media_path : '' }}">
                                    </div>
                                    @if(isset($details->media_path) && !empty($details->media_path))
                                        <div class="mt-2">
                                            {{-- ✅ IMAGE --}}
                                            @if(($details->media_type ?? '') == 'image' && !empty($details->media_path))
                                                <img src="{{ asset($details->media_path) }}" width="120" style="border-radius:8px;">

                                            {{-- ✅ VIDEO --}}
                                            @elseif(($details->media_type ?? '') == 'video' && !empty($details->media_path))
                                                <video width="200" controls style="border-radius:8px;">
                                                    <source src="{{ asset($details->media_path) }}">
                                                    Your browser does not support video.
                                                </video>

                                            {{-- ✅ LINK (YouTube / Embed) --}}
                                            @elseif(($details->media_type ?? '') == 'link' && !empty($details->media_path))
                                                <iframe 
                                                    width="250" 
                                                    height="140" 
                                                    src="{{ $details->media_path }}" 
                                                    frameborder="0" 
                                                    allowfullscreen
                                                    style="border-radius:8px;">
                                                </iframe>
                                            @endif

                                        </div>

                                    @endif
                                </div>

                                <!-- FILE INPUT -->
                                <div class="col-lg-5" id="media_upload" >
                                    <div class="form-group">
                                        <label>Upload </label>
                                        <input type="file" 
                                            class="inp_araea" 
                                            name="media_path" 
                                            id="media_file">
                                    </div>
                                    @if(isset($details->media_path) && !empty($details->media_path))
                                        <div class="mt-2">
                                            {{-- ✅ IMAGE --}}
                                            @if(($details->media_type ?? '') == 'image' && !empty($details->media_path))
                                                <img src="{{ asset($details->media_path) }}" width="120" style="border-radius:8px;">

                                            {{-- ✅ VIDEO --}}
                                            @elseif(($details->media_type ?? '') == 'video' && !empty($details->media_path))
                                                <video width="200" controls style="border-radius:8px;">
                                                    <source src="{{ asset($details->media_path) }}">
                                                    Your browser does not support video.
                                                </video>

                                            {{-- ✅ LINK (YouTube / Embed) --}}
                                            @elseif(($details->media_type ?? '') == 'link' && !empty($details->media_path))
                                                <iframe 
                                                    width="250" 
                                                    height="140" 
                                                    src="{{ $details->media_path }}" 
                                                    frameborder="0" 
                                                    allowfullscreen
                                                    style="border-radius:8px;">
                                                </iframe>
                                            @endif

                                        </div>

                                    @endif
                                </div>
                                <div class="col-lg-2 swich_bntts">
                                    <label>Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="media_visible" value="1" @if(isset($details->media_visible) && $details->media_visible == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Countdown Time Select Date And Time<span class="red">*</span></label>
                                        <input 
                                            type="text" 
                                            id="countdown_datetime"
                                            placeholder="Select Date & Time" 
                                            class="inp_araea" 
                                            name="countdown_datetime" 
                                            value="{{ old('countdown_datetime', isset($details->countdown_datetime) ? $details->countdown_datetime : '') }}" 
                                            required
                                        />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-2 swich_bntts">
                                    <label>Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="countdown_visible" value="1" @if(isset($details->countdown_visible) && $details->countdown_visible == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
						</div>
                        
						<div class="al_frm_bx" id="password-section">
                            <h5>Pre & Post CTA</h5>
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label>Pre CTA Text</label>
                                        <input type="text" placeholder="Enter Pre CTA Text" class="inp_araea" name="pre_cta" value="{{ isset($details->pre_cta) ? $details->pre_cta : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-1 swich_bntts">
                                    <label>Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="pre_cta_visible" value="1" @if(isset($details->pre_cta_visible) && $details->pre_cta_visible == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label>Post CTA Text</label>
                                        <input type="text" placeholder="Enter Post CTA Text" class="inp_araea" name="ps_text" value="{{ isset($details->ps_text) ? $details->ps_text : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-1 swich_bntts">
                                    <label>Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="ps_text_visible" value="1" @if(isset($details->ps_text_visible) && $details->ps_text_visible == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
						</div>
                        <div class="al_frm_bx" id="password-section">
                            <h5>Popup Section</h5>
                            <div class="row">
                                <div class="col-lg-2 swich_bntts">
                                    <label>Popup Enable</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="popup_enable" value="1" onclick="setPopupForm(this.value)" @if(isset($details->popup_enable) && $details->popup_enable == 1) checked @endif />
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-8 disable_popup">
                                    <div class="form-group">
                                        <label>Page CTA URL</label>
                                        <input type="text" placeholder="Enter Page CTA URL" class="inp_araea" name="page_cta_url" value="{{ isset($details->page_cta_url) ? $details->page_cta_url : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-2 swich_bntts disable_popup">
                                    <label>New Tab</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="page_new_tab" value="1" @if(isset($details->page_new_tab) && $details->page_new_tab == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 enable_popup" style="display:none;">
                                    <div class="form-group">
                                        <label>Popup Type </label>
                                        <select class="slt_areaa" name="popup_type">
                                            <option value="1" {{ isset($details->popup_type) && $details->popup_type == 1 ? 'selected' : '' }}>Custom Form</option>
                                            <option value="2" {{ isset($details->popup_type) && $details->popup_type == 2 ? 'selected' : '' }}>Embeded Code</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 enable_popup custom-form" style="display:none;">
                                    <div class="form-group">
                                        <label>Custom Form</label>
                                        <select class="slt_areaa" name="custom_form_id">
                                           <option value="{{ $custom_form->id ?? '' }}"
                                                {{ (isset($details) && $custom_form->id == $details->custom_form_id) ? 'selected' : '' }}>
                                                {{ $custom_form->title ?? '' }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 enable_popup embed-code" style="display:none;">
                                    <div class="form-group">
                                        <label>Embed Code</label>
                                        <textarea placeholder="Enter Embed Code" class="txt_araea" name="form_embed_code">{{ isset($details->form_embed_code) ? $details->form_embed_code : '' }}</textarea>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12 swich_bntts">
                                    <label>CTA Title</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter CTA Title" class="inp_araea" name="cta_title" value="{{ isset($details->cta_title) ? $details->cta_title : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12 swich_bntts">
                                    <label>CTA Sub Title</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter CTA Sub Title" class="inp_araea" name="cta_sub_title" value="{{ isset($details->cta_sub_title) ? $details->cta_sub_title : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="al_frm_bx" id="password-section">
                            <h5>Company Details</h5>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Enter Company Name" class="inp_araea" name="company_name" value="{{ isset($details->company_name) ? $details->company_name : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Email</label>
                                        <input type="email" placeholder="Enter Company Email" class="inp_araea" name="company_email" value="{{ isset($details->company_email) ? $details->company_email : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Phone</label>
                                        <input type="text" minLength="6" maxLength="12" placeholder="Enter Company Phone" class="inp_araea" name="company_phone" value="{{ isset($details->company_phone) ? $details->company_phone : '' }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <input type="text" placeholder="Enter Company Address" class="inp_araea" name="company_address" value="{{ isset($details->company_address) ? $details->company_address : '' }}" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Website</label>
                                        <input type="url" placeholder="Enter Company Website" class="inp_araea" name="company_website" value="{{ isset($details->company_website) ? $details->company_website : '' }}" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                 <!-- FILE INPUT -->
                                <div class="col-lg-6" >
                                    <div class="form-group">
                                        <label>Upload </label>
                                        <input type="file" 
                                            class="inp_araea" 
                                            name="company_logo" 
                                            accept="image*/"
                                            id="company_logo">
                                    </div>
                                    @if(isset($details) && !empty($details->company_logo))
                                        <div class="mt-2">
                                            <img src="{{ asset($details->company_logo) }}" width="120" style="border-radius:8px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="al_frm_bx" id="password-section">
                            <h5>Your Lead Magnet Branding and Color</h5>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Header & Footer Background, countdown icon tick color & Download Arrow</label>
                                        <input type="color" placeholder="Choose Header & Footer Background, countdown icon tick color & Download Arrow" class="inp_araea" name="header_footer_bg_color" value="{{ isset($details->header_footer_bg_color) ? $details->header_footer_bg_color : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Button background Color</label>
                                        <input type="color" placeholder="Choose Button background Color" class="inp_araea" name="button_bg_color" value="{{ isset($details->button_bg_color) ? $details->button_bg_color : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Header & Footer Text Color</label>
                                        <input type="color" placeholder="Choose Header & Footer Text Color" class="inp_araea" name="header_footer_text_color" value="{{ isset($details->header_footer_text_color) ? $details->header_footer_text_color : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Button Text Color</label>
                                        <input type="color" placeholder="Choose Button Text Color" class="inp_araea" name="button_text_color" value="{{ isset($details->button_text_color) ? $details->button_text_color : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="al_frm_bx" id="password-section">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Public Type</label>
                                        <select class="slt_areaa" name="public_type">
                                            <option value="pre-login" {{ isset($details->public_type) && $details->public_type == 'pre-login' ? 'selected' : '' }}>Pre Login</option>
                                            <option value="post-login" {{ isset($details->public_type) && $details->public_type == 'post-login' ? 'selected' : '' }}>Post Login</option>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="col-lg-2 swich_bntts">
                                    <label>Is Public</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="is_public" value="1" @if(isset($details->is_public) && $details->is_public == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lnk_s_bntt ">
                            <button type="submit" value="submit" class="bntss blue_bg">Save</button>
                        </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</section>
@include('front.layouts.footer')<script>
document.addEventListener("DOMContentLoaded", function () {

    const popupCheckbox = document.querySelector('input[name="popup_enable"]');
    const popupType = document.querySelector('select[name="popup_type"]');

    const enablePopupDivs = document.querySelectorAll('.enable_popup');
    const disablePopupDivs = document.querySelectorAll('.disable_popup');

    const customFormDiv = document.querySelector('.custom-form');
    const embedCodeDiv = document.querySelector('.embed-code');

    // ✅ Toggle popup enable/disable
    function togglePopup() {
        if (popupCheckbox.checked) {

            enablePopupDivs.forEach(el => el.style.display = 'block');
            disablePopupDivs.forEach(el => el.style.display = 'none');

            // 🔥 Only run type logic when enabled
            togglePopupType();

        } else {

            enablePopupDivs.forEach(el => el.style.display = 'none');
            disablePopupDivs.forEach(el => el.style.display = 'block');

            // 🔥 Hide both when disabled
            customFormDiv.style.display = 'none';
            embedCodeDiv.style.display = 'none';
        }
    }

    // ✅ Toggle popup type
    function togglePopupType() {

        // ❗ Do nothing if popup disabled
        if (!popupCheckbox.checked) return;

        let type = popupType.value;

        if (type == "1") {
            customFormDiv.style.display = 'block';
            embedCodeDiv.style.display = 'none';
        } else if (type == "2") {
            customFormDiv.style.display = 'none';
            embedCodeDiv.style.display = 'block';
        }
    }

    // ✅ Events
    popupCheckbox.addEventListener('change', togglePopup);
    popupType.addEventListener('change', togglePopupType);

    // ✅ INIT
    togglePopup();
});
</script>
<script>
flatpickr("#countdown_datetime", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: true,
    minDate: "today", // optional (disable past dates)
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let mediaType = document.querySelector('select[name="media_type"]').value;
        setMediaInput(mediaType);
    });
function setMediaInput(type) {

    let linkBox   = document.getElementById('media_link');
    let uploadBox = document.getElementById('media_upload');
    let fileInput = document.getElementById('media_file');

    // Reset
    linkBox.style.display = 'none';
    uploadBox.style.display = 'none';

    if(type === 'link'){
        linkBox.style.display = 'block';
    }

    if(type === 'image'){
        uploadBox.style.display = 'block';
        fileInput.setAttribute('accept', 'image/*');
    }

    if(type === 'video'){
        uploadBox.style.display = 'block';
        fileInput.setAttribute('accept', 'video/*');
    }
}
</script>
<script>

	function copyReferralLink() {
		// alert('hello')
    // Get the referral link input element
    var copyText = document.getElementById("referral_link");

    // Copy the text inside the input to the clipboard using the clipboard API
    navigator.clipboard.writeText(copyText.value).then(function() {
        // Change button text and color after copying
        var copyButton = document.getElementById("copyButton");
        copyButton.textContent = "Copied!";
        copyButton.style.backgroundColor = "green";
        copyButton.style.color = "white";

        // Optional: Reset button text and color after 3 seconds

    }).catch(function(error) {
        console.error("Failed to copy text: ", error);
    });
}

</script>
<script>
	getcountry();
	function getcountry(callback=null) {
    var URL = '{{url("get-country")}}';
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-country').html(response);
			selectCountry();
            if(callback){
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    return 1;
}
function getState(id, callback=null) {
    var URL = '{{url("get-state-by-country")}}/'+id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-state').html(response);
            if(callback){
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getCity(id, callback=null) {
    var URL = '{{url("get-city-by-state")}}/'+id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-city').html(response);
            if(callback){

                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    return 1;
}

<?php
$country = isset($details->country) ? $details->country : '';
$state = isset($details->state) ? $details->state : '';
$city = isset($details->city) ? $details->city : '';

?>
function selectCountry() {
    let element = document.getElementById('cp-country');
    element.value = '<?=$country?>';

    getState('<?=$country?>', function() {
        selectState();

        });
}
function selectState() {
    // alert(<?=$state?>);
    let element = document.getElementById('cp-state');
    element.value = '<?=$state?>';
    getCity('<?=$state?>', function() {
        selectCity();
        });
}
function selectCity() {
    let element = document.getElementById('cp-city');
    element.value = '<?=$city?>';
}

</script>
<script>
	function copyInfo1() {
    // Get the values of the input fields
    var user_name = document.getElementById('username').value.trim();
    var email = document.getElementById('email').value.trim();
    var package = document.getElementById('package').value.trim();
    var first_name = document.getElementById('first_name').value.trim();
    var middle_name = document.getElementById('middle_name').value.trim();
    var last_name = document.getElementById('last_name').value.trim();
    var phone_number = document.getElementById('mobile_code').value.trim();
    var official_email = document.getElementById('official_email').value.trim();
    var personal_website = document.getElementById('personal_website').value.trim();

    // Concatenate the values (you can customize the format)
    var allValues = "User Name: " + user_name + "\nEmail: " + email +
                    "\nPackage: " + (package ? package + " " : "NA") +
                    "\nName: " + first_name + " " + (middle_name ? middle_name + " " : "") + last_name +
					"\nPhone: " + phone_number +
					"\nOfficial Email: " + (official_email ? official_email + " " : "NA") +
					"\nPersonal Website: " + (personal_website ? personal_website + " " : "NA")
					;

    // Log concatenated values for debugging
    // console.log("Concatenated Info:", allValues);

    // Create a temporary textarea to copy the values
    var tempTextarea = document.createElement('textarea');
    tempTextarea.value = allValues;
    document.body.appendChild(tempTextarea);

    // Select and copy the text
    tempTextarea.select();
    document.execCommand("copy");

    // Remove the temporary textarea
    document.body.removeChild(tempTextarea);

    // Optionally, display a message that the text was copied
    var messageElement = document.getElementById('copyMessage');
    if (messageElement) {
        messageElement.style.display = 'block';
        setTimeout(function() {
            messageElement.style.display = 'none';
        }, 2000); // Hide the message after 2 seconds
    }
	// After copying, change the class, icon, and text
	var copyLink = document.getElementById('copy_info_id1');
    copyLink.className = 'bg-success'; // Change class to bg-success
    copyLink.innerHTML = '<i class="fa fa-check"></i> Copied'; // Change icon and text

    // Optionally, reset the text back after a delay
    setTimeout(function() {
        copyLink.className = ''; // Reset class if needed
        copyLink.innerHTML = '<i class="fa fa-files-o"></i> Copy Address'; // Reset icon and text
    }, 20000); // Reset after 2 seconds
}


</script>
<script>
	function copyInfo2() {

    // Get the values of the input fields
    var first_name2 = document.getElementById('first_name2').value.trim();
    var middle_name2 = document.getElementById('middle_name2').value.trim();
    var last_name2 = document.getElementById('last_name2').value.trim();
    var cp_country = document.getElementById('cp-country');
	var country = cp_country.options[cp_country.selectedIndex].text.trim();
    var cp_state = document.getElementById('cp-state');
	var state = cp_state.options[cp_state.selectedIndex].text.trim();
    var cp_city = document.getElementById('cp-city');
	var city = cp_city.options[cp_city.selectedIndex].text.trim();
    var address = document.getElementById('address').value.trim();
    var zip = document.getElementById('zip').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var dob = document.getElementById('dob').value.trim();
    var spouse_dob = document.getElementById('spouse_dob').value.trim();
    var anniversary = document.getElementById('anniversary').value.trim();
    var no_of_childrens = document.getElementById('no_of_childrens').value.trim();
    var cp_worked_in = document.getElementById('worked_in');
	var worked_in = cp_worked_in.options[cp_worked_in.selectedIndex].text.trim();


    // Concatenate the values (you can customize the format)
    var allValues = "\nName: " + first_name2 + " " + (middle_name2 ? middle_name2 + " " : "") + last_name2 +
					"\nCountry: " + country +
					"\nState: " + state +
					"\nCity: " + city +
					"\nAddress: " + address +
					"\nZIP Postal Code: " + zip +
					"\nPhone: " + phone +
					"\nDate Of Birth " +
					"\nSelf: " + dob +
					"\nSpouse: " + spouse_dob +
					"\nAnniversary: " + anniversary +
					"\nNo. Of Childrens: " + no_of_childrens +
					"\nWorked In: " + worked_in
					;

    // Log concatenated values for debugging
    // console.log("Concatenated Info:", allValues);

    // Create a temporary textarea to copy the values
    var tempTextarea = document.createElement('textarea');
    tempTextarea.value = allValues;
    document.body.appendChild(tempTextarea);

    // Select and copy the text
    tempTextarea.select();
    document.execCommand("copy");

    // Remove the temporary textarea
    document.body.removeChild(tempTextarea);

    // Optionally, display a message that the text was copied
    var messageElement = document.getElementById('copyMessage');
    if (messageElement) {
        messageElement.style.display = 'block';
        setTimeout(function() {
            messageElement.style.display = 'none';
        }, 2000); // Hide the message after 2 seconds
    }

	// After copying, change the class, icon, and text
    var copyLink = document.getElementById('copy_info_id2');
    copyLink.className = 'bg-success'; // Change class to bg-success
    copyLink.innerHTML = '<i class="fa fa-check"></i> Copied'; // Change icon and text

    // Optionally, reset the text back after a delay
    setTimeout(function() {
        copyLink.className = ''; // Reset class if needed
        copyLink.innerHTML = '<i class="fa fa-files-o"></i> Copy Address'; // Reset icon and text
    }, 20000); // Reset after 2 seconds
}


</script>




@if(session('password-success'))
    <script>
		// alert('success');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('company-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('password-success-message').innerHTML='{{ session('password-success') }}';
        });
    </script>
@endif
@if(session('password-error'))
    <script>
		// alert('error');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('company-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('password-error-message').innerHTML='{{ session('password-error') }}';
        });
    </script>
@endif
@if(session('company-success'))
    <script>
		// alert('error');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('dob-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('company-success-message').innerHTML='{{ session('company-success') }}';
        });
    </script>
@endif
@if(session('company-error'))
    <script>
		// alert('error');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('dob-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('company-error-message').innerHTML='{{ session('company-error') }}';
        });
    </script>
@endif
@if(session('social-success'))
    <script>
		// alert('error');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('password-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('social-success-message').innerHTML='{{ session('social-success') }}';
        });
    </script>
@endif
@if(session('social-error'))
    <script>
		// alert('error');
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('password-section').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('social-error-message').innerHTML='{{ session('social-error') }}';
        });
    </script>
@endif
<script>
    function checkUserName() {
        let username = $('#username').val();
		let usrlnth = username.length;
		if(usrlnth<4){
			$('#user_msg').text('Username must be at least 4 characters long.').css('color', 'red');
		}else{
			$.ajax({
				url: '{{url("check-username")}}',
				type: "POST",
				data: {
					username: username
					// _token: '{{ csrf_token() }}' // Add the CSRF token
				},
				success: function(response) {
					if(response.status === true) {
						$('#user_msg').text('Username is available.').css('color', 'green');
					} else if(response.status === false) {
						$('#user_msg').text('Username already in use.').css('color', 'red');
					} else {
						$('#user_msg').text('Username does not exist.').css('color', 'red');
					}
				},
				error: function(error) {
					console.log(error);
				}
			});
		}
    }

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    var input = document.querySelector(".country_code");
    var iti = window.intlTelInput(input, {
        separateDialCode: true, // Shows the country code separately
        initialCountry: "in", // Automatically detects the user's country
        geoIpLookup: function(callback) {
            fetch('https://ipinfo.io/json', { headers: { 'Accept': 'application/json' }})
                .then((resp) => resp.json())
                .then((resp) => {
                    var countryCode = (resp && resp.country) ? resp.country : "in"; // Default to India ("in")
                    callback(countryCode.toLowerCase());
                })
                .catch(() => callback("in")); // Fallback to India ("in") if GeoIP fails
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Get full number on form submission
    $('form').submit(function() {
        var fullNumber = iti.getNumber();
        $('.country_code').val(fullNumber); // Replace field value with the full number
    });
</script>




