<?php
/**
 * Entidade Curso
 * @version 20250227.2125
 */
namespace App\Entities;

class Curso{

    private $id;
    private $nome;
    private $cargaHoraria;

    public function __construct($nome="", $cargaHoraria="", $id=0){
        $this->nome = $nome;
        $this->cargaHoraria = $cargaHoraria;
        $this->id = $id;
    }

    // Getters
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function getCargaHoraria(){
        return $this->cargaHoraria;
    }

    //setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCargaHoraria($cargaHoraria){
        $this->cargaHoraria = $cargaHoraria;
    }

}