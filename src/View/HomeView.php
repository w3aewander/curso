<?php

/**
 * HomeView
 * @version 20250227.2125
 * 
 */

namespace App\View;

use App\Traits\TraitViewRender;

class HomeView
{
    use TraitViewRender;

    public function index()
    {
        return $this->render(__DIR__ . '/../templates/homeView.phtml');
    }

    public function teste()
    {
        return $this->render(__DIR__ . '/../templates/testeView.phtml');
    }
}
