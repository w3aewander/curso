<?php
/**
 * Entidade Turma
 */

namespace App\Entities;


class Turma {

    private $id;
    private $cursoId;
    private $dataInicio;
    private $dataFim;

    public function __construct($cursoId="", $dataInicio="", $dataFim="", $id=0){
        $this->cursoId = $cursoId;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->id = $id;
    }

    // Getters
    public function getId(){
        return $this->id;
    }
    
    public function getCursoId(){
        return $this->cursoId;
    }

    public function getDataInicio(){
        return $this->dataInicio;
    }

    public function getDataFim(){
        return $this->dataFim;
    }

    //setters
    public function setId($id){
        $this->id = $id;
    }
    public function setCursoId($cursoId){
        $this->cursoId = $cursoId;
    }
    public function setDataInicio($dataInicio){
        
        $this->dataInicio = $dataInicio;
    }   
    public function setDataFim($dataFim){
        $this->dataFim = $dataFim;
    }
    
}