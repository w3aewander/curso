<?php
/**
 * dfadsfafda
 */

 namespace App\View;


 class CursosView {

    public function __construct(){
        
    }

    public function listar($cursos){

        
        $header = file_get_contents("src/templates/header.phtml");

        $navbar = file_get_contents( "src/templates/navbar.phtml");

        $html = "<table class='table table-hover table-striped'>";
        $html .= "<tr><th>Id</th><th>Nome</th><th>Carga Horária</th></tr>";

        foreach ( $cursos as $curso ) {
            
            $html .= "<tr>";
            $html .= "<td>{$curso->getId()}</td>";
            $html .= "<td>{$curso->getNome()}</td>";
            $html .= "<td>{$curso->getCargaHoraria()}</td>";
            $html .= "</tr>";
        }

        $html .= "</table>";

        $opts = array(
            "http" => array(
                "method" => "GET",
                "header" => "Content-Type: text/html"  
            )
        );

        $footer = file_get_contents("src/templates/footer.phtml", false, stream_context_create($opts));

        echo $header.$navbar.$html.$footer;

   }
}