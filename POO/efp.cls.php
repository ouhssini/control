<?php

abstract class Efp {
    private $id;
    private $nom;
    private $adresse;
    private $ville;
    private $telephone;
    private $email;
    private $nombrestagiare;
    public function __construct($id, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->telephone = $telephone;
        $this->email = $email;
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