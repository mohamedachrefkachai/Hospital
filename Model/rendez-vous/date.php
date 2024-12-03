<?php
class  date
{
    private ?int $iddate = null;
    private ?string $nommedecin = null;
    private ?string $date = null;
    private ?int $idpatient = null;
    private ?string $heure = null;
   

    public function __construct( $n, $p, $a, $s)
    {
    
        $this->nommedecin = $n;
        $this->date = $p;
        $this->idpatient = $a;
        $this->heure = $s;

       
    }


    public function getIddate()
    {
        return $this->iddate;
    }


    public function getnommedecin ()
    {
        return $this->nommedecin ;
    }


    public function setnommedecin($nommedecin)
    {
        $this->nommedecin = $nommedecin;

        return $this;
    }


    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date= $date;

        return $this;
    }


    public function getidpatient()
    {
        return $this->idpatient;
    }


    public function setidpatient($idpatient)
    {
        $this->idpatient = $idpatient;

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


    
}
