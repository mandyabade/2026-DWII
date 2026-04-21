# Catálogo de Tecnologias — Aula 05 DWII

---> Aplicação web desenvolvida em PHP utilizando PDO e MariaDB para demonstrar persistência de dados em banco de dados.

O sistema apresenta um catálogo de tecnologias, onde os dados são carregados diretamente de um banco MariaDB utilizando consultas SQL com prepared statements.
O projeto demonstra conceitos importantes de desenvolvimento backend com PHP, como:
    - conexão com banco de dados usando PDO
    - consultas SQL com prepare() + execute()
    - prevenção de SQL Injection
    - listagem dinâmica de registros do banco
    - filtros por categoria
    - busca textual por nome ou descrição
    - página de detalhes do registro
    - uso de GET parameters
    - reutilização de layout com includes



---> Estrutura da Tabela no Banco

O catálogo utiliza uma tabela chamada tecnologias.

CREATE TABLE tecnologias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT,
    ano_criacao INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Descrição dos campos:

Campo	             Tipo	            Descrição
id	                 INT	            Identificador único da tecnologia
nome	             VARCHAR(100)	    Nome da tecnologia
categoria	         VARCHAR(50)	    Categoria da tecnologia
descricao	         TEXT	            Descrição da tecnologia
ano_criacao	         INT	            Ano em que a tecnologia foi criada
criado_em	         TIMESTAMP	        Data de cadastro no sistema


---> Como executar o projeto

No terminal, dentro da pasta do projeto:

    cd ~/workspaces/2026-DWII
    php -S localhost:8001


Depois abra no navegador:

    http://localhost:8001/03_pdo/index.php



---> Funcionalidades do sistema

- Catálogo de Tecnologias
A página principal (index.php) exibe todas as tecnologias cadastradas no banco.
Também permite:
    - buscar tecnologias pelo nome ou descrição
    - filtrar tecnologias por categoria
    - visualizar o total de registros encontrados


- Página de Detalhes
Cada tecnologia possui uma página de detalhes (detalhe.php) que exibe:
    - nome da tecnologia
    - categoria
    - descrição
    - ano de criação
    - data de cadastro no sistema


- Página 404
Se um ID inválido for informado ou a tecnologia não existir, o sistema exibe a página:
    404.php
informando que o registro não foi encontrado.