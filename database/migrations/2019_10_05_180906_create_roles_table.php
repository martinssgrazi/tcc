<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela para representar os papeis no
         * sistema
         * admin = administrador
         * instrutor = quem cria os tutoriais
         * aluno = quem estuda os tutoriais
         */
        
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
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
        Schema::dropIfExists('roles');
    }
}