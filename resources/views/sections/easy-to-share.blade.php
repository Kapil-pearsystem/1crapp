@php 
    use App\Models\EasytoShareModel;
    $easytoshare = EasytoShareModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
@endphp
<!---- Easy to Share --->
<section class="al_sec_araea mt_50p" id="esy_shrrs">
    <div class="container qu_bx_partss">
        <div class="owl-carousel owl-theme" id="esy_to_shar">
            @foreach($easytoshare as $item)
                <div class="item">
                    <div class="qu_box_parts">
                        <!-- Display Image dynamically -->
                        <img src="{{ ASSETS_PATH.$item->image }}" alt="{{ $item->title }}" />
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!---- End Easy to Share --->