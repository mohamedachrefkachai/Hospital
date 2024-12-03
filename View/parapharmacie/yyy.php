<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>STAFF</title>
      
      
      <link rel="stylesheet" href="../tools/style_staff.css"/>
      <script src="https://kit.fontawesome.com/02b26050de.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="container">
        <nav>
          <ul>
            <li><a href="#" class="logo">
              <img src="../tools/icon.png">
              <span class="nav-item" style="color: #4AD489;"><?php echo $autho['Role']; ?></span>
            </a></li>

            <?php?>
              <li><a href="#" target="here">
                    <i class="fas fa-address-card"></i>
                    <span class="nav-item">Name LINK</span>
                </a></li>
  
            <?php  ?>

          </ul>
        </nav>
    
    
        <section class="main">
          <div class="main-top">
            <h1 style="color: red;"><?php echo $autho['Nom'] ?></h1> <h1 style="color: green;"><?php echo $autho['Prenom'] ?></h1>
            <i class="fas fa-user-cog"><a href=""></a></i>
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