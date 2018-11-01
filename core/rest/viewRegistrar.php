<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/30/2018
 * Time: 11:07 PM
 */
require('../crud/crudCliente.php');
require('../crud/crudUsuario.php');

$client = new crudCliente();
$users = new crudUsuario();

$nombreC = $_POST['nombreC'];
$apellido = $_POST['apellido'];
$direcc = $_POST['direcc'];
$telefono = $_POST['telefono'];
$edad = $_POST['edad'];

$nombreu = $_POST['nombreu'];
$correo = $_POST['correo'];
$contrase = $_POST['contrase'];
$estado = $_POST['estado'];


$id = $client->crear($nombreC, $apellido, $direcc, $telefono, $edad);
if($id > 0){
    $response = $users->crear($nombreu,$correo, $contrase, $estado, $id);
}else{
    $response['msg'] = "Ha ocurrido un error al guardar cliente";
}
echo json_encode($response);