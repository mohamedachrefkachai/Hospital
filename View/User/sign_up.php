<?php

include "../../Controller/User/PatientC.php";

$patientC= new PatientC();
$patient=null;

if(isset($_POST['sub']))
{
    $patient = new Patient(
      $_POST['cin'],
      $_POST['name'],
      $_POST['prenom'],
      $_POST['date'],
      $_POST['genre'],
      $_POST['tel'],
      $_POST['pass'],
      $_POST['adres'],
      $_POST['mail']
  );
  $patientC->addPatient($patient);
  header('Location:login_patient.php');

}




?>



<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../tools/User/style_inscri_pat.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <script src="../../tools/User/script.js"></script>
  </head>
  <body>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <h4>It's free and only takes a minute</h4>
      <form action="" method="post" name="form_patient" onclick="return CheckForm()">
        <label>CIN</label>
        <input type="text" placeholder="" name="cin" />
        <label id="cin_an"></label>
        <label>Name</label>
        <input type="text" placeholder="" name="name"/>
        <label id="nom_an"></label>
        <label>Prenom</label>
        <input type="text" placeholder="" name="prenom" />
        <label id="prenom_an"></label>
        <label>Date Birth</label>
        <input type="date" name="date" />
        <label id="date_an"></label>
        <label>Genre</label>
        <select id="genre" name="genre" >
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
        </select>
        <label>Telephone</label>
        <input type="text" placeholder="" name="tel" />
        <label id="tele_an"></label>
        <label>Password</label>
        <input type="password" placeholder="" name="pass" />
        <label>Adresse</label>
        <input type="text" placeholder="" name="adres" />
        <label>Mail</label>
        <input type="text" placeholder="" name="mail" />
        <button name="sub" type="submit">Insc</button>
      </form>

    </div>
    <p class="para-2">
      Already have an account? <a href="login_patient.php">Login here</a>
    </p>
  </body>
</html></span>