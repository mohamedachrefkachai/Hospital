<?php
include "../../Controller/rendez-vous/dateC.php";

if (isset($_POST["suppdate"])) {
    $id = $_POST["delete"];
    $dateC= new dateC();
    $dateC-> suppdate($id);

    header('Location: ../../View/rendez-vous/listdate.php');
    exit();
}
?>
