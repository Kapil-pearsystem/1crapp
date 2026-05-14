@extends('layouts.app')
@section('title', 'Add Business Card')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Business Card</h1>
        <a href="{{ route('business-card.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="{{ route('business-card.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}" />
            <!--- List Item ---->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label>Business Card Name<span style="color: red;">*</span> </label>
                        <input type="text" name="link_name" value="{{ old('link_name', $details->link_name ?? '') }}" class="form-control" placeholder="Enter Name" required="" />
                        @error('link_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Personal Photo @if(!isset($details) && !isset($details->photo)) <span style="color: red;">*</span> @endif</label>
                        <input type="file" name="photo" class="form-control" />
                        <input type="hidden" name="old_photo" value="{{ isset($details)?base64_encode($details->photo):'' }}" />
                        @if(isset($details) && $details->photo != '')
                        <img src="{{ asset($details->photo) }}" width="100" height="100" style="object-fit: cover; border-radius: 5px; margin-top: 10px;" />
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <!--- End List Item ----> <!--- List Item ---->
                        <div class="form-group">
                            <label>First Name<span style="color: red;">*</span> </label>
                            <input type="text" name="first_name" value="{{ old('first_name', $details->first_name ?? '') }}" class="form-control" placeholder="Enter First Name" required="" />
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Last Name<span style="color: red;">*</span> </label>
                        <input type="text" name="last_name" value="{{ old('last_name', $details->last_name ?? '') }}" class="form-control" placeholder="Enter Last Name" required="" />
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Email ID<span style="color: red;">*</span> </label>
                        <input type="email" name="email" value="{{ old('email', $details->email ?? '') }}" class="form-control" placeholder="Enter Email ID" required="" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Designation</label>
                        <input type="text" name="designation" value="{{ old('designation', $details->designation ?? '') }}" class="form-control" placeholder="Enter Designation" />
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label>Chatbot</label>
                        <textarea name="chatboat" id="" class="form-control" placeholder="Enter Chatbot Message">{{ old('chatboat', $details->chatboat ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Chatbot Lable</label>
                        <input type="text" name="r_bot" value="{{ old('r_bot', $details->r_bot ?? '') }}" class="form-control" placeholder="Enter Chatbot Lable" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Organizations :</label>
                        <input type="text" name="organization" value="{{ old('organization', $details->organization ?? '') }}" class="form-control" placeholder="Enter Organizations" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Title :</label>
                        <input type="text" name="title" value="{{ old('title', $details->title ?? '') }}" class="form-control" placeholder="Enter Title" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Telephone :</label>
                        <input type="text" maxLength="12" name="telephone" value="{{ old('telephone', $details->telephone ?? '') }}" class="form-control" id="mobile_code" placeholder="Enter Phone Number" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Website :</label>
                        <input type="url" name="website" value="{{ old('website', $details->website ?? '') }}" class="form-control" placeholder="Enter Website URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Facebook :</label>
                        <input type="url" name="facebook" value="{{ old('facebook', $details->facebook ?? '') }}" class="form-control" placeholder="Enter Facebook URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Linkedin :</label>
                        <input type="url" name="linkedin" value="{{ old('linkedin', $details->linkedin ?? '') }}" class="form-control" placeholder="Enter Linkedin URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>WhatsApp :</label>
                        <input type="url" name="whatsapp" value="{{ old('whatsapp', $details->whatsapp ?? '') }}" class="form-control" placeholder="Enter WhatsApp URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Instagram :</label>
                        <input type="url" name="instagram" value="{{ old('instagram', $details->instagram ?? '') }}" class="form-control" placeholder="Enter Instagram URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Twitter :</label>
                        <input type="url" name="twitter" value="{{ old('twitter', $details->twitter ?? '') }}" class="form-control" placeholder="Enter Twitter URL" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Country :</label>
                        <select class="form-control" name="country" id="country_id" onchange="getState(this.value)">
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ isset($details) && $details->country == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>State/Province :</label>
                        <select class="form-control" name="state" id="cp-state" onchange="getCity(this.value)">
                            <option value="">Select State</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>City :</label>
                        <select class="form-control" name="city" id="cp-city">
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Address</label>
                        <textarea name="address" id="" class="form-control" placeholder="Enter Address" required="">{{ old('address', $details->address ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>SMS Template :</label>
                        <textarea name="smstemplate" id="" cols="3" rows="3" class="form-control" placeholder="Enter Message" required="">{{ old('smstemplate', $details->smstemplate ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <input type="checkbox" id="ck_llst"
                            @isset($details) @if($details->scanning_popup == 1) checked @endif @endisset
                        name="scanning_popup" value="1" />
                        <label for="ck_llst"> Pop Up Predefined SMS Upon Scanning</label>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <input type="checkbox" id="ck_llst1"
                            @isset($details) @if($details->contact_popup == 1) checked @endif @endisset
                        name="contact_popup" value="1" />
                        <label for="ck_llst1"> Pop Up Predefined SMS Upon Clicking 'Add to Contacts'</label>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><b>Layout :</b></label>
                        <div class="mt-2">
                            <!-- None -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="radio"
                                    name="layout"
                                    id="layout_none"
                                    value="0"
                                    {{ old('layout', $details->layout ?? 0) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="layout_none">
                                    None
                                </label>
                            </div>
                            <!-- Default -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="radio"
                                    name="layout"
                                    id="layout_default"
                                    value="1"
                                    {{ old('layout', $details->layout ?? '') == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="layout_default">
                                    Default
                                </label>
                            </div>
                            <!-- Custom -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="radio"
                                    name="layout"
                                    id="layout_custom"
                                    value="2"
                                    {{ old('layout', $details->layout ?? '') == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="layout_custom">
                                    Custom
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--- End List Item ----> <!--- List Item ---->
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('how-it-works.index') }}">Cancel</a>
            </div>
            <!--- End List Item ---->
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const country = "{{ isset($details) ? $details->country : '' }}";
    const state = "{{ isset($details) ? $details->state : '' }}";
    const city = "{{ isset($details) ? $details->city : '' }}";
    if (country != '') {
        getState(country);
    }
    // ================= STATE =================
    async function getState(id) {
        try {
            let response = await $.ajax({
                url: '{{ url("get-state-by-country") }}/' + id,
                type: "GET"
            });
            $('#cp-state').html(response);
            if (state != '') {
                $('#cp-state').val(state);
                await getCity(state);
            }
        } catch (error) {
            console.log(error);
        }
    }
    // ================= CITY =================
    async function getCity(id) {
        try {
            let response = await $.ajax({
                url: '{{ url("get-city-by-state") }}/' + id,
                type: "GET"
            });
            $('#cp-city').html(response);
            if (city != '') {
                $('#cp-city').val(city);
            }
        } catch (error) {
            console.log(error);
        }
    }
    // ================= PAGE LOAD =================
    $(document).ready(function() {
        getcountry();
    });
    // ================= ON CHANGE =================
    $(document).on('change', '#cp-country', async function() {
        let countryId = $(this).val();
        $('#cp-city').html('<option value="">Select City</option>');
        await getState(countryId);
    });
    $(document).on('change', '#cp-state', async function() {
        let stateId = $(this).val();
        await getCity(stateId);
    });
</script>
@endsection