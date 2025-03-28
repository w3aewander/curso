<?php
/**
 * TurmasController
 */

namespace App\Controller;

use App\Model\TurmaModel;

use App\View\TurmasView;


class TurmasController
{
    public $turmasView;
    public $turmaModel;

    public function __construct()
    {
        $this->turmaModel = new TurmaModel;
        $this->turmasView = new TurmasView();
    }

    public function index()
    {
        $turmas = json_decode($this->turmaModel->listar());

        return $this->turmasView->listar($turmas);
    }

    public function exibir(int $id): mixed
    {
        $turma = $this->turmaModel->exibir($id);
        return $turma;
    }
    public function salvar()
    {
        //receber os dados do formulário
        $turma = $this->obterDadosDoFormulario(); 

        //verficase se o $id � diferente de vazio e diferente de zero
        if (!empty($turma->getId()) && $turma->getId() != 0) {
            return $this->turmaModel->atualizar($turma, $turma->getId());
        } else {
            return $this->turmaModel->incluir($turma);
        }
    }
    public function obterDadosDoFormulario()
    {
        $id = filter_input(INPUT_POST, 'id') ?? 0;
        $cursoId = filter_input(INPUT_POST, 'curso_id');
        $dataInicio = filter_input(INPUT_POST, 'data_inicio');
        $dataFim = filter_input(INPUT_POST, 'data_fim');

        $turma = new \App\Entities\Turma();
        $turma->setId($id);
        $turma->setCursoId($cursoId);
        $turma->setDataInicio($dataInicio);
        $turma->setDataFim($dataFim);

        return $turma;
    }
    public function listar()
    {
        $turmas = json_decode($this->turmaModel->listar());
        return $this->turmasView->listar($turmas);
    }
    public function excluir(int $id)
    {
        return $this->turmaModel->excluir($id);
    }
    
}