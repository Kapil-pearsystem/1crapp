<?php
use App\Models\MainProperty;
use App\Models\PropertyTypeModel;
$property_type = PropertyTypeModel::select('title','key')->where("status",1)->orderBy('priority','ASC')->get();
$segments = request()->segments();
$secondLastSegment = $segments[count($segments) - 2] ?? null;
?>
<div class="col-lg-3">
    @foreach($property_type as $type)
    <!--  Buy & Sall -->
      @if($type->key == 'control-sale')
        <div class="shadow align-items-center p-4 pl-3  <?php if($secondLastSegment == $type->key){ echo 'bd-left';} ?> mb-4" id="proprty_lsts_lft">
            <div class="row">
                <div class="col-lg-12">
                    <h3>
                        <img src="{{url('')}}/img/prop_icnss.jpg" alt="" /> {{ $type->title }}
                        <span class="float-right text-primary font-weight-bold h2 mt-0">
                            <a href="{{ route('properties.new-property.landing-price')}}" style="font-size: 22px;text-decoration: none;">+</a>
                        </span>
                    </h3>
                </div>

                <div class="col-lg-2">
                    <h3 class="text-primary font-weight-bold">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</h3>
                </div>
                <div class="col-lg-10">
                    <a href="#" class="text-primary mb-3 block_fl"><i class="fa fa-home mr-2" aria-hidden="true"></i>Property</a>
                    <a href="javascript:void(0);" class="block_fl"><i class="fa fa-search mr-2" aria-hidden="true"></i>Purchase Criteria</a>
                </div>
            </div>
        </div>
      @else
        <div class="shadow align-items-center p-4 pl-3  <?php if($secondLastSegment == $type->key){ echo 'bd-left';} ?> mb-4" id="proprty_lsts_lft">
            <div class="row">
                <div class="col-lg-12">
                    <h3>
                        <img src="{{url('')}}/img/prop_icnss.jpg" alt="" /> {{ $type->title }}
                        <span class="float-right text-primary font-weight-bold h2 mt-0">
                            <a href="javascript:void(0);" onclick="addProperty('{{ $type->key }}')" style="font-size: 22px;text-decoration: none;">+</a>
                        </span>
                    </h3>
                </div>

                <div class="col-lg-2">
                    <h3 class="text-primary font-weight-bold">{{ MainProperty::where('prop_parent_type', $type->key)->where('user_id', Auth::id())->count(); }}</h3>
                </div>
                <div class="col-lg-10">
                    <a href="{{ route('properties.list',['type'=>$type->key])}}" class="text-primary mb-3 block_fl"><i class="fa fa-home mr-2" aria-hidden="true"></i>Property</a>
                    <a href="javascript:void(0);" class="block_fl"><i class="fa fa-search mr-2" aria-hidden="true"></i>Purchase Criteria</a>
                </div>
            </div>
        </div>
      @endif
    @endforeach

</div>

<script>
function addProperty(cat) {
    let prop_url = '{{ route('properties.new-property')}}';
    let url = '{{ route('properties.set-cat-session') }}';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ prop_cat: cat })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            window.location.assign(prop_url);
        } else {
            alert('Failed to set category in session');
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>