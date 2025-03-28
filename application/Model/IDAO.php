<?php
/**
 * 
 */

 namespace App\Model;

 interface IDAO {

    public function inserir(\App\Entities\Curso $curso) : bool ;    
    public function excluir(int $id): bool;
    public function atualizar(\App\Entities\Curso $curso, int $id): bool;
    public function listar(): mixed;
    public function exibir(int $id) : mixed;
    public function pesquisarPorId(int $id): mixed;
    public function pesquisarPeloNome(string $nome):mixed;

 }