<?php
/**
 * Arquivo de rotas
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250301
 * @package App
 */

// Carregar dependências
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;

// Criar container DI
$container = new Container();
AppFactory::setContainer($container);

// Criar app
$app = AppFactory::create();

// Adicionar middleware para parsing do body
$app->addBodyParsingMiddleware();

$base_dir = '/escola';

// Definir base path se necessário
$app->setBasePath($base_dir);

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

$app->get('/teste', function (Request $request, Response $response) {
    $controller = new \App\Controller\HomeController();
    $content = $controller->teste();
    
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

//Rota para editar exibir um curso
$app->get('/cursos/{id}/exibir', function (Request $request, Response $response, $args) {

    $controller = new \App\Controller\CursosController();
    $content = $controller->exibir($args['id']);

        
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    //transformar em json
    $json = json_encode($content);

    //adicionar ao corpo da resposta
    $response->getBody()->write($json);

    //adicionar cabeçalho
    return $response->withHeader('Content-Type', 'application/json');
});

// Rota para uma página de erro 404 (não encontrada)
$app->get('/404', function (Request $request, Response $response) {
    $controller = new \App\Controller\HomeController();
    $content = $controller->notFound();
    
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    $response->getBody()->write($content);
    return $response;
});

$app->get('/cursos/imprimir/pdf', function (Request $request, Response $response) {
    $controller = new \App\Controller\CursosController();
    $content = $controller->imprimirParaPDF();
    
    if ($content === null) {
        $content = ''; // Fallback para conteúdo vazio
    }
    
    $response->getBody()->write($content);
    return $response;
});


//desviar página não encontrada para a página 404
$app->get('/{route:.*}', function (Request $request, Response $response) {
    return $response->withStatus(302)->withHeader('Location', '/curso/404');
});

// Tratamento de erros
$app->addErrorMiddleware(true, true, true);


// Executar aplicação
$app->run();