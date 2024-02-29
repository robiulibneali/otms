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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tran_id');
            $table->string('bank_tran_id')->nullable();
            $table->string('ssl_val_id')->nullable();
            $table->float('total_amount', 10, 2)->default(0);
            $table->float('payment_amount', 10, 2)->default(0);
            $table->tinyInteger('status')->comment('0=>pending, 1=>approved, 2=>canceled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
