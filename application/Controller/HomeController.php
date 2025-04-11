<?php
/**
 * Controlador da classe home.
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2100
 * 
 */

namespace App\Controller;

use App\View\HomeView;

class HomeController extends Controller
{

   public $homeView;

   public function __construct()
   {
      parent::__construct();
      
      $this->homeView = new HomeView();
   }

   public function index()
   {
     
      return $this->homeView->render( __DIR__ . '/../templates/homeView.phtml', ["menu" => $this->menu] );
   }

   public function teste(): mixed
   {
      return $this->homeView->render( __DIR__ . '/../templates/testeView.phtml', ["escola"=>"Escola de Programação"] );
   }

   public function notFound()
   {
      return $this->homeView->render( __DIR__ . '/../templates/404View.phtml' );
   }

}