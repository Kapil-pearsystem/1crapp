@php
    $loopCount = 20;
@endphp

<style>
td.text-left.qr_tp_areaaa span.ritghtss {float: right; padding-right: 5px;}
td.text-left.qr_tp_areaaa span.ritghtss span.mnss_fldss.sigma_i {
    background: #d9eaf1;
    padding: 0 5px;
    font-weight: 700;
    font-size: 12px;
    display: inline-block;
    margin-right: 5px;
}
td.text-left.qr_tp_areaaa span.ritghtss span.mnss_fldss {
    font-weight: 700;
    font-size: 13px;
}
.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed.datashoww {
    position: relative;
    width: 100%;
    display: block;
}
.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed.datashoww span.toggle-icon {
    position: absolute;
    right: 0;
    background: #fff;
    padding: 0 4px;
    border-radius: 2px;
    font-size: 18px;
    height: 18px;
    width: 18px;
    line-height: 18px;
    cursor: pointer;
}

.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed1.datashoww {
    position: relative;
    width: 100%;
    display: block;
}
.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed1.datashoww span.toggle-icon1 {
    position: absolute;
    right: 0;
    background: #fff;
    padding: 0 4px;
    border-radius: 2px;
    font-size: 18px;
    height: 18px;
    width: 18px;
    line-height: 18px;
    cursor: pointer;
}

.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed2.datashoww {
    position: relative;
    width: 100%;
    display: block;
}
.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed2.datashoww span.toggle-icon2 {
    position: absolute;
    right: 0;
    background: #fff;
    padding: 0 4px;
    border-radius: 2px;
    font-size: 18px;
    height: 18px;
    width: 18px;
    line-height: 18px;
    cursor: pointer;
}

.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed3.datashoww {
    position: relative;
    width: 100%;
    display: block;
}
.propfixsd.new_propertyy.hollss .qr_tp_areaaa span.hd_vluees.hide_data_filed3.datashoww span.toggle-icon3 {
    position: absolute;
    right: 0;
    background: #fff;
    padding: 0 4px;
    border-radius: 2px;
    font-size: 18px;
    height: 18px;
    width: 18px;
    line-height: 18px;
    cursor: pointer;
}

.rout_cntent {
    transform: rotate(-90deg);
    width: 100%;
    text-align: center;
    height: 20px;
    position: absolute;
    bottom: 80px;
}
</style>


