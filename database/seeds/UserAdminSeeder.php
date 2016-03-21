<?php

use Illuminate\Database\Seeder;

use App\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Primera forma de crear un usuario

        $user = new User;

        $user->firstName = 'Pedro';
        $user->lastName = 'Hdez Mora';
        $user->password = \Hash::make('123456');
        $user->email = 'root@gmail.com';
        $user->rol = "Administrador";

        $user->save();

        //Segunda...

        User::create([
            'firstName' => 'Pepe',
            'lastName'  => 'Sánchez',
            'password'  => \Hash::make('123456'),
            'email'     => 'pepe@pepe.es',
            'rol'       => 'AlumnoFP',
        ]);

        //Tercera...
        \DB::table('users')->insert([
            'firstName' => 'Juan',
            'lastName'  => 'Martínez',
            'password'  => \Hash::make('123456'),
            'email'     => 'juan@juan.es',
            'rol'       => 'AlumnoESO',
        ]);
    }
}
