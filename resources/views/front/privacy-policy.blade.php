@include('web.common.header')
<section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
 
  <div class="midils_contnts">
   <div class="medilss">
        <h4>{{ $privacy->name ?? 'Privacy Policy' }}</h4>
        <a href="{{ url('') }}">Home</a> &gt; <span>{{ $privacy->name ?? 'Privacy Policy' }}</span>
   </div>
  </div>
</section>
 
 
<!--- Step 1 - OBTAIN ---->
<section class="al_sec_araea mt_50p">
    <div class="container how_it_mb">
        @if(!is_null($privacy))
                <div class="pages_content">
                    <!-- <h3>Information We Collect</h3> -->
                    <p>{!! $privacy->description !!}</p>
                </div>
        @else
            <p>No content found for privacy policy.</p>
        @endif
    </div>
</section>



@include('front.layouts.footer')

