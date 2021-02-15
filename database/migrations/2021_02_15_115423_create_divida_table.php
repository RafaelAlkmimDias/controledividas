<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDividaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divida', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descricao-do-titulo');
            $table->float('valor');
            $table->date('vencimento');
            $table->unsignedBigInteger('devedor_id')->index();            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('devedor_id')->references('id')->on('devedor')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divida');
    }
}
