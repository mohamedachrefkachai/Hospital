<?php
include "../../Controller/User/StaffC.php";

$StaffC=new StaffC();

if(isset($_POST['sub']))
{
    $id_staff=$_POST['id_staff'];
    $password = $_POST['password'];
    $conf=$_POST['conf'];
    $staff=$StaffC->showStaff($id_staff);
    if($password != $conf)
    {
        echo 'Confi Same Password' ;
    }
    else
    {
        $Staff = new Staff(
            $staff['cin'],
            $staff['Nom'],
            $staff['Prenom'],
            $staff['Genre'],
            $staff['Date_Birth'],
            $staff['E_mail'],
            $staff['tel'],
            $password,
            $staff['Role']
        );
        $StaffC->updateStaff($id_staff,$Staff);
        header('Location:login_admin.php');
    }
}


$token=$_GET['token'];

date_default_timezone_set('Europe/Berlin');

$current_time = date('Y-m-d H:i:s');
$stmt = $db->prepare("SELECT * FROM reset_tokens where (token=:token) AND expiry_timestamp>:current_time ");
$stmt->bindParam(':token', $token);
$stmt->bindParam(':current_time', $current_time);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user)
{
    
echo
'
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
                    
                    <h1>Password</h1>
                    <hr>
                    
                    <input type="password" name="password" placeholder="abc@exampl.com">
                    <h1>Confirme Password</h1>
                    <hr>
                    <input type="hidden" name="id_staff" value="'.$user['staff_id'].'">
                    <input type="password" name="conf" placeholder="abc@exampl.com">
                    <button type="submit" name="sub">Submit</button>
                </form>
            </div>
</body>
</html>';
}
else
{
    echo 'Token Not Founded Or Data Expired';
}


?>
