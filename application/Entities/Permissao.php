<?php
/**
 * Entidade Permissao
 * 
 */

namespace App\Entities;

use ArrayAccess;

class Permissao
{
    private int $id;
    private string $descricao;
    private Perfil $perfil;
    private Array $routes;
    
    public function __construct(int $id, string $descricao, Perfil $perfil, Array $routes)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->perfil = $perfil;
        $this->routes = $routes;
    }

    
    

}