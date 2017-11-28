<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Models\Persona; 
use App\Http\Models\Medico;
use App\Http\Models\Usuario;

class MedicosController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function obtenerMedicos(Request $request){
        $medicos = DB::select("SELECT m.med_id,
                    pe.per_id,
                    pe.per_cedula,
                    pe.per_nombres,
                    pe.per_apellidos,
                    pe.per_fechan,
                    pe.per_direccion,
                    pe.per_telefono,
                    pe.per_correo,
                    m.med_especialidad
                    FROM persona pe
                    INNER JOIN medico m on (m.per_id = pe.per_id)");
        return response()->json(["status" => 'success',"data" => $medicos]);
    }

    public function agregarMedico(Request $request){
        $per_cedula = $request->input('per_cedula');
        $per_correo = $request->input('per_correo');
        $us_user = $request->input('us_user');
        $results = DB::select("SELECT * FROM persona where per_cedula = '$per_cedula' or per_correo = '$per_correo'");
        $resultsUsuario = DB::select("SELECT * FROM usuario where us_user = '$us_user'");
        if(count($results) == 0 && count($resultsUsuario) == 0){
            $per_nombres = $request->input('per_nombres');
            $per_apellidos = $request->input('per_apellidos');
            $per_fechan = $request->input('per_fechan');
            $per_direccion = $request->input('per_direccion');
            $per_telefono = $request->input('per_telefono');
            $med_especialidad = $request->input('med_especialidad');
            $us_password = $request->input('us_password');

            $usuario = new Usuario;
            $usuario->us_user = $us_user;
            $usuario->us_password = Hash::make($us_password);
            $usuario->rol_id = 3;
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

            return response()->json(['status' => 'Medico registrado con exito']);
        }
        else{
            return response()->json(['status' => 'Medico ya registrado']);
        }    

    }
    
}