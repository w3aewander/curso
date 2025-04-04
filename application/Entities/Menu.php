<?php
/**
 * 
 * Menu Entity
 *  
 */

namespace App\Entities;

class Menu
{
    public int $id;
    public string $descricao;
    public string $url;
    public string $icone;

    public function __construct(int $id,string $descricao,string $url="",string $icone="")
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->url = $url;
        $this->icone = $icone;        
    }
    
}