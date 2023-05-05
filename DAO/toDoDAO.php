<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './conexao/configuracao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . './classes/classToDo.php');

class todoDAO
{

    
    public function buscarTodasAtividades()
    {
        $pdo = connectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM atividade;");
            $stmt->execute();
            $atividade = new Atividade();
            $retorno = array();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $atividade->setId($rs->id);
                $atividade->setTarefa(($rs->nome));
                $atividade->setData($rs->cpf_cnpj);
                $retorno[] = clone $atividade;
            }
            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar atividade: " . $ex->getMessage();
            die();
        }
    }

    public function buscarUmaAtividade($id)
    {
        $pdo = connectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM atividade WHERE id = :id;");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $atividade = new Atividade();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $atividade->setId($rs->id);
                $atividade->setTarefa(($rs->tarefa));
                $atividade->setData($rs->data);
            }
            return $atividade;
        } catch (PDOException $ex) {
            echo "Erro ao buscar atividade: " . $ex->getMessage();
            die();
        }
    }

    public function removeAtividade($id)
    {
        $pdo = connectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('DELETE FROM atividade WHERE id = :id');
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
            }
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo "Erro ao excluir atividade: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function adicionarAtividade(Atividade $atividade)
    {
        $pdo = connectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO atividade (tarefa, 'data',) VALUES (:tarefa, :'data',)");
            $stmt->bindValue(":tarefa", $atividade->getTarefa());
            $stmt->bindValue(":'data'", $atividade->getData());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $ex) {
            echo "Erro ao adicionar atividade: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function editarAtividade(Atividade $atividade)
    {
        $pdo = connectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE atividade SET tarefa = :tarefa, 'data' = :'date' WHERE id = :id");
            $stmt->bindValue(":tarefa", $atividade->getTarefa());
            $stmt->bindValue(":'data'", $atividade->getData());
            $stmt->bindValue(":id", $atividade->getId());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $ex) {
            echo "Erro ao editar atividade: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }
}
