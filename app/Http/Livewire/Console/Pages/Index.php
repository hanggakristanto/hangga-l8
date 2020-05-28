<?php

namespace App\Http\Livewire\Console\Pages;

use App\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
    * destroy function
    */
    public function destroy($pageId)
    {
        $page = Page::find($pageId);

        if($page) {
            $page->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.pages.index');
    }

    public function render()
    {
        return view('livewire.console.pages.index', [
            'pages' => Page::latest()->paginate(10)
        ]);
    }
}
