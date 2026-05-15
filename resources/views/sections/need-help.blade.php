@php 
    use App\Models\NeedHelpModel;
    $needhelp = NeedHelpModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'ASC')->get();
@endphp
<!---- Help ---->
<section class="al_sec_araea mt_50p pb-0">
<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
                        <h3>Need Help?</h3>
                        <p>Explore our resources to quickly get started with Flowlu business management software</p>
                    </div>
                </div>
                @foreach($needhelp as $item)
                    <div class="col-lg-4">
                        <div class="hpls_box">
                            <div class="ovr_centetent">
                                <p>{{ $item->title }}</p>
                                <a href="{{ url($item->url) }}" {{ $item->url_new_tab ? 'target="_blank"' : '' }}>
                                    {{ $item->link_name }}
                                </a>
                            </div>
                            <img src="{{ ASSETS_PATH.$item->image }}" alt="" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>
<!---- Help ---->