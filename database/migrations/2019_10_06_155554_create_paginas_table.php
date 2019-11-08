<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela para armazenar as páginas de um tutorial.
         * O conteúdo deve ser um texto em html, criado
         * no summernote e renderizado no momemento do
         * estudo.
         */
        Schema::create('paginas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tutorial_id');
            $table->string('titulo', 1000);
            $table->longText('conteudo');
            $table->foreign('tutorial_id')->references('id')->on('tutoriais');
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
        Schema::dropIfExists('paginas');
    }
}
