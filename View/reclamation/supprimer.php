<?php 

if(isset($_GET['id'])) {
include_once '../config.php';
require_once '../Controller/ReclamationCrud.php';
$rc = new ReclamationCrud();

$rc->delete($_GET['id']);

  header("location: admin.php");
 

 exit();
}
