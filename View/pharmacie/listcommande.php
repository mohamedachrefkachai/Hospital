<?php
include "../../Controller/pharmacie/OrdonnanceC.php";
include "../../Model/pharmacie/ordonnance.php";

$ordonnance = new OrdonnanceC();
$tab = $ordonnance->listcommande();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order ordered</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .attendance {
            margin-top: 20px;
            text-align: center;
        }

        .attendance-list {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 15px;
        }

        table thead tr {
            color: #fff;
            background: #4AD489;
            text-align: left;
            font-weight: bold;
        }

        .table th,
        .table td {
            padding: 8px 10px;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
            background: #f3f3f3;
        }

        .table tbody tr:nth-of-type(odd) {
            background: #f9f9f9;
        }

        .table tbody tr.active {
            font-weight: bold;
            color: #4AD489;
        }

        .table tbody tr:last-of-type {
            border-bottom: 2px solid #4AD489;
        }

        .table button {
            padding: 4px 15px;
            border-radius: 8px;
            cursor: pointer;
            background: transparent;
            border: 1px solid #4AD489;
            transition: background 0.5s, color 0.5s;
        }

        .table button:hover {
            background: #4AD489;
            color: #fff;
        }

        .download-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        h1 {
            color: green;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="attendance">
        <h1 style="color:#4AD489;">Order ordered</h1>
    </div>

    <table class="table" border="1" align="center" width="70%">
        <thead>
            <tr>
                <th style="width: 10px;">ID ordonnance</th>
                <th >ID drugs</th>
                <th>Nb Packet</th>
                <th>ID patient</th>
                <th>ID staff</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab as $ordonnance) { ?>
                <tr>
                    <td><?= $ordonnance['id_ordonnance']; ?></td>
                    <td><?= $ordonnance['id_medicament']; ?></td>
                    <td><?= $ordonnance['nb_packet']; ?></td>
                    <td><?= $ordonnance['id_patient']; ?></td>
                    <td><?= $ordonnance['id_staff']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
