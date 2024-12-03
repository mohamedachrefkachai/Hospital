<?php
class Medicament
{
    private ?int $id_medicament = null;
    private ?string $nom_medicament = null;
    private ?int $nb_stock = null;
    private ?int $prix_unitaire_vente = null;
    private ?string $delai = null;
    private ?int $prix_unitaire_achat = null;
    public function __construct($id, $n, $p, $a, $d, $v)
    {
        $this->id_medicament= $id;
        $this->nom_medicament = $n;
        $this->nb_stock= $p;
        $this->prix_unitaire_vente= $v;
        $this->delai= $d;
        $this->prix_unitaire_achat= $a;
    }


    public function getId_medicament()
    {
        return $this->id_medicament;
    }

    public function setId_medicament($id)
    {
        $this->id_medicament = $id;

        return $this;
    }

    public function getNom_medicament()
    {
        return $this->nom_medicament;
    }


    public function setNom_medicament($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getnb_stock()
    {
        return $this->nb_stock;
    }


    public function setnb_stock($nombre)
    {
        $this->nb_stock = $nombre;

        return $this;
    }


    public function getprix_unitaire_vente()
    {
        return $this->prix_unitaire_vente;
    }


    public function setEmail($prixv)
    {
        $this->prix_unitaire_vente= $prixv;

        return $this;
    }


    public function getdelai()
    {
        return $this->delai;
    }


    public function setdelai($date)
    {
        $this->delai = $date;

        return $this;
    }
    public function getprix_unitaire_achat()
    {
        return $this->prix_unitaire_achat;
    }


    public function setprix_unitaire_achat($prixa)
    {
        $this->prix_unitaire_achat = $prixa;

        return $this;
    }
}
