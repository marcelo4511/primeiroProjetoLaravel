<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->increments('id');

            $table->string('precovenda');
            $table->string('estoque');
            $table->string('desconto');
            $table->string('total');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

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
        Schema::dropIfExists('venda_produto');
    }
}
