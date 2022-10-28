<?php
//conexion a base de datos parametrizacion
class Conexion{
    public  static function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=senasubs_parametrizacion", "root", "1130266003");
        return $link;
    }
//conexion a base de datos securitas
    public  static function conectar2(){
        $link = new PDO("mysql:host=localhost; dbname=senasubs_securitas", "root", "1130266003");
        return $link;
    }

}

