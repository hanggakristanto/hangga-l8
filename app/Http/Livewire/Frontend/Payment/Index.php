<?php

namespace App\Http\Livewire\Frontend\Payment;

use App\Invoice;
use Livewire\Component;

class Index extends Component
{
    public $invoice;

    /**
     * mount or construct function
     */
    public function mount($invoice_id)
    {
        $this->invoice = Invoice::where('invoice', $invoice_id)->first();
    }

    public function render()
    {
        return view('livewire.frontend.payment.index');
    }
}
