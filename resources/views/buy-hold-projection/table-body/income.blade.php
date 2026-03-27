<tbody>
    <tr class="bg_bluess">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    @php
        $AllCell = AllCell($MainProperty);
        $J2 = $AllCell['J2'];
        $H2 = $AllCell['H2'];
        $loopCount = 20;
        $grossRentYearly = array();
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
    @endphp
    {{-- ============================= C16 Gross Rent (Yearly ) ============================= --}}
        <tr>
            @for ($i = 0; $i < $loopCount; $i++)            
                @if ($i == 0)
                    <td>₹ {{ $AllCell['C16'] }}</td>
                    @php $prevGrossRent = $AllCell['C16']; @endphp
                @else
                    @php $prevGrossRent = round($prevGrossRent * (100 + $J2) / 100); @endphp
                    <td>₹ {{ $prevGrossRent }}</td>
                @endif  
                @php $grossRentYearly[] = $prevGrossRent; @endphp          
            @endfor
            @php
                $grossRentYearlyJson = json_encode($grossRentYearly);
                if(is_null($buyHoldProjection)){
                    $createbuyHoldProjection = App\Models\BuyHoldProjection::create([
                        'property_id'       => $MainProperty->prop_id,
                        'user_id'           => Auth::id(),
                        'gross_rent_yearly' => $grossRentYearlyJson,
                    ]);
                }else{
                    App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                        'gross_rent_yearly' => $grossRentYearlyJson,
                    ]);
                }
            @endphp
        </tr>
    {{-- ============================= C17 Gross Rent (Yearly ) ============================= --}}
    {{-- ============================= C18       Vacancy       ============================= --}}
        <tr>
            @for ($i = 0; $i < $loopCount; $i++)
                @if ($i == 0)
                    <td>₹ {{ $AllCell['C17'] }}</td>
                    @php $prevVacancy = $AllCell['C17']; @endphp
                    @php $prevGrossRent = $AllCell['C17']; @endphp
                @else
                    @php $prevGrossRent = round($prevGrossRent * (100 + $J2) / 100); @endphp
                    @php $prevVacancy = round($prevGrossRent * $H2 / 100);  @endphp
                    <td>₹ {{ $prevVacancy }}</td>
                @endif
                
            @endfor
        </tr>
    {{-- ============================= C18       Vacancy       ============================= --}}
    {{-- ============================= C19    Vacancy Rate     ============================= --}}    
        <tr class="blue">
            @for ($i = 0; $i < $loopCount; $i++)
                <td>{{ $H2 }}%</td>
            @endfor
        </tr>
    {{-- ============================= C19    Vacancy Rate     ============================= --}}
    {{-- ============================= C20    Other Income     ============================= --}}
        <tr>
            @for ($i = 0; $i < $loopCount; $i++)
                @if ($i == 0)
                    <td>₹ {{$AllCell['C19']}}</td>
                    @php $prevOtherIncome = $AllCell['C19']; @endphp
                @else
                    @php $prevOtherIncome = round($prevOtherIncome * (100 + $J2) / 100) @endphp
                    <td>₹ {{ $prevOtherIncome }}</td>
                @endif
            @endfor
        </tr>
    {{-- ============================= C20    Other Income     ============================= --}}
    {{-- =========================== C21 Operating Income (Yearly) ========================= --}}
        <tr class="redss">
            @for ($i = 0; $i < $loopCount; $i++)
                @if ($i == 0)
                    <td>₹ {{ $AllCell['C20'] }}</td>
                    @php $prevGrossRent = $AllCell['C16']; @endphp
                    @php $prevVacancy = $AllCell['C17']; @endphp
                    @php $prevOtherIncome = $AllCell['C19']; @endphp
                @else
                    @php $prevGrossRent = round($prevGrossRent * (100 + $J2) / 100); @endphp
                    @php $prevVacancy = round($prevGrossRent * $H2 / 100);  @endphp
                    @php $prevOtherIncome = round($prevOtherIncome * (100 + $J2) / 100) @endphp
                    @php $operatingIncome = $prevGrossRent - ($prevVacancy - $prevOtherIncome) @endphp
                    <td>₹ {{ $operatingIncome }}</td>
                @endif    
            @endfor            
        </tr>
    {{-- =========================== C21 Operating Income (Yearly) ========================= --}}

    <tr class="blue">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>{{$J2}}%</td>    
        @endfor
    </tr>
</tbody>