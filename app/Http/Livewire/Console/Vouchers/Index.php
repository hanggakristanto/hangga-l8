<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
    * destroy function
    */
    public function destroy($voucherId)
    {
        $voucher = Voucher::find($voucherId);

        if($voucher) {
            Storage::disk('public')->delete('vouchers/'.$voucher->image);
            $voucher->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.vouchers.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.vouchers.index', [
            'vouchers' => $this->search === null ? Voucher::latest()->paginate(10) : Voucher::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
