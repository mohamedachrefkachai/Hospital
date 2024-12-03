
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../controller/dateC.php';
include '../../model/date.php';



$date=null;
$dateC=new dateC();

if(isset($_POST['subb']))
{
    
    $date = new date(
        $_POST['id_staff'],
        $_POST['date'],
        $_POST['nbrendezvous'],
        $_POST['heure']
        
    
    );
    $dateC->modifdate($date,$_POST['id']);
    header('Location:modifdate.php');
    
}


if(isset($_POST['update']))
{
    $date=$dateC->showdate(($_POST['modifdate']));
    
echo '
<!DOCTYPE html>
    <html>
    <head>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    form {
        text-align: center;
        margin: 20px auto;
        max-width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        margin-bottom: 15px;
    }

    td {
        padding: 8px;
    }

    input[type="text"],
    input[type="date"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button[name="subb"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    button[name="subb"]:hover {
        background-color: #45a049;
    }
    .date_name
    {
        color: red;
    }
</style>
    
    </head>
    <body>
        <form action="" method="post">
            <h2>Update date<div class="date_name">'. $date['iddate'] .' </div></h2>
            <input type="hidden" name="id" value="' . $date['iddate'] . '">
            
            <table>
                <tr>
                    <td>ID staff:</td>
                    <td>' . $date['idstaf'] . '</td>
                    <td><input type="text" name="id_staff" value="' . $date['idstaf'] . '"></td>
                </tr>
                <tr>
                    <td>appointment number:</td>
                    <td>' . $date['nbrendezvous'] . '</td>
                    <td><input type="text" name="nbrendezvous" value="' . $date['nbrendezvous'] . '"></td>
                </tr>
                <tr>
                    <td>date:</td>
                    <td>' . $date['date'] . '</td>
                    <td><input type="text" name="date" value="' . $date['date'] . '"></td>
                </tr>
                <tr>
                    <td>houre:</td>
                    <td>' . $date['heure'] . '</td>
                    <td><input type="text" name="heure" value="' . $date['heure'] . '"></td>
                </tr>
                

            </table>
            
            <button type="submit" name="subb">SUBMIT</button>
        </form>
    </body>
    </html>



';


}

?>
