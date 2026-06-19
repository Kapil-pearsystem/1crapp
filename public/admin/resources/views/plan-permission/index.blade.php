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
				
				
				
				
				<div class="feature_liststs">
                    <h4 class="mb-3">Features</h4>					
					<div class="accordion-wrapper">
						<!-- Column 1 -->
						<div class="accordion-box">
							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5z" />
										</svg>
										Admin & Role Management
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Create User</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>

							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M5 4h14v16H5z" />
										</svg>
										CMS
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>CMS Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>


							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M4 4h16v4H4zM4 10h16v4H4zM4 16h16v4H4z" />
										</svg>
										Rewards & Commission
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Rewards Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>

						</div>

                        <!-- Column 2 -->
						<div class="accordion-box">
							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5z" />
										</svg>
										Admin & Role Management
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Mail Management</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>

                            <div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M5 4h14v16H5z" />
										</svg>
									    Management
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Mail Management</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>
							
							
							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M4 4h16v4H4zM4 10h16v4H4zM4 16h16v4H4z" />
										</svg>
										Rewards & Commission
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Rewards Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>
						</div>	

							



						
						<!-- Column 3 -->
						<div class="accordion-box">
						    <div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M4 4h16v3H4zM4 10h16v3H4zM4 16h16v3H4z" />
										</svg>
										Tickets Management
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Tickets Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>
						
						    <div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M7 2h10v20H7z" />
										</svg>
										Appointment Booking
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Appointment Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>
							
							
							<div class="acc-item">
								<div class="acc-head">
									<div class="title">
										<svg class="icon" viewBox="0 0 24 24">
											<path d="M12 2l3 6 6 .8-4.5 4.3 1.1 6.1L12 16l-5.6 3.2 1.1-6.1L3 8.8 9 8z" />
										</svg>
										Website Management
									</div>

									<span class="arrowss">❯</span>

									<label class="switch">
										<input type="checkbox" />
										<span class="slider"></span>
									</label>
								</div>

								<div class="acc-content">
									<div class="sub-item">
										<span>Website Content</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Edit User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>Delete User</span>
										<label class="switch">
											<input type="checkbox" />
											<span class="slider"></span>
										</label>
									</div>

									<div class="sub-item">
										<span>View Reports</span>
										<label class="switch">
											<input type="checkbox" checked />
											<span class="slider"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>	
				
				
				

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


<style>


.accordion-wrapper{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}



.accordion-wrapper .accordion-box{
    width: 32.2%;
    background: #fff;
    border: #0d3e99 solid 2px;
}

.accordion-wrapper .acc-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 15px;
    color: #fff;
    cursor: pointer;
    border-bottom: 1px solid rgb(0 0 0 / 12%);
}
.accordion-wrapper .acc-head span.arrowss {
    font-size: 14px;
    transform: rotate(90deg);
    color: #0e3992;
}

.accordion-wrapper .title{
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
    font-weight: 700;
	    width: 70%;
	color: #0e3992;	
}

.accordion-wrapper .icon{
    width:18px;
    height:18px;
    fill:#0e3992;
}

.accordion-wrapper .acc-content{
    display:none;
    background:#eff2f9;
}

.accordion-wrapper .sub-item{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 15px;
    font-weight: 600;
    color: #0e3992;
    border-top: 1px solid rgb(0 0 0 / 10%);
}

.accordion-wrapper .sub-item span{
    font-size:14px;
}

.accordion-wrapper .switch{
    position:relative;
    width:50px;
    height:24px;
	margin:0;
}

.accordion-wrapper .switch input{
    display:none;
}

.accordion-wrapper .sub-item label.switch {
    width: 45px;
    height: 20px;
}
.accordion-wrapper .sub-item label.switch span.slider:before {
    width: 14px;
    height: 14px;
    top: 3px;
}

.accordion-wrapper .slider{
    position:absolute;
    inset:0;
    background:#ff5b4d;
    border-radius:30px;
    cursor:pointer;
}

.accordion-wrapper .slider:before{
    content:'';
    position:absolute;
    width:18px;
    height:18px;
    left:3px;
    top:3px;
    background:#fff;
    border-radius:50%;
    transition:.3s;
}

.accordion-wrapper .switch input:checked + .slider{
    background:#1fd18b;
}

.accordion-wrapper .switch input:checked + .slider:before{
    transform:translateX(26px);
}

.accordion-wrapper .switch{
    position:relative;
    width:50px;
    height:24px;
}

.accordion-wrapper .switch input{
    display:none;
}

.accordion-wrapper .slider{
    position:absolute;
    inset:0;
    border-radius:30px;
    background:#ff5a4f;
}

.accordion-wrapper .slider:before{
    content:'';
    position:absolute;
    width:18px;
    height:18px;
    left:3px;
    top:3px;
    background:#fff;
    border-radius:50%;
    transition:.3s;
}

.accordion-wrapper .switch input:checked + .slider{
    background:#21d08b;
}

.accordion-wrapper .switch input:checked + .slider:before{
    transform:translateX(26px);
}
</style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function(){

    $(".acc-head").click(function(){

        $(this)
        .next(".acc-content")
        .slideToggle();

    });

});

$(".switch input").change(function(){

    let status =
    $(this).is(":checked")
    ? "Yes"
    : "No";

    $(this)
    .next(".slider")
    .find(".status")
    .text(status);

});
</script>



@endsection