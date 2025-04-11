<?php
/**
 *  
 *  LoginController
 */

namespace App\Controller;

use App\Entities\Usuario;

class LoginController extends AuthController {

    public function login(string $login, string $senha): Usuario
    {
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);


        // Aqui você pode adicionar a lógica para autenticar o usuário
        // Por exemplo, verificar se o login e a senha estão corretos

    }

    public function validarLogin(Usuario $usuario): bool
    {
        // Aqui você pode adicionar a lógica para validar o login e a senha
        // Por exemplo, verificar se o login e a senha estão corretos

        
        return true; // Retorne true se o login for válido, caso contrário, false
    }

    public function getUsuarioLogado(): Usuario
    {
        // Aqui você pode adicionar a lógica para obter o usuário logado
        // Por exemplo, buscar o usuário na sessão ou no banco de dados

        return new Usuario(); // Retorne o usuário logado
    }

    public function getPermissoes(Usuario $usuario): array
    {
        // Aqui você pode adicionar a lógica para obter as permissões do usuário
        // Por exemplo, buscar as permissões no banco de dados

        return []; // Retorne um array com as permissões do usuário
    }
    public function getRotas(Usuario $usuario): array
    {
        // Aqui você pode adicionar a lógica para obter as rotas do usuário
        // Por exemplo, buscar as rotas no banco de dados

        return []; // Retorne um array com as rotas do usuário
    }
    
    public function logout(): void
    {
        // Aqui você pode adicionar a lógica para fazer logout do usuário
        // Por exemplo, destruir a sessão ou remover o token de autenticação
    }   
}

