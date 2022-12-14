<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->text('invoice');
            $table->bigInteger('customer_id');
            $table->string('courier');
            $table->string('service');
            $table->bigInteger('cost_courier');
            $table->integer('weight');
            $table->string('name');
            $table->bigInteger('phone');
            $table->integer('province');
            $table->integer('city');
            $table->integer('district');
            $table->text('address');
            $table->text('note')->nullable();
            $table->string('no_resi')->nullable();
            $table->enum('status', array('menunggu pembayaran', 'menunggu konfirmasi', 'pembayaran tidak valid', 'pesanan diproses', 'pesanan dikirim', 'pesanan selesai'));
            $table->bigInteger('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
