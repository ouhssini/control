<?php
include 'directionRegional.php';


class ComplexeDeFormation extends Dregional
{
    private $directeur;
    static $nombreFormateurs;

    public function __construct($id, $directure_regional, $nom, $adresse, $telephone, $email, $directure)
    {
        parent::__construct($id, $directure_regional, $nom, $adresse, $telephone, $email);
        $this->directeur = $directure;
        self::$nombreFormateurs++;
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


    public function getNombreDeFormateur(){
        return self::$nombreFormateurs;
    }



}
