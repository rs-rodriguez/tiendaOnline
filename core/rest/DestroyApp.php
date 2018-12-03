<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 6:59 PM
 */

session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
    $response['msg'] = 'Redireccionar';
}else{
    $response['msg'] = 'Sesion no iniciada';
}
echo json_encode($response);