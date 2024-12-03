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

    <style>
 body {
            background: #eee;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #42b883;
            padding: 10px;
            color: white;
            text-align: center;
        }

        body {
            padding-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            margin: 0 auto;
            max-width: 800px;
        }

        .form-control {
            width: 100%;
            height: 140px;
            resize: none;
            border: 2px solid #eee;
            margin-bottom: 10px;
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid #42b883;
        }

        .comment-area {
            position: relative;
        }

        .emojis {
            position: absolute;
            list-style: none;
            padding: 10px;
            border: 2px solid #eee;
            border-radius: 36px;
            display: flex;
            top: -25px;
            right: 27px;
            background-color: #fff;
        }

        .emojis li {
            cursor: pointer;
        }

        .post-btn {
            height: 50px;
            font-size: 16px;
            background: #42b883;
            color: white;
            border: none;
            cursor: pointer;
        }

        .top-comment {
            background-color: #eee;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 40px;
            margin-bottom: 5px;
        }

        .user-comment-text {
            font-size: 14px;
        }
   
    </style>
</head>
<body>

<nav>
       <center><h1 >ESPACE DE PUBLICATION</h1></center> 
    </nav>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Publication</th>
                </tr>
            </thead>
            <tbody>
            <?php
      $itemsPerPage = 1; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);

      foreach ($pagedList as $p) {
   ?>
   
   <?php  }?>
           
            <?php
            $list2 = $rc->AffichertoutR();
            foreach ($list2 as $p) {
                $commentaires = $rp->getCommentaireByIdPublication($p['id']);
            ?>
             <?php
      $itemsPerPage = 1; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list2, $offset, $itemsPerPage);
                                          }
      foreach ($pagedList as $p) {
   ?>
                <tr>
                    <td> 
                       
                 

   <div class="modal fade" role="dialog" tabindex="-1" id="user-form-<?= $p['id']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               

                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" action="repondre.php?id=<?= $p['id']; ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col" style="margin-left:0px;">
                                            <div class="form-group">
                                                <label style="color:#42b883;"><h3>PUBLICATION :</h3> </label>
                                                <textarea class="form-control" id="nom" name="nom" rows="5" disabled><?= $p['publication'] ?></textarea>
                                                <hr>

                                                <?php if ((isset ($commentaires))&&(!empty($commentaires))) { ?>
                                                <label style="color:#42b883;"><h4>Les commentaires:</h4> </label>
                                                   <?php foreach($commentaires as $rps) { ?>
                                                <h6>Commentaire : <?=$rps['date']?> </h6>
                                                <textarea class="form-control" id="commentaire" name="commentaire" rows="2" disabled ><?=$rps['commentaire'];?></textarea>

                                                   <?php }}?>
                                                <br>
                                                <?php if($p['etat']==0) {?>
                                                <label style="color:#42b883;"><h5>votre commentaire :</h5> </label>
                                                <textarea class="form-control" id="commentaire" name="commentaire" rows="5" ></textarea>
                                                
                                                <br>
                                                <hr>
                                                <button  > <span class="text"class="button" onclick="window.location.href='publication.php'">Publier</span></button>

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
                     </div>
                  </div>
               </div>
                    </td>
                   
                </tr>
          
          
        </tbody>
    </table> </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
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

    
        </ul>
    </nav>

   </body>
</html>