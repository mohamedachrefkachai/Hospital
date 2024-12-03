<?php
require_once '../Controller/ReclamationCrud.php';
require_once '../Model/Reclamation.php';
$rc = new ReclamationCrud();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $tel = $_POST['tel'];
  $reclamation = new Reclamation($message,0,$name,$email,$tel);
//print_r($reclamation);
$rc->create($reclamation);

 //$rc->sendMailReclamation($name,$email,$message);
 
  
   header("Location: contact.php");
   exit();
  

}
?>