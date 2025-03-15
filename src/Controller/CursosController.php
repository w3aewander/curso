<?php

/**
 * Controlador da classe cursos.
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2100
 */

namespace App\Controller;

use App\Model\CursoModel;
use App\View\CursosView;
use App\Persistence\Conexao;
use Exception;

class CursosController
{

   public $cursosView;
   public $cursoModel;

   public function __construct()
   {
      $this->cursoModel = new CursoModel;
      $this->cursosView = new CursosView();

  
   }

   public function listar()
   {
      $cursos = [];

      foreach ($this->cursoModel->listar() as $curso) {
         $cursos[] = $curso;
      }

      return  $this->cursosView->listar($cursos);
   }

   public function inserir(){
      
      $novoCurso = new \App\Entities\Curso();
      $novoCurso->setId(0);
      $novoCurso->setNome("JAva Kids");
      $novoCurso->setCargaHoraria(40);

      $dao = new \App\Model\DAO();
      $dao->inserirCurso($novoCurso);

   }
}
