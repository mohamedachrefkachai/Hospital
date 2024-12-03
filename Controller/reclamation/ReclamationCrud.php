<?php 

include_once '../config.php';
include_once '../Model/Reclamation.php';


//require '../../vendor/autoload.php';


//use PHPMailer\PHPMailer\PHPMailer;

class ReclamationCrud{
    //////////
       ///
       function filterComment($comment) {
        // Define a list of bad words (you can customize this list to your needs)
        $badWords = array('badword', 'zeyda', 'test','tit');
        
        // Loop through each word in the comment
        $words = explode(' ', $comment);
        foreach ($words as &$word) {
            // Remove any punctuation from the word
            $word = preg_replace('/[^a-zA-Z0-9]/', '', $word);
            
            // Check if the word is a bad word (case insensitive)
            $found = false;
            foreach ($badWords as $badWord) {
                $similarity = 0;
                similar_text(strtolower($word), strtolower($badWord), $similarity);
                if ($similarity >= 80) {
                    $found = true;
                    break;
                }
            }
          
            // Replace the word with a censored version if it's a bad word
            if ($found) {
                $censoredWord = '';
                for ($i = 0; $i < strlen($word); $i++) {
                    if (ctype_upper($word[$i])) {
                        // If the character is an uppercase letter, use an uppercase asterisk
                        $censoredWord .= '*';
                    } else {
                        // Otherwise, use a lowercase asterisk
                        $censoredWord .= '*';
                    }
                }
                $word = $censoredWord;
            }
        }
        
        // Combine the words back into a comment and return it
        return implode(' ', $words);
    }
    ////////////
    public function getEventStatistics()
    {
        $sql = "SELECT nom, COUNT(*) AS count FROM reclamation GROUP BY nom";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $reclamationStatistics = [];
            foreach ($statistics as $stat) {
                $reclamationStatistics[$stat['nom']] = $stat['count'];
            }
            return $reclamationStatistics;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
 public function create($reclamation){
  $db = config::getConnexion();
  try{
   $req = $db->prepare('INSERT INTO `reclamation` (`id`, `reclamation`, `date`,`etat`, `nom`, `email` ,`tel`) 
   VALUES (NULL, :reclamation, :date, :etat, :nom, :email, :tel )');
  
   $now = new DateTime(); // Crée un objet DateTime avec l'heure actuelle
   $formattedDateTime = $now->format('Y-m-d H:i:s');
   $newmessage=($this->filterComment($reclamation->getReclamation()));

   $req->execute([
    'reclamation' => $newmessage,
    'etat' => "0",
    'date' => $formattedDateTime,
    'nom' => $reclamation->getNom(),
    'email' => $reclamation->getEmail(),
    'tel' => $reclamation->getTel()
   ]);
  }
  catch(Exception $e){
   die('Error :'.$e->getMessage());
  }
 }

 public function readAll(){
  $db = config::getConnexion();
  try{
   $req = $db->prepare('SELECT * FROM `reclamation`');
   $req->execute();
   $result = $req->fetchAll(PDO::FETCH_ASSOC);
   return $result;
  }
  catch(Exception $e){
   die('Error :'.$e->getMessage());
  }
 }

 public function readOne($id){
  $db = config::getConnexion();
  try{
   $req = $db->prepare('SELECT * FROM `reclamation` WHERE `id` = :id');
   $req->execute([
    'id' => $id,
   ]);
   $result = $req->fetch(PDO::FETCH_ASSOC);
   return $result;
  }
  catch(Exception $e){
   die('Error :'.$e->getMessage());
  }
 }

 public function update($reclamation){
  $db = config::getConnexion();
  try{
   $req = $db->prepare('UPDATE `reclamation` SET `reclamation` = :reclamation, `etat` = :etat WHERE `id` = :id');
   $req->execute([
    'id' => $reclamation->getId(),
    'reclamation' => $reclamation->getReclamation(),
    'etat' => $reclamation->getEtat(),
   ]);
  }
  catch(Exception $e){
   die('Error :'.$e->getMessage());

  } }
  

  public function activate($id){
   $db = config::getConnexion();
   try{
    $req = $db->prepare('UPDATE `reclamation` SET `etat` = 1 WHERE `id` = :id');
    $req->execute([
     'id' => $id,
    ]);
   }
   catch(Exception $e){
    die('Error :'.$e->getMessage());
   }
  }
  
  public function deactivate($id){
   $db = config::getConnexion();
   print_r("test");

   try{
    $req = $db->prepare('UPDATE `reclamation` SET `etat` = 0 WHERE `id` = :id');
    $req->execute([
     'id' => $id,
    ]);
    
   }
   catch(Exception $e){
    die('Error :'.$e->getMessage());
   }
  }
  public function delete($id) {
    $db = config::getConnexion();
    try {
        // Supprimer les réponses liées à la réclamation
        $deleteReponses = $db->prepare('DELETE r FROM `reponse` r INNER JOIN `reclamation` rec ON r.id_reclamation = rec.id WHERE rec.id = :id');
        $deleteReponses->execute(['id' => $id]);

        // Supprimer la réclamation
        $deleteReclamation = $db->prepare('DELETE FROM `reclamation` WHERE `id` = :id');
        $deleteReclamation->execute(['id' => $id]);

    } catch (PDOException $e) {
        // Gérer les erreurs ici
        echo "Erreur : " . $e->getMessage();
    }
}

 function sendMailReclamation($nom,$email,$reclamation){

  
    
    
   // require ' C:/xampp/htdocs/Medicoeur_V2/Medicoeur_V2/vendor/phpmailer/phpmailer/src/Exception.php';
   // require ' C:/xampp/htdocs/Medicoeur_V2/Medicoeur_V2/vendor/phpmailer/phpmailer/src/PHPMailer.php';
   // require ' C:/xampp/htdocs/Medicoeur_V2/Medicoeur_V2/vendor/phpmailer/phpmailer/src/SMTP.php';
   

  
  // Créer une nouvelle instance de PHPMailer
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
      $mail->Subject = 'Complaint response';
      $mail->Body    ='
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réclamation Reçue</title>
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
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Hello ' . $nom . ',</h2>
        <hr>
        <br>
        <p>We have received your complaint regarding: <strong style="overflow: auto; max-height: 100px; display: block;">' . $reclamation. '</strong>.</p>
        <hr>
        <p>Our team is working diligently to process all complaints as quickly as possible. We appreciate your patience.</p>
        <p>If you have any additional questions, feel free to contact us.</p>
        <p>Best regards,<br>MediCoeur - Équipe du Support</p>
        <img src="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" alt="Logo" style="width:200px; margin-right: 10px;">

    </div>
</body>
</html>
';

$mail->send();
echo 'Email sent successfully. Check your inbox for instructions.';
     
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  }}
 
