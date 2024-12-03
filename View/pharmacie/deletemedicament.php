<?php
include "../../Controller/pharmacie/medicamentC.php";


if (isset($_POST["delete"])) {
    $id = $_POST["todelete"];
    $MedicamentC = new MedicamentC();
    $MedicamentC->deletemedicament($id);

    header('Location: affichermedicament.php');
    exit();
}
?>
