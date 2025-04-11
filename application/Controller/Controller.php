<?php
/**
 *  Controller base
 */

namespace App\Controller;


class Controller {

    /**
     * @var string
     */
    protected $menu;

    public function __construct()
    {
        // Carrega o menu
        $this->menu = \App\Model\Menu::carregarMenu();
        
    }

 
}