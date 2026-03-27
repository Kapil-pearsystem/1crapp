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
        $loopCount = $AllCell['loopCount'];
        $C2 = $AllCell['C2'];
        $I2 = $AllCell['I2'];
        $C168 = $AllCell['C168'];
        $C36 = $AllCell['C36'];
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $cashFlowJson = json_decode($buyHoldProjection->cash_flow);
        $principlePartDebtPaydownJson = json_decode($buyHoldProjection->principle_part_debt_paydown);
        $annuaPriceAppreciations = array();
        $TotalAnnualReturn = array();
        // total_annual_return
    @endphp
    {{-- ========================================== Annual Price Appreciations ========================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @if($i == 0)
                <td>₹ {{ round($C2 * $I2 / 100) }}</td>
                @php $annuaPriceAppreciations[] = round($C2 * $I2 / 100); @endphp
            @else
                @if($i == 1)
                    @php $prevMarketValue = round($C2 * (100 + $I2) / 100) @endphp
                    @php $prevItemValue = round($prevMarketValue * $I2 / 100) @endphp
                @else
                    @php $prevMarketValue = round($prevMarketValue * (100 + $I2) / 100) @endphp
                    @php $prevItemValue = round($prevMarketValue * $I2 / 100); @endphp
                @endif
                <td>₹ {{ $prevItemValue }}</td>
                @php $annuaPriceAppreciations[] = $prevItemValue; @endphp
            @endif
        @endfor
    </tr>
    {{-- ========================================== Annual Cash Flow ========================================== --}}
    <tr>
        @for ($i = 0; $i < count($cashFlowJson); $i++)
            <td>₹ {{ $cashFlowJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ========================================== Annual Principel Paydown ========================================== --}}
    <tr>
        @for ($i = 0; $i < count($principlePartDebtPaydownJson); $i++)
            <td>₹ {{ $principlePartDebtPaydownJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ========================================== Total Annual Return ========================================== --}}
    <tr class="redss">
        @for ($i = 0; $i < count($annuaPriceAppreciations); $i++)
            @php
                if(isset($annuaPriceAppreciations[$i])){
                    $singleannuaPriceAppreciations = $annuaPriceAppreciations[$i];
                }else{
                    $singleannuaPriceAppreciations = 0;
                }
                if(isset($cashFlowJson[$i])){
                    $singleCashFlowJson = $cashFlowJson[$i];
                }else{
                    $singleCashFlowJson = 0;
                }
                if(isset($principlePartDebtPaydownJson[$i])){
                    $singlePrinciplePartDebtPaydownJson = $principlePartDebtPaydownJson[$i];
                }else{
                    $singlePrinciplePartDebtPaydownJson = 0;
                }
                $TotalAnnualReturn[] = $singleannuaPriceAppreciations + $singleCashFlowJson + $singlePrinciplePartDebtPaydownJson;
                $TotalAnnualReturnJson = json_encode($TotalAnnualReturn);
                App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                    'total_annual_return' => $TotalAnnualReturnJson
                ]);
            @endphp
            <td>₹ {{ $singleannuaPriceAppreciations + $singleCashFlowJson + $singlePrinciplePartDebtPaydownJson }}</td>
        @endfor
    </tr>
</tbody>