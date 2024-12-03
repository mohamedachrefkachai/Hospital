<?php
include "../../Controller/pharmacie/OrdonnanceC.php";

if (isset($_POST["delete"])) {
    $id = $_POST["todelete"];
    $OrdonnanceC = new OrdonnanceC();
    $OrdonnanceC->deleteordonnance($id);

    header('Location: afficheordonnance.php');
    exit();
}
?>
