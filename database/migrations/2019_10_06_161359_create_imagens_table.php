<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        /**
         * Tabela para armazenar as imagens de um pagina.
         * Sera armazenado o caminho da imagem, que será salva
         * em uma pasta no servidor.
         */
        
        Schema::create('imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pagina_id');
            $table->string('caminho',255);
            $table->foreign('pagina_id')->references('id')->on('paginas');
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
        Schema::dropIfExists('imagens');
    }
}
