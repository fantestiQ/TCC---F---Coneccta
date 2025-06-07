<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Candidato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criar usuário para empresa
        $empresaUser = User::create([
            'name' => 'Empresa Teste',
            'email' => 'empresa@teste.com',
            'password' => bcrypt('senha123'),
            'role' => 'empresa'

        ]);

        Empresa::create([
            'user_id' => $empresaUser->id,
            'cnpj' => '12345678000195',
            'endereco' => 'Rua Teste, 123',
            'nome_fantasia' => 'Empresa Teste LTDA',
            'descricao' => 'Empresa de teste para o sistema',

        ]);

        //criar usuário para candidato
        $candidatoUser = User::create([
            'name' => 'Candidato Teste',
            'email' => 'candidato@teste.com',
            'password' => bcrypt('senha123'),
            'role' => 'candidato'
        ]);
        Candidato::create([
            'user_id' => $candidatoUser->id,
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'telefone' => '11987654321',
            'endereco' => 'Avenida Teste, 456',
            'descricao' => 'Candidato teste para o sistema',
        ]);

    }
}
