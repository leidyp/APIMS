<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Http\Models\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario;
        $usuario->us_nombre = 'Yamile Acuña';
        $usuario->us_user = 'yacuna';
        $usuario->us_password = Hash::make('123456');
        $usuario->save();
    }
}
