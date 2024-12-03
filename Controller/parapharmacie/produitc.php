<?php
include '../../config.php';

class produitc
{

    public function listproduit()
    {
        $sql = "SELECT * FROM produit";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($ide)
    {
        $sql = "DELETE FROM produit WHERE code_produit= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    //print_r($produit);
        //exit(0);
    }



    function addproduit($produit)
    {
        
        //print_r($produit);
        //exit(0);
        $sql = "INSERT INTO produit
        VALUES (NULL, :libelle, :prix,:image1,:description1)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            
            $query->execute([
                'libelle' => $produit->getlibelle(),
                'prix' => $produit->getprix(),
                'image1' => $produit->getimage(),
                'description1' => $produit->getdescription(),

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

  

    function showproduit($id)
    {
        $sql = "SELECT * from produit where code_produit = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit= $query->fetchAll();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateproduit($produit, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE produit SET 
                libelle = :libelle, 
                prix = :prix, 
                image = :image, 
                description = :description
            WHERE code_produit= :id'
        );
    
        $query->execute([
            'libelle' => $produit->getlibelle(),
            'prix' => $produit->getprix(),
            'image' => $produit->getimage(),
            'description'=> $produit->getdescription(),
            'id' => $id
        ]);
    
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error updating product: ' . $e->getMessage();
    }
}

}
