<?php

namespace App\Http\Livewire\Console\Categories;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Create extends Component
{
    /**
    * public variable
    */
    public $name;
    public $image;

    /**
     * listeners
     */
    protected $listeners = [
        'fileUpload'     => 'handleFileUpload',
    ];

    /**
     * handle file upload & check file type
     */
    public function handleFileUpload($file)
    {
        try {
            if($this->getFileInfo($file)["file_type"] == "image"){
                $this->image = $file;
            }else{
                session()->flash("error", "Uploaded file must be an image");
            }
        } catch (Exception $ex) {
            
        }
    }

    /**
     * get file info
     */
    public function getFileInfo($file)
    {    
        $info = [
            "decoded_file" => NULL,
            "file_meta" => NULL,
            "file_mime_type" => NULL,
            "file_type" => NULL,
            "file_extension" => NULL,
        ];
        try{
            $info['decoded_file'] = base64_decode(substr($file, strpos($file, ',') + 1));
            $info['file_meta'] = explode(';', $file)[0];
            $info['file_mime_type'] = explode(':', $info['file_meta'])[1];
            $info['file_type'] = explode('/', $info['file_mime_type'])[0];
            $info['file_extension'] = explode('/', $info['file_mime_type'])[1];
        }catch(Exception $ex){

        }

        return $info;
    }

    /**
     * store image
     */
    public function storeImage()
    {
        $image   = ImageManagerStatic::make($this->image)->encode('png');
        $name  = Str::random() . '.png';
        Storage::disk('public')->put('categories/'.$name, $image);
        return $name;
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'     => 'required',
        ]);

        $category = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name, '-'),
            'image'=> $this->storeImage()
        ]);

        if($category) {
            session()->flash('message', 'Data saved successfully');
        } else {
            session()->flash('message', 'Data failed to save');
        }

        redirect()->route('console.categories.index');

    }

    public function render()
    {
        return view('livewire.console.categories.create');
    }
}
