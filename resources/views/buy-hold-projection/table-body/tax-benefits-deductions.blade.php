<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $C2 = $AllCell['C2'];
        $S2 = $AllCell['S2'];
        $loopCount = $AllCell['loopCount'];

        $purchaseCosts = PurchaseCostsHelper($MainProperty);
        $improvementCosts = ImprovementCosts($MainProperty);
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $operatingCostJson = json_decode($buyHoldProjection->operating_cost);
        $loanInterestPartJson = json_decode($buyHoldProjection->interest_part_debt_paydown);
        $totalDeductionArray = array();
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>
    {{-- ============================================== Construciton Cost ============================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @php
                $ConstrucitonCost = ($C2*(100 - $S2) / 20) / 100;
            @endphp
            <td>₹ {{ $ConstrucitonCost }}</td>
        @endfor
    </tr>
    {{-- ============================================== Purchase Cost ============================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{ $purchaseCosts['TotalAmount'] }}</td>
        @endfor
    </tr>
    {{-- ============================================== Improvement cost ============================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{ $improvementCosts['TotalAmount'] }}</td>
        @endfor
    </tr>
    {{-- ============================================== Total Deduction ============================================== --}}    
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @php
                $ConstrucitonCost = ($C2*(100 - $S2) / 20) / 100;
                $totalDeduction = $ConstrucitonCost + $purchaseCosts['TotalAmount'] + $improvementCosts['TotalAmount'];
                $totalDeductionArray[] = $totalDeduction;
            @endphp
            <td>₹ {{ $totalDeduction }}</td>    
        @endfor
    </tr>
    {{-- ============================================== Operating Cost ============================================== --}}    
    <tr> 
        @for ($i = 0; $i < count($operatingCostJson); $i++)
            <td>₹ {{ $operatingCostJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ============================================== Loan Interest Part ============================================== --}}
    <tr>
        @for ($i = 0; $i < count($loanInterestPartJson); $i++)
            <td>₹ {{ $loanInterestPartJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ============================================== Total Deductions ============================================== --}}
    <tr>
        @for ($i = 0; $i < count($totalDeductionArray); $i++)
            @php
                $singleTotalDeductionArray = 0;
                $singleOperatingCostJson = 0;
                $singleLoanInterestPartJson = 0;
                if(isset($totalDeductionArray[$i])){
                    $singleTotalDeductionArray = $totalDeductionArray[$i];
                }
                if(isset($operatingCostJson[$i])){
                    $singleOperatingCostJson = $operatingCostJson[$i];
                }
                if(isset($loanInterestPartJson[$i])){
                    $singleLoanInterestPartJson = $loanInterestPartJson[$i];
                }
            @endphp
            <td>₹ {{ $singleTotalDeductionArray + $singleOperatingCostJson + $singleLoanInterestPartJson }}</td>
        @endfor
    </tr>
</tbody>