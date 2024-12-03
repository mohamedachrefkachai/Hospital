<?php

require '../../config.php';

class rendezvousC
{

    public function listrendez_vous()
    {
        $sql = "SELECT * FROM consultation";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function supprendez_vous($ide)
    {
        $sql = "DELETE FROM consultation WHERE idrendezvous = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajoutrendez_vous($rendezvous)
{
    // Get the maximum number of appointments allowed per doctor
    $maxAppointmentsPerDoctor = 5; // Adjust this value as needed

    // Check if the maximum number of appointments is reached for the given doctor and date
    $currentAppointments = $this->getNbRdvPourMedecinEtDate($rendezvous->getnommedecin(), $rendezvous->getdate());

    if ($currentAppointments >= $maxAppointmentsPerDoctor) {
        echo "Maximum number of appointments reached for this doctor on this date. Cannot add a new appointment.";
        return;
    }

    // Proceed with the appointment insertion
    $sql = "INSERT INTO consultation 
            VALUES (:idrendezvous, :idpatient, :specialite, :nommedecin, :date1, :heure, :email)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idrendezvous' => $rendezvous->getidrendezvous(),
            'idpatient' => $rendezvous->getidpatient(),
            'specialite' => $rendezvous->getspecialite(),
            'nommedecin' => $rendezvous->getnommedecin(),
            'date1' => $rendezvous->getdate(),
            'heure' => $rendezvous->getheure(),
            'email' => $rendezvous->getemail()
        ]);

        echo "Appointment added successfully.";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function getNbRdvPourMedecinEtDate($nommedecin, $date)
    {
        // Assurez-vous que le nom de la colonne est correct dans la requête SQL
        $sql = "SELECT COUNT(*) as nbRdv FROM consultation WHERE nommedecin = :nommedecin AND daterendezvous = :date";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':nommedecin', $nommedecin);
            $query->bindParam(':date', $date);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['nbRdv'];
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    public function getNbRdvPourMedecinEtHeure($nommedecin, $heure)
{
    $sql = "SELECT COUNT(*) as nbRdv FROM consultation WHERE nommedecin = :nommedecin AND heure = :heure";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':nommedecin', $nommedecin);
        $query->bindParam(':heure', $heure);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['nbRdv'];
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}   


    function showrendez_vous($id)
    {
        $sql = "SELECT * from consultation where idrendezvous = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $rendezvous = $query->fetch();
            return $rendezvous;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function modifrendez_vous($rendezvous,$id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE consultation SET  
                    idrendezvous = :id,
                    idpatient = :idpatient, 
                    specialite = :specialite,
                    nommedecin = :nommedecin,
                    daterendezvous = :datee,
                    heure = :heure,
                    email = :email
                WHERE idrendezvous= :id'
            );
            
            $query->execute([
                'id'=>$id,
                'datee' => $rendezvous->getdate(),
                'idpatient' => $rendezvous->getidpatient (),
                'specialite' => $rendezvous->getspecialite(),
                'nommedecin' => $rendezvous->getnommedecin(),
                'heure' => $rendezvous->getheure(),
                'email' => $rendezvous->getemail(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
