<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crud-tests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Crud-tests</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Grafícos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newCard.php">Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <h1 style="text-align: center;">Nível de complexidade</h1>

    <div class="container" style="width: 450px; height: 450px;">
        <canvas id="myChart" width="20" height="20"></canvas>
    </div>


    <?php 
    require_once './api/Database.php';
    require_once './api/InformationGateway.php';
    $dataBase = new Database();
    $informationGateway = new InformationGateway($dataBase);
    $labels = $informationGateway->consultDificultyForGraph();
    $data = $informationGateway->consultDificultyForGraph(false);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart');
        new Chart(ctx, {
            // tipo de grafico que será renderizado
            type: 'pie',
            // dados que serão renderizados
            data: {
                labels: [<?= $labels ?>],
                // datasets são os conjuntos de dados que serão renderizados
                datasets: [{
                    // label é o nome do conjunto de dados
                    label: 'Nível de complexidade',
                    // data são os valores que serão renderizados
                    data: [<?= $data ?>],
                    // backgroundColor é a cor de fundo do conjunto de dados
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // vermelho
                        'rgba(54, 162, 235, 0.2)', // azul
                        'rgba(255, 206, 86, 0.2)', // amarelo
                        'rgba(75, 192, 192, 0.2)', // verde
                        'rgba(153, 102, 255, 0.2)' // roxo
                    ],
                    // borderColor é a cor da borda do conjunto de dados
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // vermelho
                        'rgba(54, 162, 235, 1)', //azul
                        'rgba(255, 206, 86, 1)', // amarelo
                        'rgba(75, 192, 192, 1)', // verde
                        'rgba(153, 102, 255, 1)' // roxo
                    ],
                    // borderWidth é a largura da borda do conjunto de dados
                    borderWidth: 1
                }]
            },
            // options são as opções de configuração do grafico
            options: {
            }
        });

    </script>
</body>
