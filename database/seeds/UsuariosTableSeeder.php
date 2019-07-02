<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passwordPorDefecto = Hash::make('12345678');

        Usuario::create([
            'id' => 1,
            'email_usuario' => 'administrador@gmail.com',
            'password_usuario' => $passwordPorDefecto,
            'nombre_usuario' => 'Administrador',
            'apellido_usuario' => '',
            'telefono_usuario' => '+56956439919',
            'tipo_usuario' => 'administrador',
            'isenabled_usuario' => 1
        ]);
        
        Usuario::create([
            'id' => 2,
            'email_usuario' => 'slcaniob@gmail.com',
            'password_usuario' => $passwordPorDefecto,
            'nombre_usuario' => 'Sebastián',
            'apellido_usuario' => 'Canio',
            'telefono_usuario' => '+56956439919',
            'tipo_usuario' => 'arrendador',
            'isenabled_usuario' => 1
        ]);

    }
}
