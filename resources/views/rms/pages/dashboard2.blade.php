@extends('rms.layout.app')
@section('content')
@php
    $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];
@endphp
{{-- ================= FILTER ================= --}}
<div class="card tcard mb-4">
    <div class="card-head bg-g-blue">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0">Payment Dashboard</h6>
                <small class="opacity-75">{{ $shop->shop_name ?? 'My Property' }}</small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('rms.dashboard') }}">
            <div class="row g-2 align-items-end">
                <div class="col-12 col-md-4 col-lg-3">
                    <label class="form-label">Year</label>
                    <select name="year" class="form-select">
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ (int) $selectedYear === (int) $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <label class="form-label">Month</label>
                    <select name="month" class="form-select">
                        <option value="0" {{ $selectedMonth == 0 ? 'selected' : '' }}>All Months</option>
                        @foreach($months as $monthNo => $monthName)
                            <option value="{{ $monthNo }}" {{ (int) $selectedMonth === (int) $monthNo ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 col-lg-auto">
                    <button type="submit" class="btn btn-gradient">
                        <i class="bi bi-funnel me-1"></i>Apply Filter
                    </button>
                    <a href="{{ route('rms.dashboard') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- ================= SUMMARY CARDS ================= --}}
<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-blue">
                <i class="bi bi-wallet2"></i>
            </div>
            <div class="body">
                <small>Total Due</small>
                <h4>₹{{ number_format($totals['total_due'], 2) }}</h4>
            </div>
            <div class="foot">
                {{ $totals['total_requests'] }} payment
                {{ $totals['total_requests'] == 1 ? 'request' : 'requests' }}
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-green">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="body">
                <small>Total Paid</small>
                <h4>₹{{ number_format($totals['total_paid'], 2) }}</h4>
            </div>
            <div class="foot">
                <span class="up">Approved</span> payments
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-pink">
                <i class="bi bi-exclamation-circle-fill"></i>
            </div>
            <div class="body">
                <small>Outstanding</small>
                <h4>₹{{ number_format($totals['total_outstanding'], 2) }}</h4>
            </div>
            <div class="foot">
                <span class="down">Remaining</span> amount
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat">
            <div class="float-icon bg-g-dark">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="body">
                <small>Pending Approval</small>
                <h4>₹{{ number_format($totals['total_pending'], 2) }}</h4>
            </div>
            <div class="foot">
                Payment submitted for approval
            </div>
        </div>
    </div>
</div>
{{-- ================= PAYMENT GRAPH ================= --}}
<div class="row g-4 mt-1">
    <div class="col-12">
        <div class="card chart-card">
            <div class="info d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div>
                    <h6>Payment Overview</h6>
                    <p class="mb-0">
                        {{ $selectedMonth > 0 ? $months[$selectedMonth] . ' ' : '' }}{{ $selectedYear }}
                    </p>
                </div>
                <div class="small text-secondary">
                    {{ $totals['total_requests'] }} rent records
                </div>
            </div>
            <div class="p-3">
                <div style="height: 350px;">
                    <canvas id="paymentOverviewChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ================= ALL RENT RECORDS ================= --}}
<div class="card tcard mt-5">
    <div class="card-head bg-g-blue">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0">Rent Payment Records</h6>
                <small class="opacity-75">
                    {{ $selectedMonth > 0 ? $months[$selectedMonth] . ' ' : '' }}
                    {{ $selectedYear }}
                </small>
            </div>
            <a href="{{ route('rms.my-payments') }}" class="btn btn-sm btn-light">
                <i class="bi bi-credit-card me-1"></i>My Payments
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-m align-middle mb-0">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Basic Rent</th>
                        <th>Maintenance</th>
                        <th>Electricity</th>
                        <th>Penalty</th>
                        <th>Total Due</th>
                        <th>Paid</th>
                        <th>Pending</th>
                        <th>Outstanding</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                        <tr>
                            <td>
                                <strong>{{ $record['month_name'] }}</strong>
                                <small class="d-block text-secondary">
                                    {{ $record['year'] }}
                                </small>
                            </td>
                            <td>
                                ₹{{ number_format($record['basic_rent'], 2) }}
                            </td>
                            <td>
                                ₹{{ number_format($record['cleaning_cost'], 2) }}
                            </td>
                            <td>
                                ₹{{ number_format($record['electricity'], 2) }}
                            </td>
                            <td>
                                @if($record['penalty'] > 0)
                                    <strong class="down">
                                        ₹{{ number_format($record['penalty'], 2) }}
                                    </strong>
                                @else
                                    <span class="text-secondary">₹0.00</span>
                                @endif
                            </td>
                            <td>
                                <strong>
                                    ₹{{ number_format($record['total_due'], 2) }}
                                </strong>
                            </td>
                            <td>
                                <strong class="up">
                                    ₹{{ number_format($record['approved_amount'], 2) }}
                                </strong>
                            </td>
                            <td>
                                @if($record['pending_amount'] > 0)
                                    <strong class="text-warning">
                                        ₹{{ number_format($record['pending_amount'], 2) }}
                                    </strong>
                                @else
                                    ₹0.00
                                @endif
                            </td>
                            <td>
                                @if($record['outstanding'] > 0)
                                    <strong class="down">
                                        ₹{{ number_format($record['outstanding'], 2) }}
                                    </strong>
                                @else
                                    <strong class="up">
                                        ₹0.00
                                    </strong>
                                @endif
                            </td>
                            <td>
                                <span class="badge-s {{ $statusColors[$record['status']] ?? 'bg-g-grey' }}">
                                    {{ $statusLabels[$record['status']] ?? '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-5 text-secondary">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                No rent records found for the selected period.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if($records->count())
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th colspan="3"></th>
                            <th>
                                ₹{{ number_format($totals['total_penalty'], 2) }}
                            </th>
                            <th>
                                ₹{{ number_format($totals['total_due'], 2) }}
                            </th>
                            <th class="text-success">
                                ₹{{ number_format($totals['total_paid'], 2) }}
                            </th>
                            <th class="text-warning">
                                ₹{{ number_format($totals['total_pending'], 2) }}
                            </th>
                            <th class="text-danger">
                                ₹{{ number_format($totals['total_outstanding'], 2) }}
                            </th>
                            <th></th>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
{{-- ================= RECENT PAYMENT HISTORY ================= --}}
<div class="card tcard mt-5">
    <div class="card-head bg-g-green">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0">Recent Payment History</h6>
                <small class="opacity-75">
                    Submitted payments for selected period
                </small>
            </div>
            <a href="{{ route('rms.my-payments') }}" class="btn btn-sm btn-light">
                View All
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-m align-middle mb-0">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Mode</th>
                        <th>Reference</th>
                        <th>Submitted</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPayments as $payment)
                        @php
                            $paymentStatus = [
                                0 => ['Pending Approval', 'bg-g-blue'],
                                1 => ['Approved', 'bg-g-green'],
                                2 => ['Rejected', 'bg-g-pink'],
                            ];
                            $pStatus = $paymentStatus[$payment->approval_status]
                                ?? ['Unknown', 'bg-g-grey'];
                        @endphp
                        <tr>
                            <td>
                                <strong>
                                    {{ date('F', mktime(0, 0, 0, $payment->collection_month, 1)) }}
                                </strong>
                                <small class="d-block text-secondary">
                                    {{ $payment->collection_year }}
                                </small>
                            </td>
                            <td>
                                {{ $payment->payment_date
                                    ? date('d M, Y', strtotime($payment->payment_date))
                                    : '-' }}
                            </td>
                            <td>
                                <strong>
                                    ₹{{ number_format((float) $payment->payment_amount, 2) }}
                                </strong>
                            </td>
                            <td>
                                {{ $payment->payment_mode ?: '-' }}
                            </td>
                            <td class="text-break">
                                {{ $payment->reference_number ?: '-' }}
                            </td>
                            <td>
                                {{ $payment->created_at
                                    ? date('d M, Y', strtotime($payment->created_at))
                                    : '-' }}
                            </td>
                            <td>
                                <span class="badge-s {{ $pStatus[1] }}">
                                    {{ $pStatus[0] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-secondary">
                                <i class="bi bi-receipt fs-2 d-block mb-2"></i>
                                No payment history found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('paymentOverviewChart');
    if (!canvas) return;
    const records = @json($records->values());
    const labels = records.map(record => record.month_name + ' ' + record.year);
    const due = records.map(record => Number(record.total_due || 0));
    const paid = records.map(record => Number(record.approved_amount || 0));
    const penalty = records.map(record => Number(record.penalty || 0));
    const outstanding = records.map(record => Number(record.outstanding || 0));
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total Due',
                    data: due,
                    borderWidth: 1
                },
                {
                    label: 'Paid',
                    data: paid,
                    borderWidth: 1
                },
                {
                    label: 'Penalty',
                    data: penalty,
                    borderWidth: 1
                },
                {
                    label: 'Outstanding',
                    data: outstanding,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.dataset.label + ': ₹' +
                                Number(context.raw || 0).toLocaleString('en-IN', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return '₹' + Number(value).toLocaleString('en-IN');
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection