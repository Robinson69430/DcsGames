<?php
require_once('../model/DAO_Application.php');
require_once('../model/DAO_Consommation.php');
require_once('../model/DAO_Ressource.php');

$dao = new DAO_Application();
$dao2 = new DAO_Consommation();
$dao3 = new DAO_Ressource();
$applications = $dao->getTopApplications();
$conso = $dao2->getConso();
$ressou = $dao3->getRessource();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="../js/chart.js"></script>
</head>

<body>

    <div class="tab">
        <div>
            <button class="tablinks" onclick="openTab(event, 'Tab1')">Application</button>
            <button class="tablinks" onclick="openTab(event, 'Tab2')">Consommation</button>
            <button class="tablinks" onclick="openTab(event, 'Tab3')">Ressource</button>
        </div>
        <div class="img">
            <img src="../logoBusinessSchool.png" alt="">
        </div>
    </div>


    <div id="Tab1" class="tabcontent">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Application</th>
                    <th scope="col">Total (unités cumulées)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($applications)): ?>
                    <?php foreach ($applications as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nom']) ?></td>
                            <td><?= htmlspecialchars($row['total']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Aucune donnée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="chart-container">
            <canvas id="chartApplications"></canvas>
        </div>
    </div>


    <div id="Tab2" class="tabcontent">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mois</th>
                    <th scope="col">Total (unités cumulées)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($conso)): ?>
                    <?php foreach ($conso as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['mois']) ?></td>
                            <td><?= htmlspecialchars($row['total']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Aucune donnée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="chart-container">
            <canvas id="chartConso"></canvas>
        </div>
    </div>


    <div id="Tab3" class="tabcontent">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mois</th>
                    <th scope="col">Stockage</th>
                    <th scope="col">Réseau</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ressou)): ?>
                    <?php foreach ($ressou as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['mois']) ?></td>
                            <td><?= htmlspecialchars($row['Stockage']) ?></td>
                            <td><?= htmlspecialchars($row['Réseau']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Aucune donnée</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="chart-container">
            <canvas id="chartRessource"></canvas>
        </div>
    </div>

    <script src="../js/script.js"></script>
    <script src="../js/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script>

        const appLabels = <?= json_encode(array_column($applications, 'nom')) ?>;
        const appData = <?= json_encode(array_column($applications, 'total')) ?>;

        new Chart(document.getElementById('chartApplications'), {
            type: 'bar',
            data: {
                labels: appLabels,
                datasets: [{
                    label: 'Total par application',
                    data: appData,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });


        const consoLabels = <?= json_encode(array_column($conso, 'mois')) ?>;
        const consoData = <?= json_encode(array_column($conso, 'total')) ?>;

        new Chart(document.getElementById('chartConso'), {
            type: 'line',
            data: {
                labels: consoLabels,
                datasets: [{
                    label: 'Consommation mensuelle',
                    data: consoData,
                    tension: 0.3,
                    fill: false
                }]
            },
            options: { responsive: true }
        });


        const resLabels = <?= json_encode(array_column($ressou, 'mois')) ?>;
        const stockageData = <?= json_encode(array_column($ressou, 'Stockage')) ?>;
        const reseauData = <?= json_encode(array_column($ressou, 'Réseau')) ?>;

        new Chart(document.getElementById('chartRessource'), {
            type: 'line',
            data: {
                labels: resLabels,
                datasets: [
                    {
                        label: 'Stockage',
                        data: stockageData,
                        tension: 0.3
                    },
                    {
                        label: 'Réseau',
                        data: reseauData,
                        tension: 0.3
                    }
                ]
            },
            options: { responsive: true }
        });
    </script>

</body>

</html>