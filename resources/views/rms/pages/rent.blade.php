@extends('rms.layouts.app')
@section('content')
<section id="rent" class="screen active">
    <div class="card page-card">
        <div class="page-title">My Rent</div>
        <div class="page-sub">Month-wise rent calculation, charges and outstanding amount.</div>
        <div class="stat-cards">
            <div class="card stat"><small>Basic Rent</small><strong>₹{{ number_format($shop->monthly_rent) }}</strong></div>
            <div class="card stat"><small>Maintenance Charges</small><strong>₹{{ number_format($shop->cleaning_cost) }}</strong></div>
            <!-- <div class="card stat"><small>Penalty</small><strong class="red">₹1,310</strong></div>
            <div class="card stat"><small>Balance</small><strong class="red">₹1,000</strong></div> -->
        </div>
        <table>
            <thead>
                <tr>
                    <th>Particular</th>
                    <th>Calculation / Details</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Rent</td>
                    <td>Monthly Rent</td>
                    <td>₹{{ number_format($shop->monthly_rent) }}</td>
                </tr>
                <tr>
                    <td>Maintenance Charges</td>
                    <td>Monthly Maintenance</td>
                    <td>₹{{ number_format($shop->cleaning_cost) }}</td>
                </tr>
                <tr>
                    <td>Electricity</td>
                    <td>100 Units × ₹10</td>
                    <td>₹1,000</td>
                </tr>
                <!-- <tr>
                    <td>Late Payment Penalty</td>
                    <td>10% of Basic Rent</td>
                    <td class="red">₹1,310</td>
                </tr> -->
                <!-- <tr class="total">
                    <td colspan="2">Gross Amount Due</td>
                    <td>₹{{ number_format($totals->total_gross_due ?? 0, 2) }}</td>
                </tr>

                <tr>
                    <td colspan="2">Paid Amount</td>
                    <td class="paid">
                        ₹{{ number_format($totals->total_paid_amount ?? 0, 2) }}
                    </td>
                </tr>

                <tr class="total">
                    <td colspan="2">Outstanding Balance</td>
                    <td class="red">
                        ₹{{ number_format($totals->outstanding_balance ?? 0, 2) }}
                    </td>
                </tr> -->
            </tbody>
        </table>
        @if($penalty)
        <div class="rule">
            <h4>Automatic Penalty Rule</h4>

            <div class="rule-row">
                <span>Payment on or before {{ $penalty->day_of_due }}th</span>
                <strong>No Penalty</strong>
            </div>

            <div class="rule-row">
                <span>
                    {{ $penalty->day_of_due + 1 }}th
                    to
                    {{ $penalty->penalty1_day }}th
                </span>
                <strong>{{ $penalty->penalty1 }}% of Basic Rent</strong>
            </div>

            <div class="rule-row">
                <span>
                    {{ $penalty->penalty1_day + 1 }}th
                    to
                    {{ $penalty->penalty2_day }}th
                </span>
                <strong>{{ $penalty->penalty2 }}% of Basic Rent</strong>
            </div>

            <div class="rule-row">
                <span>
                    After {{ $penalty->penalty3_day }}th
                </span>
                <strong>{{ $penalty->penalty3 }}% of Basic Rent</strong>
            </div>
        </div>
    @endif
    </div>
</section>
@endsection