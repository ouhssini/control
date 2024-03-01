<?php
include'cmpx.cls.php';
abstract class Efp  extends ComplexeDeFormation{
    private $nombrestagiare;
    static $nombreFormateurs;
    public function __construct($id, $directure_regional, $nom, $adresse, $telephone, $email, $directure,$nombrestagiare) {
        parent::__construct($id, $directure_regional, $nom, $adresse, $telephone, $email, $directure);
        $this->nombrestagiare = $nombrestagiare;
    }

    abstract public function getNombreDeFormateur();

    

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