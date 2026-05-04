<?php
use App\Models\User;
use App\Models\CompanyDetail;
use App\Models\ContactModel;
$first_name = '';
$last_name = '';
$logo  = '';
$referral_code  = '';
if(auth()->user()){
$user = User::whereId(auth()->user()->id)->first();
if($user){
    $companydata = CompanyDetail::select('company_logo','company_name')->where('user_id',$user->id)->first();
    $first_name = $user->first_name;
    $last_name  = $user->last_name;
    $referral_code  = $user->referral_code;
    if(!is_null($companydata) && $companydata->company_logo){
        $logo = 'profile/'.$companydata->company_logo;
    }else{
        $logo = 'admin/img/logo.png';
    }
}
}else{
    return redirect()->route('login');
}
$scheme = request()->getScheme();
$host   = request()->getHost(); // admin.1crapp.com

if (str_starts_with($host, 'admin.')) {
    $host = substr($host, 6); // remove 'admin.'
}

$finalUrl = $scheme . '://' . $host;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <div class="profll_area">
        <div class="user_proff">
            <div class="mg_ares">
                <a href="{{url('')}}">
                    <img src="{{url('').'/'.$logo }}" alt="" />
                </a>
            </div>
            <h3>{{ $first_name." ".$last_name }}</h3>
            <?php if(Auth()->user()->hasrole('Agent')){ ?>
                <p class="my_ref_cdrr">
                    <span class="largess_tx">My Referral Code:</span><br>
                    <a href="#share_section">{{ $referral_code }}</a>
                </p>
            <?php } ?>
        </div>
    </div>
@php
    $roleid = Auth()->user()->role_id;
    $access_module_array = [];
    $access_module = App\Models\RoleHasPermission::join('permissions','permissions.id','role_has_permissions.permission_id')->select('permissions.name')->where('role_has_permissions.role_id',$roleid)->get();
      foreach($access_module as $list){
        $access_module_array[] = $list->name;
      }
@endphp
<ul class="navv_liststs">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a>
    </li>
    @if(in_array('admin-list',$access_module_array) || in_array('admin-create',$access_module_array))
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDDAdmin"
                aria-expanded="true" aria-controls="taTpDDAdmin">
                <i class="fas fa-user-alt"></i>
                <span>Admin & Role Management</span>
            </a>
            <div id="taTpDDAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if(in_array('admin-list',$access_module_array))
                    <a class="collapse-item" href="{{ route('admin.index') }}">Admin List</a>
                    @endif
                    @if(in_array('role-list',$access_module_array) || in_array('role-create',$access_module_array))
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles & Permissions</a>
                    @endif
                </div>
            </div>
        </li>
        @endif
    @if(in_array('user-list',$access_module_array) || in_array('user-create',$access_module_array))
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-secret"></i>
            <span>Agent Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                  @if(in_array('user-create',$access_module_array))
                <a class="collapse-item" href="{{ route('agent.create') }}">Add Agent</a>
                @endif
                  @if(in_array('user-list',$access_module_array) )
                <a class="collapse-item" href="{{ route('agent.index') }}">Agent List</a>
                @endif
                <!--<a class="collapse-item" href="{{ route('users.import') }}">Import Data</a>-->
            </div>
        </div>
    </li>
	@endif
@if(in_array('cms-list',$access_module_array) )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cms.index') }}">
            <i class="fas fa-address-book"></i>
            <span>CMS</span>
        </a>
    </li>
    @endif
	<!-- @if(in_array('plan-list',$access_module_array) )
    <li class="nav-item">
      <a class="nav-link" href="{{ route('planadd.index') }}">
        <i class="fas fa-database"></i>
        <span>Plan List</span>
      </a>
    </li>
    @endif -->
