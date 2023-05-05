<?php

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/acoes/excluir.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './Controller/toDoController.php');

$controller = new toDoController();
$Atividade = $controller->buscarTodos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/toDo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="max-width-page-limit">
            <section class="max-width-content-limit main-content">
                <div class="todo-main-container">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <span class="navbar-brand mb-0 h1">ToDo List</span>
                        </div>
                    </nav>

                    <div class="row">
                        <div class="col-4" role="add">
                            <input class="form-control me-2" type="text" placeholder="New Task" aria-label bold="text">
                        </div>

                        <div class="col-2" role="add">
                            <input class="form-control me-2" type="date" placeholder="date" aria-label bold="text">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" href="../Controller/toDoController.php/" type="submit">Adicionar</button>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Atividade as $c) :
                            ?>

                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $c->getId(); ?></td>
                                    <td><?= $c->getTarefa(); ?></td>
                                    <td><?= $c->getData(); ?></td>
                                    <td>
                                        <a class="btn btn-success" href="btn btn-primary?key=<?= $c->getId() ?>">Editar</a>
                                        <a class="btn btn-danger" href="../acoes/excluir.php?key=<?= $c->getId() ?>">Excluir</a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>

</html>