<tbody>
    <tr>
        <td class="text-left bg_bluess">Bank Loans & Debts</td>
    </tr>
    <tr style="background: lightgreen;">
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Bank Loan EMI (Yearly)','Bank Loan EMI (Yearly)') !!}
            <span class="hd_vluees">Bank Loan EMI (Yearly)</span>
        </td>
    </tr>
    <tr>
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Principle Outstanding','Principle Outstanding') !!}
            <span class="hd_vluees">Principle Outstanding </span>
        </td>
    </tr>
    <tr style="background: #9900ff8f;">
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Interest Part - Debt Paydown','Interest Part - Debt Paydown') !!}
			<span class="hd_vluees hide_data_filed datashoww">Interest Part - Debt Paydown  <span class="toggle-icon">+</span></span>
        </td>
    </tr>
    @for ($i = 1; $i < 13; $i++)
        <tr class="extradebtpaydown" style="display:none;">
            @if ($i == 1)
                <td> 1st Month</td>
            @elseif($i == 2)
                <td> 2nd Month</td>
            @elseif($i == 3)
                <td>3rd Month</td>
            @else
                <td>{{$i}}th Month
            @endif
        </tr>
    @endfor
    <tr style="background: #d9d9d9;"  class="extradebtpaydown extra_debt_div" >
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Total Interest Of The Year','Total Interest Of The Year') !!}
            <span class="hd_vluees">Total Interest Of The Year </span>
        </td>
    </tr>
    <tr style="background: #9900ff8f;">
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Principle Part - Debt Paydown','Principle Part - Debt Paydown') !!}
			<span class="hd_vluees hide_data_filed1 datashoww">Principle Part - Debt Paydown  <span class="toggle-icon1">+</span></span>
        </td>
    </tr>
    @for ($i = 1; $i < 13; $i++)
        <tr class="extradebtpaydown1" style="display:none;">
            @if ($i == 1)
                <td> 1st Month</td>
            @elseif($i == 2)
                <td> 2nd Month</td>
            @elseif($i == 3)
                <td>3rd Month</td>
            @else
                <td>{{$i}}th Month
            @endif
        </tr>
    @endfor
    <tr style="background: #d9d9d9;"  class="extradebtpaydown1 extra_debt_div" >
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Total Principle Part Of The Year','Total Principle Part Of The Year') !!}
            <span class="hd_vluees">Total Principle Part Of The Year </span>
        </td>
    </tr>
    <tr>
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Cummulative Debt Paydown','Cummulative Debt Paydown') !!}
            <span class="hd_vluees">Cummulative Debt Paydown  </span>
						<span class="ritghtss">
			 <span class="mnss_fldss sigma_i">Σ</span>
			 <span class="mnss_fldss">=</span>
			</span>
        </td>
    </tr>
    <tr style="background: #9900ff8f;" >
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Extra Debt Paydown','Extra Debt Paydown') !!}
            <span class="hd_vluees hide_data_filed2 datashoww">Extra Debt Paydown  <span class="toggle-icon2">+</span></span>			
        </td>
    </tr>
    @for ($i = 1; $i < 13; $i++)
        <tr class="extradebtpaydown2" style="display:none;">
            @if ($i == 1)
                <td> 1st Month</td>
            @elseif($i == 2)
                <td> 2nd Month</td>
            @elseif($i == 3)
                <td>3rd Month</td>
            @else
                <td>{{$i}}th Month
            @endif
        </tr>
    @endfor
    <tr style="background: #d9d9d9;" class="extradebtpaydown2 extra_debt_div" >
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Total Extra Debt Paydown Of The Year','Total Extra Debt Paydown Of The Year') !!}
            <span class="hd_vluees">Total Extra Debt Paydown Of The Year</span>
        </td>
    </tr>
    <tr>
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Cummulative Extra Debt Paydown','Cummulative Extra Debt Paydown') !!}
            <span class="hd_vluees">Cummulative Extra Debt Paydown</span>
			<span class="ritghtss">
			 <span class="mnss_fldss sigma_i">Σ</span>
			 <span class="mnss_fldss">=</span>
			</span>
        </td>
    </tr>
    <tr style="background: yellow;">
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Bank Loan Principle Outstanding (End Of The Year)','Bank Loan Principle Outstanding (End Of The Year)') !!}
            <span class="hd_vluees">Bank Loan Principle Outstanding</span>
        </td>
    </tr>
    <tr style="background:#f3bb68;" >
        <td class="text-left qr_tp_areaaa">            
            <span class="hd_vluees hide_data_filed3 datashoww">Detailed Breakup  <span class="toggle-icon3">+</span></span>			
        </td>
    </tr>
	<tr style="background: #d9d9d9;" class="extradebtpaydown3 extra_debt_div">
        <td class="text-left qr_tp_areaaa">
            {!! ToolTipHtml('Principle Outstanding (At The Start Of Operating Stage)','Principle Outstanding (At The Start Of Operating Stage)') !!}
            <span class="hd_vluees">Principle Outstanding </span>
        </td>
    </tr>
    @for ($i = 0; $i < 12; $i++)
		<tr class="extradebtpaydown3" style="display:none;">
			<td style="padding:0; border:none;">
				<table width="100%">
					<tr>
						<td width="10%" style="padding:0; border:none;"><div class="rout_cntent">1 Month</div></td>
						<td width="90%" style="padding:0; border:none !important;">
							<table width="100%">
								<tr>
									<td class="text-left qr_tp_areaaa">
										{!! ToolTipHtml('Interest Paid','Interest Paid') !!}
										<span class="hd_vluees">{{ $i + 1 }} Interest Paid</span>
									</td>
								</tr>
								<tr>
									<td class="text-left qr_tp_areaaa">
										{!! ToolTipHtml('Principle Paid','Principle Paid') !!}
										<span class="hd_vluees">Principle Paid</span>
									</td>
								</tr>
								<tr>
									<td class="text-left qr_tp_areaaa">
										{!! ToolTipHtml('Balance At The End Of Month','Balance At The End Of Month') !!}
										<span class="hd_vluees">Balance At The End Of Month</span>
									</td>
								</tr>
								<tr style="background: #d9d9d9;">
									<td class="text-left qr_tp_areaaa bold">
										{!! ToolTipHtml('Extra Debt Paydown','Extra Debt Paydown') !!}
										<span class="hd_vluees">Extra Debt Paydown</span>
									</td>
								</tr>
								<tr style="background: #90f;">
									<td class="text-left qr_tp_areaaa bold">
										{!! ToolTipHtml('Net Balance At The End Of Month','Net Balance At The End Of Month') !!}
										<span class="hd_vluees">Net Balance At The End Of Month</span>
									</td>
								</tr>
								<tr style="background: #c27ba0;">
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
    @endfor
</tbody>


<!--<script>
document.querySelectorAll('.hide_data_filed').forEach(function(btn) {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.extradebtpaydown').forEach(function(div) {
      div.style.display = (div.style.display === 'none' || div.style.display === '') ? 'block' : 'none';
    });
  });
});
</script>-->

<script>
document.querySelectorAll('.hide_data_filed').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const contentDivs = document.querySelectorAll('.extradebtpaydown');
        const icon = btn.querySelector('.toggle-icon');
 
        contentDivs.forEach(function(div) {
            const isVisible = div.style.display === 'none';
            div.style.display = isVisible ? '' : 'none';
            icon.textContent = isVisible ? '-' : '+';
        });
    });
});

document.querySelectorAll('.hide_data_filed1').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const contentDivs = document.querySelectorAll('.extradebtpaydown1');
        const icon = btn.querySelector('.toggle-icon1');
 
        contentDivs.forEach(function(div) {
            const isVisible = div.style.display === 'none';
            div.style.display = isVisible ? '' : 'none';
            icon.textContent = isVisible ? '-' : '+';
        });
    });
});

document.querySelectorAll('.hide_data_filed2').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const contentDivs = document.querySelectorAll('.extradebtpaydown2');
        const icon = btn.querySelector('.toggle-icon2');
 
        contentDivs.forEach(function(div) {
            const isVisible = div.style.display === 'none';
            div.style.display = isVisible ? '' : 'none';
            icon.textContent = isVisible ? '-' : '+';
        });
    });
});

document.querySelectorAll('.hide_data_filed3').forEach(function(btn) {
    btn.addEventListener('click', function() {
        const contentDivs = document.querySelectorAll('.extradebtpaydown3');
        const icon = btn.querySelector('.toggle-icon3');
 
        contentDivs.forEach(function(div) {
            const isVisible = div.style.display === 'none';
            div.style.display = isVisible ? '' : 'none';
            icon.textContent = isVisible ? '-' : '+';
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByClassName('extra_debt_div');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }
});

</script>

