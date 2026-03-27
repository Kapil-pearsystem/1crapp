<!--// post login-->
@include('front.layouts.user-header')
<style>
iframe {
    width:100%;
    height:150vh;
    
}
</style>
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>{{ $page_data->title }}</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>{{ $page_data->title }}</span>
   </div>
  </div>
</section>
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>

				<div class="col-lg-9">
                        <iframe 
                            src="{{ $page_data->embed_link }}" 
                            title="External Page"
                            class="embed-frame"
                            allowfullscreen>
                        </iframe>
                </div>
			</div>
		</div>
	</section>
@include('front.layouts.footer')
