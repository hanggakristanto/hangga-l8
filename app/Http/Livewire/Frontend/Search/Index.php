<?php

namespace App\Http\Livewire\Frontend\Search;

use Livewire\Component;

class Index extends Component
{
    /**
     * public variable
     */
    public $search;

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    /**
     * search function
     */
    public function search()
    {
        dd('mantap');
    }

    public function render()
    {
        return view('livewire.frontend.search.index');
    }
}
