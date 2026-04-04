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
        <div class="medilss">
            <h4>Popup Form</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Popup form</span>
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
                <div class="binng_araes my_proffs">
                    <form action="{{ route('popup-form.store') }}" method="post" enctype="multipart/form-data">
                        <div class="al_frm_bx">
                            @csrf
                            <h5>Popup Form Information</h5>
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
                                <input type="hidden" name="id" value="{{ isset($details->id) ? $details->id : '' }}" />
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Form Name<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Form Name" class="inp_araea" name="title" value="{{ isset($details->title) ? $details->title : '' }}" required="" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Form Source<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Form Source" class="inp_araea" name="form_source" value="{{ isset($details->form_source) ? $details->form_source : '' }}" required="" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Mail Template </label>
                                        <select class="slt_areaa" name="mail_temp_id">
                                           <option value="{{ $mailtemp->id ?? '' }}"
                                                {{ (isset($details) && $mailtemp->id == $details->mail_temp_id) ? 'selected' : '' }}>
                                                {{ $mailtemp->title ?? '' }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 swich_bntts">
                                    <label>Contact Field Enabled</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="contact_field" value="1" @if(isset($details->contact_field) && $details->contact_field == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 swich_bntts">
                                    <label>Message Field Enabled</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="msg_field" value="1" @if(isset($details->msg_field) && $details->msg_field == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea placeholder="Enter Content" class="txt_araea" name="content">{{ isset($details->content) ? $details->content : '' }}</textarea>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Thankyou page CTA Text</label>
                                        <input type="text" placeholder="Enter CTA Text" class="inp_araea" name="thankyou_cta_text" value="{{ isset($details->thankyou_cta_text) ? $details->thankyou_cta_text : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Thankyou page CTA Link</label>
                                        <input type="url" placeholder="Enter CTA Link" class="inp_araea" name="thankyou_cta_link" value="{{ isset($details->thankyou_cta_link) ? $details->thankyou_cta_link : '' }}"/>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Thankyou Message</label>
                                        <textarea placeholder="Enter Content" class="txt_araea" name="thankyou_message">{{ isset($details->thankyou_message) ? $details->thankyou_message : '' }}</textarea>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <!-- FILE INPUT -->
                                <div class="col-lg-5" >
                                    <div class="form-group">
                                        <label>Popup Image/Video </label>
                                        <input type="file" 
                                            class="inp_araea" 
                                            name="file_path" 
                                            accept="image/*,video/*"
                                            id="logo">
                                    </div>
                                    @if(isset($details) && !empty($details->file_path))
                                        <div class="mt-2">
                                            @php
                                                $file = $details->file_path;
                                                $ext = pathinfo($file, PATHINFO_EXTENSION);
                                            @endphp

                                            @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp']))
                                                <!-- Image Preview -->
                                                <img src="{{ asset($file) }}" width="120" style="border-radius:8px;">
                                            @elseif(in_array(strtolower($ext), ['mp4','webm','ogg']))
                                                <!-- Video Preview -->
                                                <video width="200" controls style="border-radius:8px;">
                                                    <source src="{{ asset($file) }}">
                                                    Your browser does not support video.
                                                </video>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="col-lg-1 swich_bntts">
                                    <label>Image Visible</label>
                                    <div class="block_araea">
                                        <label class="switch">
                                            <input type="checkbox" name="image_visible" value="1" @if(isset($details->image_visible) && $details->image_visible == 1) checked @endif/>
                                            <small></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Button CTA Text<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Button CTA Text" class="inp_araea" name="cta_btn_text" value="{{ isset($details->cta_btn_text) ? $details->cta_btn_text : '' }}" required="" />
                                        <small id="user_msg"></small>
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
@include('front.layouts.footer')