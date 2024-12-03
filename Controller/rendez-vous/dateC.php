<?php

require '../../config1.php';

class dateC
{

    public function listdate()
    {
        $sql = "SELECT * FROM date";

        $db = config1::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function suppdate($ide)
    {
        $sql = "DELETE FROM date  WHERE iddate = :id";
        $db = config1::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajoutdate($date)
    {
        $sql = "INSERT INTO date(nommedecin,date,idpatient,heure)
        VALUES ( :nommedecin, :date,:idpatient,:heure)";
        $db = config1::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
               
                'nommedecin' => $date->getnommedecin(),
                'date' => $date->getdate(),
                'idpatient' => $date->getidpatient(),
                'heure' => $date->getheure(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showdate($id)
    {
        $sql = "SELECT * from date where iddate = $id";
        $db = config1::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $date = $query->fetch();
            return $date;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function modifdate($date,$id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE date SET 
                    idstaf = :idstaff,
                    date = :date1, 
                    nbrendezvous = :nbrendezvous,
                    heure = :heure
                WHERE iddate= :id'
            );
            
            $query->execute([
                'id' => $id,
                'idstaff' => $date->getidstaff(),
                'date1' => $date->getdate(),
                'rendezvous' => $date->getnbrendezvous(),
                'heure' => $date->getheure(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
