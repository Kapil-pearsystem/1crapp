
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Property Market</h1>
        <a href="{{ route('propertymarket.propertymarketlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="{{ route('propertymarket.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($property)?$property->id:'' }}"/>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					    <span style="color: red;">*</span>Property category 
    					 <select name="property_category" required class="form-control form-control-user" onchange="getTypes(this.value)">
                             <option value="">Select category</option>
                             @foreach($category as $cat)
                                <option value="{{ $cat->id }}" @if(old('property_category', isset($property)?$property->property_category:'') == $cat->id) selected @endif> {{ $cat->title }} </option>
                             @endforeach
                        </select>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					    <span style="color: red;">*</span>Property Type 
    					 <select name="property_type" required class="form-control form-control-user"  id="property_type">
                             <option value="">Select Type</option>
                        </select>
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Property Name
					 <input type="text" id="" placeholder="" name="property" value="{{ old('property',isset($property)?$property->property:'') }}" class="form-control form-control-user" />
					</div>
				    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Project/Builder Name
					 <input type="text" id="" placeholder="" required name="project_name" value="{{ old('project_name',isset($property)?$property->project_name:'') }}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-4 mb-3 mt-3 mb-sm-0">
					    <span style="color: red;">*</span>Country 
                        <select class="form-control form-control-user" id="cp-country" name="country"  onchange="getState(this.value)">
                            <option value="">NA</option>
                        </select>
                    </div>

                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>State
                        <select class="form-control form-control-user" id="cp-state" name="state"  onchange="getCity(this.value)">
                            <option value="">NA</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>City 
                        <select class="form-control form-control-user" name="city" id="cp-city">
                            <option value="">NA</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Units Type: 
                        <select class="form-control form-control-user" name="property_unit" id="cp-city">
                            <option value="">NA</option>
                            @for($i=1; $i<=5; $i++)
                            	<option value="{{ $i }}" @if(old('property_unit',isset($details)?$details->property_unit:'') == $i) selected   @endif >{{ $i }} BHK</option>
                            @endfor
                        </select>
                    </div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Owner Name 
					 <input type="" id="" placeholder="" name="owner_name" required value="{{ old('owner_name',isset($property)?$property->owner_name:'') }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Owner Belongs
					 <input type="text" id="" placeholder="" required name="owner_belong" value="{{ old('owner_belong',isset($property)?$property->owner_belong:'') }}" class="form-control form-control-user" />
					</div>
					
					
					
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Location
					 <input type="text" id="" placeholder="" required name="location" value="{{ old('location',isset($property)?$property->location:'') }}" class="form-control form-control-user" />
					</div>
					
				 
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Feedback
					 <input type="text" id="" placeholder="" required name="feedback" value="{{ old('feedback',isset($property)?$property->feedback:'') }}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Sailing Price From
					 <input type="text" id="" placeholder="" required name="price_from" value="{{ old('price_from',isset($property)?$property->price_from:'') }}" class="form-control form-control-user" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Sailing Price To
					 <input type="text" id="" placeholder="" required name="price_to" value="{{ old('price_to',isset($property)?$property->price_to:'') }}" class="form-control form-control-user" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Current Status
					 <input type="text" id="" placeholder="" required name="current_status" value="{{ old('current_status',isset($property)?$property->current_status:'') }}" class="form-control form-control-user" />
					</div>
					
			 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Posted BY
						<select name="posted_by"required  class="form-control form-control-user">
							<option>Select Status</option>
							<option value="Agent" @if(old('posted_by',isset($property)?$property->project_name:'') == 'Agent' || old('posted_by') == '') selected   @endif >Agent</option>
							<option value="Owner" @if(old('posted_by',isset($property)?$property->project_name:'') == 'Owner' ) selected @endif >Owner</option>
						</select>
					</div>
    				<div class="col-12">
        				<div class="row" id="fileRows">
        				    <div class="col-12">
        				        <div class="mt-3">
        				            
                                    <button type="button" class="btn btn-sm btn-success" id="addMoreBtn" style="float:right;">Add More</button>
                                </div>
                            </div>
                            @if(isset($details))
                            @foreach($prop_images as $p_img)
                            
                            <div class="col-12 row fileRow">
                                <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                    <span style="color: red;">*</span> File Type
                                    <select name="file_type[]" required class="form-control form-control-user fileTypeSelect">
                                        <option value="">Select Type</option>
                                        <option value="images" @if($p_img->type == 'images_image') selected @endif>Images</option>
                                        <option value="video_link" @if($p_img->type == 'video_link') selected @endif>Video Links</option>
                                    </select>
                                </div>
                                @if($p_img->type == 'images_image')
                                    <input type="hidden" name="image_id[]" value="{{ $p_img->id }}">
                                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0 inputContainer">
                                        <span style="color: red;">*</span> Upload
                                        <input type="file" name="images[]" class="form-control form-control-user"  />
                                        <input type="hidden" name="old_images[]" value="{{ $p_img->path }}" class="form-control form-control-user" />
                                        <img src="{{ $p_img->path }}" alt="Logo" height="50" width="50">
                                    </div>
                                @else
                                    <input type="hidden" name="link_id[]" value="{{ $p_img->id }}">
                                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0 inputContainer">
                                        <span style="color: red;">*</span> Upload
                                        <input type="url" name="video_links[]"  value="{{ $p_img->path }}" class="form-control form-control-user" required />
                                    </div>
                                @endif
                                <div class="col-2 text-end">
                                    <button type="button" class="btn btn-danger btn-sm removeRowBtn  mt-4">Remove</button>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-12 row fileRow">
                                <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                    <span style="color: red;">*</span> File Type
                                    <select name="file_type[]" class="form-control form-control-user fileTypeSelect" required>
                                        <option value="">Select Type</option>
                                        <option value="images">Images</option>
                                        <option value="video_link">Video Links</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mt-3 mb-sm-0 inputContainer">
                                    <span style="color: red;">*</span> Upload
                                    <input type="file" name="images[]" class="form-control form-control-user" required />
                                </div>
                                <div class="col-2 text-end">
                                    <button type="button" class="btn btn-danger btn-sm removeRowBtn  mt-4" style="display: none;">Remove</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

			 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status"required  class="form-control form-control-user">
							<option>Select Status</option>
							<option value="0" @if(old('status',isset($property)?$property->status:'') == '0' || old('status') == '') selected  @endif >Inactive</option>
							<option value="1" @if(old('status',isset($property)?$property->status:'') == '1' ) selected  @endif>Active</option>
						</select>
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('propertymarket.propertymarketlist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>
@endsection
@section('scripts')

<script>
   function getTypes(cat){
       var property_type = "{{ isset($property)?$property->property_type:'' }}";
        $.ajax({
            url: '{{ route('property-type.get-by-category') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cat_id: cat,
            },
            success: function (response) {
                if(response.status === true){
                    let options = '<option value="">Select Type</option>';
                    response.data.forEach(function(type){
                        if(property_type == type.id){
                            options += '<option selected value="'+type.id+'">'+type.title+'</option>';
                        }else{
                            options += '<option value="'+type.id+'">'+type.title+'</option>';
                        }
                    });
                    $('#property_type').html(options);
                } else {
                    $('#property_type').html('<option value="">No types found</option>');
                    // alert(response.msg);
                }
            },
            error: function () {
                alert('Something went wrong!');
            }
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
    var country_id = "{{ isset($details)?$details->prop_country:'' }}";
    element.value = country_id;

    getState(country_id, function() {
        selectState();

        });
}
function selectState() {
    // alert(<?=$state?>);
    var state_id = "{{ isset($details)?$details->prop_state:'' }}";
    let element = document.getElementById('cp-state');
    element.value = state_id;
    getCity(state_id, function() {
        selectCity();
        });
}
function selectCity() {
    var city_id = "{{ isset($details)?$details->prop_city:'' }}";
    let element = document.getElementById('cp-city');
    element.value = city_id;
}

</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
   

    // Add more rows
    document.getElementById('addMoreBtn').addEventListener('click', function() {
        let lastRow = document.querySelector('.fileRow:last-of-type');
        let newRow = lastRow.cloneNode(true);

        // Reset selects and inputs
        newRow.querySelector('.fileTypeSelect').value = '';
        newRow.querySelector('.inputContainer').innerHTML = `
            <span style="color: red;">*</span> Upload
            <input type="file" name="images[]" class="form-control form-control-user" required />
        `;

        // Show remove button
        newRow.querySelector('.removeRowBtn').style.display = 'inline-block';

        document.getElementById('fileRows').appendChild(newRow);
        fileIndex++;
    });

    // Handle type change
    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('fileTypeSelect')) {
            let container = e.target.closest('.fileRow').querySelector('.inputContainer');
            let selectedType = e.target.value;

            if(selectedType === 'video_link') {
                container.innerHTML = `
                    <span style="color: red;">*</span> Video Link
                    <input type="url" name="video_links[]" class="form-control form-control-user" required placeholder="Enter video URL" />
                `;
            } else if(selectedType === 'images') {
                container.innerHTML = `
                    <span style="color: red;">*</span> Upload
                    <input type="file" name="images[]" class="form-control form-control-user" required />
                `;
            }
        }
    });

    // Remove row
    document.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('removeRowBtn')) {
            e.preventDefault();
            let row = e.target.closest('.fileRow');
            row.remove();
        }
    });
});
</script>


<script>
var property_category = "{{ isset($property)?$property->property_category:'' }}";
if(property_category){
    getTypes(property_category);
}

$('.inputContainer input[type="file"]').on('change', function() {
    // alert('hello');
    $(this).closest('.inputContainer').find('input[name="old_images[]"]').val('');
});

</script>
@endsection
