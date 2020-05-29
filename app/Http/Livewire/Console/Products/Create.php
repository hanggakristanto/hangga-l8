<?php

namespace App\Http\Livewire\Console\Products;

use App\Category;
use App\Product;
use App\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Create extends Component
{

    /**
     * public variable
     */
    public $image;
    public $title;
    public $category_id;
    public $content;
    public $unit;
    public $unit_weight;
    public $weight;
    public $price;
    public $discount;
    public $tag;
    public $keywords;
    public $description;

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
        Storage::disk('public')->put('products/'.$name, $image);
        return $name;
    }

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'title'         => 'required',
            'category_id'   => 'required',
            'content'       => 'required',
            'unit'          => 'required',
            'unit_weight'   => 'required',
            'weight'        => 'required',
            'price'         => 'required',
            'discount'      => 'required',
            'tag'           => 'required',
            'keywords'      => 'required',
            'description'   => 'required',
        ]);

        $product = Product::create([
            'image'         => $this->storeImage(),
            'title'         => $this->title,
            'slug'          => Str::slug($this->title, '-'),
            'category_id'   => $this->category_id,
            'content'       => $this->content,
            'unit'          => $this->unit,
            'unit_weight'   => $this->unit_weight,
            'weight'        => $this->weight,
            'price'         => $this->price,
            'discount'      => $this->discount,
            'keywords'      => $this->keywords,
            'description'   => $this->description,
        ]);

        //attach tags
        $product->tags()->attach($this->tag);
        $product->save();

        if($product) {
            session()->flash('message', 'Data saved successfully');
        } else {
            session()->flash('message', 'Data failed to save');
        }

        redirect()->route('console.products.index');
        
    }

    public function render()
    {
        return view('livewire.console.products.create', [
            'categories' => Category::latest()->get(),
            'tags'       => Tag::latest()->get()
        ]);
    }
}
