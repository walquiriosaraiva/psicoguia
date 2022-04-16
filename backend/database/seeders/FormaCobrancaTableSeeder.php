<?php

namespace Database\Seeders;

use App\Models\FormaCobranca;
use Illuminate\Database\Seeder;

class FormaCobrancaTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Por sessão', 'Por mês (mensalista)', 'Pacote', 'Convênio', 'Isento'];
        foreach ($array as $value):
            FormaCobranca::create(['nome' => $value, 'created_at' => now(), 'updated_at' => now()]);
        endforeach;

    }
}
