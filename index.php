<?php
/**
 * Arquivo principal - 
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL|E_WARNING);
ini_set('memory_limit', '512M');

include 'vendor/autoload.php';

use \App\Controller\CursosController;

//chamar o sistema de rotas
use \App\Route\Route;

Route::init($_GET['url'] ?? 'home/index');




