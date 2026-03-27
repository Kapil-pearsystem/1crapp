@foreach($assets as $asset)
@php
    $last = $asset->last_year_amount;
    $thisYear = $asset->this_year_amount;
    $current = $asset->current_amount;

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
    <td class="tx_left"><b>{{ $asset->asset_name }}</b></td>
    <td class="p-0 brd_none">
        <table class="table table-bordered tst_cam_listst mb-0 brd_none brd_top">
        <tr>
        <td class="brd_none brd_bottom brd_right">₹{{ number_format($asset->last_year_amount, 2) }}</td>
        <td class="brd_none brd_bottom">₹{{ number_format($asset->this_year_amount, 2) }}</td>
        </tr>
        </table>
    </td>
    <td>{{ number_format($percent, 2) }}%</td>
    <td>₹{{ number_format($asset->current_amount, 2) }}</td>
    <td>{{ number_format($current_percent, 2) }}%</td>
    <td><a href="javascript:void(0);" onclick="editAsset('{{ $asset->id }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &ensp; <a href="javascript:void(0);" onclick="deleteAsset('{{ $asset->id }}')"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach