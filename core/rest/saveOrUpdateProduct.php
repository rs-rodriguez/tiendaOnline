<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 1:38 PM
 */

include_once('ApiRest.php');
require('../crud/crudProductos.php');
session_start(); // se inicia en contexto de session
$input = json_decode(file_get_contents('php://input'));
$procuto = new crudProductos();
if($input != null){
    if($input->accion == "save"){
        $json_data = $input->json;
        $result = $procuto->crear(
            $json_data->sku,
            $json_data->descripcion,
            $json_data->color,
            $json_data->marca,
            $json_data->departamento,
            $json_data->talla,
            $json_data->precio,
            $json_data->idprecio
        );
        $response['msg'] = 'ok';
        $response['trans'] = 'ok';
    }else if ($input->accion == "edit"){
        $json_data = $input->json;
        $result = $procuto->update(
            $json_data->sku,
            $json_data->descripcion,
            $json_data->color,
            $json_data->marca,
            $json_data->departamento,
            $json_data->talla,
            $json_data->precio,
            $json_data->idprecio,
            $json_data->id
        );
        $response['msg'] = 'ok';
        $response['trans'] = 'ok';
    }else{
        $response['msg'] = 'error';
    }
}else{
    $response['msg'] = 'error';
}
echo json_encode($response);



