<?php
include "../../Controller/User/PatientC.php";

$PatientC=new PatientC();

if(isset($_POST['sub']))
{
    $cin=$_POST['cin'];
    $password=$_POST['pass'];
    $autho=$PatientC->authentication($cin,$password);



if($autho)
{
    ?>
    <span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <title>Patient</title>
          <style>
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
        </head>
        <body>
          <div class="container">
            <nav>
              <ul>
                <li><a href="#" class="logo">
                  <img src="../../tools/User/icon.png">
                  <span class="nav-item" style="color: #4AD489;">Patient</span>
                </a></li>

                  <li><a href="../pharmacie/client1.php?id=<?php echo $autho['Id_patient']; ?>" target="here">
                        <i class="fas fa-notes-medical"></i>
                        <span class="nav-item">Consult Ordinance</span>
                    </a></li>
                    <li><a href="../rendez-vous/ajoutrendez-vous.php?id=<?php echo $autho['Id_patient']; ?>" target="here">
                        <i class="fas fa-notes-medical"></i>
                        <span class="nav-item">Add appointment</span>
                    </a></li>

                <li><a href="../index.php" class="logout">
                  <i class="fas fa-sign-out-alt"></i>
                  <span class="nav-item">Log out</span>
                </a></li>
              </ul>
            </nav>
        
        
            <section class="main">
              <div class="main-top">
                <h1 style="color: red;"><?php echo $autho['nom'] ?></h1> <h1 style="color: green;"><?php echo $autho['prenom'] ?></h1>
                <button  onclick="myFunction()">Dark Mode / Light Mode</button>
               <!-- <form action="recherche.php" method="POST" target="here">
                  <input type="text" name="rech" class="recher" placeholder="Rechercher !">
                    <i class="fas fa-magnifying-glass-arrow-right"></i>
                </form>
               -->
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
        <script>
  function myFunction() {
    console.log("here");
    var element = document.body;
    element.classList.toggle("dark-mode");
  }
</script>
        <?php
}
else{
    header('Location:login_patient.php');
}
}

?>