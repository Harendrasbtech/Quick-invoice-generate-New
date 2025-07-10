<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->string('invoice_number')->unique();
    $table->string('company_name');
    $table->text('company_address');
    $table->string('client_name');
    $table->string('client_email');
    $table->text('client_address');
    $table->string('gst_number')->nullable();
    $table->date('issue_date');
    $table->date('due_date');
    $table->text('notes')->nullable();
    $table->json('line_items');
    $table->decimal('total', 10, 2);  
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
