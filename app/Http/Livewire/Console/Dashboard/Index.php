<?php

namespace App\Http\Livewire\Console\Dashboard;

use App\Invoice;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $bulan;
    public $jumlah;
    public $count_order_year;
    public $count_order_pending_month;
    public $count_order_progress_month;
    public $count_order_shipping_month;
    public $count_order_completed_month;
    public $total_revenue_month;
    public $total_revenue_all;

    public function mount()
    {
        $year   = date('Y');
        $month  = date('m');

        $order = DB::table('invoices')
            ->addSelect(DB::raw('COUNT(id) as jumlah'))
            ->addSelect(DB::raw('MONTH(created_at) as bulan'))
            ->addSelect(DB::raw('MONTHNAME(created_at) as nama_bulan'))
            ->addSelect(DB::raw('YEAR(created_at) as tahun'))
            ->whereYear('created_at', '=', $year)
            ->groupBy('bulan')
            ->orderByRaw('bulan ASC')
            ->get();
        if(count($order)) {
            foreach ($order as $hasil) {
                $this->bulan[]    = $hasil->nama_bulan;
                $this->jumlah[]   = $hasil->jumlah;
            }
        } else {
            $this->bulan[]  = "";
            $this->jumlah[] = "";
        }

        //total orders this year
        $this->count_order_year   = Invoice::whereYear('created_at', '=', $year)->get()->count();

        /**
         * new statistic dashboard
         */
        $this->count_order_pending_month      = Invoice::where('status', 'menunggu pembayaran')->orWhere('status', 'menunggu konfirmasi')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get()->count();
        $this->count_order_progress_month     = Invoice::where('status', 'pesanan diproses')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get()->count();
        $this->count_order_shipping_month     = Invoice::where('status', 'pesanan dikirim')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get()->count();
        $this->count_order_completed_month    = Invoice::where('status', 'pesanan selesai')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->get()->count();

        /**
         * total revenue
         */
        $this->total_revenue_month  = Invoice::where('status', 'pesanan selesai')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->sum('grand_total');
        $this->total_revenue_all    = Invoice::where('status', 'pesanan selesai')->sum('grand_total');
    }


    public function render()
    {
        return view('livewire.console.dashboard.index');
    }
}
