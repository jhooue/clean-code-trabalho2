<?php

require_once 'UserManager.php';

$userManager = new UserManager();

//Caso 1 (Cadastro valido)
echo $userManager->cadastrar('Maria Oliveira', 'maria@email.com', 'Senha123.');

//Caso 2 (Cadastro com email invalido)
//echo $userManager->cadastrar('Pedro', 'pedro@email', 'Senha123.');

//Caso 3 (Tentativa de login com senha errada)
//echo $userManager->login('joao@email.com', 'Errada123.');

//Caso 4 (Reset de senha valido)
//echo $userManager->resetSenha(2, 'NovaSenha1.');

//Caso 5 (Cadastro de usuario com email duplicado)
//echo $userManager->cadastrar('João Silva', 'joao@email.com', 'Senha123.');

//Caso 6 (Cadastro de usuario com nome vazio)
//echo $userManager->cadastrar('', 'teste@email.com', 'Senha123.')
