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
    
        catch (\PDOException $e) {
            // Log do erro e rollback em caso de exceção
            error_log("Exceção ao inserir turma: " . $e->getMessage());
            return false;
        }
    }
    public function listar(): string {
        $sql = "SELECT * FROM turmas";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->execute();
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC));
    }
}




