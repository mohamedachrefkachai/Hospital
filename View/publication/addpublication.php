<?php
require_once '../../controller/publication/PublicationCrud.php';
require_once '../../model/publication/Publication.php';
$rc = new PublicationCrud();

if(isset($_POST['name']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  
  $message = $_POST['message'];
 
  $publication = new Publication ($message,0,$name);
$rc->creer($publication);

 
  
   header("Location: com.php");
   exit();
  

}
?>