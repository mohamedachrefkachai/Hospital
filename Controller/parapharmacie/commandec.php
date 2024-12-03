<?php
include '../../config.php';

class commandec
{

    public function listcommande()
    {
        $sql = "SELECT * FROM commande";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecommande($ide)
    {
        $sql = "DELETE FROM commande WHERE id_commande= :id";
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

    public function addCommande(Commande $commande, $id_panier,$quantite)
    {
        $sql = "INSERT INTO commande 
                VALUES (NULL, :code_produit, :nom, :prenom, :adresse, :gsm, :email, :date_commande, :id_panier,:quantite)";
        
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
    
            $query->execute([
                'code_produit' => $commande->getcode_produit(),
                'nom' => $commande->getnom(),
                'prenom' => $commande->getprenom(),
                'adresse' => $commande->getadresse(),
                'gsm' => $commande->getgsm(),
                'email' => $commande->getemail(),
                'date_commande' => $commande->getdate_commande(),
                'id_panier' => $id_panier,
                'quantite'=> $quantite,
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    


    function showcommande($id)
    {
        $sql = "SELECT * from commande where id_commande = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commande= $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updatecommande($commande, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    code_produit = :code_produit, 
                     nom = :nom, 
                     prenom= :prenom, 
                    adresse = :adresse,
                    gsm = :gsm,
                    email = :email,
                    date_commande = :date_commande,
                    id_panier = :id_panier,
                    quantite = :quantite,
                WHERE id_commande= :id'
            );
        
            $query->execute([
                'code_produit' => $commande->getcode_produit(),
                'nom' => $commande->getnom(),
                'prenom' => $commande->getprenom(),
                'adresse' => $commande->getadresse(),
                'gsm' => $commande->getgsm(),
                'email' => $commande->getemail(),
                'date_commande' => $commande->getdate_commande(),
                'id_panier' => $commande->getid_panier(),
                'quantite' => $commande->getquantite(),
                'id' => $id
            ]);
        
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error updating product: ' . $e->getMessage();
        }
    }
    public function getNextIdPanier()
    {
        $nextIdQuery = "SELECT MAX(id_panier) AS max_id FROM commande";
        $db = config::getConnexion();
        try {
            $result = $db->query($nextIdQuery);
            $row = $result->fetch();
            return $row['max_id'] + 1;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    }

