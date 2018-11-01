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