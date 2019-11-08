<?php

use Illuminate\Database\Seeder;
use App\Models\Estudo;

class EstudosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Estudo::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Estudo::create(['user_id' => 1, 'pagina_atual' => 1]);
        Estudo::create(['user_id' => 2, 'pagina_atual' => 1]);
        Estudo::create(['user_id' => 3, 'pagina_atual' => 1]);
    }
}
