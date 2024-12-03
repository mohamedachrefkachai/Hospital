<?php
require_once '../Controller/ReclamationCrud.php';
require_once '../Model/Reclamation.php';
require_once '../Controller/ReponseCrud.php';
require_once '../Model/Reponse.php';
$rc = new ReclamationCrud();
$list=$rc->readAll();
$list=array_reverse($list);
$rp = new ReponseCrud();   


?>
<!DOCTYPE html>

<html lang="en">
   
   <head>

      <!--fin script-->
      <meta charset="utf-8">
      <title>ADMIN - COMPLAINTS</title>
      <link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
      <style type="text/css">
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

         /* Adjust the styles of the left navigation bar */
         .col-12.col-lg-auto.mb-3 {
            min-width: 250px;
            max-width: 200px;
            height: 100%;
            position: fixed; /* Add this line to fix the position */
            background-color: #4AD489;
            
         }

         .col {
            margin-left: 150px; /* Adjust the margin value based on the width of the navbar */
         }

         a {
            color: white !important;
         }

         li {
            border: 1px solid #e5e5e5;
            border-radius: 20px;
            background-color: #4AD489;
            color: #fff !important;
         }

         .active {
            background-color: #4AD489 !important;
            border-radius: 20px;
         }
         .activebuttom {
            color: cyan !important;
            background-color: #4AD489 !important;
            border-radius: 20px;

         }
         .nav-item:hover {
            color: cyan !important;
            background-color: #4AD489 !important;
            border-radius: 20px;    }

    .nav-link:hover {
      color: cyan !important;
            background-color: #4AD489 !important;
            border-radius: 20px;    }
            
      </style>
      </head>

      <body>
         
    
<script>
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
   });
</script>

<div class="container-fluid">
            <div class="row">
               <!-- Left Navigation Bar -->
               <div class="col-12 col-lg-auto mb-3">
                  <div class="card p-3 h-100" style="background-color: #4AD489 ; !important;">
                     <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                           <div style="display: flex; align-items: center; margin-bottom: 0;">
                              <img src="images/logo_abir.png" alt="Logo" style="width: 80px; margin-right: 10px;">
                              <h5 style="margin-left: 0; margin-bottom: 0;">
                              <span style="color: white;"> Dashboard </span><span style="color: cyan;">Admin</span>
                              </h5>
                           </div>


                           <hr>

                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="admin.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>List of complaints</span></a></li>
                           
                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="contact.php"><i class="fa fa-home mr-1"></i><span>Complaint Space</span></a></li>
                           
                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="statis.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>statistical claim</span></a></li>
 
                        </ul>
                     </div>
                  </div>
               </div>

         <div class="container-fluid">
            <div class="row">
             
               <!-- Main Content -->
               <div class="col">
                  <div class="e-tabs mb-3 px-3">
                   
                  </div>
                  <div class="row flex-lg-nowrap">
                     <div class="col mb-3">
                        <div class="e-panel card">
                           <div class="card-body">
                            
                           <div class="card-title">
                            <center>  <h1 style="color:#4AD489;"class="mr-2"><span>List of complaints</span></h1></center>
                           </div>
                           <div class="e-table">
                              <div class="table-responsive table-lg mt-3">
                              <tbody>
   <?php
      $itemsPerPage = 5; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);

      foreach ($pagedList as $p) {
   ?>
   
   <?php  }?>