@if(in_array('referred-customer-list',$access_module_array) || in_array('reward-list',$access_module_array) || in_array('affiliate-commission-list',$access_module_array) || in_array('referral-setting',$access_module_array))
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#afttaTpDropDown"
            aria-expanded="true" aria-controls="afttaTpDropDown">
            <i class="fas fa-tasks"></i>
            <?php if(Auth()->user()->hasrole('Agent')){ ?>
                <span>Rewords And Commission</span>
            <?php }else { ?>
                <span>Affiliates Management</span>
            <?php }?>
        </a>
        <div id="afttaTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if(Auth()->user()->hasrole('Agent')){ ?>
                     <a class="collapse-item" href="{{ route('passive-profit.index') }}"> Passive Profit </a>
                    @if(in_array('referred-customer-list',$access_module_array) )
                    <a class="collapse-item" href="{{ route('rc-management.customer-list') }}">Referred Customer List</a>
                    @endif
                    @if(  in_array('reward-list',$access_module_array) )
                    <a class="collapse-item" href="{{ route('rc-management.reward-list') }}">Reward List</a>
                    @endif
                <?php } ?>
                    @if( in_array('affiliate-commission-list',$access_module_array) || in_array('referral-setting',$access_module_array) )
                    <a class="collapse-item" href="{{ route('rc-management.setting') }}">@if( in_array('referral-setting',$access_module_array) ) Referral Setting @else Affiliate Commission Setting @endif </a>
                    @endif
            </div>
        </div>
    </li>
