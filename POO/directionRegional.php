<?php
include 'ofppt.cls.php';



class Dregional extends Ofppt
{
    private $id;
    private $directure_regional;
    static $nombreFormateurs;
    public function __construct($id, $directure_regional, $nom, $adresse, $telephone, $email)
    {
        parent::__construct($nom, $adresse, $telephone, $email);
        $this->id = $id;
        $this->directure_regional = $directure_regional;
    }

    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
    }


    public function __set($attr, $value)
    {
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }


    public function getNombreDeFormateur()
    {
        return self::$nombreFormateurs;
    }
}
