<?php
/**
 * Controlador da classe home.
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2100
 * 
 */

namespace App\Controller;

use App\View\HomeView;

class HomeController
{

   public $homeView;

   public function __construct()
   {
      $this->homeView = new HomeView();
   }

   public function index()
   {
      $this->homeView->render( __DIR__ . '/../templates/homeView.phtml' );
   }


}