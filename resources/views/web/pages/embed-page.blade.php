
<!--// pre login-->
@if($page_data->custom_header_visible == 1)
    @include('front.custom-layout.header')
@else
    @include('front.layouts.user-header')
    <section class="tital_mg_cntss">
        <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
        <div class="midils_contnts">
            <div class="medilss">
                <h4>{!! ucwords($page_data->title) !!}</h4>
                <a href="{{ url('') }}">Home</a> &gt; <span>{!! ucwords($page_data->title) !!}</span>
            </div>
        </div>
    </section>
@endif

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            {!! $page_data->embed_code !!}
        </div>
    </div>
</div>
@if($page_data->custom_footer_visible == 1)
    @include('front.custom-layout.footer')
@else
    @include('front.layouts.footer')
@endif
