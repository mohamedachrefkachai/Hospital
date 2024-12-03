<?php 

if(isset($_GET['id'])) {

 include_once '../../config.php';
 include_once '../../controller/publication/PublicationCrud.php';
$rc = new PublicationCrud();

$rc->delete($_GET['id']);
  
  header("location: pub.php"); 
 exit(); 
}
