<?php
class produit
{
    private ?int $code_produit = null;
    private ?string $libelle = null;
    private ?float $prix = null;  // Assurez-vous que c'est le type correct
    private ?string $image = null;
    private ?string $description= null;

    public function __construct($id, $n, $p, $a, $d)
    {
        $this->code_produit= $id;
        $this->libelle= $n;
        $this->prix = $p;
        $this->image = $a;
        $this->description = $d;
    }


    public function getcode_produit()
    {
        return $this->code_produit;
    }


    public function getlibelle()
    {
        return $this->libelle;
    }


    public function setlibelle($libelle)
    {
        $this->libelle= $libelle;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix =(int) $prix;

        return $this;
    }


    public function getimage()
    {
        return $this->image;
    }


    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function setdescription($description)
    {
        $this->description = $description;
        return $this;
    } 
}