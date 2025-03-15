<?php
/**
 * dfadsfafda
 */

 namespace App\View;

use App\Controller\CursosController;

 class CursosView {


    public function listar(){

    }

    public function index(){
        $cursosController = new CursosController();
        $cursosController->index();
    }
}