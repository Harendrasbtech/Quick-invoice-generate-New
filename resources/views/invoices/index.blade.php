<!DOCTYPE html>
<html>
<head>
    <title>Invoice List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Invoice List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('invoices.create') }}" class="btn btn-primary">+ Create New Invoice</a>
    </div>
<form method="GET" action="{{ route('invoices.index') }}" class="row mb-3">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search by client or invoice #" value="{{ request('search') }}">
    </div>
    <div class="col-auto">
        <button class="btn btn-secondary">Search</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">Reset</a>
    </div>
</form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Invoice #</th>
            <th>Client Name</th>
            <th>Total (₹)</th>
            <th>Created Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($invoices as $invoice)
            <tr>
                <td>{{ $loop->iteration + ($invoices->currentPage() - 1) * $invoices->perPage() }}</td>
                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ $invoice->client_name }}</td>
                <td>{{ number_format($invoice->total, 2) }}</td>
                <td>{{ $invoice->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('invoices.download', $invoice) }}" class="btn btn-sm btn-success">PDF</a>
                    <a href="{{ route('invoices.send', $invoice) }}" class="btn btn-sm btn-warning">Send Email</a>
                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this invoice?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No invoices found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
         {{ $invoices->links() }}
    </div>
</div>
</body>
</html>
