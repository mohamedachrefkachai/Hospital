<?php
include('C:/xampp/htdocs/test/controller/ReclamationCrud.php');
$c = new ReclamationCrud();
$eventStatistics = $c->getEventStatistics();
$jsonData = json_encode($eventStatistics);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
    <title>Statistics</title>
    <link rel="stylesheet" href="statistics.css">
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 0;
    text-align: center;
}

h1 {
    color: #42b883; /* Nouvelle couleur */
    margin-top: 20px;
    font-weight: bold;
}

h4 {
    color: #42b883; /* Nouvelle couleur */
}

p {
    color: #42b883; /* Nouvelle couleur */
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 2px solid #42b883; /* Nouvelle couleur */
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

canvas {
    margin-top: 20px;
}

.no-statistics {
    text-align: center;
    color: #42b883; /* Nouvelle couleur */
}

</style>
</head>

<body>
    <h1> statistical claim</h1>
    <?php
    if (!empty($reclamationStatistics)) {
        echo "<h4>statistical claim : </h4>";
        foreach ($reclamationStatistics as $reclamation => $count) {
            echo "$reclamation: $count<br><br>";
        }
    } else {
        echo "<p>No statistics available.</p>";
    }
    ?>

    <!-- Create a canvas for the chart -->
    <canvas id="myChart" width="400" height="200"></canvas>

    <!-- JavaScript for Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var jsonData = <?php echo $jsonData; ?>;

            var labels = Object.keys(jsonData);
            var data = Object.values(jsonData);

            var myChart = new Chart(ctx, {
                type: 'bar', // change to 'pie', 'doughnut', etc. for different chart types
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'statistical claim',
                        data: data,
                        backgroundColor: '#42b883',
                        borderColor: 'transparent',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
