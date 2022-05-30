<?php

/*
 * @author Kamus
 */

class Conexion {

    public static function conectar() {
        
        try {
            $cnx = new PDO("mysql:host=localhost; dbname=escuela; charset=utf8; ", "root", "");
       $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo"conexion correcta";
       
            } catch (Exception $exc) {
            echo "Error ".$exc->getMessage();
        }
        return $cnx;
    }

}
