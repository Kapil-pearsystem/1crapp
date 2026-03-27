@extends('layouts.app')
@section('title', 'Thank You')
@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Business Card with form</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
   </div>
   {{-- Alert Messages --}}
   @include('common.alert')
   <!-- DataTales Example -->
   <div class="card shadow mb-4 business_card_items">
      <div class="businnes_main">
         <h4>Digital Business Card</h4>
         <div class="content_arara">
            <div class="mettre">
                <span class="toll_tops"><i class="fa fa-info-circle"></i></span> Your digital business card share link is: <a href="javascript:void(0);">www.newoaks.ai/ramjee</a> <span class="copy_urlss">Copy your share URL</span></div>
            <div class="row">
               <div class="col-lg-7">
                  <form action="{{ route('business-card.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">* Your Link Name :</span></div>
                           <div class="col-lg-9"><input type="text" name="link_name" value="{{ old('link_name', $business_card->link_name ?? '') }}" class="form-control" placeholder="Enter Name" required="" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">* Personal Photo :</span></div>
                           <div class="col-lg-9"><input type="file" name="photo"   /></div>
                           <input type="hidden" name="old_photo" value="{{ isset($business_card)?base64_encode($business_card->photo):'' }}"/>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">* Name :</span></div>
                           <div class="col-lg-5"><input type="text" name="first_name" value="{{ old('first_name', $business_card->first_name ?? '') }}" class="form-control" placeholder="Enter First Name" required="" /></div>
                           <div class="col-lg-4"><input type="text" name="last_name" value="{{ old('last_name', $business_card->last_name ?? '') }}" class="form-control" placeholder="Enter Last Name" required="" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">* Email ID :</span></div>
                           <div class="col-lg-9"><input type="email" name="email" value="{{ old('email', $business_card->email ?? '') }}" class="form-control" placeholder="Enter Email ID" required="" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Chatbot :</span></div>
                           <div class="col-lg-9">
                              <select class="form-control" name="chatboat">
                                 <option value="1">Digital Ramjee Bot1</option>
                                 <option value="1">Digital Ramjee Bot2</option>
                                 <option value="1">Digital Ramjee Bot3</option>
                                 <option value="1">Digital Ramjee Bot4</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Digital Ramjee Bot :</span></div>
                           <div class="col-lg-9"><input type="text" name="r_bot" value="{{ old('r_bot', $business_card->r_bot ?? '') }}" class="form-control" placeholder="Enter Digital Ramjee Bot" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Organizations :</span></div>
                           <div class="col-lg-9"><input type="text" name="organization" value="{{ old('organization', $business_card->organization ?? '') }}" class="form-control" placeholder="Enter Organizations" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Title :</span></div>
                           <div class="col-lg-9"><input type="text" name="title" value="{{ old('title', $business_card->title ?? '') }}" class="form-control" placeholder="Enter Organizations" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Telephone :</span></div>
                           <div class="col-lg-9"><input type="text" name="telephone" value="{{ old('telephone', $business_card->telephone ?? '') }}" class="form-control" id="mobile_code" placeholder="Enter Phone Number" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Website :</span></div>
                           <div class="col-lg-9"><input type="text" name="website" value="{{ old('website', $business_card->website ?? '') }}" class="form-control" placeholder="Enter Website URL" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Facebook :</span></div>
                           <div class="col-lg-9"><input type="text" name="facebook" value="{{ old('facebook', $business_card->facebook ?? '') }}" class="form-control" placeholder="Enter Facebook URL" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Linkedin :</span></div>
                           <div class="col-lg-9"><input type="text" name="linkedin" value="{{ old('linkedin', $business_card->linkedin ?? '') }}" class="form-control" placeholder="Enter Linkedin URL" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">WhatsApp :</span></div>
                           <div class="col-lg-9"><input type="text" name="whatsapp" value="{{ old('whatsapp', $business_card->whatsapp ?? '') }}" class="form-control" placeholder="Enter WhatsApp URL" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Instagram :</span></div>
                           <div class="col-lg-9"><input type="text" name="instagram" value="{{ old('instagram', $business_card->instagram ?? '') }}" class="form-control" placeholder="Enter Instagram URL" /></div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Twitter :</span></div>
                           <div class="col-lg-9"><input type="text" name="twitter" value="{{ old('twitter', $business_card->twitter ?? '') }}" class="form-control" placeholder="Enter Twitter URL" /></div>
                        </div>
                     </div>
                    <!--- End List Item ---->
                    <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">Country :</span></div>
                           <div class="col-lg-9">
                                <select class="form-control" name="country" id="country_id" onchange="getState(this.value)">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ isset($business_card) && $business_card->country == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     </div>
                        <!--- End List Item ---->
                     <!--- End List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">State/Province :</span></div>
                           <div class="col-lg-9">
                                <select class="form-control" name="state" id="cp-state" onchange="getCity(this.value)">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                     </div>
                        <!--- End List Item ---->
                    <!--- List Item ---->
                    <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">City :</span></div>
                           <div class="col-lg-9">
                                <select class="form-control" name="city" id="cp-city">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                     </div>

                     <!--- End List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">SMS Template :</span></div>
                            <div class="col-lg-9">
                                <textarea name="smstemplate" id="" cols="3" rows="3" class="form-control" placeholder="Enter Message" required="">{{ old('smstemplate', $business_card->smstemplate ?? '') }}</textarea>
                            </div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">&nbsp;</span></div>
                           <div class="col-lg-9">
                                <div class="ck_list_tik">
                                    <p>
                                        <input type="checkbox" id="ck_llst"
                                            @isset($business_card) @if($business_card->scanning_popup == 1) checked @endif @endisset
                                            name="scanning_popup" value="1" />
                                        <label for="ck_llst"> Pop Up Predefined SMS Upon Scanning</label>
                                    </p>

                                    <p>
                                        <input type="checkbox" id="ck_llst1"
                                            @isset($business_card) @if($business_card->contact_popup == 1) checked @endif @endisset
                                            name="contact_popup" value="1" />
                                        <label for="ck_llst1"> Pop Up Predefined SMS Upon Clicking 'Add to Contacts'</label>
                                    </p>
                                </div>

                           </div>
                        </div>
                     </div>
                     <!--- End List Item ---->                            <!--- List Item ---->
                     <div class="form-group">
                        <div class="row">
                           <div class="col-lg-3"><span class="titalss_name">&nbsp;</span></div>
                           <div class="col-lg-9">
                              <div class="sub_miitss"><button type="submit" value="submit">Save & Preview</button></div>
                           </div>
                        </div>
                     </div>
                     <!--- End List Item ---->
                  </form>
               </div>
               <div class="col-lg-5">
                  <div class="user_proff">
                     <div class="user_pickks">
                        <div class="pic_araea">

                            <img class="logo" src="{{ asset('').'/' }}{{ isset($business_card) && $business_card->photo != '' ? $business_card->photo : '' }}" alt="Logo" />                                </div>
                        <h4>{{ @$business_card->first_name.' '.@$business_card->last_name }}</h4>
                        <p>CEO</p>
                        <span>{{ @$business_card->organization }}</span>
                     </div>
                     <div class="user_list">
                        <ul>
                           <li><span class="usr_icoos"><i class="fa fa-user"></i></span><span class="cntents"><a href="javascript:void(0);">Add to Contacts</a></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-phone"></i></span><span class="cntents">{{ @$business_card->telephone }} <span class="und_txss">Phone</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-envelope-o"></i></span><span class="cntents"><a href="mailto:{{ @$business_card->email }}" class="al_linkss">{{ @$business_card->email }}</a> <span class="und_txss">Email</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-globe"></i></span><span class="cntents">{{ @$business_card->website }} <span class="und_txss">Official Website</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-map-marker"></i></span><span class="cntents">{{ @$business_card->city_name }}, {{ @$business_card->state_name }}, {{ @$business_card->country_name }} <span class="und_txss">Address</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-comment-o"></i></span><span class="cntents"><a href="javascript:void(0);" data-toggle="modal" data-target="#chat_mesages">Talk with My AI Assistant</a></span></li>
                        </ul>
                     </div>
                     <div class="social_iconsss">
                        <h6>Connect with me on</h6>
                        <ul>
                           <li><a href="{{ @$business_card?$business_card->facebook:'javascript:void(0);' }}"><i class="fa fa-facebook-square"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->linkedin:'javascript:void(0);' }}"><i class="fa fa-linkedin-square"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->twitter:'javascript:void(0);' }}"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->whatsapp:'javascript:void(0);' }}"><i class="fa fa-whatsapp"></i></a></li>
                           <li><a href="mailto:{{ @$business_card?$business_card->email:'javascript:void(0);' }}"><i class="fa fa-envelope"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->instagram:'javascript:void(0);' }}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<script>
   getcountry();
   function getcountry(callback=null) {
      var URL = '{{url("get-country")}}';
      $.ajax({
          url: URL,
          type: "GET",
          success: function(response) {
              $('#country_id').html(response);
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
   </script>
   <script>
   <?php
      $country = isset($business_card) ? $business_card->country : '';
      $state = isset($business_card) ? $business_card->state : '';
      $city = isset($business_card) ? $business_card->city : '';
    ?>

   getState('<?=$country?>');
   selectState();
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