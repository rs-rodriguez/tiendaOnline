<?php
/**
 * Created by PhpStorm.
 * User: Samuel Guardado
 * Date: 12/2/2018
 * Time: 12:30 AM
 */

require_once('../config/libORM.php');
class crudProductos extends clientConex
{
    function listar(){
        $resultQuery = $this->consultar(['producto produ'],['produ.*']);
        $i = 0;
        while($fila = $resultQuery->fetch()){
            $response['data'][$i]['id']=$fila['ID_PRODUCTO'];
            $response['data'][$i]['sku']=$fila['SKU'];
            $response['data'][$i]['descripcion']=$fila['DESCRIPCION'];
            $response['data'][$i]['color']=$fila['COLOR'];
            $response['data'][$i]['marca']=$fila['MARCA'];
            $response['data'][$i]['departamento']=$fila['DEPARTAMENTO'];
            $response['data'][$i]['talla']=$fila['TALLA'];
            $response['data'][$i]['precio']=$fila['PRECIO'];
            $response['data'][$i]['idprecio']=$fila['ID_TIPO_DE_PRECIO'];
            // $response['data'][$i]['img']=$fila['img'];
            $i++;
        }
        $response['getData'] = "OK";
        /*Devolver respuesta positiva al obtener registros*/
        return $response;
    }

    function listarTipo(){
        $resultQuery = $this->consultar(['tipo_de_precio tipo'],['tipo.*']);
        $i = 0;
        while($fila = $resultQuery->fetch()){
            $response['data'][$i]['id']=$fila['ID_TIPO_DE_PRECIO'];
            $response['data'][$i]['descripcion']=$fila['DESCRIPCION'];
            $i++;
        }
        $response['getData'] = "OK";
        /*Devolver respuesta positiva al obtener registros*/
        return $response;
    }

    function crear($sku, $descrip, $color, $marca,
                   $department, $tall, $precio, $idtipo){
        $data = $this->prepareData($sku, $descrip, $color, $marca, $department, $tall, $precio, $idtipo);
        $result = $this->insertDataTable('producto', $data);
        return $result;
    }

    function update($sku, $descrip, $color, $marca,
                   $department, $tall, $precio, $idtipo, $id){
        $data = $this->prepareData($sku, $descrip, $color, $marca, $department, $tall, $precio, $idtipo, $id);
        $result = $this->updateDataTable('producto', $data, 'ID_PRODUCTO ='.$id);
        return $result;
    }

    function deleteProd($id){
        $this->deleteData('producto', 'ID_PRODUCTO ='.$id);
    }


    function prepareData($sku, $descrip, $color, $marca,
                         $department, $tall, $precio, $idtipo, $id = null){
        if($id != null){
            $data['ID_PRODUCTO'] = '"'.$id.'"';
        }
        $data['SKU'] = '"'.$sku.'"';
        $data['DESCRIPCION'] = '"'.$descrip.'"';
        $data['COLOR'] = '"'.$color.'"';
        $data['MARCA'] = '"'.$marca.'"';
        $data['DEPARTAMENTO'] = '"'.$department.'"';
        $data['TALLA'] = '"'.$tall.'"';
        $data['PRECIO'] = '"'.$precio.'"';
        $data['ID_TIPO_DE_PRECIO'] = '"'.$idtipo.'"';
        return $data;
    }

}