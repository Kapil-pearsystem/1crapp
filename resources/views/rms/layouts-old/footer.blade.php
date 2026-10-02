
@php
$topFooter = DB::table('tbl_topfooter')->where('created_by', app('currentAgent')->id)->where('status', 1)->first();
$compliances = DB::table('tbl_compliances')->where('created_by', app('currentAgent')->id)->where('status', 1)->orderBy('priority', 'ASC')->get();
@endphp
<footer id="ftr_alsss">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="lgo_areaa">
                    @if(@$topFooter->logo_enable == 1)<div class="lgo"><a href="{{ @$topFooter->logo_link }}"><img src="{{ @$topFooter->logo?$topFooter->logo:url('img/lgo_botms.png'); }}" alt="" height="176" width="150" /></a></div>@endif
                    @if(@$topFooter->playstore_enable == 1)<div class="lg_ply"><a href="{{ @$topFooter->playstore_link }}" target="_blank"><img src="{{ @$topFooter->playstore_logo?@$topFooter->playstore_logo:url('img/gl_play.png'); }}" alt="" height="60" width="200" /></a></div>@endif
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Platform</h2>
                    <ul>
                        @php
                        $cat1Menu = DB::table('tbl_footer_menues')->where('category', 1)->where('created_by', app('currentAgent')->id)->where('status', 1)->get();
                        @endphp
                        @foreach($cat1Menu as $cat1m)
                        <li><a href="{{ $cat1m->link }}" @if($cat1m->new_tab == 1) target="_blank" @endif><i class="fa fa-angle-right"></i> {{ $cat1m->title }}</a></li>
                        @endforeach
                        <!-- <li><a href="{{ url('features') }}"><i class="fa fa-angle-right"></i> Features</a></li>
                        <li><a href="{{ url('price') }}"><i class="fa fa-angle-right"></i> Plans & pricing</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Product pudates</a></li>
                        <li><a href="{{ url('join-the-team') }}"><i class="fa fa-angle-right"></i> Career</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Lets Talk</a></li>
                        <li><a href="{{ url('meet-team') }}"><i class="fa fa-angle-right"></i> Our Team</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Clients</a></li>
                        <li><a href="{{ url('testimonials') }}"><i class="fa fa-angle-right"></i> Testimonials</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Use Cases</h2>
                    <ul>
                        @php
                        $cat2Menu = DB::table('tbl_footer_menues')->where('category', 2)->where('created_by', app('currentAgent')->id)->where('status', 1)->get();
                        @endphp
                        @foreach($cat2Menu as $cat2m)
                        <li><a href="{{ $cat2m->link }}" @if($cat2m->new_tab == 1) target="_blank" @endif><i class="fa fa-angle-right"></i> {{ $cat2m->title }}</a></li>
                        @endforeach
                        <!-- <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Buy & Hold Analysis</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Buy & sell Analysis</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> BFRR Analysis (LAPA)</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Commercial Analysis</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Resources</h2>
                    <ul>
                        @php
                        $cat3Menu = DB::table('tbl_footer_menues')->where('category', 3)->where('created_by', app('currentAgent')->id)->where('status', 1)->get();
                        @endphp
                        @foreach($cat3Menu as $cat3m)
                        <li><a href="{{ $cat3m->link }}" @if($cat3m->new_tab == 1) target="_blank" @endif><i class="fa fa-angle-right"></i> {{ $cat3m->title }}</a></li>
                        @endforeach
                        <!-- <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Help Center</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Mobile App</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Free Resources</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Affiliate Program</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <h2>Company </h2>
                    <ul>
                        @php
                        $cat4Menu = DB::table('tbl_footer_menues')->where('category', 4)->where('created_by', app('currentAgent')->id)->where('status', 1)->get();
                        @endphp
                        @foreach($cat4Menu as $cat4m)
                        <li><a href="{{ $cat4m->link }}" @if($cat4m->new_tab == 1) target="_blank" @endif><i class="fa fa-angle-right"></i> {{ $cat4m->title }}</a></li>
                        @endforeach
                        <!-- <li><a href="{{ url('about-us') }}"><i class="fa fa-angle-right"></i> About us</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Our Blog</a></li>
                        <li><a href="{{ url('contact-us') }}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Press Kit</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="usr_likts">
                    <div class="urs_bx_rgss d_bluee">
                        <div class="bg_ctxtx">{{ @$topFooter->promo_title }}</div>
                        <div class="cnt_txt_bx">
                            <h4>{{ @$topFooter->promo_subtitle }}</h4>
                            <p>{{ @$topFooter->promo_content }}</p>
                        </div>
                        <div class="mg_bx_araeae">
                            <img src="{{ @$topFooter->promo_icon?@$topFooter->promo_icon:url('img/bk_images.png'); }}" alt="" />
                        </div>
                    </div>
                    <a href="{{ @$topFooter->promo_btn_link }}" target="_blank" class="dwn_ldss">{{ @$topFooter->promo_btn_text }}</a>
                    <div class="social_lk_partss">
                        @php
                        $socialLinks = DB::table('tbl_footer_sociallinks')->where('created_by', app('currentAgent')->id)->get();
                        @endphp
                        @foreach($socialLinks as $sLinks)
                        <a href="{{ $sLinks->link }}"  target="_blank" @if($sLinks->new_tab == 1) @endif><i class="fa {{ $sLinks->icon }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @php
        $btmFooter = DB::table('tbl_btmfooter')->where('created_by', app('currentAgent')->id)->where('status', 1)->first();
        @endphp
        <div class="row mt_50p">
            @if(@$btmFooter->left_enable == 1)
            <div class="col-lg-3">
                <div class="jn_communtys">
                    <div class="jn_cmmuny_mgs">
                        <img src="{{ @$btmFooter->image?@$btmFooter->image:url('home/img/join_communty.jpg')}}" alt="" />
                    </div>
                    <a href="{{ @$btmFooter->btn_link }}" target="_blank" class="jn_n_f_f">{{ @$btmFooter->btn_text }}</a>
                </div>
            </div>
            @endif
            <div class="col-lg-5">
                <div class="rev_gl_rv">
                    <h4>{{ @$btmFooter->title }}</h4>
                    <p>{{ @$btmFooter->description }}</p>
                    <!-- <div class="rv_usr_lgo">
                        @if(@$btmFooter->google_review_enable == 1)
                            <a href="{{ @$btmFooter->google_review_url }}" target="_blank"><img src="{{ @$btmFooter->google_review_image?@$btmFooter->google_review_image:url('home/img/gl_reviews.png')}}" alt="" /></a>
                        @endif
                        @if(@$btmFooter->trust_pilot_enable == 1)
                            <a href="{{ @$btmFooter->trust_pilot_url }}" target="_blank"><img src="{{ @$btmFooter->trust_pilot_image?@$btmFooter->trust_pilot_image:url('home/img/revie_on_us1.png')}}" alt="" /></a>
                        @endif
                    </div> -->
                </div>
            </div>
            @if(@$btmFooter->subscribe_enable == 1)
            <div class="col-lg-4">
                <div class="rev_gl_rv news_ltrss">
                    <h4>{{ @$btmFooter->subscribe_title }}</h4>
                    <p>{{ @$btmFooter->subscribe_content }}</p>
                    {!! @$btmFooter->subscribe_embededcode !!}
                    <?/*<form id="subscribeForm" action="{{ route('subscribe') }}" method="POST">
                        <div class="form-group nwss_frm">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required />
                        <!-- Display validation errors dynamically -->
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit">SIGN UP</button>
                        </div>
                    </form>*/ ?>
                </div>
            </div>
            @endif
        </div>
        <div class="copy_btm">
            <div class="row">
                <div class="col-lg-8">
                    <div class="lkns_bntsss">
                        @foreach($compliances as $compliance)
                        <a href="{{ $compliance->link }}" @if($compliance->new_tab == 1) target="_blank" @endif>{{ $compliance->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4"> Copyright {{ DB::table('branding_setting')->where('user_id', app('currentAgent')->id)->value('copyright_year')??date('Y') }} <a href="{{ url('') }}">{{ request()->getHost() }}</a> all rights reserved </div>
            </div>
        </div>
    </div>
</footer>