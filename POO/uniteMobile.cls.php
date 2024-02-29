<?php
include 'efp.cls.php';

class UniteMobile extends Efp {
    private $nomFormateur;
    public function __construct($id, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare,$nomFormateur) {
           parent::__construct($id, $nom, $adresse, $ville, $telephone,$email,$nombrestagiare);
           $this->nomFormateur = $nomFormateur;
       }
       public function getNombreDeFormateur() {
           return 1;
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