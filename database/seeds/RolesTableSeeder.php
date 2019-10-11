<?php
use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*// $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);*/
        DB::table('roles')->insert([
            'nome' => 'administrador',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}