<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 10/30/2018
 * Time: 11:06 PM
 */

require('../config/conexion.php');
$context = new clientConex();
class crudUsuario
{
    function crear(){

    }

    function update(){

    }

    function delete(){

    }

    function listar(){

    }

    function prepareData(){
        $data['asunto'] = '"'.$_POST['asunto'].'"';
        $data['fecha'] = '"'.$_POST['fecha'].'"';
        $data['lugar'] = '"'.$_POST['lugar'].'"';
        $data['descripcion'] = '"'.$_POST['descripcion'].'"';
        $data['estado'] = '"'.$_POST['estado'].'"';
    }
}