<?php
include "../../Controller/User/StaffC.php";
include "../../View/User/send_code.php";
$StaffC = new StaffC();

if(isset($_POST['subb']))
{
    $id_staff=$_GET['auth'];
    $code=$_POST['code'];
    $user=$StaffC->verif_code($code);

    if($user)
    {
        $staff=$StaffC->showStaff($id_staff);
        authou($staff);
    }
    else
    {
        echo 'Expert Code';
    }

}




function authou($autho)
{
  ?>
  <span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <title>STAFF</title>
        <style>
          
          .main-top input{
          position: absolute;
          top: 0;
          right: 0;
          margin: 10px 30px;
          color: rgb(110, 109, 109);
          cursor: pointer;
          }
    
          .main-top button {
    margin-left: 60%;
    padding: 10px 20px; /* Adjust padding as needed */
    font-size: 16px; /* Adjust font size as needed */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}
.dark-mode .main-top button {
    background-color: black;
    color: white;
}
          .dark-mode {
  background-color: black;
  color: white;
}

        </style>
        <link rel="stylesheet" href="../../tools/User/style_staff.css"/>
        <link rel="shortcut icon" type="image/png" href="../../tools/User/logo.png">
        <script src="https://kit.fontawesome.com/02b26050de.js" crossorigin="anonymous"></script>
        <script>
  function myFunction() {
    console.log("here");
    var element = document.body;
    element.classList.toggle("dark-mode");
  }
</script>
      </head>
      <body>
        <div class="container">
          <nav>
            <ul>
              <li><a href="update_staff_self.php?auth=<?= $autho['Id_staff']?>" class="logo" target="here">
                <img src="../../tools/User/icon.png">
                <span class="nav-item" style="color: #4AD489;"><?php echo $autho['Role']; ?></span>
              </a></li>
              <?php if ($autho['Role'] == 'Administrator') { ?>
                <li><a href="estimate.php" target="here">
                      <i class="fas fa-address-card"></i>
                      <span class="nav-item">Estimate STAFF</span>
                  </a></li>
                  <li><a href="announ_staff.php?staff_id=<?= $autho['Id_staff']?>&role_staff=<?= $autho['Role']?>" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">Announcement STAFF</span>
                  </a></li>
                  <li><a href="add_staff.php" target="here">
                      <i class="fas fa-address-card"></i>
                      <span class="nav-item">ADD STAFF</span>
                  </a></li>
                  <li><a href="ListeStaff.php" target="here">
                      <i class="fas fa-code"></i>
                      <span class="nav-item">View STAFF</span>
                  </a></li>
                  <li><a href="manage_staff.php?staff_id=<?= $autho['Id_staff']?>" target="here">
                      <i class="fas fa-wrench"></i>
                      <span class="nav-item">Manage STAFF</span>
                  </a></li>
                  <li><a href="ListePatient.php" target="here">
                      <i class="fas fa-house-user"></i>
                      <span class="nav-item">View Patient</span>
                  </a></li>
                  <li><a href="manage_patient.php" target="here">
                      <i class="fas fa-wrench"></i>
                      <span class="nav-item">Manage Patient</span>
                  </a></li>
                  <li><a href="../../View/parapharmacie/listproduit.php" target="here">
                      <i class="fas fa-print"></i>
                      <span class="nav-item">List produit</span>
                  </a></li>
            
                  <li><a href="../../View/parapharmacie/listcommande.php" target="here">
                      <i class="fas fa-print"></i>
                      <span class="nav-item">List command</span>
                  </a></li>
                  <li><a href="../../View/parapharmacie/client.php" target="here">
                      <i class="fas fa-magnifying-glass"></i>
                      <span class="nav-item">search for product</span>
                  </a></li>
                 
                  

              <?php  } ?>
              <?php if ($autho['Role'] == 'Medecin') { ?>
                <li><a href="announ_staff.php?staff_id=<?= $autho['Id_staff']?>&role_staff=<?= $autho['Role']?>" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">Announcement STAFF</span>
                  </a></li>
                <li><a href="ListePatient.php" target="here">
                      <i class="fas fa-house-user"></i>
                      <span class="nav-item">View Patient</span>
                  </a></li>
                  <li><a href="../pharmacie/nombre1.php?auth=<?= $autho['Id_staff']?>" target="here">
                  <i class="fas fa-file-circle-plus"></i>
                      <span class="nav-item">Add Prescription</span>
                  </a></li>
                  <li><a href="../pharmacie/afficherormed.php" target="here">
                  <i class="fas fa-file-circle-plus"></i>
                      <span class="nav-item">View Ordonnance</span>
                  </a></li>

                  <li><a href="../../View/rendez-vous/listrendez-vous.php" target="here">
                      <i class="fas fa-magnifying-glass"></i>
                      <span class="nav-item">appointment list</span>
                  </a></li>
                  
              <?php  } ?>

              <?php if ($autho['Role'] == 'Infermiére') { ?>
                <li><a href="announ_staff.php?staff_id=<?= $autho['Id_staff']?>&role_staff=<?= $autho['Role']?>" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">Announcement STAFF</span>
                  </a></li>
              <?php  } ?>
              <?php if ($autho['Role'] == 'Assistant') { ?>
                <li><a href="announ_staff.php?staff_id=<?= $autho['Id_staff']?>&role_staff=<?= $autho['Role']?>" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">Announcement STAFF</span>
                  </a></li>
                <li><a href="ListePatient.php" target="here">
                      <i class="fas fa-house-user"></i>
                      <span class="nav-item">View Patient</span>
                  </a></li>
              <?php  } ?>
              <?php if ($autho['Role'] == 'Pharmacien') { ?>
                <li><a href="announ_staff.php?staff_id=<?= $autho['Id_staff']?>&role_staff=<?= $autho['Role']?>" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">Announcement STAFF</span>
                  </a></li>
                  <li><a href="../pharmacie/ajoutmedicament.php" target="here">
                      <i class="fas fa-suitcase-medical"></i>
                      <span class="nav-item">Add drugs</span>
                  </a></li>
                  <li><a href="../pharmacie/affichermedicament.php" target="here">
                      <i class="fas fa-kit-medical"></i>
                      <span class="nav-item">View drugs</span>
                  </a></li>
                  <li><a href="../pharmacie/afficheordonnance.php" target="here">
                      <i class="fas fa-prescription-bottle-medical"></i>
                      <span class="nav-item">View Prescription</span>
                  </a></li>
                  <li><a href="../pharmacie/client.php" target="here">
                      <i class="fas fa-magnifying-glass"></i>
                      <span class="nav-item">Recherche Prescription</span>
                  </a></li>
                  <li><a href="../pharmacie/affichermedicament1.php" target="here">
                      <i class="fas fa-wrench"></i>
                      <span class="nav-item">Manage drugs</span>
                  </a></li>
                  <li><a href="../pharmacie/stock.php" target="here">
                      <i class="fas fa-cubes-stacked"></i>
                      <span class="nav-item">Low stock</span>
                  </a></li>
                  <li><a href="../pharmacie/date.php" target="here">
                      <i class="fas fa-wrench"></i>
                      <span class="nav-item">Expired medication</span>
                  </a></li>
                  <li><a href="../pharmacie/listcommande.php" target="here">
                      <i class="fas fa-scroll"></i>
                      <span class="nav-item">List of medications ordered</span>
                  </a></li>
                    
              <?php  } ?>
              <li><a href="../index.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
              </a></li>
            </ul>
          </nav>
      
      
          <section class="main">
            <div class="main-top">
              <h1 style="color: red;"><?php echo $autho['Nom'] ?></h1> <h1 style="color: green;"><?php echo $autho['Prenom'] ?></h1>
              <button  onclick="myFunction()">Dark Mode / Light Mode</button>
              <form action="recherche.php" method="POST" target="here">
                <input type="text" name="rech" class="recher" placeholder="Rechercher !">
                  <i class="fas fa-magnifying-glass-arrow-right"></i>
              </form>
            </div>
            <div class="users">
            <iframe src="autho_staff.php" style="
              position: fixed;
              right: -100px;
              width: 90%;
              border: none;
              overflow: hidden;
              z-index: 999999;
              height: 100%;"  name="here"></iframe>
            </div>
      
            <section class="attendance">
    
          </section>
        </div>
      
      </body>
      </html>
      </span>
      <?php
}

       ?>