@endif

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DropDownNoti"
            aria-expanded="true" aria-controls="DropDownNoti">
            <i class="fas fa-bell"></i>
            <span>Notifications Management</span>
        </a>
        <div id="DropDownNoti" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('notification.categorylist') }}">Notifications Category</a>
                 <a class="collapse-item" href="{{ route('notification.index') }}">Notifications</a>
            </div>
        </div>
    </li>

	 <li class="nav-item active">
     <a href="#" data-toggle="collapse" data-target="#D_databes" aria-expanded="true" aria-controls="D_databes" class="nav-link collapsed">
	 <i aria-hidden="true" class="fas fa-database"></i> <span>My Database</span></a>
     <div id="D_databes" aria-labelledby="headingTwo" data-parent="#accordionSidebar" class="collapse">
        <div class="collapse-inner">
		  <div class="accordion_container">
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Master List <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="{{ route('master-list') }}">Lists</a></li>
					<li><a href="javascript:void(0);">Import</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<!-- <div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Orders And Enquiries <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="#">Orders</a></li>
				   </ul>
				 </div>
				</div>
			</div> -->
			<!-- <div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-user"></i>Custom List <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
                            @php
                                $lists = ContactModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
                            @endphp
                            @foreach($lists as $list)
                            <li><a href="{{ route('enquiry-list',['list'=>$list->id]) }}">{{ $list->name }}</a></li>
                            @endforeach
					   </ul>
                    </div>
				</div>
			</div> -->
			<!-- <div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Customers  <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						<li><a href="{{ url('customer') }}">List</a></li>
					   </ul>
					  </div>
				</div>
			</div> -->
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Lists<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						    <li><a href="{{ url('lists') }}">view</a></li>
					   </ul>
                    </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Tags<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						<li><a href="{{ url('tags') }}">List</a></li>
					   </ul>
                    </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Forms<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						<li><a href="{{ route('form.index') }}">List</a></li>
					   </ul>
                    </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Source  <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						<li><a href="{{ route('form-source.index') }}">List</a></li>
					   </ul>
                    </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> Drive Files  <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						    <li><a href="{{ route('file-drive.index') }}">List</a></li>
					   </ul>
                    </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-users"></i> CDO Management  <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						    <li><a href="{{ route('cdo.index') }}">List</a></li>
						    <li><a href="{{ route('cdo.category-list') }}">Category</a></li>
					   </ul>
                    </div>
				</div>
			</div>

		</div>
		</div>
    </div>
    </li>
	<li class="nav-item active">
     <a href="#" data-toggle="collapse" data-target="#MD_databes" aria-expanded="true" aria-controls="D_databes" class="nav-link collapsed">
	 <i aria-hidden="true" class="fas fa-database"></i> <span>My Studio</span></a>
    <div id="MD_databes" aria-labelledby="headingTwo" data-parent="#accordionSidebar" class="collapse">
        <div class="collapse-inner">
		  <div class="accordion_container">
    
        <div class="man_boxx">
            <div class="accordion_head"><i class="fas fa-money"></i> Payment Plans <span class="plusminus">+</span></div>
            <div class="accordion_body" style="display: none;">
                <div class="user_listst_links">
    			   <ul>
    			       <?php if(!Auth()->user()->hasrole('Agent')){ ?>
    			            <li><a href="{{ route('planadd.index') }}">Plan List</a></li>
    			            <li><a href="{{ route('plan-type.index') }}">Plan Type</a></li>
    			        <?php } else{ ?>
    			            <li><a href="{{ route('cdb-plan.index') }}">Plan List</a></li>
    			        <?php }?>
    			   </ul>
                </div>
            </div>
        </div>
    

    @if(in_array('product-service-category-list',$access_module_array) || in_array('product-list',$access_module_array))
    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> Product & Services<span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			    <ul>
                    @if(in_array('product-service-category-list',$access_module_array) )
			            <li><a href="{{ route('productservices.categorylist') }}">Category</a></li>
                    @endif
                	@if(in_array('product-list',$access_module_array) )
			            <li><a href="{{ route('productservices.productsslist') }}">P&S-List</a></li>
                    @endif
			    </ul>
            </div>
        </div>
    </div>
    @endif
    
    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> My Digital Assets<span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			    <ul>
                    <li><a href="{{ route('assets.index') }}">List</a></li>

			    </ul>
            </div>
        </div>
    </div>
    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> External Page<span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			    <ul>
                    <li><a href="{{ route('embed-page.index') }}">List</a></li>
			    </ul>
            </div>
        </div>
    </div>
    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> Business Card<span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			    <ul>
                    <li><a href="{{ url('business-card') }}">List</a></li>
			    </ul>
            </div>
        </div>
    </div>
        <div class="man_boxx">
            <div class="accordion_head"><i class="fas fa-users"></i> Resources & Tools<span class="plusminus">+</span></div>
            <div class="accordion_body" style="display: none;">
                <div class="user_listst_links">
                    <ul>
                        <li><a href="{{ route('resources-and-tools.index') }}">List</a></li>
                        <li><a href="{{ route('resources-and-tools.category-list') }}">Category</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="man_boxx">
            <div class="accordion_head"><i class="fas fa-file"></i> Pages & Builder<span class="plusminus">+</span></div>
            <div class="accordion_body" style="display: none;">
                <div class="user_listst_links">
                    <ul>
                        <li><a href="{{ route('page.index') }}">List</a></li>
                    </ul>
                </div>
            </div>
        </div>

    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> Dummy1 <span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			   <ul>
			    <li><a href="javascript:void(0);">Dummy1</a></li>
			   </ul>
			  </div>
        </div>
    </div>
    <div class="man_boxx">
        <div class="accordion_head"><i class="fas fa-users"></i> Dummy2 <span class="plusminus">+</span></div>
        <div class="accordion_body" style="display: none;">
            <div class="user_listst_links">
			   <ul>
			    <li><a href="javascript:void(0);">Dummy2</a></li>
			   </ul>
			  </div>
        </div>
    </div>
