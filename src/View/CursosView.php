<?php
/**
 * dfadsfafda
 */

 namespace App\View;


 class CursosView {

    public function __construct(){
        
    }

    public function listar($cursos){

       
        ob_start();
        require_once __DIR__ . "/../templates/header.phtml";

        $html = "<div class='container'>";

        //card para a view curso
        $html .= "<div class='card'>";
        $html .= "<div class='card-header'>";
        $html .= "<div class='card-title'> Administrar cadastro de cursos </div>";
        $html .= "</div>";
    
        $html .= "<div class='card-body'>";


        ob_start();
        $html .= require_once(__DIR__ ."/../templates/cursoForm.phtml");

        $html .= "<table class='table table-hover table-striped'>";
        $html .= "<tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Carga Horária</th>
                    <th colspan='2'>Operações</th>
                </tr>";

       
        foreach ( $cursos as $curso ) {
            
            $html .= "<tr>";
            $html .= "<td>{$curso->getId()}</td>";
            $html .= "<td>{$curso->getNome()}</td>";
            $html .= "<td>{$curso->getCargaHoraria()}</td>";

            $html .= "<td><a class='btn btn-sm btn-warning' href='#'><i class='fa fa-edit'></i> Editar</a></td>";
            $html .= "<td><a class='btn btn-sm btn-danger' href='#'><i class='fa fa-trash'></i> Excluir</a></td>";
            $html .= "</tr>";
        }

        $html .= "</table>";        
        
        $html .= "</div>";

        $html .= "</div> <!-- final do card-body -->";

        $html .= "<div class='card-footer'>
                    <div class='text-start'>#Registros: " . count($cursos) . "</div>
                  </div>";

        $html .= "</div> <!-- final do card -->";

        $html .= "</div> <!-- final do container -->";
        
        ob_end_flush();
        echo $html;

        require_once __DIR__ ."/../templates/footer.phtml";



   }
}