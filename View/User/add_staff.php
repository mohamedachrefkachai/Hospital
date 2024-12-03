<?php
include "../../Controller/User/StaffC.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$Staff = null;
$StaffC = new StaffC();

if (isset($_POST['buttonn'])) {
    $Staff = new Staff(
        $_POST['cin'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['genre'],
        $_POST['age'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['password'],
        $_POST['choix']
    );

    $StaffC->addStaff($Staff);
    $mail = new PHPMailer(true); 
    
    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username='rayen.borgi@esprit.tn'; 
        $mail->Password='nayg xvne aamf kvyg';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('MediCoeur_Team@example.com','MediCoeur Team');
        $mail->addAddress($_POST['email']);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation Compte';
        $mail->Body    = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Authorization Code</title>
        </head>
        <body style="font-family: Arial, sans-serif; padding: 20px;">
                
            <p>Votre Compte A ete Confirmer Avec Success</p>


            <p>Welcome To Our New '.$_POST['choix'].' </p>
        
            <p>Thank you,<br>MediCoeur Team</p>
        </body>
        </html>
        ';

        $mail->send();
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add STAFF</title> 
  <link rel="stylesheet" href="../../tools/User/style_ajou_staff.css">
  <script src="../../tools/User/script.js"></script>
</head>
<body>
<div class="manage">
<h2>Add STAFF</h2>
<form action="" method="post" name="form_staff" id="form_staff" onclick="return verifstaff()">
   
        <table>

            <tr>
            <td>
                <input type="text" name="cin" placeholder="cin" >
            </td>
            <td>
                <p class="answ" id="cin_an"></p>
            </td>
        </tr>
            <tr>
                <td>
                    <input type="text" name="nom" placeholder="Nom" >
                </td>
                <td>
                    <p class="answ" id="nom_an"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="prenom" placeholder="Prenom" >
                </td>
                <td>
                    <p class="answ" id="prenom_an"></p>
                </td>
            </tr>



            <tr>
                <td>
                        <select id="genre" name="genre" >
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                </td>

            </tr>
            <tr>
                <td>
                    <input type="email" name="email" placeholder="nom.prenom@gmail.com" >
                </td>
                <td>
                    <p class="answ" id="email_an"></p>
                </td>
            </tr>        
            <tr>
                <td>
                    <input type="number" name="telephone" placeholder="Numero Telephone">
                </td>
                <td>
                    <p class="answ" id="telephone_an"></p>
                </td>
            </tr>       
            <tr>
                <td>
                    
                        <select id="choix" name="choix" >
                          <option value="Medecin">doctor/option>
                          <option value="infermiére">Nurse</option>
                          <option value="Assistant">Secret</option>
                          <option value="Pharmacien">pharmacists</option>
                        </select>
                     
                </td>
                <td>
                <p class="answ" id="">Correct</p>
            </td>
            </tr>  
            <tr>
                <td>
                    <input type="date" name="age" placeholder="donner votre age" >
                </td>
                <td>
                    <p class="answ" id="age_an"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" placeholder="password" >
                </td>
                <td>
                    <p class="answ" id="password_an"></p>
                </td>
            </tr> 
                
        </table>
        <button type="submit" class="button" name="buttonn">ADD</button>
        
</form>
  </div>
</body>
</html>';
?>
