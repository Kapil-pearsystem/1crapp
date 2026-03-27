<?php
use App\Models\User;
$first_name = '';
$last_name = '';
$profile  = '';
$referral_code  = '';
if(auth()->user()){

$user = User::whereId(auth()->user()->id)->first();
if($user){

    $first_name = $user->first_name;
    $last_name  = $user->last_name;
    $referral_code  = $user->referral_code;
    if($user->profile_pic){
        $profile = 'profile/'.$user->profile_pic;
    }else{
        $profile = 'admin/img/undraw_profile.svg';
    }
}
}else{
    return redirect()->route('login');

}
// echo "<pre>".print_r($user, true);die;
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$first_name." ".$last_name?></span>
                <img class="img-profile rounded-circle"
                    src="{{asset('').$profile }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"><a class="dropdown-item" href="{{ url('myaccount/my-profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>                    My Profile                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
            <li id="dropp_menus">
                <span class="crooss_m" onclick="openNav()">&#9776;</span>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    <div class="profll_area">
                        <div class="user_proff">
                            <div class="mg_ares">
                                <a href="{{url('')}}">
                                    <img src="{{url('admin')}}/img/logo.png" alt="" />
                                </a>
                            </div>
                            <h3>{{ $first_name." ".$last_name }} {{--<p>Free Starter</p>--}}</h3>
                            <?php if(Auth()->user()->hasrole('Agent')){ ?>
                            <p class="my_ref_cdrr">
                                <span class="largess_tx">My Referral Code:</span>
                                <a href="#share_section">{{ $referral_code }}</a>
                            </p>
                            <?php } ?>
                        </div>
                    </div>

                    <a href="javascript:void(0);">
                        <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                        <strong>My Account</strong>
                    </a>
                    <a href="{{ route('myaccount.my-profile') }}">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> My Profile
                    </a>
					<a href="javascript:void(0);">
                        <i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i> Business Card
                    </a>
                    <?php if(Auth()->user()->hasrole('Agent')){ ?>
                        <a href="{{ route('billing.billinglist') }}">
                            <i class="fas fa-cube fa-sm fa-fw mr-2 text-gray-400"></i> Billing
                        </a>
                     <?php } ?>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Setting
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="dropdown-item" href="{{ route('setting.paymentgatways', ['id' => auth()->id()]) }}">Payment Gateways</a>
                            <a class="dropdown-item" href="{{ route('setting.brandingsfrm', ['id' => auth()->id()]) }}">Brandings</a>
                            <a class="dropdown-item" href="{{ route('smtp.smtpfrm', ['id' => auth()->id()]) }}">SMTP</a>
                            <a class="dropdown-item" href="{{ route('domain.edit', ['user' => auth()->id()]) }}">Domain</a>
                            <?php if(!Auth()->user()->hasrole('Agent')){ ?>
                                <a class="dropdown-item" href="{{ route('agent-setting.index') }}">Help/Tutorial</a>
                            <?php } ?>
                        </div>
                    </div>

                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Help/support tickets
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Earn With Us
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Services & Products
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Alerts for you
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Get Lead Magnet (New)
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Rewards, Coupons & Credit
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i> Coming Soon
                    </a>

                    <a href="javascript:void(0);"  data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                    </a>
                </div>
            </li>
    </ul>

</nav>