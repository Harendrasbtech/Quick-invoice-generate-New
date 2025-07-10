<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
    <h2>Invoice: {{ $invoice->invoice_number }}</h2>
     @if ($invoice->company_logo)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $invoice->company_logo) }}" alt="Company Logo" height="80">
        </div>
    @endif
 
    <p><strong>Issue Date:</strong> {{ $invoice->issue_date->format('d M Y') }}</p>
    <p><strong>Due Date:</strong> {{ $invoice->due_date->format('d M Y') }}</p>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5>From:</h5>
            <p>
                <strong>{{ $invoice->company_name }}</strong><br>
                {{ $invoice->company_address }}
            </p>
        </div>
        <div class="col-md-6">
            <h5>To:</h5>
            <p>
                <strong>{{ $invoice->client_name }}</strong><br>
                {{ $invoice->client_address }}<br>
                Email: {{ $invoice->client_email }}<br>
                GST No: {{ $invoice->gst_number ?? 'N/A' }}
            </p>
        </div>
    </div>

    <h5 class="mt-4">Line Items</h5>
    <table class="table table-bordered">
        <thead class="table-light">
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
                <td>{{ $item['quantity'] }}</td>
                <td>₹{{ number_format($item['unit_price'], 2) }}</td>
                <td>{{ $item['tax'] ?? 0 }}%</td>
                <td>
                    ₹{{ number_format(
                        ($item['quantity'] * $item['unit_price']) * (1 + ($item['tax'] ?? 0) / 100), 2
                    ) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <h5><strong>Grand Total: ₹{{ number_format($invoice->total, 2) }}</strong></h5>
    </div>

    @if($invoice->notes)
        <h6 class="mt-4">Notes / Terms</h6>
        <p>{{ $invoice->notes }}</p>
    @endif

    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('invoices.download', $invoice) }}" class="btn btn-success">Download PDF</a>
</div>
</body>
</html>
