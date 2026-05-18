@php
$firstSegment = request()->segment(1);
use App\Models\User;
use App\Models\CdbPlanModel;
use App\Models\BusinessCardModel;
use Illuminate\Support\Facades\DB;
$user_data = User::select('users.profile_image as user_profile','users.*','user_details.*','user_company_details.*','user_social_networks.*')
        ->leftjoin('user_details','user_details.user_id','=','users.id')
        ->leftjoin('user_company_details','user_company_details.user_id','=','users.id')
        ->leftjoin('user_social_networks','user_social_networks.user_id','=','users.id')
        ->where('users.id', Auth::id())->first();
$package = CdbPlanModel::where('id', $user_data->package_id)->first();
$b_card = BusinessCardModel::where('user_id', Auth::id())->first();
$d_video = DB::table('adb_dashboard')->where('created_by', app('currentAgent')->id)->first();

$communities = DB::table('tbl_joincommunity')->where('created_by', app('currentAgent')->id)->orderBy('priority', 'asc')->limit(8)->get();
@endphp
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <li class="d-flex"> 
                <a href="{{ route('customer.business-card') }}" class="@if($firstSegment === 'business-card') actet @endif"><img src="{{ url('home/img/edit_ic.jpg')}}" alt="" />Business Card </a>
                @if(!is_null($b_card) && $b_card->link_slug)
                    <i class="fa fa-copy copy-icon ml-4 mt-1" data-url="{{ url('/').'/mydigitalcard/'.$b_card->link_slug }}" aria-hidden="true"></i>&ensp; 
                    <a href="{{ url('/').'/mydigitalcard/'.$b_card->link_slug }}" target="_blank" class="text-right mt-1">
                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                @endif
            </li>
            <li class="d-flex">
                <a href="{{ route('my-profile') }}" class="@if($firstSegment === 'my-profile') actet @endif"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> My profile </a>
                @if(!is_null($d_video))
                @if($d_video->demo_link_enable == 1)
                        &ensp; &ensp; &ensp; <a href="javascript:void(0);" data-toggle="modal" data-target=".bd-example-modal-lg"><img src="{{ url('home/img/vvdio_ic.png')}}" alt="" /></a>
                    @endif
                @endif
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
                    <li>
                        <a class="" 
                           href="#">
                           Rewards, Coupons & Credit
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
                <a href="{{ route('notifications') }}" class="@if($firstSegment === 'notifications') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Updates</a>
            </li>

            <!-- <li>
                <a href="{{ route('lead-magnet-form') }}" class="@if($firstSegment === 'lead-magnet') actet @endif"><img src="{{ url('home/img/earn.png')}}" alt="" /> Get Lead Magnet ( New)</a>
            </li> -->
             <li class="dropdown custom-dropdown">
                <a href="javascript:void(0);" 
                   class="dropdown-toggle @if(in_array($firstSegment, ['lead-magnet','mail-template-form', 'popup-form', 'lead-magnet-list'])) actet @endif">
                   
                   <img src="{{ url('home/img/earn.png')}}" alt="" /> Lead Magnet Management
                </a>
            
                <ul class="dropdown-menu custom-dropdown-menu">
                    <li>
                        <a class="@if($firstSegment === 'lead-magnet') actet @endif" 
                           href="{{ route('lead-magnet') }}">
                           Get Lead Magnet ( New )
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'mail-template-form') actet @endif" 
                           href="{{ route('mail-template-form') }}">
                           Create Mail Template
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'popup-form') actet @endif" 
                           href="{{ route('popup-form') }}">
                           Create Popup Form
                        </a>
                    </li>
                    <li>
                        <a class="@if($firstSegment === 'lead-magnet-list') actet @endif" 
                           href="{{ route('lead-magnet-list') }}">
                           Enquiry List
                        </a>
                    </li>
                </ul>
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
<div class="profll_area mt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Carousel Items -->
        <div class="carousel-inner text-light">
            <!-- Item 1 -->
            @foreach($communities as $key=>$community)
            <div class="carousel-item @if($key ==0) active @endif">
                <div class="community-card text-center">
                    <div class="community-icon">
                        <i class="fa {{ $community->icon }}"></i>
                    </div><br>
                    <h6 style="font-weight:900;">{{ Str::limit($community->title, 25) }}</h6>
                    <small>
                        {{ Str::limit($community->content, 80) }}
                    </small><br>
                    <a href="{{ $community->btn_link }}" target="_blank" class="btn btn-sm btn-light">
                        {{ $community->btn_text }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<script>
document.querySelectorAll('.custom-dropdown > a').forEach(function(el){
    el.addEventListener('click', function(){
        this.parentElement.classList.toggle('active');
    });
});
</script>
<script>
    // Select all elements with the 'copy-icon' class
    document.querySelectorAll('.copy-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const urlToCopy = this.getAttribute('data-url'); // Get URL from the data attribute
            navigator.clipboard.writeText(urlToCopy).then(() => {
                this.classList.remove('fa-copy'); // Remove copy icon class
                this.classList.add('fa-check', 'text-success'); // Add checkmark icon class

                // Optional: Reset the icon after a few seconds
                setTimeout(() => {
                    this.classList.remove('fa-check', 'text-success'); // Remove checkmark icon class
                    this.classList.add('fa-copy'); // Add copy icon class back
                }, 10000);
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        });
    });
</script>