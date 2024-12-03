<?php
class  rendezvous
{
    private ?int $idrendezvous = null;
    private ?int $idpatient = null;
    private ?string $specialite = null;
    private ?string $nommedecin = null;
    private ?string $date = null;
    private ?string $heure = null;
    private ?string $email = null;
   

    public function __construct($n, $p, $a, $z, $e, $t)
    {
        $this->idpatient = $n;
        $this->specialite = $p;
        $this->nommedecin = $a;
        $this->date = $z;
        $this->heure = $e;
        $this->email = $t;
    }


    public function getIdrendezvous()
    {
        return $this->idrendezvous;
    }


    public function getidpatient ()
    {
        return $this->idpatient ;
    }


    public function setidpatient($idpatient)
    {
        $this->idpatient = $idpatient;

        return $this;
    }


    public function getspecialite()
    {
        return $this->specialite;
    }


    public function setspecialite($specialite)
    {
        $this->specialite= $specialite;

        return $this;
    }



    public function getnommedecin()
    {
        return $this->nommedecin;
    }


    public function setnommedecin($nommedecin)
    {
        $this->nommedecin= $nommedecin;

        return $this;
    }

    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getheure()
    {
        return $this->heure;
    }


    public function setheure($heure)
    {
        $this->heure = $heure;

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

    
}
