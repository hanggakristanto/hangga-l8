<?php

namespace App\Http\Livewire\Console\Sliders;

use App\Slider;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Index extends Component
{
    use WithPagination;

    /**
     * public variable
     */
    public $image;
    public $link;

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
        $image   = ImageManagerStatic::make($this->image)->encode('jpg');
        $name  = Str::random() . '.jpg';
        Storage::disk('public')->put('sliders/'.$name, $image);
        return $name;
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'link'     => 'required',
        ]);

        $slider = Slider::create([
            'link' => $this->link,
            'image'=> $this->storeImage()
        ]);

        if($slider) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

        redirect()->route('console.sliders.index');

    }

    /**
    * destroy function
    */
    public function destroy($sliderId)
    {
        $slider = Slider::find($sliderId);

        if($slider) {
            Storage::disk('public')->delete('sliders/'.$slider->image);
            $slider->delete();
        }

        session()->flash('success', 'Data deleted successfully.');

        return redirect()->route('console.sliders.index');
    }

    public function render()
    {
        return view('livewire.console.sliders.index', [
            'sliders' => Slider::latest()->paginate(2)
        ]);
    }
}
