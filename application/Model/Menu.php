<?php
/**
 * 
 *  Menu
 */

namespace App\Model;
use App\Entities\Menu as MenuEntity;


class Menu{
    
    
    public static function carregarMenu(): array
    {
    
        $conexao = \App\Persistence\Conexao::conexao();
        
        $sql = "SELECT id, descricao, url, icone FROM menu";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        

        $menu = [];

        while( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ){
            
            $menu[] = new MenuEntity($row['id'], $row['descricao'], $row['url'] ?? '', $row['icone'] ?? '');
        }
        
        return $menu;
    }
}