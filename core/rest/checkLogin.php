<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 11/26/2018
 * Time: 11:07 PM
 */
include_once('ApiRest.php');
require('../crud/crudUsuario.php');
session_start(); // se inicia en contexto de session
$input = json_decode(file_get_contents('php://input'));
$users = new crudUsuario();
    if(isset($_SESSION['email'])){
        $response['msg'] = 'OK';
        $response['msgses'] = 'OK';
        $response['acceso'] = 'Autorizado';
    }else{
        if($input != null){
            $result = $users->validarUsuario($input->username);
            if (sizeof($result) > 0){
                if($input->password == $result['contrasena']){
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
    }
    echo json_encode($response);

 ?>