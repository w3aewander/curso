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

   public function index()
   {
      $cursos = json_decode($this->cursoModel->listar());

      return $this->cursosView->listar($cursos);
   }

   public function exibir(int $id): mixed
   {
      $curso = $this->cursoModel->exibir($id);
      return $curso;
   }

   public function salvar()
   {
      //obter os dados do formulário
      $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
      $cargaHoraria = filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_NUMBER_INT);


      $curso = new \App\Entities\Curso();
      $curso->setNome($nome);
      $curso->setCargaHoraria($cargaHoraria);     

      //verficase se o $id é diferente de vazio e diferente de zero
      if (!empty($id) && $id != 0) {
         $curso->setId($id);
         return $this->cursoModel->atualizar($curso, $id);
      } else {
         return $this->cursoModel->inserir($curso);
      }
   }
}
