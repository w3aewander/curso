<?php
/**
 * Arquivo principal - Ponto de entrada da aplicação
 * @version 1.0
 * @author Seu Nome
 */

// Configurações iniciais
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL|E_WARNING);

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/../application/routes.php';






