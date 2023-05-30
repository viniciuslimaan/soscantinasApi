<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 22);
            $table->enum('type', ['snack', 'sweet', 'drink', 'other']);
            $table->float('price', 6, 2);
            $table->float('old_price', 6, 2)->nullable();
            $table->string('description', 150)->nullable();
            $table->string('photo', 200)->nullable();
            $table->integer('quantity_day')->nullable();
            $table->boolean('hidden')->default(false);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
