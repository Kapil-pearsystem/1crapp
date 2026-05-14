
<!--// post login-->
@if($page_data->layout == 2)
    @include('front.custom-layout.header')
@elseif($page_data->layout == 1)
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
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>External Page</title>
</head>
<body>
@endif
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            {!! $page_data->embed_code !!}
        </div>
    </div>
</div>
@if($page_data->layout == 1)
    @include('front.layouts.footer')
@elseif($page_data->layout == 2)
    @include('front.custom-layout.footer')
@else
</body>
</html>
@endif