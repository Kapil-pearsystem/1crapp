<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ isset($data['title'])?$data['title']:'' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .email-container {
            width: 100%;
            padding: 2rem 0;
            background-color: #f5f5f5;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            padding: 20px;
            background: linear-gradient(135deg, #01508f 0%, #003b6f 100%);
            text-align: center;
        }

        .email-header img {
            width: 100px;
            height: auto;
        }

        .email-header h1 {
            color: #ffffff;
            font-size: 28px;
            margin: 10px 0 0;
        }

        .email-body {
            padding: 30px;
            color: #333333;
        }

        .email-body h1 {
            color: #01508f;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .email-body a {
            color: #01508f;
            text-decoration: none;
        }

        .email-body .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .email-footer {
            padding: 20px;
            text-align: center;
            color: #999999;
            font-size: 14px;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-content">
            <div class="email-header">
                <img src="{{ isset($data['logo'])?$data['logo']:'' }}" alt="1CR Logo">
                <h1>{{ isset($data['title'])?$data['title']:'' }}</h1>
            </div>
            <div class="email-body">
                <p>Hi, There!</p>
                {!! isset($data['top_content'])?$data['top_content']:'' !!}
                  <!-- Customer Info -->
                    <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;margin-bottom:20px;font-size:10px;">
                        <tr>
                            <td><strong>Customer Name:</strong> {{ $data['name'] ?? '' }}</td>
                            <td><strong>No of Gifts In Collections:</strong> {{ $data['total_gifts'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Customer ID:</strong> {{ $data['memberid'] ?? '' }}</td>
                            <td><strong>Campaign Name:</strong> {{ $data['campaign_title'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Customer Email:</strong> {{ $data['email'] ?? '' }}</td>
                            <td><strong>No of Contacts In Campaigns:</strong> {{ $data['total_customers'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td><strong>Collection Name:</strong> {{ $data['collection_name'] ?? '' }}</td>
                            <td><strong>Gross Order Value:</strong> ₹{{ $data['gross_value'] ?? '' }}</td>
                        </tr>
                    </table>
                
                    <!-- Gift Details -->
                    <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;margin-bottom:20px;font-size:14px;">
                        <thead style="background:#01508f;color:#fff;">
                            <tr>
                                <th>S.No</th>
                                <th>Item Category</th>
                                <th>Item Name</th>
                                <th>Dispatch Date</th>
                                <th>MRP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $data['gift_category'] ?? '' }}</td>
                                <td>{{ $data['gift_name'] ?? '' }}</td>
                                <td>{{ date('F d, Y') }}</td>
                                <td>₹{{ $data['gift_mrp'] ?? '' }}</td>
                            </tr>
                            @if($data['tyc_status'])
                            <tr>
                                <td>2</td>
                                <td>{{ $data['tyc_category'] ?? '' }}</td>
                                <td>{{ $data['tyc_name'] ?? '' }}</td>
                                <td>{{ date('F d, Y') }}</td>
                                <td>₹{{ $data['tyc_price'] ?? '' }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                
                    <!-- Amount Summary -->
                    <table width="100%" cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;font-size:14px; text-align:right;">
                        <tr style="background:#01508f;color:#fff;font-weight:bold;">
                            <td>Sub Total</td>
                            <td align="right">₹{{ $data['sub_total'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td align="right">₹{{ $data['discount'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td>Total After Discount</td>
                            <td align="right">₹{{ $data['total_after_discount'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td>Courier Charges ( Rs. {{ $data['courier_charge'] ?? 0 }}/item x 1 item)</td>
                            <td align="right">₹{{ $data['courier_charge'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td>Handling & Packaging Charges</td>
                            <td align="right">₹{{ $data['handling_charge'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td>Taxes (GST): {{ $data['gst_percent'] ?? 0 }}%</td>
                            <td align="right">₹{{ $data['gst_charge'] ?? 0 }}</td>
                        </tr>
                        <tr style="background:#01508f;color:#fff;font-weight:bold;">
                            <td>Total Amount For Campaign Gift</td>
                            <td align="right">₹{{ $data['total_amount_pr_user'] ?? 0 }}</td>
                        </tr>
                        <tr style="background:yellow;color:#000;font-weight:bold;">
                            <td>Gross Amount Of the order (campaign)</td>
                            <td align="right">₹{{ $data['total_amount_pr_user'] ?? 0 }}</td>
                        </tr>
                    </table>

                <p>If you need immediate assistance, Please feel free to contact our support team by clicking the bottom button:</p>
                <p style="text-align:center;">
                    <a href="#"
                       style="
                            background-color:#01508f;
                            color:#ffffff;
                            text-decoration:none;
                            padding:12px 25px;
                            border-radius:5px;
                            display:inline-block;
                            font-size:14px;
                            font-weight:bold;">
                        Contact Support
                    </a>
                </p>
                {!! isset($data['bottom_content'])?$data['bottom_content']:'' !!}
            </div>
            <div class="email-footer">
                <p>{!! isset($data['copyright_text'])?$data['copyright_text']:'' !!}</p>
            </div>
        </div>
    </div>
</body>

</html>
