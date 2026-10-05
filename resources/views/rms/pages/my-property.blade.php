@extends('rms.layout.app')
@section('content')
{{-- Stat cards --}}
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-house-door-fill"></i></div>
            <div class="body"><small>Shop</small>
                <h4>{{ ucfirst($shop->type) }}</h4>
            </div>
            <div class="foot">{{ $shop->shop_name }}</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-currency-rupee"></i></div>
            <div class="body"><small>Basic Rent</small>
                <h4>₹{{ number_format($shop->monthly_rent) }}</h4>
            </div>
            <div class="foot">Monthly rent</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue"><i class="bi bi-tools"></i></div>
            <div class="body"><small>Maintenance</small>
                <h4>₹{{ number_format($shop->cleaning_cost) }}</h4>
            </div>
            <div class="foot">Monthly maintenance</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue"><i class="bi bi-lightning-charge"></i></div>
            <div class="body"><small>Electricity</small>
                <h4>{{ $shop->electricity_applicable ? 'Applicable' : 'Not Applicable' }}</h4>
            </div>
            <div class="foot">Monthly electricity</div>
        </div>
    </div>
    {{--
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-dark"><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div class="body"><small>Penalty</small><h4 class="down">₹1,310</h4></div>
            <div class="foot">Late payment</div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-green"><i class="bi bi-cash-stack"></i></div>
            <div class="body"><small>Balance</small><h4 class="down">₹1,000</h4></div>
            <div class="foot">Outstanding</div>
        </div>
    </div>
    --}}
</div>
{{-- Rent calculation table --}}
<div class="card tcard mt-5">
    <div class="card-head bg-g-pink">
        <h6>My Rent</h6>
        <small class="opacity-75">Month-wise rent calculation, charges and outstanding amount.</small>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-m mb-0">
                <thead>
                    <tr>
                        <th>Particular</th>
                        <th>Calculation / Details</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Basic Rent</td>
                        <td>Monthly Rent</td>
                        <td class="text-end">₹{{ number_format($shop->monthly_rent) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Maintenance Charges</td>
                        <td>Monthly Maintenance</td>
                        <td class="text-end">₹{{ number_format($shop->cleaning_cost) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Electricity</td>
                        <td>100 Units × ₹10</td>
                        <td class="text-end">₹1,000</td>
                    </tr>
                    {{--
                    <tr>
                        <td class="fw-bold">Late Payment Penalty</td>
                        <td>10% of Basic Rent</td>
                        <td class="text-end down">₹1,310</td>
                    </tr>
                    <tr class="total">
                        <td colspan="2">Gross Amount Due</td>
                        <td class="text-end">₹{{ number_format($totals->total_gross_due ?? 0, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Paid Amount</td>
                        <td class="text-end up">₹{{ number_format($totals->total_paid_amount ?? 0, 2) }}</td>
                    </tr>
                    <tr class="total">
                        <td colspan="2">Outstanding Balance</td>
                        <td class="text-end down">₹{{ number_format($totals->outstanding_balance ?? 0, 2) }}</td>
                    </tr>
                    --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- Automatic penalty rule --}}
@if($penalty)
    <div class="card tcard mt-5">
        <div class="card-head bg-g-dark">
            <h6>Automatic Penalty Rule</h6>
        </div>
        <div class="card-body">
            <div class="rule-row">
                <span>Payment on or before {{ $penalty->day_of_due }}th</span>
                <span class="badge-s bg-g-green">No Penalty</span>
            </div>
            <div class="rule-row">
                <span>After {{ $penalty->day_of_due }}th to {{ $penalty->penalty1_day }}th</span>
                <span class="badge-s bg-g-blue">{{ $penalty->penalty1 }}% of Basic Rent</span>
            </div>
            <div class="rule-row">
                <span>After {{ $penalty->penalty1_day }}th to {{ $penalty->penalty2_day }}th</span>
                <span class="badge-s bg-g-pink">{{ $penalty->penalty2 }}% of Basic Rent</span>
            </div>
            <div class="rule-row">
                <span>After {{ $penalty->penalty2_day }}th</span>
                <span class="badge-s bg-g-dark">{{ $penalty->penalty3 }}% of Basic Rent</span>
            </div>
        </div>
    </div>
@endif
@endsection