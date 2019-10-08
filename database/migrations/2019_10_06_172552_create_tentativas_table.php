<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTentativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /**
         * Representa uma tentativa de responder
         * a uma avaliacao de um tutorial.
         * Armazena as respostas para cada uma das perguntas,
         * e também qual a pergunta atual que está sendo respondida.
         */
        Schema::create('tentativas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('data_fim');
            $table->string('respostas');
            $table->integer('pergunta_atual');
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
        Schema::dropIfExists('tentativas');
    }
}
