<?php

class Atividade
{

    private int $id;
    private string $tarefa;
    private string $data;
    private string $status;
    private string $acoes;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTarefa(): string
    {
        return $this->tarefa;
    }

    public function setTarefa(string $tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data)
    {
        $this->data = $data;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getAcoes(): string
    {
        return $this->acoes;
    }

    public function setAcoes(string $acoes)
    {
        $this->acoes = $acoes;
    }
}
