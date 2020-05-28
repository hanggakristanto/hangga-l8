<?php

namespace App\Http\Livewire\Console\Pages;

use App\Page;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{

    /**
    * public variable
    */
    public $pageId;
    public $title;
    public $content;
    public $keywords;
    public $description;

    /**
     * mount or cosntructor function
     */
    public function mount($id)
    {
        $page = Page::find($id);

        if($page) {
            $this->pageId      = $page->id;
            $this->title       = $page->title;
            $this->content     = $page->content;
            $this->keywords    = $page->keywords;
            $this->description = $page->description;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'title'      => 'required|unique:pages,title,'.$this->pageId,
            'content'    => 'required',
            'keywords'   => 'required',
            'description'=> 'required'
        ]);

        $page = Page::find($this->pageId);
        
        if($page) {
            
            $page->update([
                'title'         => $this->title,
                'slug'          => Str::slug($this->title, '-'),
                'content'       => $this->content,
                'keywords'      => $this->keywords,
                'description'   => $this->description
            ]);

            session()->flash('message', 'Data updated successfully');

            redirect()->route('console.pages.index');

        }

    }

    public function render()
    {
        return view('livewire.console.pages.edit');
    }
}
