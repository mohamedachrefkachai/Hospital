<?php

require_once '../../model/publication/Commentaire.php';
require_once '../../model/publication/Publication.php';
require_once '../../controller//publication/PublicationCrud.php';
require_once '../../controller/publication/CommentaireCrud.php';
//creer instances des classes ReponseCrud/ReclamationCrud  utilisées pour effectuer des methodes CRUD 
$rp = new CommentaireCrud();
$rc = new PublicationCrud();
//isset : vérifier si une variable est définie et n'est pas (null) renvoie true si la variable est définie et false si ne l'est pas
if(isset($_POST['commentaire']) && isset($_GET['id'])) {
 $txt = $_POST['commentaire'];
 $id_publication = $_GET['id'];
 $id_admin = 1;
 $publication = $rc->Afficher1R($id_publication);
 $commentaire = new Commentaire($txt, new DateTime(), 0, $id_admin, $id_publication);
$rp->creer($commentaire);

   header("Location:pub.php");//envoie une entête HTTP pour rediriger l'utilisateur vers la page PUB.php après l'exécution du script

   exit();
  

}
?>
