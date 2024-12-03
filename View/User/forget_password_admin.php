<?php
include "../../Controller/User/StaffC.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$StaffC=new StaffC();


if(isset($_POST['sub'])) {
    $email = $_POST['email'];
    $recher = $StaffC->rechercher_staff($email);
    $db = config::getConnexion();
    
    if($recher) {
        $token = bin2hex(random_bytes(32));
        
        
        $expiryDateTime = new DateTime('now');
        $expiryDateTime->add(new DateInterval('PT1H')); 
        $expiryTimestamp = $expiryDateTime->format('Y-m-d H:i:s');

        $stmt = $db->prepare("INSERT INTO reset_tokens (staff_id, token, expiry_timestamp) VALUES (:staff_id, :token, :expiry)");
        $stmt->bindParam(':staff_id', $recher['Id_staff']);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expiry', $expiryTimestamp);
        $stmt->execute();

        $resetLink = "http://127.0.0.1/php_work/MedicoeurV1/View/User/reset_password.php?token=$token";
        
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username='rayen.borgi@esprit.tn'; 
            $mail->Password='nayg xvne aamf kvyg';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('support@medicouer.tn', 'Reset Password');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Password Reset</title>
            </head>
            <body style="font-family: Arial, sans-serif; padding: 20px;">
            
                <p>Hello '.$recher['Nom'].',</p>
            
                <p>We received a request to reset your password. Click the link below to reset your password:</p>
            
                <p style="margin-bottom: 20px;">
                    <a href="'. $resetLink .' " style="display: inline-block; padding: 10px 20px; text-decoration: none; color: #fff; background-color: #3498db; border-radius: 5px;">
                        Reset Password
                    </a>
                </p>
            
                <p>If you did not request a password reset, you can ignore this email.</p>
            
                <p>Thank you,<br>MediCoeur Team</p>
            </body>
            </html>
            ';

            $mail->send();
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                window.onload = function() {
                    Swal.fire({
                        icon: "success",
                        title: "Email sent successfully",
                        text: "Check your inbox for instructions."
                    });
                };
            </script>
        ';
        } catch (Exception $e) {
            echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function() {
            Swal.fire({
                icon: "error",
                title: "Email sending failed",
                text: "Sorry, something went wrong'. $mail->ErrorInfo.'"
            });
        };
    </script>
';

        }
    } else {
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.onload = function() {
                Swal.fire({
                    icon: "error",
                    title: "Email sending failed",
                    text: "Sorry, something went wrong. Email Not Found."
                });
            };
        </script>
    ';
    
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../tools/User/login.css">
</head>
<body>
<div class="container">
            <div class="login">
                <form method="POST" action="">
                    <h1>E-Mail</h1>
                    <hr>
                    <input type="text" name="email" placeholder="abc@exampl.com">
                    <button type="submit" name="sub">Submit</button>
                </form>
            </div>
</body>
</html>