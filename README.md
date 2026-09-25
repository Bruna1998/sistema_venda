# Sistema de Vendas

Projeto de um sistema de vendas desenvolvido com o objetivo de praticar e consolidar conhecimentos em **PHP, PostgreSQL, POO e arquitetura MVC**.

> ⚠️ **Projeto em desenvolvimento**
>
> O sistema ainda não está finalizado. O desenvolvimento será continuado gradualmente, com a implementação de novas funcionalidades e melhorias na estrutura existente.

## Tecnologias utilizadas

* PHP
* PostgreSQL
* PDO
* HTML
* CSS
* JavaScript
* Git/GitHub

## Estrutura

O projeto busca manter uma separação de responsabilidades baseada no padrão MVC:

```text
View
 ↓
Controller
 ↓
Model
 ↓
Persistência
 ↓
PostgreSQL
```

A camada de persistência possui uma classe genérica para operações comuns de banco de dados, sendo estendida por classes específicas de cada entidade.

## Funcionalidades já implementadas

### Produtos

* Cadastro de produtos
* Consulta de produtos
* Alteração de produtos
* Exclusão de produtos
* Persistência dos produtos no PostgreSQL
* Separação entre Controller, Model e Persistência
* Listagem dos produtos em tabela

### Interface

* Tela principal do sistema
* Tela de cadastro de produtos
* Tela de consulta de produtos
* Estilização básica das telas com CSS

## Em desenvolvimento

As próximas etapas incluem:

* Finalização do fluxo de alteração de produtos
* Implementação da tela de vendas
* Seleção de produtos para uma venda
* Modal de consulta de produtos na tela de venda
* Adição de produtos à venda
* Controle de quantidade
* Cálculo do total da venda
* Finalização e persistência das vendas

## Objetivo

Este projeto faz parte do meu processo de aprendizado e desenvolvimento de conhecimentos em **desenvolvimento backend com PHP**, utilizando uma estrutura organizada em camadas e banco de dados PostgreSQL.

O projeto continuará sendo desenvolvido e atualizado conforme novas funcionalidades forem implementadas.
