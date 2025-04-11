<?php
/**
 * * AuthController
 */

namespace App\Controller;

use App\Entities\Usuario;
use App\Entities\Perfil;
use App\Entities\Rota;
use Slim\Psr7\Request;

class AuthController {

    public function auth(Request $request, Response $response){
        $body = $request->getParsedBody();
    
        return $response;   
    }
}