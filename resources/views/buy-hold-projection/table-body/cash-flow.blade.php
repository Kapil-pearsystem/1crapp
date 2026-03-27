<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = 20;
        // $C21 = $AllCell['C21'];
        $J2 = $AllCell['J2'];
        $H2 = $AllCell['H2'];
        $H14 = $AllCell['H14'];
        $T2 = $AllCell['T2'];
        // $F2 = $AllCell['F2'];
        $M2 = $AllCell['M2'];
        // $N2 = $AllCell['N2'];
        $C35 = $AllCell['C35'];
        $C36 = $AllCell['C36'];
        $C37 = $AllCell['C37'];
        $M35 = $AllCell['H14'];

        $OperatingExpenses = OperatingExpenses($MainProperty);
        $yearlyOperatingExpenses = $OperatingExpenses['yearly_operating_expenses'];
        $K2 = $AllCell['K2'];

        $operatingIncomeArray = array();
        $operatingExpensesArray = array();
        $NetOperatingExpensesArray = array();
        $CashFlowAnnual = array();
        $CummulaticeCashFlow = array();
        $loanEMI = array();
        $loanTotalAmount = PropertyLoans($MainProperty);
        $CummulaticeCashFlowHtml = '';
        
        $yearlyEMI = $loanTotalAmount['total_monthly_loan_repayment'];
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $PropertyRefinanceLoans = App\Models\PropertyRefinance::where('property_id',$MainProperty->prop_id)->first();
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>
    
    {{-- ================================== Operating Income ================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @if ($i == 0)
                <td>₹ {{ $AllCell['C20'] }}</td>
                @php 
                    $prevGrossRent = $AllCell['C16'];
                    $prevVacancy = $AllCell['C17'];
                    $prevOtherIncome = $AllCell['C19']; 
                    $operatingIncomeArray[] = $AllCell['C20'];
                @endphp
            @else
                @php 
                    $prevGrossRent = round($prevGrossRent * (100 + $J2) / 100); 
                    $prevVacancy = round($prevGrossRent * $H2 / 100);  
                    $prevOtherIncome = round($prevOtherIncome * (100 + $J2) / 100);
                    $operatingIncome = $prevGrossRent - ($prevVacancy - $prevOtherIncome);
                    $operatingIncomeArray[] = $operatingIncome;
                @endphp
                <td>₹ {{ $operatingIncome }}</td>
            @endif            
        @endfor
    </tr>
    {{-- ================================== Operating Cost ================================== --}}
    <tr>
        @for ($AN = 0; $AN < $loopCount; $AN++)
            @php $totalAmount = 0; @endphp
            @if ($AN == 0)
                <td>₹ {{ $yearlyOperatingExpenses }}</td>   
                @php 
                    $prevItemAmount = $yearlyOperatingExpenses; 
                    $operatingExpensesArray[] = $yearlyOperatingExpenses;
                @endphp
            @else
                @php 
                    $prevItemAmount = round($prevItemAmount * (100 + $K2) / 100);  
                    $operatingExpensesArray[] =  $prevItemAmount;
                @endphp
                <td>₹ {{ $prevItemAmount }}</td>
            @endif            
        @endfor
    </tr>
    {{-- ================================== Net Operating Income ================================== --}}
    <tr class="blue">
        @for ($i = 0; $i < count($operatingIncomeArray); $i++)
            @php
                $NetOperatingIncome = $operatingIncomeArray[$i] - $operatingExpensesArray[$i];
                $NetOperatingExpensesArray[] = $NetOperatingIncome;
            @endphp
            <td>₹ {{ $NetOperatingIncome }}</td>
        @endfor
    </tr>
    {{-- ================================== Loan EMI ================================== --}}
    <tr>
        @php $loanEMI = $C35 @endphp
        @for ($i = 0; $i < $loopCount; $i++)
            @if($i == $PropertyRefinanceLoans?->refinance_after)
                @php $loanEMI = $M35 * 12; @endphp
            @endif
            <td>₹ {{ $loanEMI }}</td>
            
        @endfor
    </tr>
    {{-- ================================== Cash Flow ================================== --}}
    <tr class="redss"> 
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{ $NetOperatingExpensesArray[$i] - $C35 }}</td>
            @php 
                $CashFlowAnnual[] = $NetOperatingExpensesArray[$i] - $C35;
            @endphp
        @endfor
        @php
            $cashFlowJson = json_encode($CashFlowAnnual);
            $NetOperatingExpensesJson = json_encode($NetOperatingExpensesArray);
            if(is_null($buyHoldProjection)){
                $createbuyHoldProjection = App\Models\BuyHoldProjection::create([
                    'property_id' => $MainProperty->prop_id,
                    'user_id'     => Auth::id(),
                    'cash_flow' => $cashFlowJson,
                    'net_operating_income'  => $NetOperatingExpensesJson
                ]);
            }else{
                App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                    'cash_flow' => $cashFlowJson,
                    'net_operating_income'  => $NetOperatingExpensesJson
                ]);
            }
        @endphp
    </tr>
    {{-- ================================== Post Tax Cash Flow ================================== --}}
    <tr class="blue">
        @for ($i = 0; $i < $loopCount; $i++)
            @if ($i == 0)
                <td>₹ {{ $C37 }}</td>
                @php  $prevItemValue = $C37; @endphp
            @else
                @php $prevItemValue = round($CashFlowAnnual[$i] * (100 - $T2) / 100); @endphp
                <td>₹ {{ $prevItemValue }}</td>
            @endif
        @endfor
    </tr>
    {{-- ================================== Cummulatice Cash Flow ================================== --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            @if ($i == 0)
                @php $prevItemValue = $CashFlowAnnual[$i]; @endphp
            @else
                @php $prevItemValue = $prevItemValue + $CashFlowAnnual[$i]; @endphp
            @endif
            <td>₹ {{ $prevItemValue }}</td>
            @php
                $CummulaticeCashFlow[] = $prevItemValue;
            @endphp
        @endfor
        @php
            $CummulaticeCashFlowJson = json_encode($CummulaticeCashFlow);
            
            if(is_null($buyHoldProjection)){
                $createbuyHoldProjection = App\Models\BuyHoldProjection::create([
                    'property_id' => $MainProperty->prop_id,
                    'user_id'     => Auth::id(),
                    'cummulatice_cash_flow' => $CummulaticeCashFlowJson
                ]);
            }else{
                App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                    'cummulatice_cash_flow' => $CummulaticeCashFlowJson
                ]);
            }
        @endphp
    </tr>
</tbody>