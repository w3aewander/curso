<?php
/**
 *  CursoDAO
 */

 namespace App\Model;

use App\Persistence\Conexao;

 class CursoDAO extends DAO implements IDAO{

	public function inserir(\App\Entities\Curso $curso):bool {
		$sql = "INSERT INTO cursos (nome, carga_horaria) VALUES (:nome, :carga_horaria)";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindValue(':nome', $curso->getNome());
        $stmt->bindValue(':carga_horaria', $curso->getCargaHoraria());
        return $stmt->execute();
	}

	public function excluir(int $id) : bool {
		$sql = "DELETE FROM cursos WHERE id = :id";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();    
	}

	public function atualizar(\App\Entities\Curso $curso, int $id): bool {

		$sql = "UPDATE cursos SET nome = :nome, carga_horaria = :carga_horaria WHERE id = :id";
        $stmt = Conexao::conexao()->prepare($sql);
        $stmt->bindValue(':id', $curso->getId());
        $stmt->bindValue(':nome', $curso->getNome());
        $stmt->bindValue(':carga_horaria', $curso->getCargaHoraria());
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
        $stmt->bindValue(':id', $id);
        
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);   
	}

	public function pesquisarPorId($id): mixed{
		// Implementation here
	}

	public function pesquisarPeloNome($nome):mixed {
		// Implementation here
	}
 }