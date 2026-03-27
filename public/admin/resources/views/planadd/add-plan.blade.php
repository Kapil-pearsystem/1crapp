@extends('layouts.app')
@section('title', 'Add Plan')
@section('content')
@php 
use App\Models\PlanFeature;
@endphp
<style>
feature_liststs .fea_liststs {
    display: flex;
    width: 45%;
    border-bottom: #e9e9e9 solid 1px;
    padding-bottom: 15px;
    margin-bottom: 15px;
    float: left;
    margin-right: 5%;
}
.feature-table {
    width: 100%;
    margin-bottom: 20px;
}

.feature-table th {
    background: #f8f9fc;
    font-weight: 600;
    font-size: 14px;
}

.feature-table td {
    vertical-align: middle;
    font-size: 13px;
    padding: 8px 10px;
}

.feature-name {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Plan</h1>
        <a href="{{ route('planadd.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('planadd.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Title
					 <input type="text" id="" placeholder="" name="title" value="{{ old('title')}}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Sub Title
					 <input type="" id="" placeholder="" name="sub_title" required value="{{ old('sub_title')}}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Monthly Price
					 <input type="text" id="" placeholder="" required name="monthly_price" value="{{ old('monthly_price')}}" class="form-control form-control-user" />
					</div>
					<!--<div class="col-sm-6 mb-3 mt-3 mb-sm-0">-->
					<!-- <span style="color: red;">*</span>Yearly Price-->
					<!-- <input type="text" id="" placeholder="" required name="yearly_price" value="{{ old('yearly_price')}}" class="form-control form-control-user" />-->
					<!--</div>-->
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Discount (%)
					 <input type="text" id="" maxlength="2" placeholder="Discount" required name="discount" value="{{ old('discount')}}" class="form-control form-control-user" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Trial Duration(In Days)
					 <input type="number" id="" placeholder="" required name="trial_duration" value="{{ old('trial_duration')}}" class="form-control form-control-user" />
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Priority
					 <input type="number" id="" placeholder="" name="priority" value="{{ old('priority')}}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status"required  class="form-control form-control-user">
							<option>Select Status</option>
							<option value="0" selected="selected">Inactive</option>
							<option value="1">Active</option>
						</select>
					</div>
					<div class="col-sm-2 mb-3 mt-3 mb-sm-0">
						<span class="mt-4">Mail Template</span><br>
						<div class="swich_bntts">
							<label class="switch"><input type="checkbox" id="mail_temp_switch" value="1" name="mail_temp_status" > <small></small></label>
						</div>
					</div>
					<div class="col-sm-4 mb-3 mt-3 mb-sm-0" id="mail_template_container">
						<span style="color: red;">*</span>Assign no. of template
						<input type="number" id="" placeholder="Assign no. of template" required name="total_mail_temp" value="{{ old('total_mail_temp','0')}}" class="form-control form-control-user" />
					</div>
				</div>
				<!---- Feature ---->
                <div class="feature_liststs">
                    <h4 class="mb-3">Features</h4>
                
                    <table class="table table-bordered table-sm feature-table">
                        <tbody>
                            @php
                                // Flatten all module features into one list
                                $allFeatures = collect($planfeature)->flatten(1);
                            @endphp
                
                            @foreach($allFeatures->chunk(3) as $chunk)
                                <tr>
                                    @foreach($chunk as $feature)
                                        <td>
                                            <div class="feature-name">
                                                
                                            
                                                <div class="swich_bntts">
                                                    <label class="switch">
                                                        <input
                                                            type="checkbox"
                                                            name="features[]"
                                                            value="{{ $feature['feature_key'] }}"
                                                            {{ in_array($feature['feature_key'], $selectedFeatures ?? []) ? 'checked' : '' }}
                                                        >
                                                        <small></small>
                                                    </label>
                                                    <span style="float: right; margin-right: 10%; text-align:left;">{{ ucwords(str_replace('/', ' >> ', $feature['feature_key'])) }}</span>
                                                </div>
                                            </div>
                                        </td>
                
                                    @endforeach
                
                                    {{-- Fill empty cells to keep 3 columns --}}
                                    @for($i = $chunk->count(); $i < 3; $i++)
                                        <td></td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!---- End Feature ---->
            </div>
			<div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('planadd.index') }}">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection
@section('scripts')
<script>
        toggleMailTemplate();

        // Listen for change on the checkbox
        $('#mail_temp_switch').change(function() {
            toggleMailTemplate();
        });

        function toggleMailTemplate() {
            if ($('#mail_temp_switch').is(':checked')) {
                $('#mail_template_container').show(); // Show the mail template
            } else {
                $('#mail_template_container').hide(); // Hide the mail template
            }
        }
</script>
@endsection