</div>
		</div>
    </div>
    </li>
    <?php if(!Auth()->user()->hasrole('Agent')){ ?>
        @if(in_array('customer-list',$access_module_array))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#test_manage"
                aria-expanded="true" aria-controls="test_manage">
                <i class="fas fa-address-card"></i>
                <span>Testimonials Management</span>
            </a>
            <div id="test_manage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Campaign List</a>
                    <a class="collapse-item" href="#">Campaign Report</a>
                    <a class="collapse-item" href="#">Testimonials List</a>
                    <a class="collapse-item" href="#">Bonus List</a>
                </div>
            </div>
        </li>
        @endif
    <?php } ?>

	@if(in_array('transaction-list',$access_module_array) )
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-cube"></i>
            <span>Transaction List</span>
        </a>
    </li>
    @endif
    	@if(in_array('order-lead-management',$access_module_array) )
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orddDropDownCust1"
            aria-expanded="true" aria-controls="orddDropDownCust">
            <i class="fas fa-cogs"></i>
            <span>Order & Leads  Management</span>
        </a>
        <div id="orddDropDownCust1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('orderleadsmanagement.orderlist') }}">Order List</a>
            </div>
        </div>
    </li>
    @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orddDropDownCust2"
                aria-expanded="true" aria-controls="orddDropDownCust">
                <i class="fas fa-envelope"></i>
                <span>Mail Management</span>
            </a>
            <div id="orddDropDownCust2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php if(!Auth()->user()->hasrole('Agent')){ ?>
                        <a class="collapse-item" href="{{ route('mail-category.index') }}">Mail Category</a>
                        <a class="collapse-item" href="{{ route('mail.index') }}">Mail</a>
                    <?php }else{ ?>
                        <a class="collapse-item" href="{{ route('mail.index') }}">Mail</a>
                   <?php } ?>
                </div>
            </div>
        </li>

    <?php if(!Auth()->user()->hasrole('Agent')){ ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orddDropDownCust2"
                aria-expanded="true" aria-controls="orddDropDownCust">
                <i class="fas fa-gift"></i>
                <span>Gift Management</span>
            </a>
            <div id="orddDropDownCust2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('gift.index') }}">Gift List</a>
                    <a class="collapse-item" href="{{ route('gift.category-list') }}">Gift Category</a>
                    <a class="collapse-item" href="{{ route('gift.thank-you-card-list') }}">Thank You Card</a>
                    <a class="collapse-item" href="{{ route('gift.config.index') }}">Gift Configuration</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <?php if(Auth()->user()->hasrole('Agent')){ ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gift"
                aria-expanded="true" aria-controls="gift">
                <i class="fas fa-gift"></i>
                <span> Gifts Management</span>
            </a>
            <div id="gift" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('gift.collection') }}">Collection</a>
                    <a class="collapse-item" href="{{ route('gift.gallery') }}">Gallery</a>
                </div>
            </div>
        </li>
    <?php } ?>

	@if(in_array('property-market-list',$access_module_array))
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proptTpDropDown"
            aria-expanded="true" aria-controls="proptTpDropDown">
            <i class="fas fa-tasks"></i>
            <span>Property Market</span>
        </a>
        <div id="proptTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('propertymarket.propertymarketlist') }}">Property List</a>
                <a class="collapse-item" href="{{ route('property-category.index') }}">Property Category</a>
                <a class="collapse-item" href="{{ route('property-type.index') }}">Property Type</a>
                <a class="collapse-item" href="{{ route('propertymarket.cms') }}">CMS</a>
                <a class="collapse-item" href="{{ route('propertymarket.enquiry-list') }}">Enquiry List</a>
            </div>
        </div>
    </li>
	@endif
	@if(in_array('trigger-notification-list',$access_module_array) || in_array('trigger-notification-create',$access_module_array) )
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trigerTpDropDown"
            aria-expanded="true" aria-controls="trigerTpDropDown">
            <i class="fas fa-tasks"></i>
            <span>Trigger & Notification</span>
        </a>
        <div id="trigerTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
	            @if(in_array('trigger-notification-create',$access_module_array))
                    <a class="collapse-item" href="{{ route('triggernotification.addtriggernotification') }}">Add Trigger & Notification</a>
                @endif
	            @if(in_array('trigger-notification-list',$access_module_array))
                    <a class="collapse-item" href="{{ route('triggernotification.triggernotificationlist') }}">Trigger & Notification List</a>
                @endif
            </div>
        </div>
    </li>
    @endif
		@if(in_array('ticket-list',$access_module_array)  )
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ticktssTpDropDown"
            aria-expanded="true" aria-controls="ticktssTpDropDown">
            <i class="fas fa-tasks"></i>
            <span>Tickets Management</span>
        </a>
        <div id="ticktssTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('ticketscustomercare.ticketscustomercarelist') }}">Ticket List</a>
            </div>
        </div>
    </li>
	@endif
		@if(in_array('ticket-list',$access_module_array)  )
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#appointmentDropDown"
            aria-expanded="true" aria-controls="appointmentDropDown">
            <i class="fas fa-tasks"></i>
            <span>Appointment Booking</span>
        </a>
        <div id="appointmentDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#appointmentDropDown">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('calender.index') }}"> Calender </a>
                <a class="collapse-item" href="{{ route('appointments.index') }}"> Appointments </a>
                <a class="collapse-item" href="{{ route('appointment-booking.index') }}">Booking Page</a>
                <a class="collapse-item" href="{{ route('appointment-homework.index') }}">Homework Page</a>
                <a class="collapse-item" href="{{ route('appointment-thankyou.index') }}">Thankyou Page</a>
            </div>
        </div>
    </li>
	@endif
    @if(in_array('purchase-criteria',$access_module_array) )
	<li class="nav-item">
        <a class="nav-link" href="{{ route('purchasecretirea.mnpurchasecretirea') }}">
            <i class="fas fa-address-book"></i>
            <span>Purchase Criteria</span>
        </a>
    </li>
    @endif
    <li class="nav-item active">
     <a href="#" data-toggle="collapse" data-target="#webside-nev" aria-expanded="true" aria-controls="webside-nev" class="nav-link collapsed">
	 <i class="fas fa-cogs"></i> <span>Website Management</span></a>
     <div id="webside-nev" aria-labelledby="headingTwo" data-parent="#accordionSidebar" class="collapse">
        <div class="collapse-inner">
		  <div class="accordion_container">
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Navigation Bar <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="{{ route('header-navigation.index') }}">Navigation Bar</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Core Website Pages<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
                        <li><a href="javascript:void(0);">About Us</a></li>
                        <li><a href="javascript:void(0);">Home Page</a></li>
					    <li><a href="javascript:void(0);">How It Works</a></li>
					    <li><a href="javascript:void(0);">Features</a></li>
					    <li><a href="javascript:void(0);">FAQ Page</a></li>
					    <li><a href="javascript:void(0);">Price</a></li>
					    <li><a href="javascript:void(0);">Contact Us</a></li>
                        <li><a href="javascript:void(0);">About Company</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> User System<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="javascript:void(0);">User Dashboard</a></li>
					<li><a href="javascript:void(0);">Investor</a></li>
					<li><a href="javascript:void(0);">Investor Menu</a></li>
					<li><a href="javascript:void(0);">Realtor</a></li>
					<li><a href="javascript:void(0);">Realtor Menu</a></li>
					<li><a href="javascript:void(0);">Services for You</a></li>
					<li><a href="javascript:void(0);">Property Look Out Pitch</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Financial Tools<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="javascript:void(0);">My Properties</a></li>
					<li><a href="javascript:void(0);">Personal Money Path</a></li>
					<li><a href="javascript:void(0);">Personal Budget Management</a></li>
					<li><a href="javascript:void(0);">Personal Networth Tracking</a></li>
					<li><a href="javascript:void(0);">Financial Freedom Journey</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Admin/Network<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="javascript:void(0);">Media</a></li>
					<li><a href="javascript:void(0);">Meet Team</a></li>
					<li><a href="javascript:void(0);">Join Team</a></li>
					<li><a href="javascript:void(0);">Join Affiliate</a></li>
					<li><a href="javascript:void(0);">Review</a></li>
					<li><a href="javascript:void(0);">Business Cards</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Other/Miscellaneous Pages<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="javascript:void(0);">ABC XYC HJSHKJS</a></li>
					<li><a href="javascript:void(0);">ABC XYC HJSHKJS</a></li>
					<li><a href="javascript:void(0);">ABC XYC HJSHKJS</a></li>
					<li><a href="javascript:void(0);">ABC XYC HJSHKJS</a></li>
					<li><a href="javascript:void(0);">ABC XYC HJSHKJS</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Sections of Pages<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="{{ route('banner.index') }}"> Hero Section- Index Page</a></li>
                    <li><a href="{{ route('about-us.index') }}">About Us</a></li>
					<li><a href="{{ route('user-hero-section.index') }}"> Hero Section - User Page</a></li>
					<!-- <li><a href="{{ route('web.service-category.index') }}"> Services Category Section</a></li>
					<li><a href="{{ route('web.services.index') }}"> Services Section</a></li> -->
					<li><a href="{{ route('web.clients.index') }}">Clients</a></li>
					<li><a href="{{ route('web.testimonials.index') }}">Testimonials</a></li>
					<li><a href="javascript:void(0);">Demo Section</a></li>
					<li><a href="javascript:void(0);">TEXT Section</a></li>
					<li><a href="{{ route('features.index') }}">Features Section</a></li>
                    <li><a href="{{ route('easytoshare.index') }}">Easy to Share</a></li>
					<li><a href="{{ route('easytouse.index') }}">Use Cases Section</a></li>
					<li><a href="javascript:void(0);">Insights Section Quick Analyse</a></li>
					<li><a href="{{ route('work-matrix.index') }}">Work Matrix</a></li>
					<li><a href="{{ route('call-to-action.index') }}">CTA Section (Reusable)</a></li>
					<li><a href="{{ route('form.index') }}">Forms</a></li>
					<li><a href="{{ route('business-card.index') }}">Visiting Card</a></li>
					<li><a href="{{ route('propertymarket.cms') }}">Top of Property Market Place</a></li>
					<li><a href="javascript:void(0);">Top of Prodct & Servecs</a></li>
					<!-- <li><a href="{{ $finalUrl }}/resources-tools">Reourses & Tools Bottom Section</a></li> -->
					<li><a href="{{ route('need-help.index') }}">Support Section</a></li>
                    <li><a href="{{ route('how-it-works.index') }}">How it Works</a></li>
                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    <li><a href="{{ route('faq.category.index') }}">FAQ Category</a></li>
                    <li><a href="{{ route('subscribe.index') }}">Subscribers</a></li>
                    <li><a href="{{ route('web-setting.index') }}">Contact Us</a></li>
                    <li><a href="{{ route('meet-team.index') }}">Meet Team</a></li>
                    <li><a href="{{ route('meet-category.index') }}">Meet Category</a></li>
                    <li><a href="{{ route('team-detail.index') }}">Team Detail</a></li>
                    <li><a href="{{ route('media.index') }}">Media</a></li>
                    <li><a href="{{ route('join-as-affiliate.index') }}">Join As Affiliate</a></li>
                    <li><a href="{{ route('join-as-affiliate.enquiry') }}">Affiliate Enquiry</a></li>
                    <li><a href="{{ route('reviews.index') }}"> Review</a></li>
                    <li><a href="{{ route('app-feedback.index') }}"> Feedback</a></li>
                    <li><a href="javascript:void(0);">Company</a></li>
                    <!-- <li><a href="{{ route('project-category.index') }}"> Project Category</a></li>
                    <li><a href="{{ route('project.index') }}"> Project </a></li>
                    <li><a href="{{ route('booking-event.index') }}"> Booking Event </a></li> -->

                            
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Header/Footer Settings<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="{{ route('user-onboard-cms.login') }}">Login Now</a></li>
					<li><a href="{{ route('user-onboard-cms.signup') }}">Register Now</a></li>
					<li><a href="javascript:void(0);">Whats New Button</a></li>
					<li><a href="javascript:void(0);">Top Header</a></li>
					<li><a href="javascript:void(0);">Footer Top</a></li>
					<li><a href="javascript:void(0);">Footer Bottom</a></li>
					<li><a href="javascript:void(0);">Legal & Compliances</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<!-- <div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Old Code <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Navigation Bar <span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
				 <div class="user_listst_links">
				   <ul>
					<li><a href="{{ route('header-navigation.index') }}">Navigation List</a></li>
					<li><a href="javascript:void(0);">Login Now</a></li>
					<li><a href="javascript:void(0);">Register Now</a></li>
					<li><a href="javascript:void(0);">What`s New</a></li>
				   </ul>
				 </div>
				</div>
			</div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Pre Login Pages<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						    <li><a href="{{ route('banner.index') }}">Banners</a></li>
                            <li><a href="{{ route('about-us.index') }}">About Us</a></li>
                            <li><a href="{{ route('web.service-category.index') }}">Service Category</a></li>
                            <li><a href="{{ route('web.services.index') }}">Services</a></li>
                            <li><a href="{{ route('web.testimonials.index') }}">Testimonials</a></li>
                            <li><a href="{{ route('web.clients.index') }}">Our Clients</a></li>
                            <li><a href="{{ route('features.index') }}">Features</a></li>
                            <li><a href="{{ route('easytoshare.index') }}">Easy to Share</a></li>
                            <li><a href="{{ route('easytouse.index') }}">Easy to Use</a></li>
                            <li><a href="{{ route('subscribe.index') }}">Subscribers</a></li>
                            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                            <li><a href="{{ route('faq.category.index') }}">FAQ Category</a></li>
                            <li><a href="{{ route('how-it-works.index') }}">How it Works</a></li>
                            <li><a href="{{ route('need-help.index') }}">Need Help</a></li>
                            <li><a href="{{ route('work-matrix.index') }}">Work Matrix</a></li>
                            <li><a href="{{ route('call-to-action.index') }}">Call to Action</a></li>
                            <li><a href="{{ route('web-setting.index') }}">Contact Us</a></li>
                            <li><a href="{{ route('meet-team.index') }}">Meet Team</a></li>
                            <li><a href="{{ route('meet-category.index') }}">Meet Category</a></li>
                            <li><a href="{{ route('team-detail.index') }}">Team Detail</a></li>
                            <li><a href="{{ route('media.index') }}">Media</a></li>
                            <li><a href="{{ route('join-as-affiliate.index') }}">Join As Affiliate</a></li>
                            <li><a href="{{ route('join-as-affiliate.enquiry') }}">Affiliate Enquiry</a></li>
                            <li><a href="{{ route('reviews.index') }}"> Review</a></li>
                            <li><a href="{{ route('app-feedback.index') }}"> Feedback</a></li>
                            <li><a href="{{ route('project-category.index') }}"> Project Category</a></li>
                            <li><a href="{{ route('project.index') }}"> Project </a></li>
                            <li><a href="{{ route('booking-event.index') }}"> Booking Event </a></li>
                    </div>
				</div>
		    </div>
			
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i> Post Login Pages<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
                            <li><a href="{{ route('landing-banner.index') }}">Landing Banner</a></li>
                            <li><a href="{{ route('landing-location.index') }}">Landing Location</a></li>
                            <li><a href="{{ route('propertymarket.propertymarketlist') }}">Property List</a></li>
                            <li><a href="{{ route('property-category.index') }}">Property Category</a></li>
                            <li><a href="{{ route('property-type.index') }}">Property Type</a></li>
                            <li><a href="{{ route('propertymarket.cms') }}">CMS</a></li>
                            <li><a href="{{ route('propertymarket.enquiry-list') }}">Enquiry List</a></li>
					   </ul>
                    </div>
				</div>
		    </div>
			<div class="man_boxx">
				<div class="accordion_head"><i class="fas fa-list"></i>Header/Footer Settings<span class="plusminus">+</span></div>
				<div class="accordion_body" style="display: none;">
					<div class="user_listst_links">
					   <ul>
						    <li><a href="javascript:void(0);">Top Header</a></li>
						    <li><a href="javascript:void(0);">Top Footer</a></li>
						    <li><a href="javascript:void(0);">Bottom Footer</a></li>
						    <li><a href="javascript:void(0);">Legal & Compliances</a></li>
					   </ul>
                    </div>
				</div>
		    </div> -->
    		</div>
		</div>
    </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
	</ul>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>