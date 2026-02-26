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
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'Tab1')">Application</button>
      <button class="tablinks" onclick="openTab(event, 'Tab2')">Consomation</button>
      <button class="tablinks" onclick="openTab(event, 'Tab3')">Ressource</button>
    </div>
    <div id="Tab1" class="tabcontent">
<table class="table">
    <tr>
        <th scope="col">Application</th>
        <th scope="col">Total (unités cumulées)</th>
    </tr>

    <?php if (!empty($applications)) : ?>
        <?php foreach ($applications as $row) : ?>
            <tr scope="row">
                <td scope="col"><?= htmlspecialchars($row['nom']) ?></td>
                <td scope="col"><?= htmlspecialchars($row['total']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="2">Aucune donnée</td>
        </tr>
    <?php endif; ?>
</table>
    </div>

<div id="Tab2" class="tabcontent">
<table class="table">
    <tr>
        <th scope="col">Application</th>
        <th scope="col">Total (unités cumulées)</th>
    </tr>

    <?php if (!empty($conso)) : ?>
        <?php foreach ($conso as $row) : ?>
            <tr>
                <td scope="col"><?= htmlspecialchars($row['mois']) ?></td>
                <td scope="col"><?= htmlspecialchars($row['total']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="2">Aucune donnée</td>
        </tr>
    <?php endif; ?>
</table>
    </div>

    <div id="Tab3" class="tabcontent">
<table class="table">
    <tr>
        <th scope="col">Application</th>
        <th scope="col">Total (unités cumulées)</th>
    </tr>

    <?php if (!empty($ressou)) : ?>
        <?php foreach ($ressou as $row) : ?>
            <tr>
                <td scope="col"><?= htmlspecialchars($row['mois']) ?></td>
                <td scope="col"><?= htmlspecialchars($row['Stockage']) ?></td>
                <td scope="col"><?= htmlspecialchars($row['Réseau']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="2">Aucune donnée</td>
        </tr>
    <?php endif; ?>
</table>
    </div>

    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  </body>
</html>
