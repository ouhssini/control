<?php
include 'efp.cls.php';



class Ista extends Efp {
 private $nombreFormateur ;

 public function __construct($id, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare,$nombreFormateur) {
        parent::__construct($id, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare);
        $this->nombreFormateur = $nombreFormateur;
    }
    public function getNombreDeFormateur() {
        return $this->nombreFormateur;
     }
     

    public function __get($attr){
        if (property_exists($this,$attr)){
            return $this->$attr;
        }
    }


    public function __set($attr,$value){
        if (property_exists($this,$attr)){
            $this->$attr = $value;
        }
    }
}