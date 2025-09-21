
# Sistema de Autenticação em PHP

## Nome e RA da dupla

- Nome 1: [Jhonatan Cesar Alves da Silva]
- RA 1: [2010656]


---

## Instruções de execução (XAMPP)

1. Instale o XAMPP e inicie o serviço Apache.
2. Copie a pasta do projeto para o diretório `htdocs` do XAMPP.
    - Exemplo: `C:\xampp\htdocs\usuarios`
3. Acesse a pasta `src/` do projeto.
4. Execute o sistema acessando no navegador:
    - `http://localhost/usuarios/src/index.php`
5. Para testar os casos de uso:
    - Edite o arquivo `index.php` e descomente os blocos de teste desejados.
    - Cada caso pode ser ativado individualmente removendo o comentário `//` conforme orientado no próprio arquivo.
6. Não é necessário banco de dados. Os dados dos usuários estão fixos em memória.

---

## Breve documentação

### Funcionalidades

- Cadastro de novo usuário: valida nome, e-mail e senha.
- Login de usuário: verifica e-mail e senha usando hash seguro.
- Reset de senha: permite alterar a senha de usuário já cadastrado.
- Validação automática:
    - Nome não pode ser vazio.
    - E-mail deve ser válido e não duplicado.
    - Senha deve ter ao menos 8 caracteres, uma letra maiúscula e um número.

### Regras de negócio

- Não permite e-mail duplicado.
- Não permite cadastramento com nome vazio.
- Senha é sempre salva em formato seguro (hash).
- Login e reset só funcionam para usuários já cadastrados.
- Todos os dados ficam em arrays PHP, simulando um banco de dados.

### Limitações

- Não há persistência em banco de dados (recarregar apaga os dados).
- Não possui interface visual, o uso é feito por edição e execução dos arquivos.
- Apenas PHP puro, sem frameworks ou bibliotecas externas.
- Não recomendado para ambientes de produção sem adaptações de segurança e persistência.

---

## Estrutura básica do projeto
usuarios/
└── src/
├── User.php
├── Validator.php
├── UserManager.php
└── index.php

---

## Observações

- Projeto desenvolvido para fins acadêmicos, aplicando boas práticas PSR-12 e programação orientada a objetos.
- Consulte os comentários no `index.php` para testar os casos de uso separados conforme solicitado no trabalho.

