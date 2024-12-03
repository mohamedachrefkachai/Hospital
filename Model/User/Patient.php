<?php
class Patient
{

    private ?int $cin = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $Date_Birth=null;
    private ?string $genre = null;
    private ?string $Tel=null;
    private ?string $password=null;
    private ?string $adresee =null;
    private ?string $mail =null;

    public function __construct($cin,$nom,$prenom,$date,$genre,$tel,$pass,$adresse,$mail)
    {
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->Date_Birth=$date;
        $this->genre=$genre;
        $this->Tel=$tel;
        $this->password=$pass;
        $this->adresse=$adresse;
        $this->mail=$mail;
    }
    
    public function getcin()
    {
        return $this->cin;
    }

    public function setncin($cin)
    {
        $this->cin=$cin;
        return $this;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)
    {
        $this->nom=$nom;
        return $this;
    }

    public function getprenom()
    {
        return $this->prenom;
    }

    public function setprenom($prenom)
    {
        $this->prenom=$prenom;
        return $this;
    }

    public function getDate_Birth()
    {
        return $this->Date_Birth;
    }

    public function setDate_Birth($Date_Birth)
    {
        $this->Date_Birth=$Date_Birth;
        return $this;
    } 

    public function getgenre()
    {
        return $this->genre;
    }


    public function setngenre($genre)
    {
        $this->genre=$genre;
        return $this;
    }

 

    public function getTel()
    {
        return $this->Tel;
    }


    public function setTel($tel)
    {
        $this->Tel= $tel;

        return $this;
    }   


    public function getpassword()
    {
        return $this->password;
    }


    public function setpassword($password)
    {
        $this->password= $password;

        return $this;
    }

    public function getmail()
    {
        return $this->mail;
    }


    public function setrole($mail)
    {
        $this->mail= $mail;

        return $this;
    }



    public function getadresse()
    {
        return $this->adresse;
    }


    public function setadresse($adresse)
    {
        $this->adresse= $adresse;

        return $this;
    }


}





?>

