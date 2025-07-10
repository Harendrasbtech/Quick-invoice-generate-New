@component('mail::message')
# Hello {{ $invoice->client_name }},

Please find attached the invoice **{{ $invoice->invoice_number }}** issued on **{{ $invoice->issue_date->format('d M Y') }}**.

Thanks,<br>
{{ $invoice->company_name }}
@endcomponent
