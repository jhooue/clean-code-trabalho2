<?php

require_once 'UserManager.php';

$userManager = new UserManager();

//Caso 1 (Cadastro valido)
echo $userManager->register('Maria Oliveira', 'maria@email.com', 'Senha123.') . "<br>";

//Caso 2 (Cadastro com email invalido)
echo $userManager->register('Pedro', 'pedro@email', 'Senha123.') . "<br>";

//Caso 3 (Tentativa de login com senha errada)
echo $userManager->login('joao@email.com', 'Errada123.') . "<br>";

//Caso 4 (Reset de senha valido)
echo $userManager->resetPassword(2, 'NovaSenha1.') . "<br>";

//Caso 5 (Cadastro de usuario com email duplicado)
echo $userManager->register('João Silva', 'joao@email.com', 'Senha123.') . "<br>";
