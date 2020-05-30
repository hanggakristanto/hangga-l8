<?php

namespace App\Http\Livewire\Console\Pages;

use App\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
    * destroy function
    */
    public function destroy($pageId)
    {
        $page = Page::find($pageId);

        if($page) {
            $page->delete();
        }

        session()->flash('success', 'Data deleted successfully.');

        return redirect()->route('console.pages.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.pages.index', [
            'pages' => $this->search === null ? Page::latest()->paginate(10) : Page::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
