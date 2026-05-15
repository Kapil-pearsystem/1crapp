@php
    use App\Models\FeatureModel;
    $features = FeatureModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('id', 'DESC')->get();
@endphp
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
                        <p>1CR APP Features can help to jump-start your collaboration efforts. It's super easy to use & free plans available.</p>
                    </div>
                </div>
                @foreach($features as $feature)
                    <div class="col-lg-6">
                        <div class="fur_boxx_cnt">
                            <div class="us_mg_arara">
                                <img src="{{ $feature->image }}" alt="Feature Image" />
                            </div>

                            <div class="us_cntentts">
                                <h5>{{ $feature->title }}</h5>
                                <p>{{ $feature->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>