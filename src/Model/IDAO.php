<?php
/**
 * 
 */

 namespace App\Model;

 interface IDAO {

    public function inserir(\App\Entities\Curso $curso) : bool ;    
    public function excluir(int $id): bool;
    public function atualizar(\App\Entities\Curso $curso, int $id): bool;
    public function listar(): array|null;
    public function exibir(\App\Entities\Curso $curso) : array|null;
    public function pesquisarPorId(int $id): \App\Entities\Curso|null;
    public function pesquisarPeloNome(string $nome):\App\Entities\Curso|null;
 }