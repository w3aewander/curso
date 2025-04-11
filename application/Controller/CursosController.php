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

use \Fpdf\Fpdf;

use Exception;

use Slim\Psr7\Factory\RequestFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class CursosController extends Controller
{

   public $cursosView;
   public $cursoModel;

   public function __construct()
   {
      parent::__construct();
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

   public function salvar(Request $request): mixed
   {
      //criar um objeto de resposta
      $response = new Response();

      //verifica se o id � diferente de vazio e diferente de zero
      $id = filter_input(INPUT_POST, 'id') ?? 0;


      //receber os dados do formulário
      $curso = $this->obterDadosDoFormulario(); 

        
      //verficase se o $id � diferente de vazio e diferente de zero
      if (!empty($curso->getId()) && $curso->getId() != 0) {
         //atualizar o curso
         if ( $this->cursoModel->atualizar($curso, $curso->getId()) ){
            $resp = [
               'status' => 'success',
               'message' => 'Curso atualizado com sucesso.',
               'curso' => $curso
            ]; 
         }
                  
         
      } else {
         //incluir o curso
         if ( $this->cursoModel->incluir($curso) ){
            $resp = [
               'status' => 'success',
               'message' => 'Curso incluído com sucesso.',
               'curso' => $curso
            ]; 
         } 
      }

      //resornar um  response.ok
      return json_encode($resp);
      
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


   //usar o fpdf para criar um relatorio em PDF.
   public function imprimirParaPDF()
   {
      //criar um objeto fpdf
      $pdf = new Fpdf('P', 'mm', 'A4');
      //adicionar uma p�gina

      //alterar o encoding para UTF-8
      $pdf->AddPage('P', 'A4');     

      $pdf->AliasNbPages();

      //desenha um retângulo
      $pdf->SetFillColor(200, 220, 255);
      $pdf->Rect(140, 10, 60, 30, 'D', 'F');

      //definir a fonte
      $pdf->SetFont('Arial', 'B', 16);
      // Logo
      //$pdf->Image( __DIR__ .'/../../img/logo_wmo.png', 170, 6, 30);
      // Arial bold 15
      $pdf->SetFont('Arial', 'B', 15);
      
      // desenhar uma linha
      $pdf->Line(10, 40, 200, 40);

      //escrever na página
      $titulo  = iconv("UTF-8", "iso-8859-1","Titulo da Página");
      $pdf->Cell(190, 50, $titulo, 0, 0, 'C');

      $this->cursoModel = new CursoModel;
      $cursos = json_decode($this->cursoModel->listar());

      $pdf->SetFont('Arial', 'B', 10);
      
      $pdf->Ln(40);

      //centralizar o conteúdo na página
      $pdf->SetX(25);
            

      $pdf->Cell(10, 7, 'ID', 1, 0, 'C');
      $pdf->Cell(100, 7, 'Nome', 1, 0, 'C');
      $pdf->Cell(50, 7, iconv('UTF-8', 'iso-8859-1','Carga horária'), 1, 1, 'C');

      $pdf->SetFont('Arial', '', 8);
      foreach ($cursos as $curso) {
         $pdf->SetX(25);
         $pdf->Cell(10, 5, $curso->id, 1, 0, 'C');
         
         // converter o encondig para UTF-8
         $nome = iconv("UTF-8", "iso-8859-1",$curso->nome);

         $pdf->Cell(100, 5, $nome, 1, 0, 'C');
         
         $pdf->Cell(50, 5, $curso->carga_horaria, 1, 1, 'C');

         
      }
      $pdf->SetX(25);
      $pdf->Cell(0,10,'Total de cursos: ' . count($cursos),0,1);
      

      $pdf->SetY(-35);
      // Arial italic 8
      $pdf->SetFont('Arial','I',8);
      // Page number
      $pdf->Cell(10,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');

      return $pdf->Output('I', 'Cursos.pdf');
      
   }
}
