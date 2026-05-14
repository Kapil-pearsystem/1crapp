@php 
    use Illuminate\Support\Facades\DB;
    $menus = DB::table('tbl_custommenu')->where(['type'=> 1, 'parent_id'=> null])->where('created_by', app('currentAgent')->id)->get();
    $layouts = DB::table('tbl_customlayout')->where('created_by', app('currentAgent')->id)->first();
@endphp
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>OTP IN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/jpg" href="https://kapil.1crapp.com/admin/images/icon.png"/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
</head>
<!-- End Form Modal -->
<style>
    .shadow.othr_pgss_lde .top_menuues {
        margin: 0;
        padding: 5px 0;
        background: #000;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
        margin: 0 0 0px;
        padding: 5px 0;
        float: right;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
        padding: 14px 10px;
        display: inline-block;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
        padding: 15px 10px;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
        background: #ff0000;
        padding: 8px 20px;
        display: inline-block;
        border-radius: 100px;
        font-weight: 700;
        position: relative;
        top: 6px;
    }
    .new_ar_tring {
        text-align: center;
        display: inline-block;
        width: 100%;
    }
    .new_ar_tring h2 {
        font-size: 24px;
        margin: 0 0 14px;
        font-weight: 600;
    }
    .new_ar_tring h2.bnt_rundds {
        background: #f5cb8d;
        padding: 12px 25px;
        color: #000000;
        font-size: 17px;
        font-weight: 300;
        border-radius: 10px;
        display: inline-block;
    }
    .new_ar_tring h3 {
        margin: 25px 0 25px;
        font-size: 34px;
        font-weight: 700;
    }
    .new_ar_tring p {
        font-size: 18px;
        font-weight: 600;
        max-width: 700px;
        margin: 0 auto;
        width: 100%;
    }
    .v_part_liststs {
        display: inline-block;
        width: 100%;
    }
    .v_part_liststs ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .v_part_liststs ul li {
        margin-bottom: 15px;
        font-weight: 300;
        font-size: 15px;
        color: #000;
    }
    .v_part_liststs ul li i {
        color: #87c50e;
        font-size: 18px;
        -webkit-text-stroke: 1px #ffffff;
    }
    .v_part_liststs ul li strong {
        font-weight: 600;
    }
    .v_part_liststs .bk_pert_sh {
        border: #e5e5e5 solid 1px;
        margin-top: 30px;
        padding: 15px;
        background: #1c5299;
    }
    .v_part_liststs .bk_pert_sh p {
        text-align: center;
        color: #fff;
        margin: 0 0 20px;
        font-size: 14px;
    }
    .v_part_liststs .bk_pert_sh a h5 {
        margin: 0px 0 5px;
        font-size: 18px;
        font-weight: 700;
    }
    .v_part_liststs .bk_pert_sh a span {
        font-size: 12px;
    }
    .v_part_liststs .tx_v_ars {
        margin-top: 15px;
        text-align: center;
        font-size: 15px;
        font-weight: 600;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-prev {
        position: absolute;
        left: -30px;
        margin: 0;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-prev i {
        font-size: 35px;
        -webkit-text-stroke: 3px #a8cfff;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-next {
        position: absolute;
        right: 30px;
        margin: 0;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-next i {
        font-size: 35px;
        -webkit-text-stroke: 3px #a8cfff;
    }
    .ftr_new_other {
        background: #000;
    }
    .ftr_new_other {
        margin-top: 50px;
    }
    .ftr_new_other .ftr_content {
        background: #000;
        padding: 20px;
        text-align: center;
    }
    .ftr_new_other .ftr_content .lgo {
        margin-bottom: 25px;
    }
    .ftr_new_other .ftr_content .lgo a {
        display: inline-block;
    }
    .ftr_new_other .ftr_content .menu_ftrr {
        margin-bottom: 25px;
    }
    .ftr_new_other .ftr_content .menu_ftrr a {
        color: #fff;
        margin-right: 20px;
    }
    .ftr_new_other .ftr_content .menu_ftrr a:last-child {
        margin-right: 0px;
    }
    .ftr_new_other .ftr_content .crt_arar {
        color: #fff;
        margin-top: 20px;
        display: inline-block;
        font-size: 15px;
    }
    .ftr_new_other .ftr_content .crt_arar img.logo {
        margin-right: 15px;
    }
    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-nav > li {
        position: relative;
    }

    .navbar-nav > li > a {
        color: #fff;
        text-decoration: none;
        padding: 15px 12px;
        display: block;
    }

    /* Submenu */
    .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: #111;
        min-width: 220px;
        padding: 10px 0;
        z-index: 99999;
        border-radius: 5px;
    }

    .submenu li {
        width: 100%;
        list-style: none;
    }

    .submenu li a {
        display: block;
        padding: 10px 15px;
        color: #fff;
        white-space: nowrap;
    }

    .submenu li a:hover {
        background: #222;
        color: #fff;
        text-decoration: none;
    }
     

    .has-submenu{
        position:relative;
    }

    .has-submenu:hover .submenu{
        display:block !important;
        position:absolute;
        top:100%;
        left:0;
        background:#000;
        min-width:220px;
        z-index:99999;
    }
</style>
<body>
<!--- Header Part ---->
<section class="shadow othr_pgss_lde" id="myHeader">
    <div class="top_menuues">
        <div class="container">
		  <div class="row">
		   <div class="col-lg-2 col-2">
		    <div class="othr_logges">
                @if($layouts && $layouts->logo)
                    <a class="nav-brand" href="{{ url('/') }}"><img class="logo" src="{{ $layouts->logo }}" alt="Logo" /></a>
                @endif
			</div>
		   </div>
		   <div class="col-lg-10 col-10">
		    <div class="top_sec_menu cnt_parts">
                @if(!is_null($menus))
                <ul class="navbar-nav">
                   @foreach($menus as $menu)
                    @php
                        $chield_menues = DB::table('tbl_custommenu')
                            ->where([
                                'type' => 1,
                                'parent_id' => $menu->id
                            ])
                            ->where('created_by', app('currentAgent')->id)
                            ->get();
                    @endphp
                    @if($chield_menues->isEmpty())
                        <li>
                            <a href="{{ $menu->page_url }}"
                            @if($menu->open_new_tab == 1) target="_blank" @endif>
                                @if($menu->icon)
                                    <i class="fa {{ $menu->icon }}"></i>
                                @endif
                                <span>{{ $menu->title }}</span>
                            </a>
                        </li>
                    @else
                        <li class="has-submenu">
                            <a href="javascript:void(0)">
                                @if($menu->icon)
                                    <i class="fa {{ $menu->icon }}"></i>
                                @endif
                                <span>{{ $menu->title }} <i class="fa fa-chevron-down"></i></span>
                            </a>
                            <ul class="submenu d-none" >
                                @foreach($chield_menues as $child)
                                    <a href="{{ $child->page_url }}"
                                        @if($child->open_new_tab == 1) target="_blank" @endif>
                                        <li>
                                            
                                            @if($child->icon)
                                                <i class="fa {{ $child->icon }}"></i>
                                            @endif
                                            <span>{{ $child->title }}</span>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                    <!-- <li class="callss"><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li> -->
                    @if($layouts && $layouts->logo)
                        <li><a href="{{ $layouts->btn_link }}" class="gt_it_nnw" @if($layouts->open_new_tab == 1) target="_blank" @endif style="background-color:{{ $layouts->btn_bg_color }}; color:{{ $layouts->btn_text_color }};">{{ $layouts->btn_text}}</a></li>
                    @endif
                </ul>
                @else 
                <ul>
				    <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                    <li class="callss"><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                    <li><a href="javascript:void(0);" class="gt_it_nnw" data-toggle="modal" data-target="#sub_m_al_frms">Get it now</a></li>
                </ul>
                @endif
            </div>
		   </div>
		  </div>
        </div>
    </div>
</section>
<!---- End Header Part ---->
