<?php

class User
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(int $id, string $nome, string $email, string $senhaHash)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = $senhaHash;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenhaHash(): string
    {
        return $this->senhaHash;
    }

    public function setSenhaHash(string $senhaHash): void
    {
        $this->senhaHash = $senhaHash;
    }
}