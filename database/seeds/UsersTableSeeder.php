<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $adminRole = Role::where('nome','admin')->first();
        $moderadorRole = Role::where('nome','moderador')->first();
        $alunoRole = Role::where('nome','aluno')->first();


        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@teste.com',
            'password'=>bcrypt('admin')
        ]);

        $admin->roles()->attach($adminRole);
        $moderador = User::create([
            'name'=>'moderador',
            'email'=>'moderador@teste.com',
            'password'=>bcrypt('moderador')
        ]
        );
        $moderador->roles()->attach($moderadorRole);
        $aluno = User::create([
            'name'=>'aluno',
            'email'=>'aluno@teste.com',
            'password'=>bcrypt('aluno')
        ]
        );
        $aluno->roles()->attach($alunoRole);
    }
}
