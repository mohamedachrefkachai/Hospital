<?php

include_once '../../config.php';
include_once '../../model/publication/Publication.php';



class PublicationCrud 
{     
   public function getEventStatistics()
    {
        $sql = "SELECT nom, COUNT(*) AS count FROM Publication GROUP BY nom";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $publicationStatistics = [];
            foreach ($statistics as $stat) {
                $publicationStatistics[$stat['nom']] = $stat['count'];
            }
            return $publicationStatistics;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
      public function creer($publication){
        
        $db = config::getConnexion();
             try{
            
             $req = $db->prepare('INSERT INTO `publication` (`id`, `publication`, `date`,`etat`, `nom`) VALUES (NULL, :publication, :date, :etat, :nom )');
             $now = new DateTime(); 
             $formattedDateTime = $now->format('Y-m-d H:i:s'); 
             
             $req->execute([
             'publication' => $publication->getPublication(),
             'etat' => "0",
             'date' => $formattedDateTime,
             'nom' => $publication->getNom(),
             
                           ]);
  }        
             catch(Exception $e){
             die('Error :'.$e->getMessage()); 
                                }
                                         }
     
       public function AffichertoutR(){
        $db = config::getConnexion();
             try{
             //  sélectionner toutes l/c de la table
             $req = $db->prepare('SELECT * FROM `publication`');
             $req->execute(); //La requête préparée est exécutée
             $result = $req->fetchAll(PDO::FETCH_ASSOC); //récupère toutes les lignes de résultat de la requête préparée.
             return $result;
                }
             catch(Exception $e){
             die('Error :'.$e->getMessage());
                                }
                                      }
        
        public function afficher1R($id){
          $db = config::getConnexion();
               try{
                 //sélectionner une réclamation par son ID
               $req = $db->prepare('SELECT * FROM `publication` WHERE `id` = :id');
               $req->execute([ 'id' => $id, ]);
               $result = $req->fetch(PDO::FETCH_ASSOC);
               return $result;
                }
               catch(Exception $e){
               die('Error :'.$e->getMessage());
                                   }
                                        }
  

       public function delete($id) {
        $db = config::getConnexion();
            try {
       
        $deleteCommentaires = $db->prepare('DELETE r FROM `commentaire` r INNER JOIN `publication` rec ON r.id_publication = rec.id WHERE rec.id = :id');
        $deleteCommentaires->execute(['id' => $id]);

       
        $deletePublication = $db->prepare('DELETE FROM `publication` WHERE `id` = :id');
        $deletePublication->execute(['id' => $id]);

               }
             catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();

                                       }
                                    }

                                    
  }
 
