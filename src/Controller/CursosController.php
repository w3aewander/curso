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
      //receber os dados do formulário
      $curso = $this->obterDadosDoFormulario(); 

      
      //verficase se o $id é diferente de vazio e diferente de zero
      if (!empty($curso->getId()) && $curso->getId() != 0) {
         return $this->cursoModel->atualizar($curso, $curso->getId());
      } else {
         return $this->cursoModel->incluir($curso);
      }
   }

   public function obterDadosDoFormulario()
   {
      $id = filter_input(INPUT_POST, 'id') ?? 0;
      $nome = filter_input(INPUT_POST, 'nome');
      $cargaHoraria = filter_input(INPUT_POST, 'carga_horaria');

      $curso = new \App\Entities\Curso();
      $curso->setId($id);
      $curso->setNome($nome);
      $curso->setCargaHoraria($cargaHoraria);

      return $curso;
   }
}
