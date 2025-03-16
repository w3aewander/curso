<?php
/**
 * CursoDAO
 * @version 20250227.2125
 * 
 */

namespace App\Route;

class Route
{
    private static $controllers = [
        'home' => 'HomeController',
        'cursos' => 'CursosController'
    ];

    public static function init($url)
    {
        error_log("[DEBUG] URL recebida: " . print_r($url, true));
        
        // Limpa e divide a URL
        $url = trim($url, '/');
        $parts = explode('/', $url);
        
        // Obtém o controller da URL ou usa 'home' como padrão
        $requestedController = strtolower(!empty($parts[0]) ? $parts[0] : 'home');
        
        // Determina qual controller usar baseado no mapeamento
        $controllerName = isset(self::$controllers[$requestedController]) 
            ? self::$controllers[$requestedController]
            : ucfirst($requestedController) . 'Controller';
            
        // Define o namespace completo do controller
        $controllerClass = "App\\Controller\\{$controllerName}";
        
        error_log("[DEBUG] Tentando carregar controller: " . $controllerClass);

        // Define o método (action) ou usa 'index' como padrão
        $method = !empty($parts[1]) ? $parts[1] : 'index';
        
        // Coleta parâmetros adicionais
        $params = array_slice($parts, 2);

        try {
            if (!class_exists($controllerClass)) {
                throw new \Exception("Controller não encontrado: {$controllerName}");
            }

            $controller = new $controllerClass();

            if (!method_exists($controller, $method)) {
                throw new \Exception("Método '{$method}' não encontrado em {$controllerName}");
            }

            return call_user_func_array([$controller, $method], $params);

        } catch (\Exception $e) {
            self::handleError($e, $parts);
        }
    }

    private static function handleError(\Exception $e, array $urlParts)
    {
        header("HTTP/1.0 404 Not Found");
        echo "<div style='margin: 20px; font-family: Arial, sans-serif;'>";
        echo "<h1>Erro 404 - Página não encontrada</h1>";
        echo "<p><strong>Erro:</strong> " . $e->getMessage() . "</p>";
        echo "<p><strong>URL solicitada:</strong> /" . implode('/', $urlParts) . "</p>";
        
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            echo "<p><strong>Debug:</strong></p>";
            echo "<pre>" . $e->getTraceAsString() . "</pre>";
        }
        
        echo "</div>";
        exit;
    }
}


