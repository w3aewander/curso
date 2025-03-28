<?php

/**
 *  DAO - Data Access Object
 *  @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 *  @version
 * 
 */


namespace App\Model;

use \App\Persistence\Conexao;

class DAO extends Conexao
{

    /**
     * Inserir registro na tabela curso.
     * @param 
     * @return
     */
    public  function inserirCurso(\App\Entities\Curso $curso)
    {

        //$id = $curso->getId();
        $nome = $curso->getNome();
        $cargaHoraria = $curso->getCargaHoraria();

        //Consulta de inserção de dados
        $sql = "INSERT INTO cursos ( nome, carga_horaria) VALUES(?,?) ";

        //Criar uma consulta Preparada PreparedStatement
        $pstm = Conexao::conexao()->prepare($sql);

        $pstm->bindValue(1, $nome);
        $pstm->bindValue(2, $cargaHoraria);

        //Executar a consulta
        if ($pstm->execute()) {
            echo "Dados incluídos com sucesso na tabela cursos";
        } else {
            echo "Nenhum dado inserido.";
        }
    }
}
