<?php
/**
 *  CursoDAO
 */

 namespace App\Model;

use App\Persistence\Conexao as Conexao;

 class CursoDAO extends DAO implements IDAO{

	public function inserir(\App\Entities\Curso $curso):bool {
        
        try {
           
            $sql = "INSERT INTO cursos (nome, carga_horaria) VALUES (:nome, :cargaHoraria)";
            $stmt = Conexao::conexao()->prepare($sql);
    
            $nome = $curso->getNome();
            $cargaHoraria = $curso->getCargaHoraria();

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cargaHoraria', $cargaHoraria);
           
            // Executa a inserção
            $resultado = $stmt->execute();
           

            // Verifica se a inserção foi bem sucedida
            if ($resultado) {                
                error_log("Curso inserido com sucesso. ID: " . Conexao::conexao()->lastInsertId());
                return true;
            }
    
            // Se chegou aqui, houve erro
            error_log("Erro ao inserir curso: " . implode(", ", $stmt->errorInfo()));
            return false;
    
        } catch (\PDOException $e) {
            // Log do erro e rollback em caso de exceção
            error_log("Exceção ao inserir curso: " . $e->getMessage());
            return false;
        }
    }

	public function excluir(int $id) : bool {
		$sql = "DELETE FROM cursos WHERE id = :id";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();    
	}

	public function atualizar(\App\Entities\Curso $curso, int $id): bool {

		$sql = "UPDATE cursos SET nome = :nome, carga_horaria = :carga_horaria WHERE id = :id";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindParam(':id', $curso->getId());
        $stmt->bindParam(':nome', $curso->getNome());
        $stmt->bindParam(':carga_horaria', $curso->getCargaHoraria());
        return $stmt->execute();
	}

	public function listar() : mixed {
		$sql = "SELECT * FROM cursos";
        $stmt = Conexao::conexao()->prepare($sql);
        
        $cursos = [];

        $stmt->execute();

        while($row = $stmt->fetch(\PDO::FETCH_OBJ)){
            $cursos[] = $row;
        }
        
        //retornar json        
        return json_encode($cursos);	}

	public function exibir(int $id): mixed {
		$sql = "SELECT * FROM cursos WHERE id = :id";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);   
	}

	public function pesquisarPorId($id): mixed{
		// Implementation here
        return null;
	}

	public function pesquisarPeloNome($nome):mixed {
		// Implementation here
        return null;
	}
 }