<?php

namespace App\Http\Livewire\Console\Tags;

use App\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{

    /**
    * public variable
    */
    public $tagId;
    public $name;

    /**
     * mount or cosntructor function
     */
    public function mount($id)
    {
        $tag = Tag::find($id);

        if($tag) {
            $this->tagId   = $tag->id;
            $this->name    = $tag->name;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'name'     => 'required|unique:tags,name,'.$this->tagId
        ]);

        $tag = Tag::find($this->tagId);
        
        if($tag) {
            
            $tag->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name, '-'),
            ]);

            session()->flash('message', 'Data updated successfully');

            redirect()->route('console.tags.index');

        }

    }

    public function render()
    {
        return view('livewire.console.tags.edit');
    }
}
