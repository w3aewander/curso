<?php

/**
 * dfadsfafda
 */

namespace App\View;

use App\Traits\TraitViewRender;

class CursosView
{

    use TraitViewRender;

    //Injeção de dependência
    public function listar($cursos)
    {
        
        return $this->render(__DIR__ . '/../templates/cursosView.phtml', ["cursos"=>$cursos]);
    }
}
