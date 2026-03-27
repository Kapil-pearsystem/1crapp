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
        $C168 = $AllCell['C168'];
        $I2 = $AllCell['I2'];
        $loopCount = $AllCell['loopCount'];
        $C35 = $AllCell['C35'];
        $Y2 = $AllCell['Y2'];
        $F2 = $AllCell['F2'];
        $G14 = $AllCell['G14'];

        $bankLoanDebts = NewBankLoanDebts($MainProperty,$G14,$F2,$Y2,$loopCount);
        $NetBalanceAtTheEndMonth = $bankLoanDebts['NetBalanceAtTheEndMonth'];
        $marketValueProperty = array();
        $YearEndBankLoanBalance = array();
        $YearEndAccumulatedEquityArray = array();
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
    @endphp
    {{-- ================================= Market Value of Property ================================= --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @if ($i == 0)
                <td>₹ {{ $C168 }}</td>
                @php 
                    $prevItemAmount = $C168; 
                    $marketValueProperty[] = $prevItemAmount;
                @endphp
            @else
                @php 
                    $prevItemAmount = round($prevItemAmount * (100 + $I2) / 100);
                    $marketValueProperty[] = $prevItemAmount;
                @endphp
                <td>₹ {{ $prevItemAmount }}</td>
            @endif
            @php
                $marketValuePropertyJson = json_encode($marketValueProperty);
                App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                    'market_value_property' => $marketValuePropertyJson
                ]);
            @endphp
        @endfor
    </tr>		
    {{-- ================================= Propery appreciation ( Annual ) ================================= --}}
    <tr class="blue">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>{{ $I2 }}%</td> 
        @endfor
    </tr>
    {{-- ================================= Year End Bank Loan Balance ================================= --}}
    <tr>
        @if(isset($NetBalanceAtTheEndMonth['12month']))
            @for ($i = 0; $i < count($NetBalanceAtTheEndMonth['12month']); $i++)
                @if($NetBalanceAtTheEndMonth['12month'][$i])
                    @php $YearEndBankLoanBalance[] = $NetBalanceAtTheEndMonth['12month'][$i]; @endphp
                    <td>₹ {{ $NetBalanceAtTheEndMonth['12month'][$i] }}</td>
                @endif
            @endfor
        @endif
        @php
            $NetBalanceAtTheEndMonthJson = json_encode($YearEndBankLoanBalance);
            App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                'net_balance_at_the_end_month' => $NetBalanceAtTheEndMonthJson
            ]);
        @endphp
    </tr>
    {{-- ================================= LTV Ratio ================================= --}}
    <tr class="blue">
        @for ($i = 0; $i < count($marketValueProperty); $i++)
            @php
                try{
                    if(isset($YearEndBankLoanBalance[$i]) && isset($marketValueProperty[$i])){
                        $LTVRatio = round($YearEndBankLoanBalance[$i] /  $marketValueProperty[$i] * 100);
                    }else{
                        $LTVRatio = 0;
                    }
                }catch (\Throwable $th) {
                    $LTVRatio = 0;
                }
            @endphp
            <td>{{ $LTVRatio }} %</td>
        @endfor
    </tr>
    {{-- ================================= Year End Accumulated Equity ================================= --}}
    <tr class="redss">
        @for ($i = 0; $i < count($marketValueProperty); $i++)
            @php
                if(isset($YearEndBankLoanBalance[$i]) && isset($marketValueProperty[$i])){
                    $YearEndAccumulatedEquity = $marketValueProperty[$i] - $YearEndBankLoanBalance[$i];
                }else{
                    $YearEndAccumulatedEquity = 0;
                }
                $YearEndAccumulatedEquityArray[] = $YearEndAccumulatedEquity;
            @endphp
            <td>{{ $YearEndAccumulatedEquity }}</td>
        @endfor
        @php
            // year_accumulated_equity
            $YearEndAccumulatedEquityJson = json_encode($YearEndAccumulatedEquityArray);
            App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                'year_accumulated_equity' => $YearEndAccumulatedEquityJson
            ]);
        @endphp
    </tr>
    {{-- ================================= ETV Ratio ================================= --}}
    <tr>
        @for ($i = 0; $i < count($YearEndAccumulatedEquityArray); $i++)
            @php
                try{
                    $ETVRatio = round($YearEndAccumulatedEquityArray[$i] / $marketValueProperty[$i] * 100);
                }catch (\Throwable $th) {
                    $ETVRatio = 0;
                }
            @endphp
            <td>{{ $ETVRatio }}%</td>
        @endfor
    </tr>
</tbody>