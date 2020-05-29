<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Slider;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.index', [
            'sliders' => Slider::latest()->get()
        ]);
    }
}
