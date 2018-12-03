<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 12:13 AM
 */
include_once('ApiRest.php');

require ('../crud/crudProductos.php');

$procuto = new crudProductos();
$response = $procuto->listar();
echo json_encode($response['data']);


