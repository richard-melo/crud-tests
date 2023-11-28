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

    <h1 style="text-align: center;">Nova Tarefa</h1>
    <div style="display: flex; justify-content: center;">
        <form action="./api/information" method="POST" class="formNewTask" style="width: 50%;">
            <input type="hidden" name="action" value="save">
            <div class="mb-3">
                <label for="link" class="form-label">Link Task</label>
                <input class="form-control" name="link" id="link" placeholder="https://suaTarefa.com">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comentário</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="difficulty" class="form-label">Nível de Dificuldade</label>
                <input type="range" class="form-control" name="difficulty" id="difficulty" min="1" max="5">
                <div class="form-text text-center" id="difficultyValue">3</div>

                <script>
                    const difficultyInput = document.getElementById('difficulty');
                    const difficultyValue = document.getElementById('difficultyValue');

                    difficultyInput.addEventListener('input', function() {
                        difficultyValue.textContent = difficultyInput.value;
                    });
                </script>

            </div>
            <div class="mb-3">
                <label for="responsible" class="form-label">Responsável</label>
                <select class="form-control" name="responsible" id="responsible">
                    <option value=''>Selecione</option>
                    <option value='Richard'>Richard</option>
                    <option value='Caio'>Caio</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-dark">Submit</button>
                <a href="index.php" class="btn btn-dark float-end">Voltar</a>
            </div>
        </form>
    </div>



</body>