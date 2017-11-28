<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Models\Paciente;
use App\Http\Models\Persona; 

class PacientesController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function obtenerPacientes(Request $request){
        $pacientes = DB::select("SELECT p.pac_tipo_sangre as tipo_sangre,
                    concat(pm.per_nombres,' ',pm.per_apellidos) medico_cabecera,
                    p.med_id_cabecera,
                    pe.per_cedula,
                    concat(pe.per_nombres,' ',pe.per_apellidos) 'nombre_paciente',
                    pe.per_fechan,
                    pe.per_direccion,
                    pe.per_telefono,
                    pe.per_correo
                    FROM paciente p
                    INNER JOIN medico m on (m.med_id = p.med_id_cabecera)
                    INNER JOIN persona pm on (pm.per_id = m.per_id)
                    INNER JOIN persona pe on (pe.per_id = p.per_id)");
        return response()->json(["status" => 'success',"data" => $pacientes]);
    }

    public function agregarPaciente(Request $request){
        $per_cedula = $request->input('per_cedula');
        $per_correo = $request->input('per_correo');
        $results = DB::select("SELECT * FROM persona where per_cedula = '$per_cedula' or per_correo = '$per_correo'");
        if(count($results) == 0){
            $per_nombres = $request->input('per_nombres');
            $per_apellidos = $request->input('per_apellidos');
            $per_fechan = $request->input('per_fechan');
            $per_direccion = $request->input('per_direccion');
            $per_telefono = $request->input('per_telefono');
            $pac_tipo_sangre = $request->input('pac_tipo_sangre');
            $med_id_cabecera = $request->input('med_id_cabecera');

            $persona = new Persona;
            $persona->per_cedula = $per_cedula;
            $persona->per_nombres = $per_nombres;
            $persona->per_apellidos = $per_apellidos;
            $persona->per_fechan = $per_fechan;
            $persona->per_direccion = $per_direccion;
            $persona->per_telefono = $per_telefono;
            $persona->per_correo = $per_correo;
            $persona->save();

            $per_id = $persona->per_id;

            $paciente = new Paciente;
            $paciente->pac_tipo_sangre = $pac_tipo_sangre;
            $paciente->per_id = $per_id;
            $paciente->med_id_cabecera = $med_id_cabecera;
            $paciente->save();

            return response()->json(['status' => 'Paciente registrado con exito']);
        }
        else{
            return response()->json(['status' => 'Paciente ya registrado']);
        }    

    }
    
}