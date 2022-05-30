<?php

/*
 * @author Kamus
 */

class Grado {

    public $cnx;
    public $idGrado;
    public $grado;
    public $encargado;

    public function __construct() {
        try {
            $this->cnx = Conexion::conectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

//------------------------------- CRUD -------------------------------\\  
//------------------------------- LISTAR -----------------------------\\  

    public function listar() {
        try {
            $query = "SELECT * FROM grados";
            $stm = $this->cnx->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
            return false;
        }
    }

//------------------------------- INSERTA -----------------------------\\  

    public function guardar(Grado $datos) {
        try {
            $query = "INSERT INTO grados(idGrado, grado, encargado) VALUES (?,?,?)";
            $this->cnx->prepare($query)->execute(array($datos->idGrado,
                $datos->grado, $datos->encargado));
        } catch (Exception $exc) {
            die($exc->getMessage());
            return false;
        }
    }

//------------------------------- BUSCAR POR ID -----------------------------\\  

    public function buscarId($id) {
        try {
            $quey = "SELECT * FROM grados WHERE idGrado=1";
            $stm = $this->cnx->prepare($quey);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            die($exc->getMessage());
            return false;
        }
    }

//------------------------------- ACTUALIZAR -----------------------------\\  

    public function actualizar($datos) {

        try {
            $query = "UPDATE grados SET, grado = ?,encargado =? WHERE idGrado=?";

            $this->cnx->prepare($query)->execute(array(
                $datos->grado, $datos->encargado, $datos->idGrado));
        } catch (Exception $exc) {
            die($exc->getMessage());
            return false;
        }
    }
 //------------------------------- ACTUALIZAR -----------------------------\\  

    public function borrar ($id){
        try {
            $query = "";
            $stm  = $this->cnx->prepare($query);
            $stm->execute(array($id));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
}
