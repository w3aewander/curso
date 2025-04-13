<?php

if (!function_exists('csrf_token')) {
    function csrf_token() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('config')) {
    function config($key, $default = null) {
        $configs = [
            'app.name' => 'Curso App'
        ];

        return $configs[$key] ?? $default;
    }
}


if (!function_exists('public_path')) {
    function public_path($path = '') {
        return dirname(__DIR__, 2) . '/public/' . ltrim($path, '/');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('config')) {
    function config($key, $default = null) {
        $configs = [
            'app.name' => 'Curso App'
        ];

        return $configs[$key] ?? $default;
    }
}


if (!function_exists('mix')) {
    function mix($path) {
        $publicPath = dirname(__DIR__, 2) . '/public';
        $directory = dirname($publicPath . '/' . $path);
        $filename = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        // Procura por arquivos com hash
        $pattern = $directory . '/' . $filename . '.*.'. $extension;
        $files = glob($pattern);
        
        if (!empty($files)) {
            // Retorna o primeiro arquivo encontrado com o padrão
            return '/' . str_replace($publicPath . '/', '', $files[0]);
        }
        
        // Se não encontrar arquivo com hash, retorna o caminho original
        return '/' . ltrim($path, '/');
    }
}



if (!function_exists('findHashedFile')) {
    function findHashedFile($path) {
        $publicPath = dirname(__DIR__, 2) . '/public';
        $directory = dirname($publicPath . '/' . $path);
        $filename = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        $pattern = $directory . '/' . $filename . '.*.'. $extension;
        $files = glob($pattern);
        
        if (!empty($files)) {
            return '/' . str_replace($publicPath . '/', '', $files[0]);
        }
        
        return '/' . $path;
    }
}