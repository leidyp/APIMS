<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Models\Usuario; 

class UsuariosController extends Controller{
    public function __construct(){

    }
    public function authenticate(Request $request){
        $user = Usuario::where('us_user', $request->input('user'))->first();
        if(!is_null($user)){    
            if(Hash::check($request->input('password'), $user->us_password)){
                $apikey = base64_encode(str_random(40));
                Usuario::where("us_id",$user->us_id)->update(["us_token" => $apikey]);
                $usuario = self::obtenerUsuario($user->us_id,$user->rol_id);
                return response()->json(["status" => 'success',"token" => $apikey,"data" => $usuario]);
            }else{
                return response()->json(["status" => 'fail']);
            }
        }
        else{
            return response()->json(["status" => 'fail']);
        }
    }
    public function obtenerUsuario($id_usuario,$id_rol){
        $sql_user = "";
        switch ($id_rol) {
            case 1: // Adminisrador
                $sql_user = "SELECT u.us_id,
                            pe.per_id,
                            pe.per_cedula,
                            pe.per_nombres,
                            pe.per_apellidos,
                            pe.per_fechan,
                            pe.per_direccion,
                            pe.per_telefono,
                            pe.per_correo
                            FROM persona pe
                            INNER JOIN usuario u on (u.us_id = pe.us_id)
                            WHERE u.us_id = $id_usuario limit 1";
                break;
            case 2: // Recepcionista
                $sql_user = "SELECT u.us_id,
                            r.rec_id,
                            pe.per_id,
                            pe.per_cedula,
                            pe.per_nombres,
                            pe.per_apellidos,
                            pe.per_fechan,
                            pe.per_direccion,
                            pe.per_telefono,
                            pe.per_correo
                            FROM persona pe
                            INNER JOIN recepcionista r on (r.per_id = pe.per_id)
                            INNER JOIN usuario u on (u.us_id = pe.us_id)
                            WHERE u.us_id = $id_usuario limit 1";
                break;
            case 3: // Medico
                $sql_user = "SELECT u.us_id,
                            m.med_id,
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
                            INNER JOIN medico m on (m.per_id = pe.per_id)
                            INNER JOIN usuario u on (u.us_id = pe.us_id)
                            WHERE u.us_id = $id_usuario limit 1";    
                break;
        }
        $usuario = DB::select($sql_user);
        return $usuario[0];
    }
}