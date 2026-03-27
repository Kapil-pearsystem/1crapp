@php
    $currency = '₹';
@endphp
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
        $C36 = $AllCell['C36'];

    @endphp
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ {{ $C36 }}</td>
        @endfor
    </tr>

    <tr>
        @php
            $YearEndAccumulatedEquity = YearEndAccumulatedEquity($MainProperty);    
            // $loanEMI = LoanEMI();
            // silences
        @endphp
        <td>{{ $currency }} {{ $YearEndAccumulatedEquity }}</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
        <td>₹24,377</td>
    </tr>

    <tr>
        @php
            $ReturnOnInvestment = ReturnOnInvestment($MainProperty);
        @endphp
        <td>{{ $currency }} {{ $ReturnOnInvestment }}</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
        <td>30.2%</td>
    </tr>

    <tr>
        @php
            $ReturnOnEquity = ReturnOnEquity($MainProperty);
        @endphp
        <td>{{ $ReturnOnEquity }}%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
        <td>15.7%</td>
    </tr>

    <tr>
        @php
            $grossRent = GrossRent($MainProperty);
            $RateOfGrossReturn = $grossRent['yearly_gross_rent'];
        @endphp
        <td>{{ $RateOfGrossReturn }}%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
        <td>86%</td>
    </tr>

    <tr>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
        <td>₹8,639</td>
    </tr>
</tbody>