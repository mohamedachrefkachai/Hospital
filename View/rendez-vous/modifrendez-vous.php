<?php
include "../../Controller/rendez-vous/rendez-vousC.php";
include "../../Model/rendez-vous/rendez-vous.php";
$rendezvous=null;
$rendezvousC=new rendezvousC();

if(isset($_POST['subb']))
{
    $rendezvous = new rendezvous(
         $_POST['id_patient'],
         $_POST['specialite'],
         $_POST['nommedecin'],
         $_POST['date'],
         $_POST['heure'],
         $_POST['email'],
    );
    $rendezvousC->modifrendez_vous($rendezvous,$_POST['id']);
    header('Location:../../View/rendez-vous/modifrendez-vous.php');
    
}


if(isset($_POST['update']))
{
    $rendezvous=$rendezvousC->showrendez_vous($_POST['modifrendezvous']);

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
        max-width:700px;
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
    .rendezvous_name
    {
        color: red;
    }
</style>
    
    </head>
    <body>
        <form action="" method="post">
            <h2>Update rendez-vous<div class="rendezvous_name">'. $rendezvous['idrendezvous'] .' </div></h2>
            <input type="hidden" name="id" value="' . $rendezvous['idrendezvous'] . '">
            
            <table>
                <tr>
                    <td>ID patient:</td>
                    <td>' . $rendezvous['idpatient'] . '</td>
                    <td><input type="hidden" name="id_patient" value="' . $rendezvous['idpatient'] . '"></td>
                </tr>
                <tr>
                    <td>spatiality:</td>
                    <td>' . $rendezvous['specialite'] . '</td>
                    <td><input type="hidden" name="specialite" value="' . $rendezvous['specialite'] . '"></td>
                </tr>

                <tr>
                    <td>Doctorname:/td>
                    <td>' . $rendezvous['nommedecin'] . '</td>
                    td><input type="text" name="nommedecin" value="' . $rendezvous['nommedecin'] . '"></td>
                </tr>
                <tr>
                    <td>date:</td>
                    <td>' . $rendezvous['daterendezvous'] . '</td>
                    <td><input type="date" name="date" value="' . $rendezvous['daterendezvous'] . '"></td>
                </tr>

                <tr>
                <td>houre:</td>
                <td>' . $rendezvous['heure'] . '</td>
                <td><input type="time" name="heure" value="' . $rendezvous['heure'] . '"></td>
            </tr>
            <tr>
                <td>email:</td>
                <td>' . $rendezvous['email'] . '</td>
                <td><input type="email" name="email" value="' . $rendezvous['email'] . '"></td>
            </tr>
            

            </table>
            
            <button type="submit" name="subb">SUBMIT</button>
        </form>
    </body>
    </html>



';


}

?>
