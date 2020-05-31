<?php

namespace App\Http\Livewire\Console\Orders;

use App\Invoice;
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
        return view('livewire.console.orders.index', [
            'invoices' => $this->search === null ? Invoice::latest()->paginate(10) : Invoice::where('invoice', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
