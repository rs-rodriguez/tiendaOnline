<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/30/2018
 * Time: 11:07 PM
 */

include_once('ApiRest.php');
require('../crud/crudCliente.php');
require('../crud/crudUsuario.php');
session_start(); // se inicia en contexto de session
$input = json_decode(file_get_contents('php://input'));

if ($input != null){
    if($input->accion == "save"){
        $client = new crudCliente();
        $users = new crudUsuario();
        $json_data = $input->json;

        $id = $client->crear(
            $json_data->nombre, $json_data->apellido, $json_data->direccion, $json_data->telefono, $json_data->edad
        );
        if($id > 0){
            $response = $users->crear($json_data->nombreu,$json_data->correo, $json_data->contrasena, $json_data->estado, $id);
        }else{
            $response['msg'] = "Ha ocurrido un error al guardar cliente";
        }
    }else{
        $response['msg'] = "Ha ocurrido un error al guardar cliente";
    }
}else {
    $response['msg'] = "Ha ocurrido un error al guardar cliente";
}
echo json_encode($response);