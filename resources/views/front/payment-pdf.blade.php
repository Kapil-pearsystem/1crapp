<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .header-table {
            width: 100%;
            table-layout: fixed;
        }
        .header-table td {
            vertical-align: middle;
        }
        .header-table img {
            width: 150px;
        }
        .header-title {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
        }
        hr.blue-line {
            border: 0;
            height: 2px;
            background-color: #007bff;
            margin: 10px 0 20px;
        }
        table.table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.table th,
        table.table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }
        table.table th {
            background-color: #d6dbdf;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <table class="header-table">
        <tr>
            <td><img src="{{ public_path('home/img/logo 1.png') }}" height="80" width="50" alt="Logo"></td>
            <td class="header-title">Payment Details</td>
        </tr>
    </table>
    <hr class="blue-line">

    <!-- Table with all payment records -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Remarks</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Source</th>
                <th>Transaction Proof</th>
                <th>Receipt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->remarks ?? '—' }}</td>
                    <td>{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->paid_date)->format('d-m-Y') }}</td>
                    <td>{{ $payment->payment_mode }}</td>
                    <td>{{ ucfirst($payment->funding_source) }}</td>
                    <td>
                        @if($payment->transition_proof && pathinfo($payment->transition_proof, PATHINFO_EXTENSION) !== 'pdf')
                            <img src="{{ public_path($payment->transition_proof) }}" width="80">
                        @else
                            {{ $payment->transition_proof ? 'PDF Uploaded' : '—' }}
                        @endif
                    </td>
                    <td>
                        @if($payment->seller_receipt && pathinfo($payment->seller_receipt, PATHINFO_EXTENSION) !== 'pdf')
                            <img src="{{ public_path($payment->seller_receipt) }}" width="80">
                        @else
                            {{ $payment->seller_receipt ? 'PDF Uploaded' : '—' }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
