<?php

namespace Database\Seeders;

use App\Models\FormaCobranca;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10000)->create();

        $faker = Faker::create();

        for ($i = 1; $i <= 10000; $i++):
            $rand1 = rand(1, 99999);
            $datehora1 = date('ymdHis');
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $rand1 . '_' . $datehora1 . $faker->email,
                'password' => Hash::make('password'),
            ]);
        endfor;

    }

}
