<?php

namespace App\Http\Livewire\Frontend\Payment;

use App\Invoice;
use App\PaymentConfirmation;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Index extends Component
{
    /**
     * public variable
     */
    public $invoice;
    public $invoice_id;
    public $customerId;
    public $name;
    public $phone;
    public $bank_transfer_from;
    public $bank_transfer_to;
    public $from_name;
    public $total;
    public $transfer_date;
    public $note;
    public $image;

    /**
     * mount or construct function
     */
    public function mount($invoice_id)
    {
        $this->invoice = Invoice::where('invoice', $invoice_id)->first();

        $this->customerId = $this->invoice->customer_id;
        $this->invoice_id = $this->invoice->invoice;
        $this->name       = $this->invoice->name;
        $this->phone      = $this->invoice->phone;


        if(Auth::guard('customer')->user()->id != $this->customerId) {
            session()->flash('error', 'Access Not Allowed');
            return redirect()->route('root');
        }      
    }

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
        Storage::disk('public')->put('payments/'.$name, $image);
        return $name;
    }

    /**
     * payment function
     */
    public function confirmPayment()
    {
        $payment = PaymentConfirmation::create([
            'customer_id'       => Auth::guard('customer')->user()->id,
            'name'              => $this->name,
            'phone'             => $this->phone,
            'invoice'           => $this->invoice_id,
            'bank_transfer_from'=> $this->bank_transfer_from,
            'bank_transfer_to'  => $this->bank_transfer_to,
            'from_name'         => $this->from_name,
            'total'             => $this->total,    
            'transfer_date'     => $this->transfer_date,
            'image'             => $this->storeImage(),
            'note'              => $this->note
        ]);

        //update status invoice
        Invoice::where('invoice', $this->invoice_id)->update([
            'status' => 'menunggu konfirmasi'
        ]);

        if($payment) {
            session()->flash('success', 'Payment proof confirmation send !');
            redirect()->route('customer.orders.index');
        } else {
            session()->flash('error', 'Payment proof confirmation failed !');
            redirect()->back();
        }

    }


    public function render()
    {
        return view('livewire.frontend.payment.index');
    }
}
