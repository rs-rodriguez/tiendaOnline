<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 6:57 PM
 */

include_once('ApiRest.php');
session_start(); // se inicia en contexto de session
if(isset($_SESSION['email'])){
    $response['msg'] = 'OK';
    $response['msgses'] = 'OK';
    $response['acceso'] = 'Autorizado';
}else{
    $response['msg'] = 'OK';
    $response['msgses'] = 'OK';
    $response['acceso'] = 'Denegado';
}
echo json_encode($response);