<?php
include '../../config.php';

//table:ordonnance
class OrdonnanceC{
    public function listordonnance()
    {
        $sql = "SELECT * FROM ordonnance";

        $db = config::getConnexion();
        try {
            $ordonnance= $db->query($sql);
            return $ordonnance;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    /*public function idExists($id) {
        $sql = "SELECT COUNT(*) as count FROM ordonnance WHERE Id_ordonnance = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return ($count > 0);
    }*/

    function deleteordonnance($ide)
    {
        $sql = "DELETE FROM ordonnance WHERE id_ordonnance = :id";   //table:ordonnance
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showordonnance($id)
    {
        $sql = "SELECT * from ordonnance where id_ordonnance = $id";  
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ordonnance = $query->fetch(); 
            return $ordonnance; 
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   /* function getlastid1(){
        $sql = "SELECT max(id_ordonnance) from ordonnance ";  
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ordonnance = $query->fetchAll(); 
            return $ordonnance; 
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

    }*/
    public function getlastid()
    {
        $nextIdQuery = "SELECT MAX(id_ordonnance) AS max_id FROM ordonnance";
        $db = config::getConnexion();
        try {
            $result = $db->query($nextIdQuery);
            $row = $result->fetch();
            return $row['max_id'] + 1;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function nombremedicament($id)
    {
        $query = "SELECT COUNT(id_medicament) AS n from ordonnance where id_ordonnance=:id ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($query);
            $query->bindValue(':id', $id);
            $query->execute();
            $result = $query->fetch();
            return $result['n'];  // Utilisez la même alias définie dans la requête
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function searchordonnance($id)
    {
        $sql = "SELECT * from ordonnance where id_patient=:id";  
        $db = config::getConnexion();
        
        try {

            $query = $db->prepare($sql);
            $query->bindValue(':id',$id);
            $query->execute();
            $ordonnance = $query->fetchAll(); 
            return $ordonnance; 
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getPrixUnitaireMedicament($id_medicament)
    {
        $db = config::getConnexion();
    
        $sql = "SELECT prix_unitaire_vente FROM medicament WHERE id_medicament = :id_medicament";
    
        $query = $db->prepare($sql);
        $query->bindValue(':id_medicament', $id_medicament);
        $query->execute();
    
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return $result['prix_unitaire_vente'];
        } else {
            return 0; // ou une valeur par défaut
        }
    }
 
    public function updateStock($id_medicament, $quantityOrdered)
{
    $db = config::getConnexion();

    
    $sqlUpdateStock = "UPDATE medicament SET nb_stock = nb_stock - :quantity WHERE id_medicament = :id_medicament";
    $queryUpdateStock = $db->prepare($sqlUpdateStock);
    $queryUpdateStock->bindValue(':quantity', $quantityOrdered);
    $queryUpdateStock->bindValue(':id_medicament', $id_medicament);
    $queryUpdateStock->execute();
}
public function updateCommande($id_ordonnance)
{
    $db = config::getConnexion();

    $sqlUpdateCommande = "UPDATE ordonnance SET etat = :commande WHERE id_ordonnance = :id_ordonnance";
    $queryUpdateCommande = $db->prepare($sqlUpdateCommande);
    $queryUpdateCommande->bindValue(':id_ordonnance', $id_ordonnance);
    $queryUpdateCommande->bindValue(':commande', 'commande');
    $queryUpdateCommande->execute();
}

public function getOrdonnanceInfoWithMedicaments($id_ordonnance)
{
    $db = config::getConnexion();

    
    $sql = "SELECT o.*, m.* FROM ordonnance o
            JOIN medicament m ON o.id_medicament = m.id_medicament
            WHERE o.id_ordonnance = :id_ordonnance";

    $query = $db->prepare($sql);
    $query->bindValue(':id_ordonnance', $id_ordonnance);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        $ordonnanceInfo = [
            'id_ordonnance' => $result[0]['id_ordonnance'],
            'date_ordonnance' => $result[0]['date_ordonnance'],
            'id_patient' => $result[0]['id_patient'],
            'id_staff' => $result[0]['id_staff'],
            'medicaments' => $result
        ];

        return $ordonnanceInfo;
    } else {
        return [];
    }
}
    public function listcommande(){
        $sql = "SELECT * FROM ordonnance where  etat='commande'";

        $db = Config::getConnexion();
        try {
            $ordonnance= $db->query($sql);
            return $ordonnance;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function modifierOrdonnance($ordonnance, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ordonnance SET 
                    id_medicament = :id_medicament, 
                    nb_packet = :nb_packet, 
                    id_staff = :id_staff, 
                    id_patient = :id_patient,
                    duree = :duree,
                    frequence = :frequence,
                    date_ordonnance = :date_ordonnance ,
                    etat = :etat 
                WHERE id_ordonnance = :id'
            );

            $query->execute([
                'id' => $id,
                'id_medicament' => $ordonnance->getid_medicament(),
                'nb_packet' => $ordonnance->getnb_packet(),
                'id_staff' => $ordonnance->getid_staff(),
                'id_patient' => $ordonnance->getid_patient(),
                'duree' => $ordonnance->getduree(),
                'frequence' => $ordonnance->getfrequence(),
                'date_ordonnance' => $ordonnance->getdate_ordonnance(),
                'etat' => $ordonnance->getetat(),
            ]);

            echo $query->rowCount() . " enregistrements mis à jour avec succès <br>";
        } catch (PDOException $e) {
        
            echo "Erreur PDO lors de la modification de l'ordonnance : " . $e->getMessage();
        }
    }
public function ajoutordonnance($ordonnance){
    $sql = "INSERT INTO ordonnance  
    (id_ordonnance,id_medicament, nb_packet, id_staff, id_patient, duree, date_ordonnance, frequence,etat)
    VALUES (:idordonnance,:idmedicament, :nb_packet, :id_staff, :idpatient, :duree, :date_ordonnance, :frequence,:etat)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            "idordonnance"=>$ordonnance->getid_ordonnance(),
            "idmedicament"=> $ordonnance->getId_medicament(),
            'nb_packet' => $ordonnance->getnb_packet(),
            'id_staff' => $ordonnance->getid_staff(),
            'idpatient' => $ordonnance->getid_patient(),
            'duree' => $ordonnance->getduree(),
            'date_ordonnance'=> $ordonnance->getdate_ordonnance(),
            'frequence'=> $ordonnance->getfrequence(),
            'etat' => $ordonnance->getetat(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



}





?>