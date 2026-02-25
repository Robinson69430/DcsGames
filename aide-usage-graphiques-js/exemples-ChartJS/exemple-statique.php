<!DOCTYPE html>
<html>
<head>
    <title>Graphique du nb de traversées par jour</title>
    <style type="text/css">
        body {
            width: 550px;
        }
        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Graphique démo statique</h1>
    <!-- on crée un canvas pour y afficher le graphique -->
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        // on lance la fonction showGraph au chargement de la page
        document.addEventListener('DOMContentLoaded', function () {
            // on crée des tableaux de données statiques
            var jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
            var nombres = [12, 19, 3, 5, 2, 3, 7];
            
            // on fabrique à partir des tableaux jours et nombres la structure de données attendue par Chart.js pour un graphique en barres
            var chartdata = {
                labels: jours,
                datasets: [{
                    label: 'Nombre de vente par jour',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    data: nombres
                }]
            };

            // on récupère l'élément canvas pour y afficher le graphique
            var graphTarget = document.getElementById("graphCanvas");

            // on crée le graphique avec Chart.js en lui passant l'élément canvas et les données créées
            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata
            });
        });
    </script>

</body>
</html>
