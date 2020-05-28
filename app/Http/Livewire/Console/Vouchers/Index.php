<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

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

    public function render()
    {
        return view('livewire.console.vouchers.index', [
            'vouchers' => Voucher::latest()->paginate(10)
        ]);
    }
}
