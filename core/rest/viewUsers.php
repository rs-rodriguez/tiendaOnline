<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/31/2018
 * Time: 11:44 PM
 */
session_start();
require('../crud/crudUsuario.php');

$client = new crudUsuario();

$response = $client->listar();
/*devolver el arreglo response en formato json*/
echo json_encode($response);