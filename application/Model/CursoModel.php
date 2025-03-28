<?php

/**
 * Model cursos
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2125
 */

namespace App\Model;

use App\Entities\Curso as Curso;
use App\Model\DAO;
use Slim\App;

class CursoModel
{

    protected $dao;

    public function __construct()
    {
        $this->dao = new CursoDAO();
    }

    public function listar()
    {        
        return  $this->dao->listar();
    }

    public function exibir(int $id)
    {        
        return $this->dao->exibir($id);
    }   

    public function incluir(Curso $curso)
    {
        
        return $this->dao->inserir($curso);
    }

    public function atualizar(Curso $curso, int $id)
    {        
        return $this->dao->atualizar($curso, $id);
    }   

    public function excluir() {}
}
