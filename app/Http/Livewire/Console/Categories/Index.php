<?php

namespace App\Http\Livewire\Console\Categories;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

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

    public function render()
    {
        return view('livewire.console.categories.index', [
            'categories' => category::latest()->paginate(10)
        ]);
    }
}
