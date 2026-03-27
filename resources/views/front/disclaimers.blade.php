@include('web.common.header')
<section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
 
  <div class="midils_contnts">
   <div class="medilss">
        <h4>{{ $disclaimer->name ?? 'Disclaimers' }}</h4>
        <a href="{{ url('') }}">Home</a> &gt; <span>{{ $disclaimer->name ?? 'Disclaimers' }}</span>
   </div>
  </div>
</section>
 
 
<!--- Step 1 - OBTAIN ---->
<section class="al_sec_araea mt_50p">
    <div class="container how_it_mb">
        @if(!is_null($disclaimer))
                <div class="pages_content">
                    <!-- <h3>Information We Collect</h3> -->
                    <p>{!! $disclaimer->description !!}</p>
                </div>
        @else
            <p>No content found for disclaimers.</p>
        @endif
    </div>
</section>


@include('front.layouts.footer')

