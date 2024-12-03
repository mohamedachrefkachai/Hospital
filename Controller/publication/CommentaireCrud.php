<?php 
include_once '../../config.php';
include_once '../../model/publication/Commentaire.php';

         class CommentaireCrud {
    public function creer($commentaire) {
        $conn  = config::getConnexion();
        $now = new DateTime(); 
        $formattedDateTime = $now->format('Y-m-d H:i:s');
        $stmt = $conn->prepare("INSERT INTO commentaire (id_admin, id_publication, commentaire, date) VALUES (:id_admin, :id_publication, :commentaire, :date)");
        $stmt->bindParam(':id_admin', $commentaire->getIdAdmin());
        
        $stmt->bindParam(':id_publication',$commentaire->getIdPublication());
        $stmt->bindParam(':commentaire',$commentaire->getCommentaire());
        $stmt->bindParam(':date',$formattedDateTime);
        
        $stmt->execute();
 }

    
    public function getCommentaireByIdPublication($id) {
     $conn  = config::getConnexion();
         $stmt = $conn->prepare("SELECT * FROM commentaire WHERE id_publication = :id");
         $stmt->bindParam(':id', $id);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }

    public function deleteCommentaire($id) {
     $conn  = config::getConnexion();
         $stmt = $conn->prepare("DELETE FROM commentaire WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->execute();
 }
 
   }