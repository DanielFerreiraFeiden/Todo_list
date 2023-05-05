<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./DAO/toDoDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "./classes/classToDo.php");

class toDoController
{

    public function buscarTodos()
    {
        $dao = new todoDAO();
        return $dao->buscarTodasAtividades();
    }

    public function buscarPorId($id)
    {
        $dao = new todoDAO();
        return $dao->buscarUmaAtividade($id);
    }

    public function excluirAtividade(Atividade $atividade) 
    {
        $dao = new todoDAO();
        return $dao->removeAtividade($atividade);
    }

    public function criarAtividade(Atividade $atividade)
    {
        $dao = new todoDAO();
        return $dao->adicionarAtividade($atividade);
    }

    public function atualizarAtividade(Atividade $atividade) 
    {
        $dao = new todoDAO();
        return $dao->editarAtividade($atividade);
    }
}
