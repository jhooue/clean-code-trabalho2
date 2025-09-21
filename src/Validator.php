<?php

class Validator
{
    public function validarEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validarSenhaForte(string $senha): bool
    {
        if (strlen($senha) < 8) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $senha)) {
            return false;
        }
        if (!preg_match('/[0-9]/', $senha)) {
            return false;
        }
        return true;
    }

    public function validarNome(string $nome): bool
    {
        $nomeLimpo = trim($nome);
        return strlen($nomeLimpo) > 0;
    }
}
