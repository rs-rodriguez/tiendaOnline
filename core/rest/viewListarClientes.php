<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/31/2018
 * Time: 11:44 PM
 */
session_start();
require('../crud/crudCliente.php');

$client = new crudCliente();

$response = $client->listar();
/*devolver el arreglo response en formato json*/
echo json_encode($response);
