<?php

/**
 * Classe responsável pela conexão com o banco de dados.
 * @author Wanderlei Silva do Carmo <Wander.silva@gmail.com>
 * @version 1.0
 * 
 */


namespace App\Persistence;

use PDO;

// Pattern Singleton
// https://www.php.net/manual/pt_BR/pdo.connections.php
class Conexao
{

  
  private static $conexao;

  public static function conexao()
    {
        $jsonFile = __DIR__ . '/../config/config.json';

        $json = json_decode(file_get_contents($jsonFile));

        //Parametros de conexão mais comuns
        $options = [];

        //Padrão de projeto - Singleton
        if (!self::$conexao) {
            //criar uma conexão MySQL usando o PDF
            self::$conexao  = new PDO($json->dsn, $json->user, $json->pass, $options);
        }

        return self::$conexao;
    }

    
}
