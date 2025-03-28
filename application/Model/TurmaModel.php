<?php
/**
 * 
 * Model Turma
 */


namespace App\Model;

use App\Entities\Turma as Turma;
use App\Model\DAO;
use Slim\App;


class TurmaModel
{
    protected $dao;

    public function __construct()
    {
        $this->dao = new TurmaDAO();
    }

    public function listar()
    {        
        return  $this->dao->listar();
    }

    public function exibir(int $id)
    {        
        return $this->dao->exibir($id);
    }   

    public function incluir(Turma $turma)
    {
        
        return $this->dao->inserir($turma);
    }

    public function atualizar(Turma $turma, int $id)
    {        
        return $this->dao->atualizar($turma, $id);
    }   

    public function excluir() {}
}

