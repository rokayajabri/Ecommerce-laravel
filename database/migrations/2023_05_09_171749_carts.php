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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->unsigned()->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->enum('confirmation',['Validé','No Validé','en cours'])->default('en cours')->nullable();
            $table->enum('payment',['Cash On Delivery','Card Payment','Paypal'])->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->decimal('subtotal',8,2)->nullable();
            $table->decimal('tax',8,2)->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->foreign('id_product')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
