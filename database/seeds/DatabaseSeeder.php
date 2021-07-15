<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Especialidade;
use App\Dentista;
use App\DentistaEspecialidade;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        //Usuário
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret')
        ]);

        //Especialidade
        Especialidade::create([ 'nome' => 'Clínico' ]);
        Especialidade::create([ 'nome' => 'Cirurgião' ]);

        //Dentista
        Dentista::create([
            'nome' => 'Eduardo',
            'email' => 'eduardo@eduardo.com',
            'cro' => 12345,
            'cro_uf' => 'PR'
        ]);
        Dentista::create([
            'nome' => 'João',
            'email' => 'joao@joao.com',
            'cro' => 54321,
            'cro_uf' => 'RJ'
        ]);

        //DentistEspecialidade
        DentistaEspecialidade::create([
            'dentista_id' => 1,
            'especialidade_id' => 1
        ]);
        DentistaEspecialidade::create([
            'dentista_id' => 2,
            'especialidade_id' => 2
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
