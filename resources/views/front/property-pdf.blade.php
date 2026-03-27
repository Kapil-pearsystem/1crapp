<!DOCTYPE html>
<html>
<head>
    <title>Property Summary</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; font-size: 12px; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    
    <table>
        <tr>
            <td>    <img src="{{ public_path('home/img/logo 1.png') }}" alt="Logo" style="width: 150px; margin-bottom: 20px;"></td>
            <td align="right"><h2>Property Details</h2></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>Property ID</th>
            <td>{{ $property->property_id }}</td>
        </tr>
        <tr>
            <th>Project Name</th>
            <td>{{ $property->project_name }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $property->property_type }} - {{ optional($property->details)->category_type }}</td>
        </tr>
        <tr>
            <th>Owner</th>
            <td>{{ $property->owner_name }}</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $property->location }}</td>
        </tr>
        <tr>
            <th>Purchase Date</th>
            <td>{{ optional($property->details)->date_of_booking }}</td>
        </tr>
        <tr>
            <th>Gross Payment</th>
            <td>{{ optional($property->details)->gross_payment }}</td>
        </tr>
        <tr><th>Date of Booking</th><td>{{ $details->date_of_booking ? \Carbon\Carbon::parse($details->date_of_booking)->format('d-m-Y') : '—' }}</td></tr>
        <tr><th>Date of Registry</th><td>{{ $details->date_of_registry ? \Carbon\Carbon::parse($details->date_of_registry)->format('d-m-Y') : '—' }}</td></tr>
        <tr><th>Date of Possession</th><td>{{ $details->date_of_possession ? \Carbon\Carbon::parse($details->date_of_possession)->format('d-m-Y') : '—' }}</td></tr>
        <tr><th>Gross Payment</th><td>₹{{ number_format($details->gross_payment, 2) }}</td></tr>
        <tr><th>Parking</th><td>{{ $details->parking ?? '—' }}</td></tr>
        <tr><th>Number of Parking</th><td>{{ $details->no_of_parking ?? '—' }}</td></tr>
        <tr><th>Category Type</th><td>{{ $details->category_type ?? '—' }}</td></tr>
        <tr><th>Property Size</th><td>{{ $details->property_size ?? '—' }}</td></tr>
        <tr><th>Property Size Type</th><td>{{ $details->property_size_type ?? '—' }}</td></tr>
        <tr><th>Property Unit</th><td>{{ $details->property_unit ?? '—' }}</td></tr>
        <tr><th>Bedrooms</th><td>{{ $details->bedrooms ?? '—' }}</td></tr>
        <tr><th>Bathrooms</th><td>{{ $details->bathrooms ?? '—' }}</td></tr>
        <tr><th>Built Year</th><td>{{ $details->built_year ?? '—' }}</td></tr>
        <tr><th>Transaction Type</th><td>{{ $details->transaction_type ?? '—' }}</td></tr>
        <tr><th>Property Unit (prop_unit)</th><td>{{ $details->prop_unit ?? '—' }}</td></tr>
        <tr><th>Tower No</th><td>{{ $details->tower_no ?? '—' }}</td></tr>
        <tr><th>Building Name</th><td>{{ $details->building_name ?? '—' }}</td></tr>
        <tr><th>Street No</th><td>{{ $details->street_no ?? '—' }}</td></tr>
        <tr><th>Country</th><td>{{ $details->prop_country ?? '—' }}</td></tr>
        <tr><th>State</th><td>{{ $details->prop_state ?? '—' }}</td></tr>
        <tr><th>City</th><td>{{ $details->prop_city ?? '—' }}</td></tr>
        <tr><th>Zip Code</th><td>{{ $details->prop_zip_code ?? '—' }}</td></tr>
        <tr><th>Google Location</th><td>{{ $details->prop_google_location ?? '—' }}</td></tr>

        <tr><th>Seller Name</th><td>{{ $details->seller_name ?? '—' }}</td></tr>
        <tr><th>Seller Street Name</th><td>{{ $details->seller_street_name ?? '—' }}</td></tr>
        <tr><th>Seller Country ID</th><td>{{ $details->seller_country_id ?? '—' }}</td></tr>
        <tr><th>Seller State ID</th><td>{{ $details->seller_state_id ?? '—' }}</td></tr>
        <tr><th>Seller City ID</th><td>{{ $details->seller_city_id ?? '—' }}</td></tr>
        <tr><th>Seller Zip Code</th><td>{{ $details->seller_zip_code ?? '—' }}</td></tr>
        <tr><th>Seller Phone</th><td>{{ $details->seller_phone ?? '—' }}</td></tr>
        <tr><th>Seller Email</th><td>{{ $details->seller_email ?? '—' }}</td></tr>

        <tr><th>Agent Name</th><td>{{ $details->agent_name ?? '—' }}</td></tr>
        <tr><th>Agent Street Name</th><td>{{ $details->agent_street_name ?? '—' }}</td></tr>
        <tr><th>Agent Country ID</th><td>{{ $details->agent_country_id ?? '—' }}</td></tr>
        <tr><th>Agent State ID</th><td>{{ $details->agent_state_id ?? '—' }}</td></tr>
        <tr><th>Agent City ID</th><td>{{ $details->agent_city_id ?? '—' }}</td></tr>
        <tr><th>Agent Zip Code</th><td>{{ $details->agent_zip_code ?? '—' }}</td></tr>
        <tr><th>Agent Phone</th><td>{{ $details->agent_phone ?? '—' }}</td></tr>
        <tr><th>Agent Email</th><td>{{ $details->agent_email ?? '—' }}</td></tr>

        <tr><th>Current Market Value</th><td>{{ $details->current_market_value ?? '—' }}</td></tr>
        <tr><th>Current Debt Balance</th><td>{{ $details->current_debt_balance ?? '—' }}</td></tr>
        <tr><th>Annual Cash Flow</th><td>{{ $details->annual_cash_flow ?? '—' }}</td></tr>
    </table>
</body>
</html>
