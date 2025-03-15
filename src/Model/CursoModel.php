<?php

/**
 * Model cursos
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2125
 */

namespace App\Model;

use App\Entities\Curso;
use App\Model\DAO;

class CursoModel
{

    protected $curso;
    protected $dao;

    public function listar()
    {
        $this->dao = new CursoDAO();
        $cursos = $this->dao->listar();
        return $cursos;
    }

    public function incluir() {}

    public function excluir() {}
}
