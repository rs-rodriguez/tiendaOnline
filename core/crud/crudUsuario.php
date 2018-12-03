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
        $resultQuery = $this->consultar(['cliente cus', 'usuario usr'], ['cus.*', 'usr.*'], 'where usr.ID_CLIENTE=cus.ID_CLIENTE');
        $i = 0;
        /*Recorrer el arreglo de resultados*/
        while($fila = $resultQuery->fetch()){
            $response['data'][$i]['id']=$fila['ID_USUARIO'];
            $response['data'][$i]['nombreU']=$fila['NOMBREU'];
            $response['data'][$i]['contrasena']=$fila['contrasena'];
            $response['data'][$i]['correo']=$fila['correo'];
            $response['data'][$i]['estado']=$fila['estado'];
            $response['data'][$i]['idcliente']=$fila['ID_CLIENTE'];
            $response['data'][$i]['nombre']=$fila['NOMBRE'];
            $response['data'][$i]['apellido']=$fila['APELLIDO'];
            $response['data'][$i]['direccion']=$fila['DIRECCION'];
            $response['data'][$i]['telefono']=$fila['TELEFONO'];
            $response['data'][$i]['edad']=$fila['EDAD'];
            $i++;
        }
        /*Devolver respuesta positiva al obtener registros*/
        $response['getData'] = "OK";
        return $response;
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
        $data['NOMBREU'] = '"'.$nombre.'"';
        $data['correo'] = '"'.$correo.'"';
        $data['contrasena'] = '"'.$contrasena.'"';
        $data['estado'] = '"'.$estado.'"';
        $data['ID_CLIENTE'] = '"'.$idCliente.'"';
        return $data;
    }
}