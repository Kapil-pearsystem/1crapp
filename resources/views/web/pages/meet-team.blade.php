@include('web.common.header')

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Meet the Team</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Team</span>
        </div>
    </div>
</section>

<section class="dash_board_pages">
    <div class="container">
        <div class="al_pages_contentstst abt_pgss mr_botm_30">
            <h4>{{ $meetTeam->title ?? 'Meet the 1CR APP TEAM' }}</h4>
            <p>{!! $meetTeam->description ?? 'Lorem Ipsum is simply dummy text...' !!}</p>
        </div>

        <div id="ourglr_tabs" class="resources_tools">
            <div class="tab-wrapper">
                <ul class="tabs">
                    @foreach($categories as $index => $category)
                        <li class="tab-link {{ $index == 0 ? 'active' : '' }}" data-tab="{{ $category->id }}">
                            {{ $category->category }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="content-wrapper">
                @foreach($categories as $index => $category)
                    <div id="tab-{{ $category->id }}" class="tab-content {{ $index == 0 ? 'active' : '' }} mr_top_30">
                        <div class="row">
                            @if(isset($teamDetails[$category->id]))
                                @foreach($teamDetails[$category->id] as $team)
                                    <div class="col-lg-4">
                                        <div class="meet_boxx">
                                            <span class="ms_meet"><img src="{{ url('home/img/mes_ics.png') }}" alt="" /></span>
                                            <div class="mg_ara">
<img src="{{ asset($team->image) }}" alt="{{ $team->name }}" />
                                            </div>
                                            <h5>{{ $team->name }}</h5>
                                            <p>{{ $team->designation }}</p>
                                            <div class="lr_viddoo">
                                                @if($team->button_link)
                                                <a href="{{ $team->button_link }}">{{ $team->button_title ?? 'Learn More' }}</a>
                                                @else
                                                <a href="javascript:void(0);">{{ $team->button_title ?? 'Learn More' }}</a>
                                                @endif
                                                <span class="vddo_ply"><i class="fa fa-caret-right"></i></span>
                                            </div>
                                            <div class="socials_ic">
                                                @if($team->facebook)
                                                    <a href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a>
                                                @endif
                                                @if($team->instagram)
                                                    <a href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a>
                                                @endif
                                                @if($team->youtube)
                                                    <a href="{{ $team->youtube }}"><i class="fa fa-youtube-play"></i></a>
                                                @endif
                                                @if($team->linkedin)
                                                    <a href="{{ $team->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                                @endif
                                                @if($team->twitter)
                                                    <a href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a>
                                                @endif
                                                @if($team->whatsapp)
                                                    <a href="{{ $team->whatsapp }}"><i class="fa fa-whatsapp"></i></a>
                                                @endif
                                                @if($team->google)
                                                    <a href="{{ $team->google }}"><i class="fa fa-google-plus"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p>No team members found in this category.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

<section class="get_nd_blogss">
    <div class="container">
        <div class="get_strs">
            <h4>
                <a href="{{ $meetTeam->button_link ?? 'javascript:void(0);' }}">
                    {{ $meetTeam->button_title ?? "Get Started. It's Free." }}
                </a>
            </h4>

            {{-- अगर plain text है --}}
            @if(!empty($meetTeam->short_content))
                <p>{!! nl2br(e($meetTeam->short_content)) !!}</p>
            @endif

            {{-- content अगर HTML है तो raw HTML show करें --}}
            @if(!empty($meetTeam->content))
                {!! $meetTeam->content !!}
            @endif
        </div>
    </div>
</section>


<section class="nd_blogss">
    @include('web.pages.need-help')
</section>

@include('web.common.footer')

{{-- Add JS to toggle tab content --}}
<script>
    document.querySelectorAll('.tab-link').forEach(tab => {
        tab.addEventListener('click', function() {
            let tabId = this.getAttribute('data-tab');

            // Remove active class from tabs
            document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Remove active class from tab contents
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            // Show current tab content
            document.getElementById('tab-' + tabId).classList.add('active');
        });
    });
</script>
