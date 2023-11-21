<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('palce_orders', function (Blueprint $table) {
            $table->id();
            // $table->integer('customers_id');
            $table->integer('product_id');
            $table->integer('order_customer_id');
            $table->string('invoice_no');
            $table->string('payment_type');
            $table->string('date');
            $table->string('total');
            $table->string('sub_total');
            $table->integer('qty');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palce_orders');
    }
};
