<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 11/26/2018
 * Time: 11:07 PM
 */
    session_start(); // se inicia en contexto de session
    require('../crud/crudUsuario.php');
    $users = new crudUsuario();
    if(isset($_SESSION['email'])){
        $response['msg'] = 'OK';
        $response['acceso'] = 'Autorizado';
    }else{
        $result = $users->validarUsuario($_POST['username']);
        if (sizeof($result) > 0){
            $response['msg'] = 'OK';
            $response['acceso'] = 'Autorizado';
            $_SESSION['email'] = $result['correo'];
            /*
             * else{
                    $response['msg'] = 'contraseña incorrecta';
                    $response['acceso'] = 'acceso denegado';
                }
             */
        }else{
            $response['msg'] = 'No existe usuario';
            $response['acceso'] = 'acceso denegado';
        }
    }
    echo json_encode($response);

 ?>