<?php
include "../../Controller/pharmacie/ordonnanceC.php";
include "../../Model/pharmacie/ordonnance.php";

include "../../Controller/pharmacie/medicamentC.php";
include "../../Model/pharmacie/medicament.php";
$Medicament = new MedicamentC();
$tab = $Medicament->listmedicament();

$ordonnance=null;
$ordonnanceC=new OrdonnanceC();

if(isset($_POST['subb']))
{
    $ordonnance = new Ordonnance(
        $_POST['id_ordonnance'],
        $_POST['id_medicament'],
        $_POST['nb_packet'],
        $_POST['id_staff'],
        $_POST['id_patient'],
        $_POST['duree'],
        $_POST['date_ordonnance'],
        $_POST['frequence'],
        $_POST['etat']
    );
    $ordonnanceC->modifierOrdonnance($ordonnance,$_POST['id_ordonnance']);
    header('Location:afficheordonnance.php');
}


if(isset($_POST['update']))
{
    $ordonnance=$ordonnanceC->showordonnance($_POST['toupdate']);

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
    .ordonnance_name
    {
        color: red;
    }
</style>
    
    </head>
    <body>
        <form action="" method="post">
            <h2>Update ordonnance<div class="ordonnance_name">'. $ordonnance['id_ordonnance'] .' </div></h2>
            <input type="hidden" name="Id_pa" value="' . $ordonnance['id_ordonnance'] . '">
            <table>
                <tr>
                    <td>ID ordonnance:</td>
                    <td>' . $ordonnance['id_ordonnance'] . '</td>
                    <td><input type="hidden" name="id_ordonnance" value="' . $ordonnance['id_ordonnance'] . '"></td>
                </tr>
                <tr>
                    <td>id drugs:</td>
                    <td>' . $ordonnance['id_medicament'] . '</td>
                    <td><input type="hidden" name="id_medicament" value="' . $ordonnance['id_medicament'] . '"></td>
                </tr>
                <tr>
                    <td>id patient:</td>
                    <td>' . $ordonnance['id_patient'] . '</td>
                    <td><input type="text" name="id_patient" value="' . $ordonnance['id_patient'] . '"></td>
                </tr>
                

                <tr>
                    <td>packet number:</td>
                    <td>' . $ordonnance['nb_packet'] . '</td>
                    <td><input type="text" name="nb_packet" value="' . $ordonnance['nb_packet'] . '"></td>
                </tr>

                <tr>
                    <td>frequency:</td>
                    <td>' . $ordonnance['frequence'] . '</td>
                    <td><input type="text" name="frequence" value="' . $ordonnance['frequence'] . '"></td>
                </tr>

                <tr>
                    <td>duration:</td>
                    <td>' . $ordonnance['duree'] . '</td>
                    <td><input type="number" name="duree" value="' . $ordonnance['duree'] . '"></td>
                </tr>

                <tr>
                    <td>order date:</td>
                    <td>' . $ordonnance['date_ordonnance'] . '</td>
                    <td><input type="date" name="date_ordonnance" value="' . $ordonnance['date_ordonnance'] . '"></td>
                </tr>

                <tr>
                    <td>id staff:</td>
                    <td>' . $ordonnance['id_staff'] . '</td>
                    <td><input type="text" name="id_staff" value="' . $ordonnance['id_staff'] . '"></td>
                </tr>

                <tr>
                    <td>etat:</td>
                    <td>' . $ordonnance['etat'] . '</td>
                    <td><input type="hidden" name="etat" value="' . $ordonnance['etat'] . '"></td>
                </tr>

            </table>
            <button type="submit" name="subb">SUBMIT</button>
        </form>
    </body>
    </html>



';


}

?>
