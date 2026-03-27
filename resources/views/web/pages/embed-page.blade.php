
<!--// pre login-->
@include('web.common.header')

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>{{ $page_data->title }}</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>{{ $page_data->title }}</span>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <iframe 
                src="{{ $page_data->embed_link }}" 
                title="External Page"
                width="100%"
                height="800"
                style="border: none; border-radius: 8px;">
            </iframe>
        </div>
    </div>
</div>

@include('web.common.footer')
