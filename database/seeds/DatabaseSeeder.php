<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Fornecedor;
use App\Material;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        //Usuário
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret')
        ]);

        //Fornecedor
        // Fornecedor::create([ 'nome' => 'Fornecedor A' ]);
        // Fornecedor::create([ 'nome' => 'Fornecedor B' ]);

        //Material
        // Material::create([
        //     'nome' => 'Material A',
        //     'custo_maximo' => '10',
        //     'fornecedor_id' => 1
        // ]);
        // Material::create([
        //     'nome' => 'Material B',
        //     'custo_maximo' => '20',
        //     'fornecedor_id' => 2
        // ]);



        // $this->call(UsersTableSeeder::class);
    }
}
