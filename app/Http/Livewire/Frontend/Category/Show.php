<?php

namespace App\Http\Livewire\Frontend\Category;

use App\Product;
use App\Category;
use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Http\Request;

class Show extends Component
{

    /**
     * public variable
     */
    public $segment;
    public $category_name;
    public $category_image;
    public $perPage  = 12;

    /**
     * mount or construct function
     */
    public function mount(Request $request)
    {
        $this->segment = $request->segment(2);
    }

    /**
     * load more function
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 4;
    }

    /**
     * add To Cart
     */
    public function addToCart(int $productId)
    {
        Cart::add(Product::where('id', $productId)->first());
        $this->emit('addToCart');
    }

    public function render()
    {

        $category = Category::where('slug', $this->segment)->first();

        if($category) {

            $this->category_name    = $category->name;
            $this->category_image   = $category->image;

            $products = Product::where('category_id', $category->id)->latest()->paginate($this->perPage);
        }

        return view('livewire.frontend.category.show', [
            'products'          => $products,
            'category_name'     => $this->category_name,
            'category_image'    => $this->category_image
        ]);
    }
}
