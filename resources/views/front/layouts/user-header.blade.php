<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/jpg" href="https://admin.1crapp.com/images/icon.png"/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
</head>
<!-- Video Modal -->
<div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog set_y_vdo">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{{ url('home/img/close.svg')}}" alt="" /></span></button>
      <div class="modal-body">
	  <iframe width="100%" height="500" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=ONYzyvHZAE1RdK-o" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<!-- End Video Modal -->
<body>
<style>
.row.copy_addresss {
    border:none;
    margin: 0 0 15px;
    padding: 12px 0 5px;
}
.copy_btnns a {
    background: #5b87e1;
    padding: 5px 10px;
    display: inline-block;
    color: #fff;
    border-radius: 4px;
    font-size: 13px;
}
.copy_btnns a:hover{color:#fff; text-decoration:underline;}
.copy_btnns {
    display: inline-block;
    width: 100%;
    margin-bottom: 10px;
    text-align: right;
}
.nav-dropdown > li > a{color:#343a40;padding:7px 15px;border-bottom:1px solid #f6f6f6;}
.desktop_view_none{display:none !important;}

/* .shadow .top_menuues .top_sec_menu.cnt_parts.user_logins ul {    float: right;    display: block;    margin: 0;} */.shadow .top_menuues .top_sec_menu.cnt_parts.user_logins {    display: inline-block;    width: 100%;    padding: 10px 0;}.shadow .top_menuues .top_sec_menu.cnt_parts.user_logins ul li span span.countss {    background: #ffffff;    color: #1c5299;    width: 20px;    display: inline-block;    text-align: center;    padding: 0;    border-radius: 3px;    position: relative;    left: 5px;    font-size: 12px;    line-height: 20px;}.nav-menus-wrapper ul.nav-menu.align-to-right li.lgo_space a#activess {    width: auto;    text-align: center;}.nav-menu > li > a span.ques {    width: 20px;    display: inline-block;    background: #1c5299;    color: #fff;    text-align: center;    height: 20px;    border-radius: 50px;    position: relative;    right: 0px;}

@media (min-width: 481px) and (max-width: 767px) {
	.desktop_view_none{display:block !important;}
	.navigation-portrait .nav-menu > li > a i {font-size: 12px;}
	.shadow .top_menuues .top_sec_menu.cnt_parts.user_logins ul {float: left; padding: 0;}
	.nav-menus-wrapper ul.nav-menu.align-to-right.usr_logins li.clr_cngs {width:100%;}
	.nav-menus-wrapper ul.nav-menu.align-to-right.usr_logins li.clr_cngs a#activess {margin: 10px 0 10px 0px; width: auto;  position: relative; left: 14px;}}

@media (min-width: 320px) and (max-width: 480px) {
	.desktop_view_none{display:block !important;}
	.navigation-portrait .nav-menu > li > a i {font-size: 12px;}
	.shadow .top_menuues .top_sec_menu.cnt_parts.user_logins ul {float: right; display: flex; margin: 0; width: 100%; overflow-x: scroll; overflow-y: hidden;  white-space: nowrap; padding: 0; flex-wrap: inherit;}
	.nav-menus-wrapper ul.nav-menu.align-to-right.usr_logins li.clr_cngs {width:100%;}
	.nav-menus-wrapper ul.nav-menu.align-to-right.usr_logins li.clr_cngs a#activess {margin: 10px 0 10px 0px; width: auto;  position: relative; left: 14px;}}
</style>

<style>
table.table.table-bordered.tst_cam_listst tr th {
    border-top: #dddddd solid 1px;
}
table.table.table-bordered.tst_cam_listst tr td {
    vertical-align: middle;
    font-size: 13px;
	text-align:center;
}
table.table.table-bordered.tst_cam_listst span.sm_btnsss {
    background: #000;
    color: #fff;
    padding: 2px 5px;
    border-radius: 5px;
}
table.table.table-bordered.tst_cam_listst tr td a.link {
    margin-right: 6px;
}
table.table.table-bordered.tst_cam_listst tr td a.link:last-child{margin-right:0px;}
table.table.table-bordered.tst_cam_listst tr td i.fa.fa-star {
    color: #ffbf00;
}
.h_titless {
    margin-bottom: 15px;
    font-size: 22px;
    font-weight: 700;
    color: #000;
}

.switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 25px;
    border-radius: 20px;
    background: #ff0000;
    transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    vertical-align: middle;
    cursor: pointer;
    margin: 0;
}
.switch::before {
    content: '';
    position: absolute;
    top: 1px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: #fafafa;
    border-radius: 50%;
    transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
}
input:checked + .switch {
    background: #72da67;
}
input:checked + .switch::before {
    left: 27px;
    background: #fff;
}
input:checked + .switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
}

.alls_tabsst#othertabss_links .tab-wrapper {
    text-align: center;
    display: block;
    margin: auto;
    max-width: 100%;
}

.alls_tabsst#othertabss_links .tab-wrapper ul.tabs {
    justify-content: left;
    border-bottom: #ccc solid 1px;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link {
    margin-left: 0;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link {
    margin-left: 0;
    font-size: 14px;
    text-transform: capitalize;
    color: #646464;
}
.alls_tabsst#othertabss_links .tab-wrapper ul.tabs li.tab-link.active {
    color: #000;
	font-weight:600;
}

.add_paymmntss a {
    background: #f94755;
    padding: 3px 10px;
    color: #fff;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
}

.dash_board_pages .data_add_by {
   background: #e3e3e3;
    padding: 5px;
	margin-bottom:20px;
}
.dash_board_pages .data_add_by:last-child{margin-bottom:0;}
.dash_board_pages .data_add_by table{background:#fff; margin-bottom:0;}

.dash_board_pages .data_add_by .ad_show {
    background: #fff;
    padding: 5px;
	margin-bottom:5px;
}
.dash_board_pages .data_add_by .ad_show p.data_showss {
    margin: 0;
    font-weight: 700;
}
.dash_board_pages .data_add_by .ad_show p.data_showss span.mng_txtx {
    font-weight: 500;
    padding-left: 5px;
    font-size: 13px;
}
.dash_board_pages .data_add_by .data_bx_manges {
    display: inline-block;
    width: 100%;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {
    background: #fff;
    float: left;
    width: 19.6%;
    margin-right: 0.5%;
    padding: 10px;
    text-align: center;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child{margin-right:0;}

.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .icnn {
    width: 30px;
	height:25px;
    margin: 0 auto;
    margin-bottom: 10px;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae h5 {
    font-size: 20px;
    font-weight: 800;
	margin: 0 0 7px;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae p {
    margin: 0 0 5px;
    font-size: 13px;
    font-weight: 600;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae span {
    font-size: 12px;
}

.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea {
    display: inline-block;
    width: 100%;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea h4 {
    margin: 2px 0 5px;
    color: #999;
    font-size: 18px;
    font-weight: 700;
}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae .boths_araea p {
    margin: 8px 0 5px;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box {
    display: flex;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box .dily_dtlss {
    margin: 0 15px;
}
table.table.table-bordered.tst_cam_listst tr td .managess_box .dily_dtlss select:focus {
    outline: none;
}


.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss {
    display: flex;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.sm_textta {
    width: auto;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.mng_txtx {
    width: 70%;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss span.sm_textta {
    width: auto;
    text-wrap-mode: nowrap;
}
.dash_board_pages .data_add_by .ad_show p.data_showss.bothss_sertss select {
    max-width: 90px;
    width: 100%;
}


.data_add_by .dropbtn {
    background-color: #fff;
    padding: 3px 12px;
    font-size: 14px;
    color: #000;
    border: #d9d9d9 solid 1px;
    border-radius: 3px;
}
.data_add_by .dropdown {
    position: absolute;
    display: inline-block;
    right: 10px;
    top: -4px;
}

.data_add_by .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right:0;
}

.data_add_by .dropdown-content a {
    color: black;
    padding: 5px 16px;
    text-decoration: none;
    display: block;
    font-size: 13px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {
    background-color: #f94554;
    color: #fff;
}
table.table.table-bordered.tst_cam_listst tr th span.bothss {
    display: flex;
}
table.table.table-bordered.tst_cam_listst tr th span.bothss input.ck_boxx {
    margin: 0 5px 0 0;
}


.p_mitters canvas#foo {
    width: 100%;
    background: #fff;
    height: 100%;
}
.p_mitters canvas#foo {
    width: 100% !important;
    height: 100% !important;
}

.grea_bg{background:#e9e9e9 !important; font-size: 11px !important;}
.yellowe_bg{background:#ffdd00 !important;}
.reds_bg{background:#f94554 !important;}
.tx_read{color:#f94554 !important; font-weight:600;}
.tx_white{color:#fff !important;}
.tx_bluess{color:#6490cb !important; font-weight:600;}
.brd_none{border:none !important;}
.arow_rt_parts{text-align: right !important; background: #bbe4ed !important;     font-size: 11px !important;}
.fnt_size{font-size: 11px !important; padding-left: 3px !important; padding-right: 3px !important;}

.tanksss .ftr_thknsss {
    background: #2196f3;
    position: relative;
    padding: 18px 0;
}
.tanksss .ftr_thknsss .lgo_partss {
    max-width: 50px;
    width: 100%;
    position: absolute;
    height: 50px;
    overflow: hidden;
    top: 4px;
    left: 4px;
}
.tanksss .ftr_thknsss .lgo_partss img {
    width: 100%;
}
.tanksss .ftr_thknsss p {
    text-align: center;
    margin: 0;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
}
.tanksss .ftr_thknsss p a.ex_btn_areaa {
    float: right;
    background: #db0000;
    padding: 5px 13px;
    border-radius: 40px;
    position: absolute;
    right: 10px;
    top: 12px;
    color: #fff;
    border: #fff solid 2px;
}

.manages_widthsss{width:8%;  font-size:10px !important;}

a.sm_right_vdooos {float: right; display: inline-block; width: 8%;}
a.sm_right_vdooos img {width: 100%;}

@media (min-width: 481px) and (max-width: 767px) {
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}

.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: block; width: 40%; margin: 0 auto;
        margin-top: 10px;}

}

@media (min-width: 320px) and (max-width: 480px) {
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae {width: 100%;  margin-right: 0;  margin-bottom: 5px;}
.dash_board_pages .data_add_by .data_bx_manges .cn_box_araeae:last-child {margin-bottom:0px;}
.h_titless {font-size: 18px;}
.tanksss .ftr_thknsss .lgo_partss {position: relative; top: 0; left: 0; margin: 0 auto; margin-bottom: 10px;}
.tanksss .ftr_thknsss p {margin: 0 10px; font-size: 14px;}
.tanksss .ftr_thknsss p a.ex_btn_areaa {float: inherit; padding: 5px 13px; position: relative; right: 0; top: 0; display: inline-block; margin-top: 10px;}
}


</style>
@php
$menus = \App\Models\NavigationModel::select(
        'tbl_header_navigation.*',
        'tbl_assets.title as parent_asset_title',
        'tbl_assets.url as parent_asset_url',
        'tbl_assets.new_tab as parent_new_tab'
    )
    ->join('tbl_assets', 'tbl_assets.id', '=', 'tbl_header_navigation.page_id')
    ->where('tbl_header_navigation.created_by', app('currentAgent')->id)
    ->where('tbl_header_navigation.status', 1)
    ->where('tbl_header_navigation.parent_page_id',0)
    ->orderBy('tbl_header_navigation.priority','ASC')
    ->get();
@endphp
<!--- Header Part ---->
<section class="shadow" id="myHeader">
    <div class="top_menuues">
        <div class="container">
            <div class="top_sec_menu cnt_parts user_logins">
                @if(optional(auth()->user())->id)
                    <ul>
                        <li class="mb_view_nn"><a href="{{ url('earn-with-us') }}"><i class="fa fa-bullhorn"></i> <span>Promote 1CR APP</span></a></li>
                        <li class="mb_view_nn"><a href="{{ route('notifications') }}"><i class="fa fa-bell"></i> <span>Updates</span></a></li>
    					<li><a href="{{ url('wallet') }}"><span>Rewards <span class="countss">0</span></span></a></li>
    					<li><span>Welcome - <span class="user_nmss">Ramjee</span></span></li>
                        <li class="mb_view_nn"><a href="{{ url('my-profile') }}"> <span>My Account</span></a></li>
    					<li class="mb_view_nn"><a href="{{ route('logout') }}"> <span>Logout</span></a></li>
                    </ul>
                @else
                    <ul>
                        <li><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                        <li><a href="{{ url('about-us') }}"><i class="fa fa-user"></i> <span>About Us</span></a></li>
                        <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main_header_area animated">
            <nav id="navigation1" class="navigation">
                <!-- Logo Area Start -->
                <div class="nav-header">
                    <a class="nav-brand" href="{{ url('') }}"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                    <div class="nav-toggle"></div>
                    <div class="lg_sig_up_arass desktop_view">
                        <a href="javascript:void(0)" class="bg_red">Logout</a>
						<a href="javascript:void(0)" class="bg_blues">What's New ?</a>
                    </div>
                </div>
				<!-- End Logo Area Start -->
                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right usr_logins">
                        @foreach($menus as $menu)
                            @php
                                $sub_menus = \App\Models\NavigationModel::select(
                                        'tbl_header_navigation.*',
                                        'tbl_assets.title as chield_asset_title',
                                        'tbl_assets.url as chield_asset_url',
                                        'tbl_assets.new_tab as chield_new_tab'
                                    )
                                    ->join('tbl_assets', 'tbl_assets.id', '=', 'tbl_header_navigation.page_id')
                                    ->where('tbl_header_navigation.created_by', app('currentAgent')->id)
                                    ->where('tbl_header_navigation.parent_page_id', $menu->id)
                                    ->orderBy('tbl_header_navigation.priority','ASC')
                                    ->get();
                            @endphp
                            @if(!empty($sub_menus) && count($sub_menus)>0)
                                    @if($menu->is_authorized == '2'))
                                        <li>
                                            <a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a>
                                            <ul class="nav-dropdown">
                                                @foreach($sub_menus as $s_menu)
                                                    @if($s_menu->is_authorized == '2'))
                                                        <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                    @elseif($s_menu->is_authorized == '1'))
                                                        @if(optional(auth()->user())->id)
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @else
                                                        @if(is_null(optional(auth()->user())->id))
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @endif
                                                
                                                @endforeach
                                            </ul>
                                        </li>
                                    @elseif($menu->is_authorized == '1'))
                                    @if(optional(auth()->user())->id)
                                        <li>
                                            <a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a>
                                            <ul class="nav-dropdown">
                                                 @foreach($sub_menus as $s_menu)
                                                    @if($s_menu->is_authorized == '2'))
                                                        <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                    @elseif($s_menu->is_authorized == '1'))
                                                        @if(optional(auth()->user())->id)
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @else
                                                        @if(is_null(optional(auth()->user())->id))
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @endif
                                                
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    @if(is_null(optional(auth()->user())->id))
                                        <li>
                                            <a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a>
                                            <ul class="nav-dropdown">
                                                @foreach($sub_menus as $s_menu)
                                                    @if($s_menu->is_authorized == '2'))
                                                        <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                    @elseif($s_menu->is_authorized == '1'))
                                                        @if(optional(auth()->user())->id)
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @else
                                                        @if(is_null(optional(auth()->user())->id))
                                                            <li><a href="{{ $s_menu->chield_asset_url }}" @if($s_menu->chield_new_tab == 1) target="_blank" @endif>{{ $s_menu->title }}</a></li>
                                                        @endif
                                                    @endif
                                                
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endif
                            @else
                                @if($menu->is_authorized == '2')
                                    <li><a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a></li>
                                @elseif($menu->is_authorized == '1')
                                    @if(optional(auth()->user())->id)
                                        <li><a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a></li>
                                    @endif
                                @else
                                    @if(is_null(optional(auth()->user())->id))
                                        <li><a href="{{ $menu->parent_asset_url }}" @if($menu->parent_new_tab == 1) target="_blank" @endif>{{ $menu->title }}</a></li>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                        @if(is_null(optional(auth()->user())->id))
                            <li class="lgo_space"><a href="{{ url('login') }}" id="activess">Login</a></li>
                            <li class="clr_cngs"><a href="{{ route('register') }}" id="activess">Register Free</a></li>
                        @else
                            <li class="clr_cngs"><a href="javascript:void(0);" id="activess">What's New ?</a></li>
                        @endif
      <!--                  <li>-->
      <!--                      <a href="{{url('properties/buy-sale/list')}}">Home</a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          <li><a href="javascript:void(0);">How it works</a></li>-->
      <!--                          <li><a href="javascript:void(0);">Features</a></li>-->
      <!--                          <li><a href="{{url('properties/buy-sale/list')}}">Property List</a></li>-->
      <!--                      </ul>-->
      <!--                  </li>-->
						<!--<li>-->
      <!--                      <a href="{{ url('investors') }}">Investors</a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          <li><a href="{{url('investors-menu-popup')}}">Investors Menu Popup</a></li>-->
      <!--                      </ul>-->
      <!--                  </li>-->
						<!--<li>-->
      <!--                      <a href="{{ url('realtors') }}">Realtors</a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          <li><a href="{{url('realtors-menu-popup')}}">Realtors Menu Popup</a></li>-->
      <!--                      </ul>-->
      <!--                  </li>-->
						<!--<li>-->
      <!--                      <a href="javascript:void(0);">Market</a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          <li><a href="{{url('market-place-list')}}">PE Property Market</a></li>-->
      <!--                          <li><a href="{{ url('services-for-you') }}">PE Product & Services</a></li>-->
      <!--                      </ul>-->
      <!--                  </li>-->
      <!--                   <li><a href="{{ url('properties/buy-sale/list') }}">Property Analysis</a></li>-->

						<!--<li>-->
      <!--                      <a href="javascript:void(0);"> My Portfolio</a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          <li><a href="{{ url('my-properties') }}">My Properties</a></li>-->
                                <!--<li><a href="{{ url('property-details') }}">Property Details</a></li>-->
                                <!--<li><a href="{{ url('payment-details') }}">Payment Details</a></li>-->
      <!--                          <li><a href="{{ url('personal-money-path') }}">Personal Money Path ( PMP )</a></li>-->
      <!--                          <li><a href="{{ url('pbm') }}">Personal Budget Management ( PBM )</a></li>-->
      <!--                          <li><a href="{{ url('pnt') }}">Personal Networth Tracking ( PNT )</a></li>-->
      <!--                          <li><a href="{{ url('personal-financial-freedom-journey') }}">Personal Financial Freedom Journey (PFFJ)</a></li>-->
      <!--                      </ul>-->
      <!--                  </li>-->
                        @php
                        use Illuminate\Support\Facades\DB;
                            $moreLinks = DB::table('tbl_resources')
                                ->join('tbl_resource_category', 'tbl_resources.category', '=', 'tbl_resource_category.id')
                                ->where(['tbl_resource_category.name'=> 'More','tbl_resources.created_by'=> app('currentAgent')->id])
                                ->select('tbl_resources.title', 'tbl_resources.link')
                                ->orderBy('tbl_resources.id')
                                ->get();
                        @endphp
                         
      <!--                  <li>-->
      <!--                      <a href="javascript:void(0);">More <span class="ques">?</span></a>-->
      <!--                      <ul class="nav-dropdown">-->
      <!--                          @foreach($moreLinks as $link)-->
      <!--                              <li>-->
      <!--                                  <a href="{{ url($link->link) }}">-->
      <!--                                      {{ $link->title }}-->
      <!--                                  </a>-->
      <!--                              </li>-->
      <!--                          @endforeach-->
      <!--                      </ul>-->
      <!--                  </li>-->
					

						<!--<li><a href="javascript:void(0);">Prices</a></li>-->
      <!--                  <li><a href="{{url('setting')}}">Settings</a></li>-->

                        <!--<li class="desktop_view_none"><a href="javascript:void(0);"><i class="fa fa-user"></i> My Account</a></li>-->
                        <!--<li class="desktop_view_none"><a href="javascript:void(0);"><i class="fa fa-bullhorn"></i> Promote 1CR APP</a></li>-->
                        <!--<li class="desktop_view_none"><a href="javascript:void(0);"><i class="fa fa-bell"></i> Updates</a></li>-->
                        
                    </ul>
                </div>
                <!-- End Main Menus Wrapper -->
			</nav>
        </div>
    </div>
</section>
<!---- End Header Part ---->
