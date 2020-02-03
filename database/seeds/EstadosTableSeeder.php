<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();

        DB::table('estados')->insert([
            ['id' => 1, 'nome' => 'Acre', 'abreviacao' => 'AC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 2, 'nome' => 'Alagoas', 'abreviacao' => 'AL', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 3, 'nome' => 'Amapá', 'abreviacao' => 'AP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 4, 'nome' => 'Amazonas', 'abreviacao' => 'AM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 5, 'nome' => 'Bahia', 'abreviacao' => 'BA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 6, 'nome' => 'Ceará', 'abreviacao' => 'CE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 7, 'nome' => 'Distrito Federal', 'abreviacao' => 'DF', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 8, 'nome' => 'Espírito Santo', 'abreviacao' => 'ES', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 9, 'nome' => 'Goiás', 'abreviacao' => 'GO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 10, 'nome' => 'Maranhão', 'abreviacao' => 'MA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 11, 'nome' => 'Mato Grosso', 'abreviacao' => 'MT', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 12, 'nome' => 'Mato Grosso do Sul', 'abreviacao' => 'MS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 13, 'nome' => 'Minas Gerais', 'abreviacao' => 'MG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 14, 'nome' => 'Pará', 'abreviacao' => 'PA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 15, 'nome' => 'Paraíba', 'abreviacao' => 'PB', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 16, 'nome' => 'Paraná', 'abreviacao' => 'PR', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 17, 'nome' => 'Pernambuco', 'abreviacao' => 'PE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 18, 'nome' => 'Piauí', 'abreviacao' => 'PI', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 19, 'nome' => 'Rio de Janeiro', 'abreviacao' => 'RJ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 20, 'nome' => 'Rio Grande do Norte', 'abreviacao' => 'RN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 21, 'nome' => 'Rio Grande do Sul', 'abreviacao' => 'RS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 22, 'nome' => 'Rondônia', 'abreviacao' => 'RO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 23, 'nome' => 'Roraima', 'abreviacao' => 'RR', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 24, 'nome' => 'Santa Catarina', 'abreviacao' => 'SC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 25, 'nome' => 'São Paulo', 'abreviacao' => 'SP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 26, 'nome' => 'Sergipe', 'abreviacao' => 'SE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
            ['id' => 27, 'nome' => 'Tocantins', 'abreviacao' => 'TO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'deleted_at' => NULL],
        ]);
    }

}
