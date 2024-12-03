<?php






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 







    function generateCode() {
        return sprintf("%08d", mt_rand(1, 99999999));
    }

    function sendCodeByEmail($recipientEmail) {
        global $db;
        $stmt = $db->prepare("INSERT INTO autho_code (id_staff, code, dateexp) VALUES ((SELECT Id_staff FROM staff WHERE E_mail = :email), :code, NOW() + INTERVAL 3 MINUTE)");

    
      
        
        $code = generateCode(); 
        $mail = new PHPMailer(true); 
        $stmt->bindParam(':email', $recipientEmail);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
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
            $mail->addAddress($recipientEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Authorization Code';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Authorization Code</title>
            </head>
            <body style="font-family: Arial, sans-serif; padding: 20px;">
            
                
            
                <p>We have generated an authorization code for you. Please use the code below to proceed:</p>
            
                <p style="font-size: 24px; font-weight: bold; color: #3498db; margin-bottom: 20px;">'.$code.'</p>
            
                <p>If you did not request an authorization code, you can ignore this email.</p>
            
                <p>Thank you,<br>MediCoeur Team</p>
            </body>
            </html>
            ';

            $mail->send();
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }



