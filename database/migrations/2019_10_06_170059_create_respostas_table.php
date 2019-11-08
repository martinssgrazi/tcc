<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Resposta para uma pergunta de uma avaliacao
         */
        Schema::create('respostas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pergunta_id');
            $table->string('resposta', 1000);
            $table->foreign('pergunta_id')->references('id')->on('perguntas');
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
        Schema::dropIfExists('respostas');
    }
}