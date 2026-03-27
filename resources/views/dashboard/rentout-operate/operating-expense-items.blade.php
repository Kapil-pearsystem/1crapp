@foreach ($items as $item)
    <div class="form-group managsss1" id="IPA{{ $item->id }}">
        <label>{{ $item->paid_name }}</label>
        @if ($item->paid_type == 'percent')
            <input class="currencyInput pecentOfInput" type="text" placeholder="" value="{{ $item->paid_amount }}" readonly />
            <span class="currencyInputprefix percentOfSpan">% of {{ ucfirst($item->paid_percentOf) }}</span>
        @else
            <span class="currencyInputprefix">{{ $currencySymbol }}</span>
            <input class="currencyInput" type="text" placeholder="" value="{{ $item->paid_amount }}" readonly />
            <span class="currencyInputprefix percentOfSpan">Per {{ ucfirst($item->paid_of) }}</span>
        @endif
        <span class="edttt bth_alsss">
            <a data-toggle="modal" data-target="#EditOperatingExpense" onclick="editIPURA({{ $item->id }}, {{ $item->prop_id }}, '{{ $item->paid_name }}', '{{ $item->paid_type }}', {{ $item->paid_amount }}, '{{ $item->paid_percentOf }}', '{{ $item->paid_infuture }}', '{{ $item->paid_aftervacancy }}', '{{ $item->paid_of }}');" style="cursor: pointer;">
                <img src="{{ url('img/edit.png') }}" />
            </a>
            <a onclick="deleteIPURA({{ $item->id }}, {{ $item->paid_amount }});" style="cursor: pointer;">
                <i class="fa fa-trash"></i>
            </a>
        </span>
    </div>
@endforeach
<div class="btm_coststs"><span class="tltss">Total</span> <span class="pricss"><?=$currencySymbol?> <span id="totalItemizedOperatingExpenseMonthly"><?=$operatingExpenseCalculation["monthly"] ?? 0?></span> Per Month (<?=$currencySymbol?> <span id="totalItemizedOperatingExpenseYearly"><?=$operatingExpenseCalculation["yearly"] ?></span> Per Year)</span></span></div>
