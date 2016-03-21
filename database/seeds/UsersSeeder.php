<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for($i = 1; $i<101; $i++){

            $j = 0;

            $id = \DB::table('users')->insertGetId([
                'firstName' => $faker->firstName,
                'lastName'  => $faker->lastName,
                'password'  => \Hash::make('123456'),
                'email'     => $faker->unique()->email,
                'rol'       => $faker->randomElement(['Administrador', 'Profesor', 'AlumnoESO', 'AlumnoFP', 'AlumnoBach']),
            ]);

            \DB::table('user_profiles')->insert([
                'user_id'   =>  $id,
                'biograph'  =>  $faker->paragraph(rand(2,5)),
                'website'   =>  'http://www.' . $faker->domainName,
                'twitter'   =>  'http://www.twitter.com/' . $faker->userName,
                'birthdate' =>  $faker->dateTimeBetween('-45 years', '-15 years')->format('Y-m-d')

            ]);

            for($j = 1; $j<21; $j++){

                \DB::table('contactos')->insert([
                    'user_id'    => $id,
                    'firstName'  => $faker->firstName,
                    'lastName'   => $faker->lastName,
                    'email'      => $faker->email,
                    'telefono'   => $faker->phoneNumber,
                    'direccion'  => $faker->address,
                    'categoria'  => $faker->randomElement(['Amigo', 'Familia', 'Favoritos']),
                ]);

            }
        }
    }
}
