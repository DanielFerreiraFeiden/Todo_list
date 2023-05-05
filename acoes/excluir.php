<?php

session_start();
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./classes/classToDo.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./Controller/toDoController.php");

$atividade = new Atividade();

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');
    $controller = new toDoController();
    $atividade = $controller->buscarPorId($id);

    $controller = new toDoController();
    $resultado = $controller->excluirAtividade($id);

    if ($resultado) {
        $_SESSION['mensagem'] = "Atividade removida com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao remover atividade";
        $_SESSION['sucesso'] = false;
    }
}