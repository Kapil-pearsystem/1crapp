

@extends('layouts.app')



@section('title', 'Edit Customer')



@section('content')




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

        <h1 class="h3 mb-0 text-gray-800">Edit Plan</h1>

        <a href="{{ route('planadd.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>

    </div>

    {{-- Alert Messages --}}

    @include('common.alert')



    <!-- DataTales Example -->

    <div class="card shadow mb-4">



        <form method="POST" action="{{ route('planadd.update',[$plan->id]) }}">

             @csrf

            @method('PUT')

            <div class="card-body">

                <div class="form-group row">

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">

					 <span style="color: red;">*</span>Title

					 <input type="text" id="" placeholder="" name="title" value="{{ $plan->title }}" class="form-control form-control-user" />

					</div>





					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">

					 <span style="color: red;">*</span>Sub Title

					 <input type="" id="" placeholder="" name="sub_title" required value="{{ $plan->sub_title }}" class="form-control form-control-user" />

					</div>



					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">

					 <span style="color: red;">*</span>Monthly Price

					 <input type="text" id="" placeholder="" required name="monthly_price" value="{{ $plan->monthly_price }}" class="form-control form-control-user" />

					</div>



					<!--<div class="col-sm-6 mb-3 mt-3 mb-sm-0">-->

					<!-- <span style="color: red;">*</span>Yearly Price-->

					<!-- <input type="text" id="" placeholder="" required name="yearly_price" value="{{ $plan->yearly_price }}" class="form-control form-control-user" />-->

					<!--</div>-->
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Discount on Quartly Plan (%)
					 <input type="text" id="" maxlength="2" placeholder="Discount" required name="discount" value="{{ $plan->discount }}" class="form-control form-control-user" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
					</div>





					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">

					 <span style="color: red;">*</span>Trial Duration(In Days)

					 <input type="number" id="" placeholder="" required name="trial_duration" value="{{ $plan->trial_duration }}" class="form-control form-control-user" />

					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Priority
					 <input type="number" id="" placeholder="" name="priority" value="{{ $plan->priority }}" class="form-control form-control-user" />
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">

                        <span style="color: red;">*</span>Status

                         <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">

                            <option selected disabled>Select Status</option>

                            <option value="1" {{ (($plan->status == 1) ? 'selected' : '') }}>Active</option>

                            <option value="0" {{  (($plan->status == 0) ? 'selected' : '')}}>Inactive</option>

                        </select>

                        @error('status')

                            <span class="text-danger">{{$message}}</span>

                        @enderror

                    </div>
					<div class="col-sm-2 mb-3 mt-3 mb-sm-0">
						<span class="mt-4">Mail Template</span><br>
						<div class="swich_bntts">
							<label class="switch"><input type="checkbox" id="mail_temp_switch" value="0" @if($plan->mail_temp_status == 1) checked @endif name="mail_temp_status" > <small></small></label>
						</div>
					</div>
					<div class="col-sm-4 mb-3 mt-3 mb-sm-0" id="mail_template_container">
						<span style="color: red;">*</span>Assign no. of template
						<input type="number" id="" placeholder="Assign no. of template" required name="total_mail_temp" value="{{ $plan->total_mail_temp }}" class="form-control form-control-user" />
					</div>
				</div>
				<div class="feature_liststs">
                    <h4 class="mb-3">Features</h4>
                
                    @php
                        $allFeatures = collect($planfeature)->flatten(1);
                    @endphp
                
                    <table class="table table-bordered table-sm feature-table">
                        <tbody>
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
                
                                    @for($i = $chunk->count(); $i < 3; $i++)
                                        <td></td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
			<div class="card-footer">

                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>

                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('planadd.index') }}">Cancel</a>

            </div>

        </form>

    </div>







</div>

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
                $('#mail_temp_switch').val(1); // Show the mail template
            } else {
                $('#mail_template_container').hide(); // Hide the mail template
				$('#mail_temp_switch').val(0);
            }
        }
</script>
@endsection





@endsection