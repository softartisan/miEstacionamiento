<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passwordPorDefecto = Hash::make('12345678');

        User::create([
            'id' => 1,
            'email' => 'administrador@gmail.com',
            'password' => $passwordPorDefecto,
            'usuario_id' => 1
        ]);

        User::create([
            'id' => 2,
            'email' => 'slcaniob@gmail.com',
            'password' => $passwordPorDefecto,
            'usuario_id' => 2
        ]);

    }
}
