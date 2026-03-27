@include('web.common.header')
@php
    use App\Models\WebSettingModel;
    $setting = WebSettingModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->first();
@endphp
<style>
 
.cont_formmms h3 {margin:0 0 15px; font-size:24px; font-weight:800; color:#0e3992; border-bottom:#0e39923d solid 1px; padding-bottom:15px; position:relative;}
.cont_formmms h3:before {content: ''; position: absolute; bottom: 0; width: 29%; height: 3px; background: #0e39923d;}
</style>
 
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
 
  <div class="midils_contnts">
   <div class="medilss"><h4>Contact Us</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Contact Us</span>
   </div>
  </div>
</section>
 
 
<section class="dash_board_pages">
    <div class="container">
     <div class="row">
    <div class="col-12 col-sm-6">
 
        <div class="cont_formmms">
            @include('front.flash-message')
           <h3>Enquiry Now</h3>
           <form action="{{ route('save-enquiry') }}" method="post" onsubmit="return validate()" name="enfrm">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name <span class="red">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder=""/>
                        <small class="err text-danger" id="nameError">
                            @error('name') {{ $message }} @enderror
                        </small>
                    </div>
                </div>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email ID <span class="red">*</span></label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder=""/>
                        <small class="err text-danger" id="emailError">
                            @error('email') {{ $message }} @enderror
                        </small>
                    </div>
                </div>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mobile No <span class="red">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder=""/>
                        <small class="err text-danger" id="phoneError">
                            @error('phone') {{ $message }} @enderror
                        </small>
                    </div>
                </div>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Message <span class="red">*</span></label>
                        <textarea name="message" cols="6" rows="6" class="form-control" placeholder="">{{ old('message') }}</textarea>
                        <small class="err text-danger" id="messageError">
                            @error('message') {{ $message }} @enderror
                        </small>
                    </div>
                </div>
 
                <div class="col-md-12">
                    <button type="submit" class="btn-submit2">Submit Now</button>
                </div>
            </div>
        </form>
 
        </div>
    </div>
 
    <!-- RIGHT SIDE (Dynamic Contact Info) -->
            <div class="col-12 col-sm-6">
                <div class="adss_areaea">
 
                    <div class="als_listts">
                        <h5>Address</h5>
                        <p><i class="fa fa-map-marker"></i> {!! $setting->address ?? 'Address not available' !!}</p>
                    </div>
 
                    <div class="als_listts">
                        <h5>Phone No</h5>
                        <p><i class="fa fa-phone"></i> {{ $setting->phone ?? 'NA' }}</p>
                    </div>
 
                    <div class="als_listts">
                        <h5>Email ID</h5>
                        <p><i class="fa fa-envelope-o"></i>
                            <a href="mailto:{{ $setting->email ?? '' }}">
                                {{ $setting->email ?? 'NA' }}
                            </a>
                        </p>
                    </div>
 
                </div>
 
                <div class="mapsss">
                    {!! $setting->google_map ?? '' !!}
                </div>
            </div>
 
        </div>
    </div>
</section>
 
 
@include('front.layouts.footer')
<script>
    function validate(){
        var name = document.enfrm.name.value;
        var email = document.enfrm.email.value;
        var phone = document.enfrm.phone.value;
        var message = document.enfrm.message.value;
        var status = true;
        $('.err').html('');
        if(name == ''){
            document.getElementById('nameError').innerHTML = 'Please enter your name';
            status = false;
        }
        if(email == ''){
            document.getElementById('emailError').innerHTML = 'Please enter your email';
            status = false;
        } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            document.getElementById('emailError').innerHTML = 'Please enter a valid email address';
            status = false;
        }
        if(phone == ''){
            document.getElementById('phoneError').innerHTML = 'Please enter your phone';
            status = false;
        }
        if(message == ''){
            document.getElementById('messageError').innerHTML = 'Please enter your message';
            status = false;
        }
        return status;
    }
</script>