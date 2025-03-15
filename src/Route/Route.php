<?php
/**
 * CursoDAO
 * @version 20250227.2125
 * 
 */

namespace App\Route;

use App\Persistence\Conexao;

//crie um sistema de rotas para a aplicação
class Route
{
    public static function init($url)
    {
        $url = explode('/', $url);

        $controller = (!empty($url[0]) ? $url[0] : 'home') . 'Controller';
        $action = (!empty($url[1]) ? $url[1] : 'index');
        $param = (!empty($url[2]) ? $url[2] : null);

        $controller = 'App\\Controller\\' . ucfirst($controller);
        $action = $action;

        if (!class_exists($controller)) {
            $controller = 'App\\Controller\\HomeController';
            $action = 'index';
        }

        $controller = new $controller;
        $controller->$action($param);

    }
}


