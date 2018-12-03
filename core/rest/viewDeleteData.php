<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 4:07 PM
 */
include_once('ApiRest.php');
require('../crud/crudProductos.php');
session_start(); // se inicia en contexto de session
$input = json_decode(file_get_contents('php://input'));

if($input != null){
    if($input->accion == "deleteProd"){
        $procuto = new crudProductos();
        $json_data = $input->json;
        $result = $procuto->deleteProd($json_data->id);
        $response['msg'] = 'ok';
        $response['trans'] = 'ok';
    } else {
        $response['msg'] = 'error';
        $response['trans'] = 'ok';
    }
    echo json_encode($response);
}
