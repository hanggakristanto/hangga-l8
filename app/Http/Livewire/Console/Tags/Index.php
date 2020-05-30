<?php

namespace App\Http\Livewire\Console\Tags;

use App\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    /**
     * destroy function
     */
    public function destroy($tagId)
    {
        $tag = Tag::find($tagId);

        if($tag) {
            $tag->delete();
        }

        session()->flash('success', 'Data deleted successfully.');

        return redirect()->route('console.tags.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.tags.index', [
            'tags' => $this->search === null ? Tag::latest()->paginate(10) : Tag::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
