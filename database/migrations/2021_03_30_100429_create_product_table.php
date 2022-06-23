<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete();;
            $table->integer('sub_category_id')->nullable();
            $table->enum('product_type', ['Feature', 'New'])->nullable();
            $table->text('product_name');
            $table->text('slug');
            $table->text('description');
            $table->string('sku')->nullable();
            $table->decimal('product_current_price', 8, 2);
            $table->enum('product_sale', ['no', 'yes']);
            $table->string('product_sale_percentage')->default(0);
            //            $table->string('product_sale_price')->nullable();
            $table->enum('product_stock', ['yes', 'no']);
            $table->integer('product_qty');
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->text('product_image');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('products');
    }
}
