<?php

namespace App\Http\Livewire\Console\Tags;

use App\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    /**
     * destroy function
     */
    public function destroy($tagId)
    {
        $tag = Tag::find($tagId);

        if($tag) {
            $tag->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.tags.index');
    }

    public function render()
    {
        return view('livewire.console.tags.index', [
            'tags' => Tag::latest()->paginate(10)
        ]);
    }
}
