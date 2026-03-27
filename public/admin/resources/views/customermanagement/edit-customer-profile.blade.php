

<style>
.profiles_areaa_data_usr {
    display: inline-block;
    width: 100%;
}
.profiles_areaa_data_usr .usr_mg_both {
    max-width: 100%;
    margin: 0 auto;
    width: auto;
    display: table;
}
.profiles_areaa_data_usr .usr_mg_both .usr_mgss {
    width: 60px;
    height: 60px;
    overflow: hidden;
    float: left;
    border-radius: 100px;
    border: #ccc solid 1px;
    margin-right: 10px;
}
.profiles_areaa_data_usr .usr_mg_both .usr_mgss img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.profiles_areaa_data_usr .usr_mg_both .ur_cntentss {
    height: 100%;
    float: left;
    width: auto;
    padding-top: 5px;
}
.profiles_areaa_data_usr .usr_mg_both .ur_cntentss h3 {
    font-size: 20px;
    margin:0 0 2px;
    font-weight: 600;
    color: #000;
}
.profiles_areaa_data_usr .usr_mg_both .ur_cntentss p {
    font-size: 15px;
    margin: 0px;
    font-weight:500;
    color: #333;
}
.profiles_areaa_data_usr .mn_bnt_list {
    display: inline-block;
    width: 100%;
	margin-top:15px;
	margin-bottom:0px;
}
.profiles_areaa_data_usr .mn_bnt_list ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.profiles_areaa_data_usr .mn_bnt_list ul li {
    float: left;
    width: 20%;
    text-align: center;
}
.profiles_areaa_data_usr .mn_bnt_list ul li a {
    background: #ebebeb;
    display: block;
    padding: 5px 0;
    color: #000;
    font-weight: 600;
    font-size: 15px;
}
.profiles_areaa_data_usr .mn_bnt_list ul li {
    float: left;
    width: 20%;
    text-align: center;
    border: #dfdfdf solid 1px;
}
.profiles_areaa_data_usr .usr_per_contctss {
    border: #ebebeb solid 1px;
    padding: 15px;
    text-align: center;
}
.profiles_areaa_data_usr .usr_per_contctss h4 {
    font-size: 20px;
    font-weight: 700;
    color: #000;
    margin: 0 0 5px;
}
.profiles_areaa_data_usr .usr_per_contctss p {
    font-size: 15px;
    font-weight:500;
    color: #000;
    margin: 0px;
}
.profiles_areaa_data_usr .usr_per_contctss .btn_cn_sav {
    margin-top: 10px;
}
.profiles_areaa_data_usr .usr_per_contctss .btn_cn_sav a.cnl {
    display: inline-block;
    border: #ccc solid 1px;
    padding: 5px 20px;
    border-radius: 25px;
    color: #333;
    font-size: 14px;
    font-weight: 600;
    margin-right: 10px;
}

.profiles_areaa_data_usr .usr_per_contctss .btn_cn_sav a.sav {
    display: inline-block;
    border: #f94554 solid 1px;
    padding: 5px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    background: #f94554;
}
</style>



