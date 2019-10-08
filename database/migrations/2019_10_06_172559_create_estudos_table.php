<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEstudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabela para armazena a relacao entre
         * um usuario e os tutoriais que ele
         * fez ou esta fazendo. O número da pagina
         * indica em que ponto do tutorial ele
         * está.
         */
        
        Schema::create('estudos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pagina_atual')->unsigned();
            $table->timestamp('data_fim')->nullable();
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
        Schema::dropIfExists('estudos');
    }
}