</tbody>
                                 <table id="reclamation-table" class="table table-bordered">
                                    <thead>
                                       <tr>
                                       
                                          <th>ID</th>
                                          <th class="max-width">Name</th>
                                          <th class="max-width">Number</th>
                                          <th class="sortable">E-mail</th>
                                          <th class="sortable">Message</th>
                                          <th class="sortable">Claim status</th>
                                          <th class="sortable">Date</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          foreach ($list as $p) {
                                          ?> <?php
                                          $itemsPerPage = 5; // Adjust the number of items per page as needed
                                          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                          $offset = ($currentPage - 1) * $itemsPerPage;
                                          $pagedList = array_slice($list, $offset, $itemsPerPage);
                                                                              }
                                          foreach ($pagedList as $p) {
                                       ?>
                                       <!--personne wehed-->
                                       <tr>
                                      
                                          <td class="text-nowrap align-middle"><?=$p['id'];?> </td>

                                          <td class="text-nowrap align-middle"><?=$p['nom'];?> </td>
                                          <td class="text-nowrap align-middle"><?=$p['tel'];?> </td>
                                          <td class="text-nowrap align-middle"><?=$p['email'];?></td>
                                          <td class="text-nowrap align-middle"><button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user-form-<?=$p['id'];?>" id="button" >See Complaint</button></td>
                                            <?php
                                             if($p['etat']=='0') 
                                             {echo '<td class="text-center align-middle"><i class="fa fa-fw text-secondary cursor-pointer fa-toggle-off"></i></td>';
                                             }
                                             else 
                                                {echo '<td class="text-center align-middle"><i class="fa fa-fw text-secondary cursor-pointer fa-toggle-on" style="color: #4AD489 !important;"></i></td>';} 
                                                   ?>   
                                                                                             <td class="text-nowrap align-middle"><?=$p['date'];?></td>
 
                                          <td class="text-center align-middle">
                                             <div class="btn-group align-top">
                                            <?php 
                                            if ($p['etat']=='0')
                                            {
                                                ?>
                                                <button class="btn btn-sm btn-outline-success badge" type="button" data-toggle="modal" onclick="window.location.href='activer.php?act=1&id=<?=$p['id'];?>'" > Resolved</button>
                                                <button class="btn btn-sm btn-outline-warning badge" type="button" data-toggle="modal" onclick="window.location.href='activer.php?act=0&id=<?=$p['id'];?>'" disabled >Unresolved</button>
                                                <button class="btn btn-sm btn-outline-danger badge" type="button" onclick="window.location.href='supprimer.php?id=<?=$p['id'];?>'"><i class="fa fa-trash"></i></button>
                                                <?php
                                            }
                                            else
                                            {   
                                            ?>
                                                <button class="btn btn-sm btn-outline-success badge" type="button" data-toggle="modal" onclick="window.location.href='activer.php?act=1&id=<?=$p['id'];?>'" disabled >Resolved</button>
                                                <button class="btn btn-sm btn-outline-warning badge" type="button" data-toggle="modal" onclick="window.location.href='activer.php?act=0&id=<?=$p['id'];?>'" > Unresolved</button>
                                                <button class="btn btn-sm btn-outline-danger badge" type="button" onclick="window.location.href='supprimer.php?id=<?=$p['id'];?>'"><i class="fa fa-trash"></i></button>
                                             <?php } ?>
                                             </div>
                                          </td>
                                       </tr>
                                       <!--fin personne-->
                                       <?php } ?>
                                       <!--fin boucle-->
                                 </table>
                                 <nav aria-label="Page navigation">
   <ul class="pagination justify-content-center"> 
      <?php
         $totalPages = ceil(count($list) / $itemsPerPage);

         echo '<nav aria-label="Page navigation example">';
         echo '<ul class="pagination justify-content-center">';

         if ($currentPage > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '"style="background-color: #4AD489; color: #ffffff;">Previous</a></li>';
         }

         for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">';
            echo '<a class="page-link" href="?page=' . $i . '" style="background-color: #4AD489; color: #ffffff;">' . $i . '</a>';
            echo '</li>';
         }

         if ($currentPage < $totalPages) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '"style="background-color: #4AD489; color: #ffffff;">Next</a></li>';
         }

         echo '</ul>';
         echo '</nav>';
      ?>
   </ul>
</nav>

                               
                       
                              </div>
                           
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-3 mb-3" style="margin-left:0px;">
                  
                        

                          
                           <div class="e-navlist e-navlist--active-bold">
                              <ul class="nav">
                                 <li class="nav-item active"><a href="" class="nav-link"><span>All</span>&nbsp;<small>/&nbsp;<?= count($list) ?></small></a></li>
                                 <?php
                                 $count = 0;
                                 foreach ($list as $p) {
                                  if($p['etat'] == '0') {
                                   $count++;
                                  }
                                 }
                                 ?>
                                 <li class="nav-item"><a href="" class="nav-link"><span>Unresolved</span>&nbsp;<small>/&nbsp;<?= $count ?></small></a></li>
                              </ul>
                           </div>
                           <hr class="my-3">
                           <br>
                           <div>
                            
                              <div class="form-group">
                                 <label>Search with Name</label>
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="Nom" value="" id="search-name">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Search with ID</label>
                                 <div>
                                    <input class="form-control w-100" type="number" placeholder="ID" value="" id="search-id">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Search with Number</label>
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="Numero" value="" id="search-num">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Search with E-MAIL</label>
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="E-Mail" value="" id="search-email">
                                 </div>
                              </div>
                           </div>
                           <hr class="my-3">
                           <div class="">


                        </div>
                     </div>
                  </div>
               </div>
               <!-- modifier-->
               <?php
$list2 = $rc->readAll();

foreach ($list2 as $p) {
   $reponces = $rp->getReponseByIdReclamation($p['id']);
  // print_r($reponces);
?>
    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-<?= $p['id']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complaint n°<?=$p['id'];?></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:red;">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" action="repondre.php?id=<?= $p['id']; ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col" style="margin-left:0px;">
                                            <div class="form-group">
                                                <label style="color:#4AD489;"><h3>Claim :</h3> </label>
                                                <textarea class="form-control" id="nom" name="nom" rows="5" disabled><?= $p['reclamation'] ?></textarea>
                                                <hr>
                                                <?php if ((isset ($reponces))&&(!empty($reponces))) { ?>
                                                <label style="color:#4AD489;"><h5>List of answers:</h5> </label>
                                                   <?php foreach($reponces as $rps) { ?>
                                                <h6> Admin to: <?=$rps['date']?> </h6>
                                                <textarea class="form-control" id="reponse" name="reponse" rows="2" disabled ><?=$rps['reponse'];?></textarea>

                                                   <?php }}?>
                                                <br>
                                                <?php if($p['etat']==0) {?>
                                                <label style="color:#4AD489;"><h5>Response from the administration:</h5> </label>
                                                <textarea class="form-control" id="reponse" name="reponse" rows="5" ></textarea>
                                                <br>
                                                <hr>
                                                <button class="btn btn-success btn-block" type="submit" data-toggle="modal" >Answer</button>

                                                <?php } ?>
                                             </div>
                                        </div>

                                    </div>

                                  
                                   

                                   
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} ?>
<!-- Fin modifier -->


              
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/chercher.js"></script>
      
    
   </body>
</html>