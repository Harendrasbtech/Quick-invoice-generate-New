{{-- resources/views/invoices/create.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Create Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .remove-item-btn { cursor: pointer; color: red; }
    </style>
</head>
<div class="container py-5">
    <h2 class="mb-4 text-center">🧾 Create New Invoice</h2>

    <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf

        {{-- 🔹 Company Info --}}
        <h5 class="mb-3">🏢 Company Information</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Company Logo (optional)</label>
                <input type="file" name="company_logo" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label">Company Address</label>
            <textarea name="company_address" class="form-control" rows="2" required></textarea>
        </div>

        {{-- 🔹 Client Info --}}
        <h5 class="mb-3">👤 Client Information</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Client Name</label>
                <input type="text" name="client_name" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Client Email</label>
                <input type="email" name="client_email" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">GST Number</label>
                <input type="text" name="gst_number" class="form-control">
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label">Client Address</label>
            <textarea name="client_address" class="form-control" rows="2" required></textarea>
        </div>

        {{-- 🔹 Invoice Metadata --}}
        <h5 class="mb-3">🗓 Invoice Details</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Issue Date</label>
                <input type="date" name="issue_date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label">Notes / Terms</label>
            <textarea name="notes" class="form-control" rows="2"></textarea>
        </div>

        {{-- 🔹 Line Items --}}
        <h5 class="mb-3">📦 Line Items</h5>
        <div id="line-items" class="mb-3">
            <div class="row g-2 mb-2 item">
                <div class="col-md-3"><input type="text" name="line_items[0][description]" class="form-control" placeholder="Description" required></div>
                <div class="col-md-1"><input type="text" name="line_items[0][hsn]" class="form-control" placeholder="HSN"></div>
                <div class="col-md-1"><input type="number" name="line_items[0][quantity]" class="form-control" placeholder="Qty" required></div>
                <div class="col-md-2"><input type="number" name="line_items[0][unit_price]" class="form-control" placeholder="Unit Price" required></div>
                <div class="col-md-2"><input type="number" name="line_items[0][tax]" class="form-control" placeholder="Tax %"></div>
                <div class="col-md-1 d-flex align-items-center">
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeItem(this)">🗑</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-outline-secondary mb-4" onclick="addItem()">+ Add Line Item</button>

        {{-- Submit --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">💾 Save Invoice</button>
        </div>
    </form>
</div>

<script>
    let itemIndex = 1;

    function addItem() {
        const container = document.getElementById('line-items');
        const row = document.createElement('div');
        row.className = 'row g-2 mb-2 item';
        row.innerHTML = `
            <div class="col-md-3"><input type="text" name="line_items[${itemIndex}][description]" class="form-control" placeholder="Description" required></div>
            <div class="col-md-1"><input type="text" name="line_items[${itemIndex}][hsn]" class="form-control" placeholder="HSN"></div>
            <div class="col-md-1"><input type="number" name="line_items[${itemIndex}][quantity]" class="form-control" placeholder="Qty" required></div>
            <div class="col-md-2"><input type="number" name="line_items[${itemIndex}][unit_price]" class="form-control" placeholder="Unit Price" required></div>
            <div class="col-md-2"><input type="number" name="line_items[${itemIndex}][tax]" class="form-control" placeholder="Tax %"></div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeItem(this)">🗑</button>
            </div>
        `;
        container.appendChild(row);
        itemIndex++;
    }

    function removeItem(button) {
        button.closest('.item').remove();
    }
</script>
</body>
</html>
