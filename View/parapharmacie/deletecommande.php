<?php
include '../../Controller/parapharmacie/commandec.php';
if (isset($_POST['id_commande'])) {
    $id_commande = $_POST['id_commande'];

    $commandec = new Commandec(); 
    $commandec->deletecommande($id_commande);
    header('Location: ../../View/parapharmacie/listcommande.php');
    exit(); 
} else {
    echo "Erreur: ID de commande non spécifié.";
}
?>
