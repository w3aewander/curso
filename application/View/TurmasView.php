<?php

/**
 * dfadsfafda
 */

namespace App\View;

use App\Traits\TraitViewRender;

class TurmasView
{

    use TraitViewRender;

    //Injeção de dependência
    public function listar($turmas)
    {
        
        return $this->render(__DIR__ . '/../templates/turmasView.phtml', ["turmas"=>$turmas]);
    }
}