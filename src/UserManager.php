<?php

require_once 'User.php';
require_once 'Validator.php';

class UserManager
{
    private array $users = [];
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        // Usuário fixo
        $this->users[] = new User(1, 'João Silva', 'joao@email.com', password_hash('SenhaForte1', PASSWORD_DEFAULT));
    }

    public function register(string $name, string $email, string $password): string
    {
        if (!$this->validator->validateEmail($email)) {
            return "Email invalido.";

        }

        if (!$this->validator->validateStrongPassword($password)) {
            return "Senha fraca.";
        }

        if ($this->emailExists($email) !== null) {
            return "Email já está em uso.";
        }

        if (!$this->validator->validateName($name)) {
            return "Nome não pode ser vazio.";
        }
        
        $id = count($this->users) + 1;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->users[] = new User($id, $name, $email, $passwordHash);
        return "Usuário cadastrado com sucesso.";
    }

    // Retorna o usuário se existir, senão retorna null
    private function emailExists(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function login(string $email, string $password): string
    {
        $user = $this->emailExists($email);
        if ($user !== null && password_verify($password, $user->getpasswordHash())) {
            return "Login realizado com sucesso.";
        }
        return "Credenciais inválidas.";
    }

    public function resetPassword(string $email, string $newPassword): string
    {
        $user = $this->emailExists($email);
        if ($user === null) {
            return "Usuário não encontrado.";
        }
        if (!$this->validator->validateStrongPassword($newPassword)) {
            return "Senha fraca.";
        }
        $user->setpasswordHash(password_hash($newPassword, PASSWORD_DEFAULT));
        return "Senha alterada com sucesso.";
    }

    public function listUsers(): array
    {
        return $this->users;
    }
}
