<?php
include '../../config1.php';
include '../../Model/User/Patient.php';
$db = config1::getConnexion();

class PatientC
{
    function authentication($cin,$password)
    {
        global $db;
        $sql = "SELECT * FROM patient WHERE cin=:cin AND Password=:password";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':cin',$cin);
            $query->bindParam(':password',$password);
            $query->execute();
    
            $user = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return $user; 
            } else {
                return false; 
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function listpatient()
    {
        $sql = "SELECT * FROM patient";
        global $db;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addPatient($Patient) {
        $sql = "INSERT INTO patient  
        VALUES ('',:cin,:nom,:prenom,:Date_Birth,:Genre,:tel,:password,:adresse,:mail)";
        global $db;
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $Patient->getcin(),
                'nom' => $Patient->getnom(),
                'prenom' => $Patient->getprenom(),
                'Genre' => $Patient->getgenre(),
                'Date_Birth' => $Patient->getDate_Birth(),
                'tel' => $Patient->getTel(),
                'adresse' => $Patient->getadresse(),
                'password' => $Patient->getpassword(),
                'mail' => $Patient->getmail(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function deletepatient($id)
    {
        $sql = "DELETE FROM patient WHERE Id_patient=:id";
        global $db;
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showPatient($id)
    {
        $sql = "SELECT * from patient where Id_patient=$id";
        global $db;
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Patient = $query->fetch();
            return $Patient;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updatePatient($id, $Patient)
    {
        global $db;
        try {
            $query = $db->prepare('UPDATE patient SET
                Id_patient=:id,
                cin= :cin,
                nom= :nom,
                prenom= :prenom,
                Date_Birth= :date_birth,
                Genre=:Genre,
                tel= :tel,
                Password=:password,
                adresse= :adresse,
                mail=:mail
                WHERE Id_patient=:id');
            $query->execute([
                'id'=>$id,
                'cin' => $Patient->getcin(),
                'nom' => $Patient->getnom(),
                'prenom' => $Patient->getprenom(),
                'date_birth' => $Patient->getDate_Birth(),
                'Genre' => $Patient->getgenre(),
                'tel' => $Patient->getTel(),
                'adresse' => $Patient->getadresse(),
                'password' => $Patient->getpassword(),
                'mail' => $Patient->getmail(),
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
    }
    }
}



?>