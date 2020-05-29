<?php

namespace App\Http\Livewire\Console\Products;

use App\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    /**
     * public variable
     */
    public $search;

    /**
    * destroy function
    */
    public function destroy($productId)
    {
        $product = Product::find($productId);

        if($product) {
            Storage::disk('public')->delete('products/'.$product->image);
            $product->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.products.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.products.index', [
            'products' => $this->search === null ? Product::latest()->paginate(10) : Product::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
