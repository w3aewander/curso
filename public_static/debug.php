<?php
/**
 * Arquivo de debug
 * @version 1.0
 */

 function checkAsset($path) {
    $publicPath = __DIR__;
    $hashedPath = mix($path);
    $fullPath = $publicPath . $hashedPath;
    
    return [
        'requested_path' => $path,
        'resolved_path' => $hashedPath,
        'full_path' => $fullPath,
        'exists' => file_exists($fullPath),
        'size' => file_exists($fullPath) ? filesize($fullPath) : 0,
        'permissions' => file_exists($fullPath) ? substr(sprintf('%o', fileperms($fullPath)), -4) : 'N/A',
        'content_start' => file_exists($fullPath) ? substr(file_get_contents($fullPath), 0, 50) . '...' : 'N/A'
    ];
}

$assets = [
    'vendors' => 'js/chunk-vendors.js',
    'app' => 'js/index.js',
    'css' => 'css/index.css'
];

header('Content-Type: text/plain');
echo "== Verificação Detalhada de Assets ==\n\n";

foreach ($assets as $name => $path) {
    $check = checkAsset($path);
    echo "Asset: {$name}\n";
    echo "Caminho Solicitado: {$check['requested_path']}\n";
    echo "Caminho Resolvido: {$check['resolved_path']}\n";
    echo "Caminho Completo: {$check['full_path']}\n";
    echo "Existe: " . ($check['exists'] ? 'Sim' : 'Não') . "\n";
    echo "Tamanho: {$check['size']} bytes\n";
    echo "Permissões: {$check['permissions']}\n";
    echo "Início do Conteúdo: {$check['content_start']}\n\n";
}