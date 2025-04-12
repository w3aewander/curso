<?php
/**
 * Arquivo de controlador de login
 */

namespace App\Controller;
class LoginController extends Controller
{
    public function __construct()
    {
        // Inicializa o controlador pai
        parent::__construct();
        // Carrega o menu
    }
    /**
     * Método para renderizar a página de login
     *
     * @return string
     */

    public function index()
    {
        // Renderizar o template de login
        $view = $this->view->make('login');
        return $view->render();
    }
}