@foreach($liabilities as $liability)
@php
    $last = $liability->last_year_amount;
    $thisYear = $liability->this_year_amount;
    $current = $liability->current_amount;

    $percent = 0;
    $current_percent = 0;

    if ($last > 0) {
        $percent = (($thisYear - $last) / $last) * 100;
    }

    if ($thisYear > 0) {
        $current_percent = (($current - $thisYear) / $thisYear) * 100;
    }
@endphp
<tr>
    <td class="tx_left"><b>{{ $liability->liability_name }}</b></td>
    <td class="p-0 brd_none">
        <table class="table table-bordered tst_cam_listst mb-0 brd_none brd_top">
        <tr>
        <td class="brd_none brd_bottom brd_right">₹{{ number_format($liability->last_year_amount, 2) }}</td>
        <td class="brd_none brd_bottom">₹{{ number_format($liability->this_year_amount, 2) }}</td>
        </tr>
        </table>
    </td>
    <td>{{ number_format($percent, 2) }}%</td>
    <td>₹{{ number_format($liability->current_amount, 2) }}</td>
    <td>{{ number_format($current_percent, 2) }}%</td>
    <td><a href="javascript:void(0);" onclick="editLibility('{{ $liability->id }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &ensp; <a href="javascript:void(0);" onclick="deleteLiability('{{ $liability->id }}')"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach