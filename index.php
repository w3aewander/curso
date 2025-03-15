<?php
/**
 * Arquivo principal - 
 */

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL|E_WARNING);

include 'vendor/autoload.php';

use \App\Controller\CursosController;


$cursosController = new CursosController(); 

$cursosController->listar();

