<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $invoices = Invoice::with(['invoiceItems','payments'])->paginate(10);

        return view('livewire.invoice-index',['invoices' => $invoices]);
    }
}
