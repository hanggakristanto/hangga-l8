<?php

namespace App\Http\Livewire\Console\Categories;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
    * destroy function
    */
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);

        if($category) {
            Storage::disk('public')->delete('categories/'.$category->image);
            $category->delete();
        }

        session()->flash('message', 'Data deleted successfully.');

        return redirect()->route('console.categories.index');
    }

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        return view('livewire.console.categories.index', [
            'categories' => $this->search === null ? Category::latest()->paginate(10) : Category::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10)
        ]);
    }
}
