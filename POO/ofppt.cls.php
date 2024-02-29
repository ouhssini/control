<?php

// Classe abstraite OFPPT
abstract class Ofppt {  
    private $nom;
    private $adresse;
    private $telephone;
    private $email;
    static $nombreFormateurs;

    public function __construct($nom, $adresse, $telephone, $email) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->email = $email;
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