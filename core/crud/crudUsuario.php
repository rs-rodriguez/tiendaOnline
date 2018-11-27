<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/30/2018
 * Time: 11:06 PM
 */

require_once('../config/libORM.php');

class crudUsuario extends clientConex
{
    function crear($nombre, $correo, $contrasena, $estado, $idCliente){
        $data = $this->prepareData($nombre, $correo, $contrasena, $estado, $idCliente);
        if($this->insertDataTable('usuario', $data)){
            $response['msg'] = 'OK';
        }else{
            $response['msg'] = "Ha ocurrido un error al guardar el usuario";
        }
        return $response;
    }

    function update(){

    }

    function delete(){

    }

    function listar(){

    }

    function validarUsuario($username){
        $resultQuery = $this->consultar(['usuario'],['correo','contrasena'], "WHERE correo='".$username."'");
        if ($resultQuery->rowCount() > 0) {
            $response = $resultQuery->fetch();
        }else{
            $response = array();
        }
        return $response;
    }


    function prepareData($nombre, $correo, $contrasena, $estado, $idCliente){
        $data['NOMBRE'] = '"'.$nombre.'"';
        $data['correo'] = '"'.$correo.'"';
        $data['contrasena'] = '"'.$contrasena.'"';
        $data['estado'] = '"'.$estado.'"';
        $data['ID_CLIENTE'] = '"'.$idCliente.'"';
        return $data;
    }
}