<?php
/**
 * Arquivo principal - Ponto de entrada da aplicação
 * @version 1.0
 */

// Configurações iniciais
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL|E_WARNING);

// Carrega o autoloader do Composer
require __DIR__ . '/../vendor/autoload.php';

// Configura o timezone
date_default_timezone_set('America/Sao_Paulo');

// Inicia a sessão
session_start();

// Carrega as rotas
require __DIR__ . '/../application/routes.php';


require __DIR__ . '/../application/helpers/functions.php';


