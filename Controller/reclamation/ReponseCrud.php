<?php 
include_once '../config.php';
include_once '../Model/Reponse.php';



class ReponseCrud {
 // Fonction pour creer une nouvelle reponse
 public function create($reponse) {
  $conn = config::getConnexion();
  $now = new DateTime(); // Cree un objet DateTime avec l'heure actuelle
  $formattedDateTime = $now->format('Y-m-d H:i:s');
  $stmt = $conn->prepare("INSERT INTO reponse (id_admin, id_reclamation, reponse, date) VALUES (:id_admin, :id_reclamation, :reponse, :date)");
  $stmt->bindParam(':id_admin', $reponse->getIdAdmin());
  $stmt->bindParam(':id_reclamation', $reponse->getIdReclamation());
  $stmt->bindParam(':reponse', $reponse->getReponse());
  $stmt->bindParam(':date', $formattedDateTime);
  $stmt->execute();
 }

 // Fonction pour recuperer une reponse par son ID
 public function getReponseByIdReclamation($id) {
  $conn = config::getConnexion();
  $stmt = $conn->prepare("SELECT * FROM reponse WHERE id_reclamation = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }

 // Fonction pour mettre à jour une reponse
 public function updateReponse($id, $reponse) {
  $conn = config::getConnexion();
  $stmt = $conn->prepare("UPDATE reponse SET id_admin = :id_admin, id_reclamation = :id_reclamation, reponse = :reponse, date = :date WHERE id = :id");
  $stmt->bindParam(':id_admin', $reponse->getIdAdmin());
  $stmt->bindParam(':id_reclamation', $reponse->getIdReclamation());
  $stmt->bindParam(':reponse', $reponse->getReponse());
  $stmt->bindParam(':date', $reponse->getDate());
  $stmt->bindParam(':id', $id);
  $stmt->execute();
 }

 // Fonction pour supprimer une reponse
 public function deleteReponse($id) {
  $conn = config::getConnexion();
  $stmt = $conn->prepare("DELETE FROM reponse WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
 }
 
 function sendMailReponse($nom,$email,$reclamation,$reponse){



    require ' ../../vendor/phpmailer/phpmailer/src/Exception.php';
    require ' ../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require ' ../../vendor/phpmailer/phpmailer/src/SMTP.php';
    require '../../vendor/autoload.php';

  
  
  // Creer une nouvelle instance de PHPMailer
  $mail = new PHPMailer(true);

  try {
      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username='abir.gamoudi@esprit.tn'; 
      $mail->Password='';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 25;

      // Recipients
      $mail->setFrom('abir.gamoudi@esprit.tn', 'MediCoeur Support - Team');
      $mail->addAddress($email,$nom);

      // Content
      $mail->isHTML(true);
      $mail->Subject = 'Claim received';
      $mail->Body    = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reponse à votre reclamation</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
        }
        h2 {
            font-weight: bold;
            text-decoration: underline;
            color: #3498db;
        }
        strong {
            color: #e74c3c;
        }
        p {
            margin-bottom: 15px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .footer-logo {
            width: 80px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Response to Your Complaint</h2>
        <p>We have duly noted your complaint regarding: <strong>'.$reclamation.'</strong>.</p>
        <p>Here is our response:</p>
        <p>'.$reponse.'</p>
        <p><?php echo $reponse; ?></p>
        <p>Thank you for your understanding.</p>
        <p>Best regards,<br>The Administration</p>
        <img src="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" alt="Logo" class="footer-logo">

    </div>
</body>
</html>
';

$mail->send();
echo 'Email sent successfully. Check your inbox for instructions.';
     
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}