<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number', 'company_name', 'company_address', 'client_name', 'client_email','company_logo',
        'client_address', 'gst_number', 'issue_date', 'due_date', 'notes', 'line_items', 'total'
    ];

    protected $casts = [
        'line_items' => 'array',
        'issue_date' => 'date',
        'due_date' => 'date'
    ];
}
