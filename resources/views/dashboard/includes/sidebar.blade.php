@php
$firstSegment = request()->segment(1);
use App\Models\User;
use App\Models\CdbPlanModel;
$user_data = User::select('users.profile_image as user_profile','users.*','user_details.*','user_company_details.*','user_social_networks.*')
        ->leftjoin('user_details','user_details.user_id','=','users.id')
        ->leftjoin('user_company_details','user_company_details.user_id','=','users.id')
        ->leftjoin('user_social_networks','user_social_networks.user_id','=','users.id')
        ->where('users.id', Auth::id())->first();
$package = CdbPlanModel::where('id', $user_data->package_id)->first();
@endphp
<style>
    .custom-dropdown {
        position: relative;
    }
    
    .custom-dropdown-menu {
        display: none;
        position: relative; /* important for sidebar */
        background: #f8f9fa;
        padding-left: 20px;
    }
    
    .custom-dropdown-menu li a {
        display: block;
        padding: 8px 10px;
        font-size: 14px;
    }
    
    /* Show dropdown */
    .custom-dropdown.active .custom-dropdown-menu {
        display: block;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown {
        position: relative;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active a.dropdown-toggle {
        position: relative;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active a.dropdown-toggle:focus {
        color: #fff;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown a.dropdown-toggle:after {
        position: absolute;
        right: 0px;
        top: 9px;
        border-top: 0.5em solid;
        border-right: 0.5em solid transparent;
        border-bottom: 0;
        border-left: 0.5em solid transparent;
    }
     
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu {
        position: absolute;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 2px;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li {
        padding: 0;
        margin: 0;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li a {
        padding: 10px 10px;
        color: #0e3991;
        font-size: 13px;
    }
    .profll_area .user_liststst ul li.dropdown.custom-dropdown.active ul.dropdown-menu.custom-dropdown-menu li a:hover {
        background: #fff;
        background: #0e3992;
    }
</style>
<div class="profll_area">
    <div class="user_proff">
        @if(!is_null($user_data->user_profile))
            <div class="mg_ares"><img src="{{ url('').'/'.$user_data->user_profile }}" alt="" /></div>
        @else
            <div class="mg_ares"><img src="{{ url('uploads/profile/profile-default.jpeg') }}" alt="" /></div>
        @endif
        <h3>{{ $user_data->name }}</h3>
        <span class="text-light">{{ $package->title??'Free' }}</span><br>
        <span class="text-light">Valid Upto: {{ date('d M, Y', strtotime($user_data->valid_upto)) }}</span><br>
        <span class="text-light">My Referral Code: <br><a href="#share_section">{{ $user_data->memberid }}</a></span><br>
        <span class="text-light">Balance: ₹{{ $user_data->walletBalance }}</span>
    </div>
    <div class="user_liststst">
        <ul>
            <li>
                <a href="{{ route('my-profile') }}" class="@if($firstSegment === 'my-profile') actet @endif"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> My profile</a>
            </li>
            <!--<li>-->
            <!--    <a href="{{ route('wallet') }}" class="@if($firstSegment === 'wallet') actet @endif"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> Wallet</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="{{ route('billing') }}" class="@if($firstSegment === 'billing') actet @endif"><img src="{{ url('home/img/billing.png')}}" alt="" /> Billing </a>-->
            <!--</li>-->
            <li class="dropdown custom-dropdown">
                <a href="javascript:void(0);" 
                   class="dropdown-toggle @if(in_array($firstSegment, ['wallet','billing'])) actet @endif">
                   
                   <img src="{{ url('home/img/my-profile.png')}}" alt="" /> My Account
                </a>
            
                <ul class="dropdown-menu custom-dropdown-menu">
                    <li>
                        <a class="@if($firstSegment === 'wallet') actet @endif" 
                           href="{{ route('wallet') }}">
                           Wallet
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'billing') actet @endif" 
                           href="{{ route('billing') }}">
                           Billing
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);"><img src="{{ url('home/img/help.png')}}" alt="" /> Help/support tickets</a>
            </li>
            <li>
                <a href="{{ route('earn-with-us') }}"  class="@if($firstSegment === 'earn-with-us') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Earn With Us</a>
            </li>

            <li>
                <a href="{{ route('services-for-you') }}"  class="@if($firstSegment === 'services-for-you') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Services & Products</a>
            </li>

            <li>
                <a href="{{ route('notifications') }}" class="@if($firstSegment === 'notifications') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Updates</a>
            </li>

            <li>
                <a href="{{ route('lead-magnet-form') }}" class="@if($firstSegment === 'lead-magnet') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Get Lead Magnet ( New)</a>
            </li>

            <li>
                <a href="javascript:void(0);"><img src="{{ url('home/img/earn.png')}}" alt="" /> Rewards, Coupons & Credit</a>
            </li>

            <li>
                <a href="javascript:void(0);"><img src="{{ url('home/img/earn.png')}}" alt="" /> Coming Soon</a>
            </li>
            <li>
                <a href="{{ route('setting') }}" class="@if($firstSegment === 'setting') actet @endif"><i class="fa fa-gear" style="font-size: 22px;"></i> Setting</a>
            </li>
        </ul>
    </div>
</div>
<script>
document.querySelectorAll('.custom-dropdown > a').forEach(function(el){
    el.addEventListener('click', function(){
        this.parentElement.classList.toggle('active');
    });
});
</script>