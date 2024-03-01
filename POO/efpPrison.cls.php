<?php
include 'efp.cls.php';



class EfpPrison extends Efp {
 private $nombreFormateur ;
private $nomPrison;
private $nomResponsable;
 public function __construct($id, $directure_regional,$nom, $adresse, $ville, $telephone,$email,$nombrestagiare,$nombreFormateur,$nomprison,$nomResponsable) {
        parent::__construct($id,$directure_regional, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare);

        $this->nombreFormateur = $nombreFormateur;
        $this->nomPrison = $nomprison;
        $this->nomResponsable = $nomResponsable;
        parent::$nombreFormateurs+=$this->nombreFormateur;
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