<?php

namespace App\Http\Livewire\Console\Tags;

use App\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{

    /**
     * public variable
     */
    public $name;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'      => 'required|unique:tags',
        ]);

        $tag = Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name, '-'),
        ]);

        if($tag) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

        redirect()->route('console.tags.index');
    }

    public function render()
    {
        return view('livewire.console.tags.create');
    }
}
