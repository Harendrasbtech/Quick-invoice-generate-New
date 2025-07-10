🧾 Quick Invoice Generator (Laravel 10)

A simple Laravel web application to create, view, manage, export, and email invoices with PDF support.

Setup Instructions

 Requirements
- PHP 8.1+
- MySQL 
- Composer
- Laravel 10+
- PDF Library: [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)

---

Installation
# 1. Clone the repository
git clone https://github.com/Harendrasbtech/quick-invoice-generator-New.git
cd quick-invoice-generator

# 2. Install dependencies
composer install

# 3. Copy env file & generate key
cp .env.example .env
php artisan key:generate

# 4. Configure database in `.env`
DB_DATABASE=invoice_db
DB_USERNAME=root
DB_PASSWORD=yourpassword

# 5. Run migrations
php artisan migrate

# 6. Serve the app
php artisan serve


Features Implemented
🧾 Invoice Creation
•	Company info with logo upload
•	Client details (name, email, address, GST)
•	Invoice number (auto-generated), issue & due date
•	Line items with description, HSN, quantity, price, tax
•	Notes / Terms
📂 Invoice Management
•	List invoices with pagination & search
•	View full invoice details
•	Delete invoices
•	Export invoice to professionally formatted PDF
•	Email invoice to client (PDF attached)
________________________________________
📤 PDF & Email
•	PDF generated using Laravel DomPDF
•	Optional company logo shown in PDF
•	Email sent using Laravel Mail with attachment
________________________________________
⚙️ Folder Structure
bash
CopyEdit
app/
├── Http/Controllers/InvoiceController.php

resources/views/invoices/
├── create.blade.php
├── index.blade.php
├── show.blade.php
├── pdf.blade.php

database/migrations/
├── create_invoices_table.php

routes/
├── web.php
________________________________________
✅ Assumptions
•	Logo is stored locally in storage/app/public/logos
•	Email uses Laravel’s default mail driver (log or smtp)
•	Invoice number format is INV-{timestamp}
________________________________________
🐛 Known Issues
•	Logo is not cropped/resized; large logos may affect PDF layout
•	No edit/update functionality (create/delete only for now)
•	No authentication (admin-only by default)
________________________________________
🧪 Sample PDF
Included in /sample/INV-123456789.pdf or download from Releases tab.
________________________________________

