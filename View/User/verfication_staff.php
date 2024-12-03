<?php
include "../../Controller/User/StaffC.php";
include "../../View/User/send_code.php";
$StaffC = new StaffC();

if(isset($_POST['sub']))
{
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $autho=$StaffC->authentication($email,$password);

    $id=$autho['Id_staff'];
    if($autho)
    {

      
      sendCodeByEmail($email);
      
      ?>
      <span style="font-family: verdana, geneva, sans-serif;">
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <title>Admin</title>
              <link rel="stylesheet" href="../../tools/User/login.css">
              <style>

              </style>
          </head>
          <body>
              <div class="container">
                  <div class="login">
                  <form method="POST" action="autho_staff.php?auth=<?php echo $id?>">
                          <h1>Authentication ADMIN</h1>
                          <hr>
                          <p>Explore the World!</p>
                          <label>Code</label>
                          <input type="text" name="code" placeholder="">
                          <button type="submit" name="subb">Submit</button>
                      </form>
                  </div>
                  <div class="pic">
                      <img src="../../tools/User/admin_laptop.jpg">
                  </div>
              </div>
          </body>
          </html>
      </span>
      <?php

    }
    else
      {
        header('Location:login_admin.php');
      }


}











