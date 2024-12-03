<?php
class Staff
{
    
    private ?int $cin = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $genre = null;
    private ?string $Date_Birth=null;
    private ?string $E_mail = null;
    private ?string $Tel=null;
    private ?string $role =null;
    private ?string $password=null;

    public function __construct($cin,$nom,$prenom,$genre,$age,$email,$telephone,$password,$choix)
    {
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom = $prenom;
        $this->genre=$genre;
        $this->Date_Birth= $age;
        $this->E_mail= $email;
        $this->Tel = $telephone;
        $this->role = $choix;
        $this->password = $password;
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


    public function getE_mail()
    {
        return $this->E_mail;
    }

    public function setE_mail($E_mail)
    {
        $this->E_mail=$E_mail;
        return $this;
    }


    public function getTel()
    {
        return $this->Tel;
    }


    public function setTel($Tel)
    {
        $this->Tel= $Tel;

        return $this;
    }



    public function getrole()
    {
        return $this->role;
    }


    public function setrole($role)
    {
        $this->role= $role;

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


}