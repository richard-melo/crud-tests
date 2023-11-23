
# CRUD TESTES

Descrição breve do projeto: Este projeto é uma aplicação CRUD (Create, Read, Update, Delete) em PHP com testes unitários.

## Pré-requisitos

Antes de começar, você precisará instalar o PHP e o Composer em seu sistema. Aqui estão os links para os guias de instalação:

- [Instalar PHP](https://www.php.net/manual/pt_BR/install.php)
- [Instalar Composer](https://getcomposer.org/download/)

## Instalação

Siga estas etapas para configurar o projeto em sua máquina local.

1. **Clone o Repositório**

   ```bash
   git clone https://github.com/richard-melo/crud-tests
   ```
2. **Instale as Dependências**

   ```bash
   composer install
   ```

## Configuração do Banco de Dados

Este projeto utiliza um banco de dados MySQL. Siga estas etapas para configurar o banco de dados:

1. Instale e configure o MySQL em sua máquina. [Guia de Instalação do MySQL](https://dev.mysql.com/doc/mysql-installation-excerpt/5.7/en/).
2. Crie um banco de dados para o projeto:

   ```sql
   CREATE DATABASE information;
   ```
3. Importe o esquema do banco de dados. O esquema está localizado em `caminho/para/esquema.sql`.
4. Atualize o arquivo de configuração do banco de dados no projeto com suas credenciais de banco de dados.

## Executando o Projeto

Para iniciar o servidor PHP:

```bash
php -S localhost:8000
```

Agora, você pode acessar o projeto em seu navegador em `http://localhost:8000`.

## Executando os Testes Unitários

Para executar os testes unitários, use o seguinte comando:

```bash
vendor/bin/phpunit
```

## Estrutura do Projeto

Em breve...

## Contribuições

Em breve...

## Licença

MIT.
