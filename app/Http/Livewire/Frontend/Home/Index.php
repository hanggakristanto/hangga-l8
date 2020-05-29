<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Product;
use App\Slider;
use Livewire\Component;

class Index extends Component
{
    /**
     * public variable
     */
    public $perPage  = 12;

    /**
     * load more function
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 4;
    }

    public function render()
    {
        $products = Product::latest()->paginate($this->perPage);

        return view('livewire.frontend.home.index', [
            'sliders'   => Slider::latest()->get(),
            'products'  => $products
        ]);
    }
}