@extends('layouts.app')
@section('title', 'Edit Customer Profile')
@section('content')
<div class="container-fluid"><div class="al_bx_mng_araea">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Customer Profile</h1>
        <a href="{{ route('customer.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i aria-hidden="true" class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
	
	<div class="profiles_areaa_data_usr">
	 <div class="usr_mg_both">
	  <div class="usr_mgss"><img src="https://1cradmin.allproject.online/admin/img/logo.png" alt="" /></div>
	  <div class="ur_cntentss">
	   <div class="middles">
	    <h3>Mr. Ramraj Meena</h3>
	    <p>Created on 23 Sep. 2024</p>
	   </div>
	  </div>
	 </div>
	 <div class="mn_bnt_list">
	  <ul>
	   <li><a href="javascript:void(0);">All Message</a></li>
	   <li><a href="javascript:void(0);">Send Gift/Email</a></li>
	   <li><a href="javascript:void(0);">Appointments</a></li>
	   <li><a href="javascript:void(0);">Transactions</a></li>
	   <li><a href="javascript:void(0);">Subscription</a></li>
	  </ul>
	 </div>
	 
	 <div class="usr_per_contctss">
	   <h4>Contact Information</h4>
       <p>Personal and Additional Contact Details</p>
	   <div class="btn_cn_sav">
	    <a href="javascript:void(0);" class="cnl">Cancel</a>
	    <a href="javascript:void(0);" class="sav">Save</a>
	   </div>
	 </div>	 
	</div>
	
    <!---- User Information ----->
    <div class="card shadow mb-4 bg_sky_clr">
        <div class="card-header py-3 bg_sky_clr">
            <h6 class="m-0 font-weight-bold text-primary">Edit Customer Information</h6>
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
        </div>
        <form method="POST" action="{{ route('customer.update-customer-details') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" id="customer_id" value="{{ @$customer->customer_id }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <div class="copy_btnns">
                            <a href="javascript:void(0);" class="float-right" onclick="copyInfo1()" id="copy_info_id1"><i class="fa fa-files-o"></i> Copy Info</a>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Customer ID
                        <input type="text" id="username" placeholder="Customer ID" name="user_name" value="{{ @$customer->user_name }}" class="form-control form-control-user" onkeyup="javascript:checkUserName()" required="" />
                        <small id="user_msg"></small>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Customer Email
                        <input type="text" id="email" placeholder="Agent Email" name="email" value="{{ @$customer->email }}" class="form-control form-control-user" required="" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Agent Package
                        <input type="text" id="package" placeholder="Agent Package" name="package" value="{{ @$customer->package}}" class="form-control form-control-user" readonly />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Fist Name
                        <input type="text" id="first_name" placeholder="Fist Name" name="first_name" value="{{ @$customer->first_name}}" class="form-control form-control-user" required="" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Middle Name
                        <input type="text" id="middle_name" placeholder="Middle Name" name="middle_name" value="{{ @$customer->middle_name}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Last Name
                        <input type="text" id="last_name" placeholder="Last Name" name="last_name" value="{{ @$customer->last_name}}" required="required" class="form-control form-control-user"/>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Phone
                        <input type="text" id="mobile_code" placeholder="Phone" name="mobile" value="{{ @$customer->mobile }}" required="required" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Official Email
                        <input type="text" id="official_email" placeholder="Official Email" name="official_email" value="{{ @$customer->official_email}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Personal Website
                        <input type="text" id="personal_website" placeholder="Personal Website" name="personal_website" value="{{ @$customer->personal_website}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">Tags</label>
                        <select class="form-control form-control-user" name="tag_id" id="tag_id">
                            <option value="">Select</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" <?php if($customer->tag_id == $tag->id){ echo 'selected'; } ?>>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">List</label>
                        <select class="form-control form-control-user" name="contact_id" id="contact_id">
                            <option value="">Select</option>
                            @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}" <?php if($customer->contact_id == $contact->id){ echo 'selected'; } ?>>{{ $contact->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">Status</label>
                        <select class="form-control form-control-user" name="status" id="status">
                            <option value="">Select</option>
                            <option value="0" <?php if($customer->customer_status == 0){ echo 'selected'; } ?>>Inactive</option>
                            <option value="1" <?php if($customer->customer_status == 1){ echo 'selected'; } ?>>Active</option>
                        </select>
                    </div>
                    <!-- -------------------------------------------user address------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <div class="copy_btnns">
                            <a href="javascript:void(0);" class="float-right mt-4" onclick="copyInfo2()" id="copy_info_id2"><i class="fa fa-files-o"></i> Copy Address</a>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Fist Name
                        <input type="text" id="first_name2" placeholder="Fist Name"  value="{{ @$customer->first_name}}" readonly class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Middle Name
                        <input type="text" id="middle_name2" placeholder="Middle Name"  value="{{ @$customer->middle_name}}" readonly class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Last Name
                        <input type="text" id="last_name2" placeholder="Last Name"  value="{{ @$customer->last_name}}" readonly class="form-control form-control-user"/>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label>Country</label>
                        <select class="form-control form-control-user" id="cp-country" name="country"  onchange="getState(this.value)">
                            <option value="">NA</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label>State/Region:</label>
                        <select class="form-control form-control-user" id="cp-state" name="state"  onchange="getCity(this.value)">
                            <option value="">NA</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label>City</label>
                        <select class="form-control form-control-user" name="city" id="cp-city">
                            <option value="">NA</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Sector/ Street No. / Address:
                        <input type="text" id="address" placeholder="User Address" name="address" value="{{ @$customer->address}}"  class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        ZIP Postal Code:
                        <input type="text" id="zip" placeholder="User Address" name="zip" value="{{ @$customer->zip}}"  class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Phone
                        <input type="text" id="phone" placeholder="Phone" name="phone" value="{{ @$customer->phone }}" required="required" class="form-control form-control-user" />
                    </div>
                    <!-- <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Work
                        <select name="work" class="form-control form-control-user">
							<option selected="selected">Work</option>
						</select>
                    </div> -->
                </div>
                <div class="form-group row"  id="dob-section">
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
					  <div class="hd_titalss">
					    <label>&nbsp;</label>
                        Date Of Birth
					  </div>
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        Self
                        <input type="date" id="dob" placeholder="Self" name="dob" value="{{ @$customer->dob}}"  class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        Spouse
                        <input type="date" id="spouse_dob" placeholder="Spouse" name="spouse_dob" value="{{ @$customer->spouse_dob}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        Anniversary
                        <input type="date" id="anniversary" placeholder="Anniversary" name="anniversary" value="{{ @$customer->anniversary}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Working in
                        <select name="worked_in" class="form-control form-control-user" id="worked_in" >
                            <option value="" selected disabled>Indian oil corporetion</option>
                            @foreach($cdos as $cdo)
                            <option value="{{ $cdo->id }}" <?php if($customer->worked_in == $cdo->id){ echo 'selected'; } ?>>{{ $cdo->name }}</option>
                            @endforeach
						</select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        No of children
                            <select class="form-control form-control-user" name="no_of_childrens" id="no_of_childrens" >
                                <option value="">Select</option>
                                <option value="1" <?php if($customer->no_of_childrens == 1){ echo 'selected'; }?>>1</option>
                                <option value="2" <?php if($customer->no_of_childrens == 2){ echo 'selected'; }?>>2</option>
                                <option value="3" <?php if($customer->no_of_childrens == 3){ echo 'selected'; }?>>3</option>
                                <option value="4" <?php if($customer->no_of_childrens == 4){ echo 'selected'; }?>>4</option>
                                <option value="5" <?php if($customer->no_of_childrens == 5){ echo 'selected'; }?>>5</option>
                                <option value="6" <?php if($customer->no_of_childrens == 6){ echo 'selected'; }?>>6</option>
                                <option value="7" <?php if($customer->no_of_childrens == 7){ echo 'selected'; }?>>7</option>
                                <option value="8" <?php if($customer->no_of_childrens == 8){ echo 'selected'; }?>>8</option>
                                <option value="9" <?php if($customer->no_of_childrens == 9){ echo 'selected'; }?>>9</option>
                            </select>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0 upldds">
                        Profile Picture
                        <input type="hidden" name="old_profile" value="{{ @$customer->profile_image }}"/>
                        <input type="file" id="" placeholder="File Upload" name="profile" value="" class="form-control form-control-user" />
                    </div>                    
					
					<div class="col-lg-12 mt-2">
					  <div id="slt_ad_btnss">
					    <label>Tags</label>
						<i class="fa fa-angle-down"></i>
						<select class="progControlSelect2" multiple="true">
							<option value="aa">Demo</option>
							<option value="ab">Demo1</option>
							<option value="ac">Demo2</option>
							<option value="ad">Demo3</option>
							<option value="ae">Demo4</option>
							<option value="af">Demo5</option>
							<option value="ag">Demo6</option>
							<option value="ah">Demo7</option>
							<option value="ai">Demo8</option>
							<option value="aj">Demo9</option>
							<option value="ak">Demo10</option>
						</select>

					 </div>
					</div>

					<div class="col-lg-12">
					  <div id="slt_ad_btnss">
					    <label>Lists</label>
						<i class="fa fa-angle-down"></i>
						<select class="progControlSelect2" multiple="true">
							<option value="aa">Demo</option>
							<option value="ab">Demo1</option>
							<option value="ac">Demo2</option>
							<option value="ad">Demo3</option>
							<option value="ae">Demo4</option>
							<option value="af">Demo5</option>
							<option value="ag">Demo6</option>
							<option value="ah">Demo7</option>
							<option value="ai">Demo8</option>
							<option value="aj">Demo9</option>
							<option value="ak">Demo10</option>
						</select>

					 </div>
					</div>

					<div class="col-lg-12">
					  <div id="slt_ad_btnss">
					   <label>Completed Sequences</label>
					   <div class="un_liststs">
					    <ul>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						</ul>
					   </div>
					  </div>
					</div>


					<div class="col-lg-12">
					  <div id="slt_ad_btnss">
					   <label>Running Sequences</label>
					   <div class="un_liststs">
					    <ul>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						 <li>Demo</li>
						</ul>
					   </div>
					  </div>
					</div>
					
					<div class="col-sm-12 mt-5 mb-sm-0 pt-0 upldds text-center">
                        <img src="{{ url('').'/'.$customer->profile_image }}" class="img-profile" width="50px">
                        <!-- //https://1cradmin.allproject.online/admin/img/undraw_profile.svg -->
                    </div>
					
					
					
					

					
                </div>
            </div>
            <div class="card-footer text-center bg_sky_clr border_none">
                <button type="submit" class="btn btn-primary btn-user mb-3 btn_bg_same">Save Personal Details</button>
            </div>
        </form>
    </div>
    <!---- End User Information ----->
    <!---- Company Details ----->
    <div class="card shadow mb-4 bg_sky_clr"  id="company-section">
        <div class="card-header py-3 bg_sky_clr">
            <h6 class="m-0 font-weight-bold text-primary">Company Details</h6>
            <p>Company details settings in this section are common across lead magnet and raports.</p>
            @if($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <p class="text-success" id="company-success-message"></p>
            <p class="text-danger" id="company-error-message"></p>
        </div>
        <form method="POST" action="{{ route('customer.update-customer-company') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{@$customer->customer_id }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Company Name
                        <input type="text" id="" placeholder="Company Name" name="company_name" value="{{ @$customer->company_name}}" class="form-control form-control-user" required="" />
                    </div>
                    <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Company Email
                        <div class="form-group row">
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" id="" placeholder="Company Email" name="company_email" value="{{ @$customer->company_email}}" class="form-control form-control-user" required="" />
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <select name="company_email_type" class="form-control form-control-user">
									<option value="work" selected="selected">Work</option>
								</select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 mb-3 mt-3 mb-sm-0">
                        Company Phone
                        <div class="form-group row">
                            <div class="col-sm-7 mb-3 mb-sm-0">
                                <input type="text" id="" placeholder="Company Phone" name="company_phone" value="{{ @$customer->company_phone}}" class="form-control form-control-user"  />
                            </div>
                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <select name="company_phone_type" class="form-control form-control-user">
									<option value="work" selected="selected">Work</option>
								</select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Company Address
                        <input type="text" id="" placeholder="Company Address" name="company_address" value="{{ @$customer->company_address}}" class="form-control form-control-user"  />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        Company Website
                        <input type="text" id="" placeholder="Company Website" name="company_website" value="{{ @$customer->company_website}}" class="form-control form-control-user"/>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0 upldds">
                        Company Logo
                        <input type="hidden" name="old_company_logo" value="{{ @$customer->company_logo }}"/>
                        <input type="file" id="" placeholder="File Upload" name="company_logo" value=""  class="form-control form-control-user" />
                    </div>										<div class="col-sm-12 mb-0 mt-5 mb-sm-0 upldds text-center">
                        @if(!is_null($customer))
                        <img src="{{ url('').'/'.$customer->company_logo }}" class="img-profile " width="80px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer text-center bg_sky_clr pt-0 border_none">
                <button type="submit" class="btn btn-primary btn-user mb-3 btn_bg_same">Save Company Details</button>
            </div>
        </form>
    </div>
    <!---- End Company Details ----->
    <!---- Change Password ----->
    <div class="card shadow mb-4 bg_sky_clr" id="password-section">
        <div class="card-header py-3 bg_sky_clr">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            <p class="text-success" id="password-success-message"></p>
            <p class="text-danger" id="password-error-message"></p>
        </div>
        <form method="POST" action="{{ route('customer.update-customer-password') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{@$customer->customer_id }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Current Password
                        <input type="password" id="" placeholder="Enter Current Password" name="current_password" value="" class="form-control form-control-user" required="" />
                          @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>New Password
                        <input type="password" id="" placeholder="Enter New Password" name="new_password" value="" class="form-control form-control-user" required="" />
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Confirm password
                        <input type="password" id="" placeholder="Enter Confirm Password" name="new_confirm_password" value="" class="form-control form-control-user" required="" />
                          @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-center bg_sky_clr border_none">
                <button type="submit" class="btn btn-primary btn-user mb-3 btn_bg_same">Update Password</button>
            </div>
        </form>
    </div>
    <!---- End Change Password ----->
    <!---- Social Network ----->
    <div class="card shadow mb-4 bg_sky_clr">
        <div class="card-header py-3 bg_sky_clr">
            <h6 class="m-0 font-weight-bold text-primary">Social Network</h6>
            @if($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <p class="text-success" id="social-success-message"></p>
            <p class="text-danger" id="social-error-message"></p>
        </div>
        <form method="POST" action="{{ route('customer.update-customer-social-networks') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{@$customer->customer_id }}">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-facebook-square" aria-hidden="true" style="color:#1877f2; font-size:20px; position:relative; right: 3px; top:1px;"></i> Facebook
                        <input type="text" id="facebook" placeholder="Facebook" name="facebook" value="{{ @$customer->facebook}}" class="form-control form-control-user"  />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-youtube-square" aria-hidden="true" style="color:#c90000; font-size:20px; position:relative; right:3px; top:1px;"></i> Youtube
                        <input type="text" id="youtube" placeholder="Youtube" name="youtube" value="{{ @$customer->youtube}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-linkedin-square" aria-hidden="true" style="color:#0a66c2; font-size:20px; position:relative; right:3px; top:1px;"></i> LinkedIn
                        <input type="text" id="linkedin" placeholder="LinkedIn" name="linkedin" value="{{ @$customer->linkedin}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="color:#000000; font-size:18px;position: relative; right:3px; top:1px;"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg> Twitter
                        <input type="text" id="twitter" placeholder="Twitter" name="twitter" value="{{ @$customer->twitter}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-telegram" aria-hidden="true" style="color:#0088cc; font-size:20px; position:relative; right:3px; top:1px;"></i> Telegram
                        <input type="text" id="telegram" placeholder="Telegram" name="telegram" value="{{ @$customer->telegram}}" class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-skype" aria-hidden="true" style="color:#0094ea; font-size:20px; position:relative; right:3px;top:1px;"></i> Skype
                        <input type="text" id="skype" placeholder="Skype" name="skype" value="{{ @$customer->skype}}" class="form-control form-control-user" />
                    </div>
                    <!-- <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span><i class="fa fa-instagram" aria-hidden="true" style="color: #c32aa3; font-size:20px; position:relative; right:3px;top:1px;"></i> Instagram
                        <input type="text" id="" placeholder="Instagram " name="instagram_acc" value="{{ @$customer->instagram_acc}}" class="form-control form-control-user" />
                    </div> -->
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span>Any Other
                        <input type="text" id="other" placeholder="Enter Other Social link" name="other" value="{{ @$customer->other}}" class="form-control form-control-user"  />
                    </div>
                </div>
            </div>
            <div class="card-footer text-center bg_sky_clr border_none">
                <button type="submit" class="btn btn-primary btn-user mb-3 btn_bg_same">Save Social Network Details</button>
            </div>
        </form>
    </div>
    <!---- End Change Password ----->
    </div>
</div>
@endsection
@section('scripts')
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
    function checkUserName() {
        let customer_id = $('#customer_id').val();
        // alert(customer_id);
        let username = $('#user_name').val();
        let usrlnth = username.length;
        if(usrlnth < 4) {
            $('#user_msg').text('Customer ID must be at least 4 characters long.').css('color', 'red');
        } else {
            $.ajax({
                url: '{{ route("customer.checkusername") }}',
                type: "POST",
                data: {
                    customer_id: customer_id,
                    username: username,
                    _token: '{{ csrf_token() }}' // Add the CSRF token
                },
                success: function(response) {
                    if(response.status === true) {
                        $('#user_msg').text('Customer ID  is available.').css('color', 'green');
                    } else if(response.status === false) {
                        $('#user_msg').text('Customer ID  already in use.').css('color', 'red');
                    } else {
                        $('#user_msg').text('Customer ID does not exist.').css('color', 'red');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
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
$country = isset($customer->country) ? $customer->country : '';
$state = isset($customer->state) ? $customer->state : '';
$city = isset($customer->city) ? $customer->city : '';
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
    copyLink.className = 'bg-success  float-right'; // Change class to bg-success
    copyLink.innerHTML = '<i class="fa fa-check"></i> Copied'; // Change icon and text
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
    copyLink.className = 'bg-success float-right mt-4'; // Change class to bg-success
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    var input = document.querySelector("#country_code");
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
        $('#country_code').val(fullNumber); // Replace field value with the full number
    });
</script>
@endsection