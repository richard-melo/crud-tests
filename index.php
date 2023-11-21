<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crud-tests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <?php
    include("config.php");
  ?>

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="bg-dark col-auto col-md-3 col-lg-2 min-vh-100 d-flex flex-column justify-content-between">
        <div class="bg-dark p-2">
          <a class="d-flex text-decoration-none mt-1 aling-itens-center text-white">
            <span class="fs-4">Crud-tests</span>
          </a>

          <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item py-2 py-sam-0">
              <a href="#" class="nav-link">
                <i class="fs-5 fa fa-guage"></i><span class="link-side-bar fs-4 d-none d-sm-inline">A</span>
              </a>
            </li>

            <li class="nav-item py-2 py-sam-0">
              <a href="#" class="nav-link">
                <i class="fs-5 fa fa-guage"></i><span class="link-side-bar fs-4 d-none d-sm-inline">B</span>
              </a>
            </li>

            <li class="nav-item py-2 py-sam-0">
              <a href="#" class="nav-link">
                <i class="fs-5 fa fa-guage"></i><span class="link-side-bar fs-4 d-none d-sm-inline">C</span>
              </a>
            </li>
          </ul>
        </div>
      </div>


      <div class="card">
        <table class="bg-dark mt-10 text-white">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>