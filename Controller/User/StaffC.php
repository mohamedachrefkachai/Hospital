<?php
include '../../config.php';
include '../../Model/User/Staff.php';


$db = config::getConnexion();
class StaffC
{
    function authentication($email, $password)
    {
        global $db;
        $sql = "SELECT * FROM staff WHERE E_mail = :email AND Password_s = :password";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
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


    function showStaff($id)
    {
        $sql = "SELECT * from staff where Id_staff=$id";
        global $db;
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $staff = $query->fetch();
            return $staff;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function liststaff_except($id)
    {
        $sql = "SELECT * FROM staff where Id_staff<>$id ";
        global $db;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function rechercher_staff($email)
    {
        global $db; 
    
        $sql = "SELECT * FROM staff WHERE E_mail = :email";
    
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function liststaff()
    {
        $sql = "SELECT * FROM staff";
        global $db;
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addStaff($Staff) {
        $sql = "INSERT INTO staff  
        VALUES ('',:cin,:nom,:prenom,:Genre,:Date_Birth,:email,:tel,:password,:role)";
        global $db;
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $Staff->getcin(),
                'nom' => $Staff->getnom(),
                'prenom' => $Staff->getprenom(),
                'Genre' => $Staff->getgenre(),
                'Date_Birth' => $Staff->getDate_Birth(),
                'email' => $Staff->getE_mail(),
                'tel' => $Staff->getTel(),
                'role' => $Staff->getrole(),
                'password' => $Staff->getpassword(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletestaff($id)
    {
        $sql = "DELETE FROM staff WHERE Id_staff = :id";
        global $db;
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateStaff($id, $Staff)
    {
    global $db;
    try {
        $query = $db->prepare('UPDATE staff SET
            Id_staff=:id,
            cin= :cin,
            Nom= :nom,
            Prenom= :prenom,
            Genre=:Genre,
            Date_Birth= :date_birth,
            E_mail= :email,
            Tel= :tel,
            Password_s= :password,
            Role= :role
            WHERE Id_staff=:id');
        $query->execute([
            'id'=>$id,
            'cin' => $Staff->getcin(),
            'nom' => $Staff->getnom(),
            'prenom' => $Staff->getprenom(),
            'Genre' => $Staff->getgenre(),
            'date_birth' => $Staff->getDate_Birth(),
            'email' => $Staff->getE_mail(),
            'tel' => $Staff->getTel(),
            'role' => $Staff->getrole(),
            'password' => $Staff->getpassword(),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }

    function verif_code($code)
    {
        global $db;
        try{
            $current_time = date('Y-m-d H:i:s');
            $stmt = $db->prepare("SELECT * FROM autho_code where (code=:token) AND dateexp>:current_time ");
            $stmt->bindParam(':token', $code);
            $stmt->bindParam(':current_time', $current_time);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return $user; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}















?>