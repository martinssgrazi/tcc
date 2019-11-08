<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Pergunta de uma avaliacao.
         * Possui o enunciado e também qual o id
         * da resposta correta.
         */
        Schema::create('perguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('avaliacao_id');
            $table->string('enunciado', 1000);
            $table->integer('correta')->unsigned();
            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes');
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
        Schema::dropIfExists('perguntas');
    }
}
