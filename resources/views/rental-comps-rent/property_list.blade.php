<div class="compa_listststs">
    @php
        $count = 0;
        $modalOverlay = 0;
    @endphp
    @foreach ($propertyList as $item)
        @php $count++; @endphp
        
        @if(is_null($userSubscription) && $count > 5 ) <div class="compa_listststs"> @endif
            <div class="chk_list_araea com_alss">
                <div class="middells">
                    <div class="tiksss als_show_ar">
                        <div class="con-tooltip top">
                            <i class="fa fa-check"></i>
                            <div class="tooltip">
                                <h5>Upgrade to Customize Comps</h5>
                                <p>Upgrade your plan to select specific comps to use when calculating ARV.</p>
                            </div>
                        </div>
                    </div>
                    <div class="cntntss">
                        <h5>{{ $item['prop_name'] }}</h5>
                        <p>House / {{ $item['desc_type'] }}  {{$item['SqFt']}} Built {{ $item['builtYear'] }}</p>                        
                        <p class="usggs">{{$item['distance']}} mi Away</p>                        
                    </div>
                    <div class="sm_contsts">
                        <span>Listed {{ $item['prop_dateOfSale'] }}</span>
                        <p>₹ {{ $item['propPrice'] }}</p>
                        <p>₹ {{ $item['SqFtPrice'] }}</p> 
                    </div>
                    <div class="arorrs"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>

            @if(is_null($userSubscription) && $count > 5 && $modalOverlay == 0)
                <div id="modalOverlay">
                    <div class="modalPopup">
                        <span class="icoo"><i class="fa fa-exclamation"></i></span>
                        <h1>Upgrade to View More Comps</h1>
                        <p>Your current plan is limited. Upgrade to view up to 20 recent rental comps for any property and better estimate potential rents.</p>
                        <button class="buttonStyle" id="button">Try This Feature Free</button>
                    </div>
                </div>
                @php $modalOverlay = 1; @endphp 
            @endif
        @if(is_null($userSubscription) && $count > 5 && $count == count($propertyList) ) </div> @endif
    @endforeach
</div>