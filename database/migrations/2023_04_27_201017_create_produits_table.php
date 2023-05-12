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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit')->unique();
            $table->string('slug')->unique();
            $table->string('description_pro')->nullable();
            $table->enum('stock_status',['instock','outofstock'])->nullable();
            $table->decimal('prix',8,2)->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
