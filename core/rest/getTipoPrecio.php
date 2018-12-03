<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 10:56 AM
 */

include_once('ApiRest.php');
require ('../crud/crudProductos.php');
$procutot = new crudProductos();
$response = $procutot->listarTipo();
echo json_encode($response['data']);