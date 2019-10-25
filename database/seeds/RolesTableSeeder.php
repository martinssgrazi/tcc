<?php
use Illuminate\Database\Seeder;
use App\Role;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['nome' => 'admin']);
        Role::create(['nome' => 'moderador']);
        Role::create(['nome' => 'aluno']);


        /*// $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);*/
        // DB::table('roles')->insert([
        //     'nome' => 'administrador',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}