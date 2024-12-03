<?php
include "../../Controller/pharmacie/OrdonnanceC.php";
include "../../Model/pharmacie/ordonnance.php";
$ordonnance = new OrdonnanceC();
$tab = $ordonnance->listordonnance();
?>

<center>
    <h1 style="color: green;">List of prescription</h1>
    <style>
                <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;

}

.attendance {
    margin-top: 50px;
    text-align: center;
}

.attendance-list {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
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
    padding: 12px 15px;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
    background: #f3f3f3;
}

.table tbody tr:nth-of-type(odd) {
    background: #4AD489;
}

.table tbody tr.active {
    font-weight: bold;
    color: #4AD489;
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid #4AD489;
}

.table button {
    padding: 6px 20px;
    border-radius: 10px;
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
    </style>
    </style>
</center>
<section class="attendance">
        <div class="attendance-list">
            <table class="table">
                <thead>
                    <tr>
                        <th>id_ordonnance</th>
                        <th>id_medicament</th>
                        <th>nb_packet</th>
                        <th>id_patient</th>
                        <th>id_staff</th>
                        <th>prescription_date</th>
                        <th>frequency</th>
                        <th>duration</th>
                        <th>Etat</th>
                        <th>update</th>
                        <th>Delete</th>
      
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
                            <td><?= $ordonnance['date_ordonnance']; ?></td>
                            <td><?= $ordonnance['frequence']; ?></td>
                            <td><?= $ordonnance['duree']; ?></td>
                            
                            <?php if($ordonnance['etat'] == 'non_commande'){  ?>
                                <td><div style='color:red'> <?php echo $ordonnance['etat']; ?></div></td>
                                <?php  }else{  ?>
                                    <td><div style='color:green'><?php echo $ordonnance['etat']; ?></div></td>
                            <?php  } ?>
                            
                            <td align="center">
                            <form method="POST" action="modifierordonnance.php">
                                    <input type="hidden" name="toupdate" value="<?php echo $ordonnance['id_ordonnance']; ?>">
                                    <button type="submit" name="update">update</button>
                            </form>
                            </td>
                            <td align="center">
                                <form method="POST" action="deleteordonnance.php">
                                    <input type="hidden" name="todelete" value="<?php echo $ordonnance['id_ordonnance']; ?>">
                                    <button type="submit" name="delete">Delete</button>
                                </form>
                            </td>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
                <div class="download-link">
                <form method="POST" action="afficheordpdf.php">
                    <input type="hidden"  value="<?php echo $ordonnance['id_ordonnance']; ?>">
                    <button type="submit" >export to PDF</button>
                </form>
            </div>
            </table>
        </div>
    </section>












