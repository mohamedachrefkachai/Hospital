<?php

class Ordonnance
{
    private ?int $id_ordonnance = null;
    private ?string $id_medicament = null;
    private ?int $nb_packet = null;
    private ?int $id_staff = null;
    private ?string $id_patient = null;
    private ?string $date_ordonnance = null;
    private ?int $frequence = null;
    private ?int $duree = null;
    private ?string $etat = null;

    public function __construct($id_ordonnance,$id_medicament, $nb_packet, $id_staff, $id_patient, $duree, $date_ordonnance, $frequence,$etat)
    {
        $this->id_ordonnance = $id_ordonnance;
        $this->id_medicament = $id_medicament;
        $this->nb_packet = $nb_packet;
        $this->id_staff = $id_staff;
        $this->id_patient = $id_patient;
        $this->duree = $duree;
        $this->date_ordonnance = $date_ordonnance;
        $this->frequence = $frequence;
        $this->etat = $etat;
    }

    public function getetat()
    {
        return $this->etat;
    }

    public function setetat($etat)
    {
        $this->etat = $etat;
        return $this;
    }

    public function getid_ordonnance()
    {
        return $this->id_ordonnance;
    }

    public function setid_ordonnance($id)
    {
        $this->id_ordonnance = $id;
        return $this;
    }

    public function getid_medicament()
    {
        return $this->id_medicament;
    }

    public function setid_medicament($idm)
    {
        $this->id_medicament = $idm;
        return $this;
    }

    public function getnb_packet()
    {
        return $this->nb_packet;
    }

    public function setnb_packet($nombre)
    {
        $this->nb_packet = $nombre;
        return $this;
    }

    public function getid_staff()
    {
        return $this->id_staff;
    }

    public function setid_staff($ids)
    {
        $this->id_staff = $ids;
        return $this;
    }

    public function getid_patient()
    {
        return $this->id_patient;
    }

    public function setid_patient($idp)
    {
        $this->id_patient = $idp;
        return $this;
    }

    public function getdate_ordonnance()
    {
        return $this->date_ordonnance;
    }

    public function setdate_ordonnance($date)
    {
        $this->date_ordonnance = $date;
        return $this;
    }

    public function setfrequence($f)
    {
        $this->frequence = $f;
        return $this;
    }

    public function getfrequence()
    {
        return $this->frequence;
    }

    public function setduree($a)
    {
        $this->duree = $a;
        return $this;
    }

    public function getduree()
    {
        return $this->duree;
    }
}
?>
