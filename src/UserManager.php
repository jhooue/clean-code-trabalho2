<?php

require_once 'User.php';
require_once 'Validator.php';

class UserManager
{
    private array $usuarios = [];
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        //Usuario fixo 
        $this->usuarios[] = new User(1, 'João Silva', 'joao@email.com', password_hash('SenhaForte1', PASSWORD_DEFAULT));
    }

    public function cadastrar(string $nome, string $email, string $senha): string
    {
        if (!$this->validator->validarEmail($email)) {
            return "Email invalido.";
        }

        if (!$this->validator->validarSenhaForte($senha)) {
            return "Senha fraca.";
        }

        if ($this->emailExiste($email)) {
            return "Email já está em uso.";
        }

        if (!$this->validator->validarNome($nome)) {
            return "Nome não pode ser vazio.";
        }

        $id = count($this->usuarios) + 1;
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $this->usuarios[] = new User($id, $nome, $email, $senhaHash);
        return "Usuário cadastrado com sucesso.";
    }

    private function emailExiste(string $email): bool
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                return true;
            }
        }

        return false;
    }

    public function login(string $email, string $senha): string
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                if (password_verify($senha, $usuario->getSenhaHash())) {
                    return "Login realizado com sucesso.";
                } else {
                    return "Credenciais invalidas.";
                }
            }

        }
        return "Credenciais invalidas.";
    }

    public function resetSenha(int $id, string $novaSenha): string
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getId() === $id) {
                if (!$this->validator->validarSenhaForte($novaSenha)) {
                    return "Senha fraca.";
                }
                $usuario->setSenhaHash(password_hash($novaSenha, PASSWORD_DEFAULT));
                return "Senha alterada com sucesso.";
            }
            
        }
        return "Usuario não encontrado.";
    }

    public function listarUsuarios(): array
    {
        return $this->usuarios;
    }
}
