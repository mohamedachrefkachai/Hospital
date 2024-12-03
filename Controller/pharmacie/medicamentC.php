<?php
require '../../config2.php';
//table:medicament
class MedicamentC{
    public function listmedicament()
    {
        $sql = "SELECT * FROM medicament";

        $db = config2::getConnexion();
        try {
            $medicament= $db->query($sql);
            return $medicament;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function idExists($id) {
        $sql = "SELECT COUNT(*) as count FROM medicament WHERE Id_medicament = :id";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return ($count > 0);
    }

    
    function deletemedicament($ide)
    {
        $sql = "DELETE FROM medicament WHERE id_medicament = :id";   //table:medicament
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showmedicament($id)
    {
        $sql = "SELECT * from medicament where id_medicament = $id";  
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $medicament = $query->fetch(); ///nb
            return $medicament; ///nb
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function datemedicament()
{
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "SELECT * FROM medicament WHERE delai < :currentDateTime";  
    $db = config2::getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':currentDateTime', $currentDateTime, PDO::PARAM_STR);
        $query->execute();

        $medicament = $query->fetchAll(PDO::FETCH_ASSOC);
        return $medicament;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

   
    public function stockmedicament()
    {
        $sql = "SELECT * FROM medicament where  nb_stock<10";

        $db = config2::getConnexion();
        try {
            $medicament= $db->query($sql);
            return $medicament;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function updatemedicament($medicament, $id)
{
    try {
        $db = config2::getConnexion();
        $query = $db->prepare(
            'UPDATE medicament SET 
                id_medicament = :id_medicament, 
                nom_medicament = :nom_medicament, 
                nb_stock = :nb_stock, 
                prix_unitaire_vente = :prix_unitaire_vente,
                delai = :delai,
                prix_unitaire_achat = :prix_unitaire_achat
            WHERE id_medicament = :id'
        );

        $query->execute([
            'id' => $id,
            'id_medicament' => $medicament->getId_medicament(),
            'nom_medicament' => $medicament->getNom_medicament(),
            'nb_stock' => $medicament->getnb_stock(),
            'prix_unitaire_vente' => $medicament->getprix_unitaire_vente(),
            'delai' => $medicament->getdelai(),
            'prix_unitaire_achat' => $medicament->getprix_unitaire_achat(),
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
    public function ajoutmedicament($medicament){
        $sql = "INSERT INTO medicament  
        VALUES (:id, :nom,:nb, :prixv,:prixa,:delai)";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                "id"=> $medicament->getId_medicament(),
                'nom' => $medicament->getNom_medicament(),
                'nb' => $medicament->getnb_stock(),
                'prixv' => $medicament->getprix_unitaire_vente(),
                'prixa' => $medicament->getprix_unitaire_achat(),
                'delai'=> $medicament->getdelai(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}





?>