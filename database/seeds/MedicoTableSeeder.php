<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\Medico;
use App\Http\Models\Persona;
use App\Http\Models\Usuario;

class MedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $per_cedula = "21343243";
        $per_correo = "leidyacuna03@gmail.com";
        $us_user = "lpacuna";
        $per_nombres = "Leidy Patricia";
        $per_apellidos = "Acuña Garcia";
        $per_fechan = "1996-03-04";
        $per_direccion = "Doña lidia";
        $per_telefono = "9891437822";
        $med_especialidad = "cocina";
        $us_password = "nomemuerdas";

        $usuario = new Usuario;
        $usuario->us_user = $us_user;
        $usuario->us_password = Hash::make($us_password);
        $usuario->save();

        $id_usuario = $usuario->us_id;

        $persona = new Persona;
        $persona->per_cedula = $per_cedula;
        $persona->us_id = $id_usuario;
        $persona->per_nombres = $per_nombres;
        $persona->per_apellidos = $per_apellidos;
        $persona->per_fechan = $per_fechan;
        $persona->per_direccion = $per_direccion;
        $persona->per_telefono = $per_telefono;
        $persona->per_correo = $per_correo;
        $persona->save();

        $per_id = $persona->per_id;

        $medico = new Medico;
        $medico->med_especialidad = $med_especialidad;
        $medico->per_id = $per_id;
        $medico->save();
    }
}
