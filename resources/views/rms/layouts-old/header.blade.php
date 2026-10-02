
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
                    @php
                    use Illuminate\Support\Facades\DB;
                        $moreLinks = DB::table('tbl_resources')
                            ->join('tbl_resource_category', 'tbl_resources.category', '=', 'tbl_resource_category.id')
                            ->where(['tbl_resource_category.name'=> 'More','tbl_resources.created_by'=> app('currentAgent')->id])
                            ->select('tbl_resources.title', 'tbl_resources.link')
                            ->orderBy('tbl_resources.id')
                            ->get();
                    @endphp
                </ul>
            </div>
        </nav>
    </div>
</div>