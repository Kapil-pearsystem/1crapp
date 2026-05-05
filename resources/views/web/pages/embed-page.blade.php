
<!--// pre login-->
@include('web.common.header')
@if($page_data->page_header_visible == 1)
<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>{{ ucwords($page_data->title) }}</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>{{ $page_data->title }}</span>
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

@include('web.common.footer')
