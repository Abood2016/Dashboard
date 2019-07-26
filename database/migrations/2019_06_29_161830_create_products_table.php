<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('price');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('SKU',100)->unique();
            $table->enum('status', ['electronic', 'normal']);    
            $table->string('slug')->nullable();
            $table->text('image');
            $table->text('size')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('admin_id');
            $table->integer('size_id')->nullable();
            $table->softDeletes();
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
