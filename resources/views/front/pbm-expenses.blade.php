@foreach($expenses_data as $key=>$expenses)
@php
    $currentAmount = 0;

    if ($total_spandable_amount > 0 && $expenses->spandable_percent > 0) {
        $currentAmount = ($total_spandable_amount * $expenses->spandable_percent) / 100;
    }

    $currentAmount = number_format($currentAmount, 2);
@endphp

<tr>
    <td width="12%">({{ $key + 5 }})</td>
    <td class="p-0 brd_none" width="41.2%">
        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
        <tr>
        <td width="43%" class="tx_left brd_none brd_right brd_bottom width_manages">{{ $expenses->expenses_name }}</td>
        <td width="43%" class="brd_none brd_right brd_bottom">{{ number_format($expenses->spandable_percent, 2) }}%</td>
        <td width="13%" class="brd_none brd_bottom">+</td>
        </tr>
        </table> 
    </td>
    <td width="15%">₹{{ $currentAmount }}</td>
    <td class="tx_read">₹{{ $expenses->required_amount }}</td>
    <td>₹{{ $expenses->current_amount - $expenses->required_amount }}</td> 
    <td><a href="javascript:void(0);" onclick="editExpenses('{{ $expenses->id }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp; <a href="javascript:void(0);" onclick="deleteExpenses('{{ $expenses->id }}')"  class="text-end"><i class="fa fa-trash"></i></a></td> 

</tr>
@endforeach
<tr>
    <td colspan="2" class="tx_right brd_none"><b>Total Current Expenses</b></td>
    <td>₹{{ $total_current_amount??0.00 }}</td>
    <td>&nbsp;</td>									
    <td>&nbsp;</td>									
    <td>&nbsp;</td>									
</tr>

<tr>
    <td colspan="3" class="tx_right"><b>Total Required Expenses</b></td>
    <td>₹{{ $total_required_amount??0.00 }}</td>
    <td>&nbsp;</td>										
    <td>&nbsp;</td>										
</tr>

<tr>
    <td colspan="4" class="tx_right"><b>Total Magic Money</b></td>
    <td class="yellowe_bg"><b>₹{{ $total_magic_amount??0.00 }}</b></td>	
    									
    <td>&nbsp;</td>									
</tr> 
<tr>
    <td colspan="4" class="tx_right"><b>Remaining Spendable Amount</b></td>
    <td class="yellowe_bg"><b>₹{{ $total_spandable_amount - $total_current_amount }}</b></td>	
    									
    <td>&nbsp;</td>									
</tr> 