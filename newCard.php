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
    <h1>Nova Tarefa</h1>
    <form action="save.php/action?save" method="POST" class="formNewTask" >
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
            <label for="difficulty" class="form-label">Dificuldade</label>
            <input class="form-control" name="difficulty" id="difficulty">
        </div>
        <div class="mb-3">
            <label for="responsible" class="form-label">Responsável</label>
            <select class="form-control" name="responsible" id="responsible">
                <option value=''>Selecione</option>
                <option value='Richard'>Richard</option>
                <option value='Caio'>Caio</option>
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</body>