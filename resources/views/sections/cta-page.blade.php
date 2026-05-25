@if($cta_data->type == 1)
<section class="get_nd_blogss mt_50">
    <div class="container">
        <div class="get_strs">
            <h4>
                <a href="{{ $cta_data->left_link_url ?? 'javascript:void(0)' }}" target="{{ $cta_data->left_link_new_tab ? '_blank' : '_self' }}">
                    {{ $cta_data->left_link_title }}
                </a>
            </h4>
            <p>{{ $cta_data->title }}</p>
            <p>{{ $cta_data->description }}</p>
        </div>
    </div>
</section>
@elseif($cta_data->type == 2)
<section class="get_nd_blogss mt_50">
    <div class="btm_contect red_to_drvvs">
        <h4>{{ $cta_data->title }}</h4>
        <p>{{ $cta_data->description }}</p>

        <div class="bunnt_araeae_bnt">
            <div class="bunnt_araeae_bnt">
                <a href="{{ $cta_data->left_link_url ?? 'javascript:void(0);' }}"
                    class="read_bg"
                    target="{{ $cta_data->left_link_new_tab }}">
                    {{ $cta_data->left_link_title }}
                    <i class="fa fa-arrow-circle-right"></i>
                </a>

                <a href="{{ $cta_data->right_link_url ?? 'javascript:void(0);' }}"
                    target="{{ $cta_data->right_link_new_tab }}">
                    {{ $cta_data->right_link_title }}
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@elseif($cta_data->type == 3)
<section class="al_sec_araea mt_50">
    <div class="container">
        <div class="see_how_areaa">
            <div class="see_h_are_ct">
                <div class="mediaa">
                    <img src="{{ url('home/img/1cr_lgo.png')}}" alt="" />
                    <h5>{{ $cta_data->title }}</h5>
                    <p>
                        <a href="{{ $cta_data->left_link_url ?? 'javascript:void(0)' }}" class="alluser"
                            target="{{ $cta_data->left_link_new_tab ? '_blank' : '_self' }}">
                            {{ $cta_data->left_link_title ?? 'Sign up for free' }}
                            <img src="{{ url('home/img/arrow_right.svg') }}" alt="" />
                        </a>
                    </p>
                </div>
            </div>
            <div class="mg_ara_stl">
                <img src="{{ url('home/img/see_how.png')}}" alt="" class="ovr_m" />
                <div class="und_mgss"><img src="{{ asset('admin/' . $cta_data->image) }}" alt="" /></div>
                <div class="socialss">
                    <ul>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/chn_ico.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/twi_tter.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/face_book.png')}}" alt="" /></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><img src="{{ url('home/img/insta_gr.png')}}" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="get_nd_blogss mt-0">
    <div class="container">
        <div class="get_strs">
            <h4>
                <a href="{{ $cta_data->left_link_url ?? 'javascript:void(0)' }}" target="{{ $cta_data->left_link_new_tab ? '_blank' : '_self' }}">
                    {{ $cta_data->left_link_title }}
                </a>
            </h4>
            <p>{{ $cta_data->title }}</p>
            <p>{{ $cta_data->description }}</p>
        </div>
    </div>
</section>
@endif