<?php
include "../../Controller/pharmacie/medicamentC.php";
include "../../Model/pharmacie/medicament.php";
$Medicament = new MedicamentC();
$tab = $Medicament->listmedicament();
?>

<center>
    <h1 style="color:#4AD489">List of drugs</h1>
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
    background:#4AD489 ;
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
    
</center>
<section class="attendance">
        <div class="attendance-list">
            <table class="table">
                <thead>
                    <tr>
                    <th>Id drugs</th>
                    <th>Name drugs</th>
                    <th>number in stock</th>
                    <th>unit sales price</th>
                    <th>detail</th>
                    <th>unit purchase price</th>
                    <th>GAIN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab as $medicament) { ?>
                    <tr>
                            <td><?= $medicament['id_medicament']; ?></td>
                            <td><?= $medicament['nom_medicament']; ?></td>
                            <td><?= $medicament['nb_stock']; ?></td>
                            <td><?= $medicament['prix_unitaire_vente']; ?></td>
                            <td><?= $medicament['delai']; ?></td>
                            <td><?= $medicament['prix_unitaire_achat']; ?></td>
                            <td>
                            <?php echo $medicament['prix_unitaire_vente']-$medicament['prix_unitaire_achat'];?>
                            </td>    
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
            <div class="download-link">
            <form method="POST" action="affichemedpdf.php">
                    <input type="hidden"  value="<?php echo $ordonnance['id_ordonnance']; ?>">
                    <button type="submit" >exporter to PDF</button>
                </form>
            </div>
        </div>
    </section>





