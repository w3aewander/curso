<?php
/**
 * TurmaDAO
 */

namespace App\Model;

use App\Persistence\Conexao as Conexao;

class TurmaDAO extends DAO implements IDAO{

    public function inserir(\App\Entities\Turma $turma):bool {
        
        try {
           
            $sql = "INSERT INTO turmas (curso_id, data_inicio, data_fim) VALUES (:cursoId, :dataInicio, :dataFim)";
            $stmt = Conexao::conexao()->prepare($sql);
    
            $cursoId = $turma->getCursoId();
            $dataInicio = $turma->getDataInicio();
            $dataFim = $turma->getDataFim();

            $stmt->bindParam(':cursoId', $cursoId);
            $stmt->bindParam(':dataInicio', $dataInicio);
            $stmt->bindParam(':dataFim', $dataFim);
           
            // Executa a inserção
            $resultado = $stmt->execute();

        }
    }
        catch (\PDOException $e) {
            // Log do erro e rollback em caso de exceção
            error_log("Exceção ao inserir turma: " . $e->getMessage());
            return false;
        }
    }
    // Verifica se a inserção foi bem sucedida
    if ($resultado) {                
        error_log("Turma inserida com sucesso. ID: " . Conexao::conexao()->lastInsertId());
        return true;
    }
    // Se chegou aqui, houve erro   
    error_log("Erro ao inserir turma: " . implode(", ", $stmt->errorInfo()));
    return false;

}


