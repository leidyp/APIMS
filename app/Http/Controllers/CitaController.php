<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Models\Paciente; 
use App\Http\Models\Medico;
use App\Http\Models\Usuario;
use App\Http\Models\Cita;

class CitaController extends Controller{
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

    public function agregarCita(Request $request){
        $med_id = $request->input('med_id');
        $pac_id = $request->input('pac_id');
        $rec_id = $request->input('rec_id');
        $cita_fecha = $request->input('cita_fecha');
        $cita_hora = $request->input('cita_hora');
        $cita_estado = $request->input('cita_estado');
        $cita_descripcion = $request->input('cita_descripcion');
        
        // Validacion Cita

        $sql_validacion = "SELECT 
                           ifnull(sum(if(c.cita_hora = '$cita_hora',1,0)),0) cantidad_cita_hora,
                           ifnull(sum(if(m.med_especialidad is not null and m.med_especialidad != '',1,0)),0) cantidad_cita_especialista,
                           count(*) cantidad_citas
                           from cita c
                           INNER JOIN medico m ON (c.med_id = m.med_id)
                           WHERE c.cita_fecha = '$cita_fecha' and c.pac_id = 3";


            
        // return response()->json(['status' => 'Medico registrado con exito']);
        // return response()->json(['status' => 'Medico ya registrado']);

    }
    
}