<?php

class Commande
{
    private ?int $id_commande = null;
    private ?string $code_produit;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $adresse = null;
    private ?int $gsm = null;
    private ?string $email = null;
    private ?string $date_commande = null;
    private ?string $id_panier; 
    private ?string $quantite;
    public function __construct($id, $n, $p, $a, $d, $c, $e, $f,$l,$o)
    {
        $this->id_commande = $id;
        $this->code_produit = $n;
        $this->nom = $p;
        $this->prenom = $a;
        $this->adresse = $d;
        $this->gsm = intval($c);
        $this->email = $e;
        $this->date_commande = $f;
        $this->id_panier = $l;
        $this->quantite = $o;

    }
 



    public function getid_commande()
    {
        return $this->id_commande;
     }

    public function getcode_produit()
    {
        return $this->code_produit;
    }


    public function setcode_produit($code_produit)
    {
        $this->code_produit= $code_produit;

        return $this;
    }

    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom= $nom;

        return $this;
    }


    public function getprenom()
    {
        return $this->prenom;
    }


    public function setprenom($prenom)
    {
        $this->prenom = $prenomx;

        return $this;
    }


    public function getadresse()
    {
        return $this->adresse;
    }


    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getgsm()
    {
        return $this->gsm;
    }

    public function setgsm($gsm)
    {
        $this->gsm = $gsm;
        return $this;
    } 

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($email)
    {
        $this->email = $email;
        return $this;
    } 
    public function getdate_commande()
    {
        return $this->date_commande;
    }

    public function setdate_commande($date_commande)
    {
        $this->date_commande = $date_commande;
        return $this;
    } 
    public function getid_panier()
    {
        return $this->id_panier;
    }


    public function setid_panier($id_panier)
    {
        $this->id_panier = $id_panier;

        return $this;
    }

    public function getquantite()
    {
        return $this->quantite;
    }

    public function setquantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

}