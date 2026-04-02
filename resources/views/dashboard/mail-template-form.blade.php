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
            <h4>Mail Template</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Mail Template</span>
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
                    <form action="{{ route('mail-template.store') }}" method="post" enctype="multipart/form-data">
                        <div class="al_frm_bx">
                            @csrf
                            <h5>Mail Template Information</h5>
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Title<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Template Title" class="inp_araea" name="title" value="{{ isset($details->title) ? $details->title : '' }}" required="" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Celebration Text<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Celebration Text" class="inp_araea" name="celebration_text" value="{{ isset($details->celebration_text) ? $details->celebration_text : '' }}" required="" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Subject<span class="red">*</span></label>
                                        <input type="text" placeholder="Enter Subject" class="inp_araea" name="subject" value="{{ isset($details->subject) ? $details->subject : '' }}" required="" />
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea placeholder="Enter Content" class="txt_araea" name="content">{{ isset($details->content) ? $details->content : '' }}</textarea>
                                        <small id="user_msg"></small>
                                    </div>
                                </div>
                                <!-- FILE INPUT -->
                                <div class="col-lg-6" >
                                    <div class="form-group">
                                        <label>Upload Logo</label>
                                        <input type="file" 
                                            class="inp_araea" 
                                            name="logo" 
                                            accept="image*/"
                                            id="logo">
                                    </div>
                                    @if(isset($details) && !empty($details->logo))
                                        <div class="mt-2">
                                            <img src="{{ asset($details->logo) }}" width="120" style="border-radius:8px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select class="slt_areaa" name="status">
                                            <option value="1" {{ isset($details->status) && $details->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ isset($details->status) && $details->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
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