<?php
/**
 * Model cursos
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2125
*/

namespace App\Model;

use App\Entities\Curso;

class CursoModel{

    public $curso;
    public $cursos;

    public function __construct(){
    
        $this->cursos = [];
        $this->curso = new Curso();

        $this->curso->setId(1);
        $this->curso->setNome("Programação em PHP");
        $this->curso->setCargaHoraria(80);
        
        $this->cursos[] = $this->curso;

        $this->curso = new Curso();
        $this->curso->setId(2);
        $this->curso->setNome("Programação em Java");
        $this->curso->setCargaHoraria(100);

        
        $this->cursos[] = $this->curso;

        $this->curso = new Curso();
        $this->curso->setId(3);
        $this->curso->setNome("Programação em Python");
        $this->curso->setCargaHoraria(40);
        
        $this->cursos[] = $this->curso;

        
        
    }

    public function listar(){        
       return $this->cursos;
    }
    
    public function incluir(){

    }

    public function excluir(){

    }
}
