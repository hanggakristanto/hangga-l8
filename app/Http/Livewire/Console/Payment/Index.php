<?php

namespace App\Http\Livewire\Console\Payment;

use App\PaymentConfirmation;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.payment.index', [
            'payments' => $this->search === null ? PaymentConfirmation::latest()->paginate(10) : PaymentConfirmation::where('invoice', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
