<?php

class clientConex {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $conexion;
    private $databaseName = 'shopping_clothes';

    // se gestiona conexion inicial
    function initialContex(){
        $this->conexion = new PDO('mysql:host='.$this->host.';', $this->user, $this->password);
    }
    // se gestiona conexion inicial ya hacia la bd
    function conectedDB(){
        $conexionDB = new PDO('mysql:dbname='.$this->databaseName.';host='.$this->host.';', $this->user, $this->password);
        return $conexionDB;
    }
    // se crea base de datos
    function createDB(){
        try {
            $sql = 'CREATE DATABASE IF NOT EXISTS '.$this->databaseName;
            $this->conexion->exec($sql);
            echo "La base de datos parcial2 fue creada exitosamente";
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage()."<br/>";
            die();
        }
    }
    // ejecusion de las consultas
    function executeQUerys($sqlTBL){
        try {
            $conec = $this->conectedDB();
            $conec->exec($sqlTBL);
            echo "La Tabla fue creada exitosamente";
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage()."<br/>";
            echo $e->getMessage();
            die();
        }
    }
    // generacion de tablas
    function getNewTableQuery($nombre_tbl, $campos){
        $sql = 'CREATE TABLE '.$nombre_tbl.' (';
        $length_array = count($campos);
        $i = 1;
        foreach ($campos as $key => $value) {
            $sql .= $key.' '.$value;
            if ($i!= $length_array) {
                $sql .= ', ';
            }else {
                $sql .= ');';
            }
            $i++;
        }
        return $sql;
    }
    //se agrega restriccion a las tablas
    function nuevaRestriccion($tabla, $restriccion){
        $sql = 'ALTER TABLE '.$tabla.' '.$restriccion;
        $conec = $this->conectedDB();
        $conec->exec($sql);
    }
    // carga informacion
    function consultar($tablas, $campos, $condicion = ''){
        $sql = "SELECT ";
        $result = array_keys($campos);
        $ultima_key = end($result);
        foreach ($campos as $key => $value) {
            $sql .= $value;
            if ($key!=$ultima_key) {
                $sql.=", ";
            }else $sql .=" FROM ";
        }
        $result = array_keys($tablas);
        $ultima_key = end($result);
        foreach ($tablas as $key => $value) {
            $sql .= $value;
            if ($key!=$ultima_key) {
                $sql.=", ";
            }else $sql .= " ";
        }

        if ($condicion == "") {
            $sql .= ";";
        }else {
            $sql .= $condicion.";";
        }
        $conexionDB = $this->conectedDB();
        $result = $conexionDB->prepare($sql);
        $result->execute();
        return $result;
    }
    // insert a la base de datos
    function insertDataTable($tabla, $data){
        $sql = $this->prepareSql($tabla, $data);
        $conexionDB = $this->conectedDB();
        $result = $conexionDB->prepare($sql);
        $result->execute();
        return $result;
    }

    // insert a la base de datos
    function insertDataTableReturning($tabla, $data){
        $sql = $this->prepareSql($tabla, $data);
        $conexionDB = $this->conectedDB();
        $result = $conexionDB->prepare($sql);
        $result->execute();
        return $conexionDB->lastInsertId();
    }

    function prepareSql($tabla, $data){
        $sql = 'INSERT INTO '.$tabla.' (';
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= $key;
            if ($i<count($data)) {
                $sql .= ', ';
            }else $sql .= ')';
            $i++;
        }
        $sql .= ' VALUES (';
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= $value;
            if ($i<count($data)) {
                $sql .= ', ';
            }else $sql .= ');';
            $i++;
        }
        return $sql;
    }

    // actualizar base de datos
    function updateDataTable($tabla, $data, $condicion){
        $sql = 'UPDATE '.$tabla.' SET ';
        $i=1;
        foreach ($data as $key => $value) {
            $sql .= $key.'='.$value;
            if ($i<sizeof($data)) {
                $sql .= ', ';
            }else $sql .= ' WHERE '.$condicion.';';
            $i++;
        }
        $conexionDB = $this->conectedDB();
        $result = $conexionDB->prepare($sql);
        $result->execute();
        return $result;
    }
    // eliminar datos
    function deleteData($tabla, $condicion){
        $sql = "DELETE FROM ".$tabla." WHERE ".$condicion.";";
        $conexionDB = $this->conectedDB();
        $result = $conexionDB->prepare($sql);
        $result->execute();
        return $result;
    }
}
?>