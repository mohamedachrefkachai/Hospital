<?php
include "../../Controller/rendez-vous/rendez-vousC.php";
$id = $_POST["delete"];

$rendezvousC = new rendezvousC();
$rendezvousC->supprendez_vous($id);
header('Location:listrendez-vous.php');
?>