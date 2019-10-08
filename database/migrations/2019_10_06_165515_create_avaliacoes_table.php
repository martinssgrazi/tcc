<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /**
         * Representa uma avaliacao de um tutorial,
         * com uma pequena descricao da avaliacao.
         */
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 255);
            $table->string('descricao', 255);
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
        Schema::dropIfExists('avaliacaos');
    }
}
