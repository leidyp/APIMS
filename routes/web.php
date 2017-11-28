<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'recepcionista'], function () use ($router) {
    $router->get('listar','RecepcionistaController@obtenerRecepcionistas');
    $router->post('agregar','RecepcionistaController@agregarRecepcionista');
});
$router->group(['prefix' => 'medico'], function () use ($router) {
    $router->get('listar','MedicosController@obtenerMedicos');
    $router->post('agregar','MedicosController@agregarMedico');
});
$router->group(['prefix' => 'paciente'], function () use ($router) {
    $router->get('listar','PacientesController@obtenerPacientes');
    $router->post('agregar','PacientesController@agregarPaciente');
});
$router->get('login','UsuariosController@authenticate');
$router->get('/', function () use ($router) {
    return $router->app->version();
});
