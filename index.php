<?php
/**
 * Arquivo principal - Ponto de entrada da aplicação
 * @version 1.0
 * @author Seu Nome
 */

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/vendor/autoload.php';

// Configurações iniciais
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL|E_WARNING);
date_default_timezone_set('America/Sao_Paulo');

// Criar container DI
$container = new Container();
AppFactory::setContainer($container);

// Criar app
$app = AppFactory::create();

// Adicionar middleware para parsing do body
$app->addBodyParsingMiddleware();

// Definir base path se necessário
$app->setBasePath('/curso');

// Rotas
$app->get('/', function (Request $request, Response $response) {
    $controller = new \App\Controller\HomeController();
    $content = $controller->index();
    
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    $response->getBody()->write($content);
    return $response;
});

$app->get('/cursos', function (Request $request, Response $response) {
    $controller = new \App\Controller\CursosController();
    $content = $controller->index();
    
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    $response->getBody()->write($content);
    return $response;
});

$app->get('/cursos/listar', function (Request $request, Response $response) {
    $controller = new \App\Controller\CursosController();
    $content = $controller->listar();
    
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    $response->getBody()->write($content);
    return $response;
});

// Tratamento de erros
$app->addErrorMiddleware(true, true, true);

// Executar aplicação
$app->run();




