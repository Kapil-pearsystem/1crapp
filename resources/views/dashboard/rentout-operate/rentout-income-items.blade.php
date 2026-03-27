<!-- resources/views/itemized_other_income.blade.php -->
@foreach ($items as $item)
    <div class="form-group managsss1" id="IPA{{ $item->id }}">
        <label>{{ $item->paid_name }}</label>
        @if ($item->paid_type == 'percent')
            <input class="currencyInput" type="text" placeholder="" value="{{ $item->paid_amount }}" readonly />
            <span class="pursntss">% of {{ ucfirst($item->paid_percentOf) }}</span>
        @else
            <span class="currencyInputprefix">{{ $currencySymbol }}</span>
            <input class="currencyInput" type="text" placeholder="" value="{{ $item->paid_amount }}" readonly />
            <span class="pursntss">Per {{ ucfirst($item->paid_amountOf) }}</span>
        @endif
        <span class="edttt bth_alsss">
            <a data-toggle="modal" data-target="#itemizedOtherIncomeModalEdit" onclick="editIPA({{ $item->id }}, {{ $item->prop_id }}, '{{ $item->paid_name }}', '{{ $item->paid_type }}', {{ $item->paid_amount }}, '{{ $item->paid_percentOf }}', '{{ $item->paid_amountOf }}', {{ $item->itemizedFutureExpense }}, {{ $item->itemizedAfterVacancy }});" style="cursor: pointer;">
                <img src="{{ url('img/edit.png') }}" />
            </a>
            <a onclick="deleteIPA({{ $item->id }}, {{ $item->paid_amount }});" style="cursor: pointer;">
                <i class="fa fa-trash"></i>
            </a>
        </span>
    </div>
@endforeach
<div class="btm_coststs"><span class="tltss">Total</span> <span class="pricss"><?=$currencySymbol?> <span id="totalItemizedOtherIncomeMonthly"><?=$otherIncomeCalculation["monthly"] ?? 0?></span> Per Month (<?=$currencySymbol?> <span id="totalItemizedOtherIncomeYearly"><?=$otherIncomeCalculation["yearly"] ?></span> Per Year)</span></span></div>
