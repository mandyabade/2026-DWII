# 📁 Portfólio Pessoal — Versão Refatorada

Autor: Mandy Abade Antunes
Turma: 3º ano
Curso: Técnico em Informática
Disciplina: Desenvolvimento Web II
Ano: 2026

## 📌 Sobre o projeto

Este projeto consiste em um sistema web desenvolvido em PHP com dados em MariaDB/MySQL utilizando PDO.

O sistema foi criado na disciplina de Desenvolvimento Web II (DWII) com o objetivo de aplicar conceitos de:

- PHP modularizado
- CRUD com banco de dados
- PDO
- Sessões
- Segurança básica
- Organização de layout reutilizável
- Painel administrativo

O projeto possui:

- catálogo de tecnologias
- listagem dinâmica
- busca por tecnologias
- filtro por categorias
- página de detalhes
- painel administrativo
- autenticação de usuário
- cadastro e gerenciamento de projetos

# 🛠️ Tecnologias utilizadas

- PHP
- MariaDB
- PDO
- HTML
- CSS
- Git/GitHub


# 🗂️ Estrutura do projeto

02_projetoPHP-02_refatorado/
│
├── index.php
├── detalhe.php
├── login.php
├── logout.php
├── admin.php
├── catalogo.php
├── contato.php
├── obrigado.php
├── painel.php
├── projetos.php
│
├── includes/
|   ├── includes/
│       ├── fotoMinha.jpeg
│   ├── cabecalho.php
│   ├── nav.php
│   ├── rodape.php
│   ├── conexao.php
│   ├── auth.php
│   └── style.css
│
├── sql/
│   ├── setup.sql
│
└── README.md

# ▶️ Como executar 
1. Acesse a pasta do projeto no terminal:
    cd 02_projetoPHP-02_refatorado

2. Inicie o servidor PHP:
    php -S localhost:8080

3. Acesse no navegador:
    http://localhost:8080

# 🔒 Credenciais de Teste
login: admin
senha: admin2026 