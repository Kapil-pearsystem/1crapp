<style>

</style>


<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
        $C35 = $AllCell['C35'];
        $Y2 = $AllCell['Y2'];
        $F2 = $AllCell['F2'];
        $G14 = $AllCell['G14'];

        $bankLoanDebts = NewBankLoanDebts($MainProperty,$G14,$F2,$Y2,$loopCount);
        $InterestPaid = $bankLoanDebts['InterestPaid'];
        $PrinciplePaid = $bankLoanDebts['PrinciplePaid'];
        // dd($PrinciplePaid);
        $totalInterestOfTheYear = $bankLoanDebts['totalInterestOfTheYear'];
        $totalPrinciplePaidYear = $bankLoanDebts['totalPrinciplePaidYear'];
        $NetBalanceAtTheEndMonth = $bankLoanDebts['NetBalanceAtTheEndMonth'];
        $principlePartDebtPaydownJson = json_encode($totalPrinciplePaidYear);
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        if(is_null($buyHoldProjection)){
            $createbuyHoldProjection = App\Models\BuyHoldProjection::create([
                'property_id' => $MainProperty->prop_id,
                'user_id'     => Auth::id(),
                'principle_part_debt_paydown' => $principlePartDebtPaydownJson,
                'interest_part_debt_paydown'  => $totalInterestOfTheYear
            ]);
        }else{
            App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                'principle_part_debt_paydown' => $principlePartDebtPaydownJson,
                'interest_part_debt_paydown'  => $totalInterestOfTheYear
            ]);
        }

    @endphp
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td class="text-left bg_bluess">&nbsp;</td>
        @endfor
    </tr>
    {{-- =========================================== Bank Loan EMI =========================================== --}}
    <tr style="background: lightgreen;">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{$C35}}</td>
        @endfor
    </tr>
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{ $Y2 }}</td>
        @endfor
    </tr>
    <tr style="background: #9900ff8f;">
        @for ($i = 0; $i < count($totalInterestOfTheYear); $i++)
            <td>₹ {{ $totalInterestOfTheYear[$i]; }}</td>
        @endfor
    </tr>
    @for ($AN = 1; $AN < 13; $AN++)
        <tr class="extradebtpaydown" id="bothss" style="display:none;">
            @if(isset($InterestPaid[$AN.'month']))
                @for ($i = 0; $i < count($InterestPaid[$AN.'month']); $i++)
                    <td>₹ {{ $InterestPaid[$AN.'month'][$i] }}</td>
                @endfor
            @endif
        </tr>
    @endfor
    <tr style="background: #d9d9d9;" class="extradebtpaydown extra_debt_div">
        @for ($i = 0; $i < count($totalInterestOfTheYear); $i++)
            <td>₹ {{ $totalInterestOfTheYear[$i]; }}</td>
        @endfor
    </tr>
    <tr style="background: #9900ff8f;">
        @for ($i = 0; $i < count($totalPrinciplePaidYear); $i++)
            <td>₹ {{ $totalPrinciplePaidYear[$i]; }}</td>
        @endfor
    </tr>
    @for ($AN = 1; $AN < 13; $AN++)
        <tr class="extradebtpaydown1" id="bothss" style="display:none;">
            @if(isset($PrinciplePaid[$AN.'month']) && count($PrinciplePaid[$AN.'month']) > 0)
                @for ($i = 0; $i < count($PrinciplePaid[$AN.'month']); $i++)
                    @if(isset($PrinciplePaid[$AN.'month'][$i]))
                        <td>₹ {{ $PrinciplePaid[$AN.'month'][$i] }}</td>
                    @endif
                @endfor
            @endif
        </tr>
    @endfor
    <tr style="background: #d9d9d9;" class="extradebtpaydown1 extra_debt_div">
        @for ($i = 0; $i < count($totalPrinciplePaidYear); $i++)
                <td>₹ {{ $totalPrinciplePaidYear[$i]; }}</td>
        @endfor
    </tr>
    <tr>
        @for ($i = 0; $i < count($totalPrinciplePaidYear); $i++)
                <td>₹ {{ $totalPrinciplePaidYear[$i]; }}</td>
        @endfor
    </tr>
	<tr style="background: #9900ff8f;">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ 0</td>
        @endfor
    </tr>
    @for ($AN = 0; $AN < 12; $AN++)
        <tr class="extradebtpaydown2" id="bothss" style="display:none;">
            @for ($i = 0; $i < $loopCount; $i++)
                <td>₹ 0</td>
            @endfor
        </tr>
    @endfor
    <tr style="background: #d9d9d9;" class="extradebtpaydown2 extra_debt_div">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ 0</td>
        @endfor
    </tr>
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ 0</td>
        @endfor
    </tr>
    {{-- ===================================== C87 ===================================== --}}
    <tr style="background: yellow;">
        @if(isset($NetBalanceAtTheEndMonth[$AN.'month']))
            @for ($i = 0; $i < count($NetBalanceAtTheEndMonth[$AN.'month']); $i++)
                @if($NetBalanceAtTheEndMonth[$AN.'month'][$i])
                    <td>₹ {{ $NetBalanceAtTheEndMonth[$AN.'month'][$i] }}</td>
                @endif
            @endfor
        @endif
    </tr>
    <tr style="background: #f3bb68;">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>
	
    <tr style="background: #d9d9d9;" class="extradebtpaydown3 extra_debt_div">
        <td>₹ {{ $Y2 }}</td>
        @if(isset($NetBalanceAtTheEndMonth[$AN.'month']))
            @for ($i = 0; $i < count($NetBalanceAtTheEndMonth[$AN.'month']) - 1; $i++)
                @if($NetBalanceAtTheEndMonth[$AN.'month'][$i])
                    <td>₹ {{ $NetBalanceAtTheEndMonth[$AN.'month'][$i] }}</td>
                @endif
            @endfor
        @endif
    </tr>
    @php
        $bankLoanDebts = NewBankLoanDebts($MainProperty,$G14,$F2,$Y2,$loopCount);
        $InterestPaid = $bankLoanDebts['InterestPaid'];
        $PrinciplePaid = $bankLoanDebts['PrinciplePaid'];
        $BalanceAtTheEndMonth = $bankLoanDebts['BalanceAtTheEndMonth'];
        $NetBalanceAtTheEndMonth = $bankLoanDebts['NetBalanceAtTheEndMonth'];
        $loanBalanceAtTheMonth = $Y2;
        $yearCount = 1;
    @endphp
    @for ($AN = 1; $AN < 13; $AN++)
        {{-- ======================================================= INTEREST PAID ======================================================= --}}
            <tr class="extradebtpaydown3 extra_debt_div">
                @if(isset($InterestPaid[$AN.'month']))
                    @for ($i = 0; $i < count($InterestPaid[$AN.'month']); $i++)
                        <td>₹ {{ $InterestPaid[$AN.'month'][$i] }}</td>
                    @endfor
                @endif
            </tr>
        {{-- ======================================================= PRINCIPLE PAID ======================================================= --}}
            <tr class="extradebtpaydown3 extra_debt_div">
                @if(isset($PrinciplePaid[$AN.'month']))
                    @for ($i = 0; $i < count($PrinciplePaid[$AN.'month']); $i++)
                        @if(isset($PrinciplePaid[$AN.'month'][$i]))
                            <td>₹ {{ $PrinciplePaid[$AN.'month'][$i] }}</td>
                        @endif
                    @endfor
                @endif
            </tr>
        {{-- ======================================================= BALANCE AT THE END OF MONTH ======================================================= --}}
           <tr class="extradebtpaydown3 extra_debt_div">
                @if(isset($BalanceAtTheEndMonth[$AN.'month']))
                    @for ($i = 0; $i < count($BalanceAtTheEndMonth[$AN.'month']); $i++)
                        @if(isset($BalanceAtTheEndMonth[$AN.'month'][$i]))
                            <td>₹ {{ $BalanceAtTheEndMonth[$AN.'month'][$i] }}</td>
                        @endif
                    @endfor
                @endif
            </tr>
        {{-- ======================================================= EXTRA- DEBT PAYDOWN ======================================================= --}}
			<tr style="background: #d9d9d9;" class="extradebtpaydown3 extra_debt_div">
                @for ($i = 0; $i < $loopCount; $i++)
                    <td>₹ 0</td>
                @endfor
            </tr>
        {{-- ======================================================= NET BALANCE AT THE END OF MONTH ======================================================= --}}
            <tr style="background: #90f;" class="extradebtpaydown3 extra_debt_div">
                @if(isset($NetBalanceAtTheEndMonth[$AN.'month']))
                    @for ($i = 0; $i < count($NetBalanceAtTheEndMonth[$AN.'month']); $i++)
                        @if($NetBalanceAtTheEndMonth[$AN.'month'][$i])
                            <td>₹ {{ $NetBalanceAtTheEndMonth[$AN.'month'][$i] }}</td>
                        @endif
                    @endfor
                @endif
            </tr>
        <tr style="background: #c27ba0;" class="extradebtpaydown3 extra_debt_div">
            @for ($SA = 0; $SA < $loopCount; $SA++)
                <td></td>
            @endfor
        </tr>
    @endfor
</tbody>