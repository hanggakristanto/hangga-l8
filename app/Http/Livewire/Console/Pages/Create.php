<?php

namespace App\Http\Livewire\Console\Pages;

use App\Page;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{

    /**
     * public variable
     */
    public $title;
    public $content;
    public $keywords;
    public $description;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'title'      => 'required|unique:pages',
            'content'    => 'required',
            'keywords'   => 'required',
            'description'=> 'required'
        ]);

        $page = Page::create([
            'title'         => $this->title,
            'slug'          => Str::slug($this->title, '-'),
            'content'       => $this->content,
            'keywords'      => $this->keywords,
            'description'   => $this->description
        ]);

        if($page) {
            session()->flash('message', 'Data saved successfully');
        } else {
            session()->flash('message', 'Data failed to save');
        }

        redirect()->route('console.pages.index');
    }

    public function render()
    {
        return view('livewire.console.pages.create');
    }
}
