<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 11/26/2018
 * Time: 11:07 PM
 */
require('../crud/crudUsuario.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
session_start(); // se inicia en contexto de session
$input = json_decode(file_get_contents('php://input'));
    $users = new crudUsuario();
    if(isset($_SESSION['email'])){
        $response['msg'] = 'OK';
        $response['msgses'] = 'OK';
        $response['acceso'] = 'Autorizado';
    }else{
        $result = $users->validarUsuario($input->username);
        if (sizeof($result) > 0){
            if($_POST['password'] == $result['contrasena']){
                $response['msg'] = 'OK';
                $response['acceso'] = 'Autorizado';
                $_SESSION['email'] = $result['correo'];   
            }else{
                $response['msg'] = 'contraseña incorrecta';
                $response['acceso'] = 'acceso denegado';
            }
        }else{
            $response['msg'] = 'No existe usuario';
            $response['acceso'] = 'acceso denegado';
        }
    }
    echo json_encode($response);

 ?>