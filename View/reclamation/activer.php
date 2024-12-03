<?php 
if(isset($_GET['id']) && isset($_GET['act'])) {
 include_once '../config.php';
 include_once '../Controller/ReclamationCrud.php';
$rc = new ReclamationCrud();
if ($_GET['act']=='1')
$rc->activate($_GET['id']);
else 
$rc->deactivate($_GET['id']);
header("location: admin.php");
 exit();
}
