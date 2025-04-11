<?php
/**
 * Entidade Usuario
 */
namespace App\Entities;

use App\Entities\Perfil;

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $data_nascimento;
    private string $data_cadastro;
    private Perfil $perfil;

    public function __construct(
        int $id,
        string $nome,
        string $email,
        string $senha,
        string $data_nascimento,
        string $data_cadastro
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_nascimento = $data_nascimento;
        $this->data_cadastro = $data_cadastro;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }   
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getSenha(): string
    {
        return $this->senha;
    }           
    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }
    public function getDataNascimento(): string
    {
        return $this->data_nascimento;
    }
    public function setDataNascimento(string $data_nascimento): void
    {
        $this->data_nascimento = $data_nascimento;
    }
    public function getDataCadastro(): string
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro(string $data_cadastro): void
    {
        $this->data_cadastro = $data_cadastro;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'data_nascimento' => $this->data_nascimento,
            'data_cadastro' => $this->data_cadastro
        ];
    }
    public function fromArray(array $data): void
    {
        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->email = $data['email'];
        $this->senha = $data['senha'];
        $this->data_nascimento = $data['data_nascimento'];
        $this->data_cadastro = $data['data_cadastro'];
    }
    public function __toString(): string
    {
        return json_encode($this->toArray());
    }

}