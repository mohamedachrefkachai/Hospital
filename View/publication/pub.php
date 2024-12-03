<?php
require_once '../../controller/publication/PublicationCrud.php';
require_once '../../model/publication/Publication.php';
require_once '../../controller/publication/CommentaireCrud.php';
require_once '../../model/publication/Commentaire.php';
$rc = new PublicationCrud();
$list=$rc->AffichertoutR();
$list=array_reverse($list);
$rp = new CommentaireCrud();   



?>


<!DOCTYPE html>

<html lang="en">
   
   <head>

    
      <meta charset="utf-8">
     
     
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

      <style type="">
         html,
         body {
            height: 100%;
         }

         .container-fluid {
            height: 100%;
         }

         .row {
            height: 100%;
         }

         
         .col-12.col-lg-auto.mb-3 {
            min-width: 250px;
            max-width: 200px;
            height: 100%;
            position: fixed; 
            background-color: grey;
            
         }
         

         .col {
            margin-left: 150px; 
         }

         a {
            color: white !important;
         }

         li {
            border: 1px solid #e5e5e5;
            border-radius: 20px;
            background-color: #42b883;
            color: #fff !important;
         }

         .active {
            background-color: #42b883 !important;
            border-radius: 20px;
         }
         .activebuttom {
            color: cyan !important;
            background-color: #42b883 !important;
            border-radius: 20px;

         }
         <style>
   .pagination {
      justify-content: center;
      margin-top: 20px;
   }

   .pagination .page-item.active .page-link {
      background-color: #42b883;
      border-color: #e5e5e5;
   }

   .pagination .page-link {
      color: red;
   }
 


body {
    font-family: Arial, sans-serif;
    background-color:white;
    margin: 0;
    padding: 0;
    text-align: center;
}

h1 {
    color: red;
    margin-top: 20px;
    font-weight: bold;
}

h4 {
    color: red;
}

p {
    color: red;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 2px solid #ccc;
    border-radius: 10px;
    background-color: red;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

canvas {
    margin-top: 20px;
}

.no-statistics {
    text-align: center;
    color: red;
}




</style>


   
      </head>
     
      <body>
    
      <tbody>
   <?php
      $itemsPerPage = 5; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);

      foreach ($pagedList as $p) {
   ?>
   
   <?php  }?>
</tbody><div class="container-fluid">
            <div class="row">
               <!-- Left Navigation Bar -->
               <div class="">
                  <div class="card p-3 h-100" style="background-color: #42b883 !important;">
                     <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                           


                           <hr>

                           
                           <li style="width: 270px; margin-bottom:10px; " class="nav-item"><a class="nav-link px-2" href="../User/autho_staff.php" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>Autho staff</span></a></li>

                        </ul>
                     </div>
                  </div>
               </div>

         <div class="container-fluid">
            <div class="row">
         
               <div class="col">
                  <div class="e-tabs mb-3 px-3">
                   
                  </div>
                  <div class="row flex-lg-nowrap">
                     <div class="col mb-3">
                        <div class="e-panel card">
                           <div class="card-body">
                            
                           <div class="card-title">
                              <h4 style="color:#42b883"><span>LISTES DES PUBLICATIONS</span></h4>
                           </div>
                           <div class="e-table">
                              <div class="table-responsive table-lg mt-3">
                                 <table id="publication-table" class="table table-bordered">
                                    <thead>
                                       <tr>
                                       
                                          <th>ID</th>
                                          <th class="max-width">Nom</th>
                                          <th class="sortable">Message</th>
                                          <th class="sortable">Date</th>
                                          <th class="sortable">Stat</th>
                                           <th>Supprimer</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          foreach ($list as $p) {
                                          ?>
                                     <?php
      $itemsPerPage = 5; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);
                                          }
      foreach ($pagedList as $p) {
   ?>
                                       <tr>
                                      
                                          <td class="text-nowrap align-middle"><?=$p['id'];?> </td>
                                          <td class="text-nowrap align-middle"><?=$p['nom'];?> </td>
                                          <td class="text-nowrap align-middle"> <center><div class="text-center px-xl-3">
                        <button class="btn" onclick="window.location.href='publication.php'">Plus 
  
</button></center></td>
                                          <td class="text-nowrap align-middle"><?=$p['date'];?></td>
                                          <td class="text-nowrap align-middle">  <button class="btn" onclick="window.location.href='stat.php'">Plus</button> </td>
                                           <td class="text-center align-middle">
                                             <div class="btn-group align-top">
                                            <?php 
                                            if ($p['etat']=='0')
                                            {
                                                ?>
                                                <button class="btn" onclick="window.location.href='supprimer.php?id=<?=$p['id'];?>'">
delete </button><div class="div">
  <small>
    <i></i>
  </small>
</div>
                                               
                                              
                                                <?php
                                            }
                                            else
                                            {   
                                            ?>
                                               
                                                <button  type="button" onclick="window.location.href='supprimer.php?id=<?=$p['id'];?>'"><i class="fa fa-trash"></i></button>
                                             <?php } ?>
                                             </div>
                                          </td>
                                       </tr>
                                      
                                       <?php } ?>
                                     
                                 </table>
                              </div>
                           
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-3 mb-3" style="margin-left:0px;">
                     <div class="card " >
                        <div class="card-body">
                        <div class="text-center px-xl-3">
                        <button class="btn" onclick="window.location.href='com.php'">Ajouter-publication</button>
 
                      
                            
                          
             
             
<!-- Fin modifier -->


              
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/chercher.js"></script>
      
      <?php
   $totalPages = ceil(count($list) / $itemsPerPage);

   echo '<nav aria-label="Page navigation example">';
   echo '<ul class="pagination">';

   for ($i = 1; $i <= $totalPages; $i++) {
      echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">';
      echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
      echo '</li>';
   }

   echo '</ul>';
   echo '</nav>';
?>





   </body>
</html>