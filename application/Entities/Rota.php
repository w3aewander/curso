<?php
/**
 * 
 * Entidade Rota
 * 
 */

namespace App\Entities;

class Rota
{
    private int $id;
    private string $descricao;
    private string $url;
    private string $metodo;
    private string $controller;
    private string $action;

    public function __construct(
        int $id,
        string $descricao,
        string $url,
        string $metodo,
        string $controller,
        string $action
    ) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->url = $url;
        $this->metodo = $metodo;
        $this->controller = $controller;
        $this->action = $action;

    
    }

    //crie todos os getters e setters
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
    public function getUrl(): string
    {
        return $this->url;
    }
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    public function getMetodo(): string
    {
        return $this->metodo;
    }
    public function setMetodo(string $metodo): void
    {
        $this->metodo = $metodo;
    }
    public function getController(): string
    {
        return $this->controller;
    }
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }
    public function getAction(): string
    {
        return $this->action;
    }
    public function setAction(string $action): void
    {
        $this->action = $action;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao,
            'url' => $this->url,
            'metodo' => $this->metodo,
            'controller' => $this->controller,
            'action' => $this->action,
        ];
    }
    public function __toString(): string
    {
        return json_encode($this->toArray());
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}