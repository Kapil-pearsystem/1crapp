@include('web.common.header')
<section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
 
  <div class="midils_contnts">
   <div class="medilss">
        <h4>{{ $data->name ?? 'Data Deletion' }}</h4>
        <a href="{{ url('') }}">Home</a> &gt; <span>{{ $data->name ?? 'Data Deletion' }}</span>
   </div>
  </div>
</section>
 
 
 
<!--- Step 1 - OBTAIN ---->
<section class="al_sec_araea mt_50p">
    <div class="container how_it_mb">
       @if(!is_null($data))
            <div class="pages_content">
                <p>{!! $data->description !!}</p>
            </div>
        @else
            <p>No content found for data deletion.</p>
        @endif
    </div>
</section>


@include('front.layouts.footer')

