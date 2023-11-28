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
              <a class="nav-link" href="graph.php">Gráficos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="newCard.php">Cadastro</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Cards</h1>
      </div>
      <div style="text-align: center;">
        <h2 id="clock"></h2>
      </div>

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <form method="GET" action="" class="d-flex justify-content-center">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="start_date">Data Inicial</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="end_date">Data Final</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="complexity">Nível de Complexidade</label>
                <select class="form-control" id="complexity" name="complexity">
                  <option value="">Selecione</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive d-flex justify-content-center">
          <table class="table bg-dark mt-10 text-white" style="max-width: 85%;">
            <thead>
              <tr>
                <th style="max-width: 3.5em;" scope="col">ID</th>
                <th style="max-width: 3.5em;" scope="col">Responsável</th>
                <th style="max-width: 3.5em;" scope="col">Comentário</th>
                <th style="max-width: 3.5em;" scope="col">Link</th>
                <th style="max-width: 3.5em;" scope="col">Alterar</th>
                <th style="max-width: 3.5em;" scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once './api/Database.php';
              require_once './api/InformationGateway.php';
              $dataBase = new Database();
              $informationGateway = new InformationGateway($dataBase);
              $consultInformation = $informationGateway->getAll();

              foreach ($consultInformation as $key => $value) {
                echo "<tr>";
                echo "<th scope='row'>{$value['id']}</th>";
                echo "<td>{$value['responsible']}</td>";
                echo "<td>{$value['comment']}</td>";
                echo "<td>{$value['link']}</td>";
                echo "<td><button onclick = '' class='btn btn-primary'>Alterar</button></td>";
                echo "<td><button onclick = 'excluirInformation({$value['id']})' class='btn btn-danger'>Excluir</button></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.querySelector('form');
      const table = document.querySelector('table');

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        // Perform filter action here
      });

      table.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
          event.preventDefault();
          form.submit();
        }
      });
    });

    function updateClock() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      const time = `${hours}:${minutes}:${seconds}`;
      document.getElementById('clock').textContent = time;
    }

    setInterval(updateClock, 1000);

    function excluirInformation(id) {
      const confirmDelete = confirm("Tem certeza que deseja deletar essa card?");
      if (confirmDelete) {
        const url = `./api/information/${id}`;
        const options = {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json'
          }
        };

        fetch(url, options)
          .then(response => response.json())
          .then(data => {
            console.log(data);
            window.location.reload();
          });
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>