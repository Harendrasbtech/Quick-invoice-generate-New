<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .line-items th, .line-items td {
            border: 1px solid #000;
            padding: 8px;
        }
        .right {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Invoice</h2>
        <h4>{{ $invoice->invoice_number }}</h4>
       @if($invoice->company_logo)
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('storage/' . $invoice->company_logo) }}" alt="Company Logo" height="80">
    </div>
@endif

 
    </div>

    <div class="section">
        <table>
            <tr>
                <td>
                    <strong>From:</strong><br>
                    {{ $invoice->company_name }}<br>
                    {{ $invoice->company_address }}
                </td>
                <td>
                    <strong>To:</strong><br>
                    {{ $invoice->client_name }}<br>
                    {{ $invoice->client_address }}<br>
                    Email: {{ $invoice->client_email }}<br>
                    GST No: {{ $invoice->gst_number ?? 'N/A' }}
                </td>
                <td class="right">
                    <strong>Issue Date:</strong> {{ $invoice->issue_date->format('d M Y') }}<br>
                    <strong>Due Date:</strong> {{ $invoice->due_date->format('d M Y') }}
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table class="line-items">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>HSN</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Tax %</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $lineItems = json_decode($invoice->line_items, true);
              @endphp
            @foreach ($lineItems as $item)
                <tr>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['hsn'] ?? '-' }}</td>
                    <td class="right">{{ $item['quantity'] }}</td>
                    <td class="right">₹{{ number_format($item['unit_price'], 2) }}</td>
                    <td class="right">{{ $item['tax'] ?? 0 }}%</td>
                    <td class="right">
                        ₹{{ number_format(($item['quantity'] * $item['unit_price']) * (1 + ($item['tax'] ?? 0) / 100), 2) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="section right">
        <h3>Total: ₹{{ number_format($invoice->total, 2) }}</h3>
    </div>

    @if ($invoice->notes)
        <div class="section">
            <strong>Notes / Terms:</strong><br>
            <p>{{ $invoice->notes }}</p>
        </div>
    @endif

    <div class="footer">
        <p>Thank you for your business!</p>
    </div>

</body>
</html>
