<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/30/2018
 * Time: 11:06 PM
 */

require_once('../config/libORM.php');

class crudCliente extends clientConex
{
    function crear($nombre, $apellido, $direccion, $telefono, $edad){
        $data = $this->prepareData($nombre, $apellido, $direccion, $telefono, $edad);
        $result = $this->insertDataTableReturning('cliente', $data);
        return $result;
    }

    function update(){

    }

    function delete(){

    }

    function listar(){
        $resultQuery = $this->consultar(['cliente cus'],['cus.*']);
        $i = 0;
        /*Recorrer el arreglo de resultados*/
        while($fila = $resultQuery->fetch()){
            $response['data'][$i]['id']=$fila['ID_CLIENTE'];
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

    function prepareData($nombre, $apellido, $direccion, $telefono, $edad){
        $data['NOMBRE'] = '"'.$nombre.'"';
        $data['APELLIDO'] = '"'.$apellido.'"';
        $data['DIRECCION'] = '"'.$direccion.'"';
        $data['TELEFONO'] = '"'.$telefono.'"';
        $data['EDAD'] = '"'.$edad.'"';
        return $data;
    }
}