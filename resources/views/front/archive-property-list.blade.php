@if(count($property_list)==0)
<div class="list-no-results text-center padding-t-20" style="width: 100%;padding-top: 20px;">You don't have any archived properties. Hover over a property for an option to archive it.
</div>
@else
        <?php foreach ($property_list as $list) {
                    $imgurl = url('img/property-placeholder.png');
                 if(isset($MainProperty->imageVideo)){ 
                                                $imageideos = explode(',', $MainProperty->imageVideo);
                                                if(count($imageideos)>0){
                                                        $imgurl= url('img') . '/' . $imageideos[0];
                                                }
                    }  
                    $propAddress = '';
                   // $propAddress = PropertyAddress::where('prop_id',$list['prop_id'])->first();
                    if($list['prop_street']){
                        $propAddress.= $list['prop_street']; 
                    }
                     if($list['prop_add_city']){
                        $propAddress.= ', '.$list['prop_add_city']; 
                    }
                     if($list['prop_add_state']){
                        $propAddress.= ', '.$list['prop_add_state']; 
                    }
                     if($list['prop_zip']){
                        $propAddress.= ', '.$list['prop_zip']; 
                    } 
?>
           <div class="col-lg-4">
                        <div class="list_box_area">
                            <div class="img_area">
                                <div class="ovr_bstss">
                                    <div class="und_tkss">
                                        <a href="javascript:void(0);"><i class="fa fa-check-circle"></i></a>
                                    </div>
                                </div>

                                <img src="{{ $imgurl }}" alt="" />
                            </div>
                            <div class="ic_area">
                                <div class="croosss" onclick="purchase_criteria({{  $list['prop_id'] }})"
                                    data-toggle="modal" data-target="#purchase_criteria">
                                    <i class="fa fa-times"></i>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="restoreProperty({{ $list['prop_id']}} )" title="Restore this property from archive"><i class="fa fa fa-reply"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="deleteProperty({{ $list['prop_id']}} )"><i class="fa fa-trash"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="cnt_boxxs">
                                <h4><a href="{{ url('property-analysis') }}/{{ base64_encode($list['prop_id']) }}" >{{ $list['prop_name'] }}</a></h4>
                                <p>{{ $propAddress }}</p>
                                <span>Purchase Price : {{ $currency }} {{ number_format($list['prop_purchasePrice']) }}</span>
                                <p style="color: #7e7777;">{{ $list['prop_tags'] }}</p>
                              
                            </div>
                        </div>
                    </div> 
     <?php   } ?>
     @endif