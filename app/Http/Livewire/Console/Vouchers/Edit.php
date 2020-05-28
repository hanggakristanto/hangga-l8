<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Edit extends Component
{
    /**
    * public variablr
    */
    public $voucherId;
    public $title;
    public $voucher;
    public $nominal_voucher;
    public $total_minimal_shopping;
    public $content;
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
        if(!$this->image) {
            return null;
        }

        $image   = ImageManagerStatic::make($this->image)->encode('jpg');
        $name  = Str::random() . '.jpg';
        Storage::disk('public')->put('vouchers/'.$name, $image);
        return $name;
    }

    /**
    * mount or cosntructor function
    */
    public function mount($id)
    {
        $voucher = Voucher::find($id);

        if($voucher) {
            $this->voucherId                = $voucher->id;
            $this->title                    = $voucher->title;
            $this->voucher                  = $voucher->voucher;
            $this->nominal_voucher          = $voucher->nominal_voucher;
            $this->total_minimal_shopping   = $voucher->total_minimal_shopping;
            $this->content                  = $voucher->content;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'title'             => 'required',
            'voucher'           => 'required',
            'nominal_voucher'   => 'required',
            'total_minimal_shopping' => 'required',
            'content'                => 'required'
        ]);

        $voucher = Voucher::find($this->voucherId);
        
        if($voucher) {
            
            if($this->storeImage() == null) {

                $voucher->update([
                    'title'                     => $this->title,
                    'voucher'                   => $this->voucher,
                    'nominal_voucher'           => $this->nominal_voucher,
                    'total_minimal_shopping'    => $this->total_minimal_shopping,
                    'content'                   => $this->content
                ]);

            } else {

                $voucher->update([
                    'title'                     => $this->title,
                    'voucher'                   => $this->voucher,
                    'nominal_voucher'           => $this->nominal_voucher,
                    'total_minimal_shopping'    => $this->total_minimal_shopping,
                    'content'                   => $this->content,
                    'image'                     => $this->storeImage()
                ]);

            }

            session()->flash('message', 'Data updated successfully');

            redirect()->route('console.vouchers.index');

        }
    }

    public function render()
    {
        return view('livewire.console.vouchers.edit');
    }
}
