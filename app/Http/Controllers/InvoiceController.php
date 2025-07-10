<?php


namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class InvoiceController extends Controller
{
    // public function index() {
    //     $invoices = Invoice::latest()->paginate(10);
    //     return view('invoices.index', compact('invoices'));
    // }


    public function create() {
        return view('invoices.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'client_name' => 'required',
            'client_email' => 'required|email',
            'client_address' => 'required',
            'gst_number' => 'nullable',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'notes' => 'nullable',
            'line_items' => 'required|array',
            'line_items.*.description' => 'required',
            'line_items.*.hsn' => 'nullable',
            'line_items.*.quantity' => 'required|numeric',
            'line_items.*.unit_price' => 'required|numeric',
            'line_items.*.tax' => 'nullable|numeric'
        ]);
if ($request->hasFile('company_logo')) {
    $path = $request->file('company_logo')->store('logos', 'public');
    $validated['company_logo'] = $path;
}
        $invoice = Invoice::create([
            'invoice_number' => 'INV-' . now()->timestamp,
            'company_name' => $validated['company_name'],
            'company_logo' => $validated['company_logo'] ?? null,
            'company_address' => $validated['company_address'],
            'client_name' => $validated['client_name'],
            'client_email' => $validated['client_email'],
            'client_address' => $validated['client_address'],
            'gst_number' => $validated['gst_number'] ?? null,
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'],
            'notes' => $validated['notes'],
            'line_items' => json_encode($validated['line_items']),
            'total' => collect($validated['line_items'])->sum(function ($item) {
                $subtotal = $item['quantity'] * $item['unit_price'];
                $tax = $subtotal * ($item['tax'] ?? 0) / 100;
                return $subtotal + $tax;
            }),
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created');
    }

    public function show(Invoice $invoice) {
        return view('invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted');
    }

    public function download(Invoice $invoice) {
        $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download($invoice->invoice_number . '.pdf');
    }
 
    public function send(Invoice $invoice)
{
    Mail::to($invoice->client_email)->send(new InvoiceMail($invoice));
    return redirect()->back()->with('success', 'Invoice emailed successfully!');
}

public function index(Request $request) {
    $query = Invoice::query();

    if ($request->filled('search')) {   
        $search = $request->input('search');
        $query->where('client_name', 'like', "%$search%")
              ->orWhere('invoice_number', 'like', "%$search%");
    }

    $invoices = $query->latest()->paginate(5)->withQueryString();
    return view('invoices.index', compact('invoices'));
}


}
