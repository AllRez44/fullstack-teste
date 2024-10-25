# Teste Prático para Vaga de Desenvolvedor Full Stack Pleno

**Objetivo Geral:** Desenvolver uma aplicação completa dividida em duas partes: uma API em Golang e uma interface de frontend em Laravel. A aplicação deve gerenciar produtos, permitindo operações de CRUD (Create, Read, Update, Delete) e a importação em massa de produtos a partir de uma fonte externa.

---

## Parte 1: Construção da API

### Opção Principal: API em Golang

1. **Desenvolva uma API REST em Golang** que ofereça os seguintes endpoints:
   - **GET /produtos**: Lista todos os produtos com suporte para paginação.
   - **GET /produtos/{id}**: Retorna detalhes de um produto específico.
   - **GET /produtos?nome={nome}&categoria={categoria}&preco_min={preco_min}&preco_max={preco_max}**: Permite buscar produtos por nome e filtrar por categoria e faixa de preço.
   - **POST /produtos**: Adiciona um novo produto.
   - **POST /produtos/importar**: Importa produtos em massa a partir de uma fonte de dados externa (JSON ou CSV).
   - **PUT /produtos/{id}**: Edita um produto existente.
   - **DELETE /produtos/{id}**: Exclui um produto.

2. **Banco de Dados**: Utilize **MySQL** para armazenar os dados da aplicação.

3. **Modelo de Dados**:
   - **Produto**:
     - `id` (int, auto increment)
     - `nome` (string, obrigatório)
     - `descrição` (string, opcional)
     - `preço` (decimal, obrigatório)
     - `categoria` (string, obrigatório)
     - `data_criação` (timestamp)
     - `data_atualização` (timestamp)

---

### Bônus: Utilizando AWS API Gateway com Função Lambda em Golang

1. **Desenvolva a API REST com AWS API Gateway e AWS Lambda usando Golang**.
   - Siga as mesmas especificações dos endpoints da Opção Principal.
   - **Banco de Dados**: Utilize **AWS RDS** (MySQL ou MariaDB) para armazenar os dados.

2. **Documentação**: Inclua instruções claras para configuração e execução da API em AWS, detalhando permissões, IAM roles e configuração do AWS API Gateway.

---

## Parte 2: Frontend em Laravel

1. **Interface de Usuário**: Crie uma aplicação Laravel para a interface frontend que consome a API criada na Parte 1.
   - **Listagem de Produtos**: Exiba os produtos em uma tabela, com paginação.
   - **Busca e Filtragem**: Permita buscar produtos por nome e aplicar filtros por categoria e faixa de preço.
   - **Cadastro de Produto**: Formulário para adicionar um novo produto.
   - **Edição de Produto**: Formulário para editar um produto existente.
   - **Importação em Massa**: Interface para upload de arquivo (JSON ou CSV) para a importação de produtos.
   - **Exclusão de Produto**: Confirmação antes de excluir produtos.

2. **Mensagens de Feedback**:
   - Exiba mensagens de erro ou sucesso após cada operação (ex.: "Produto adicionado com sucesso", "Erro ao editar produto").

3. **Design Responsivo**: A interface deve ser responsiva para dispositivos móveis.

---

## Docker

- Configure um ambiente usando **Docker** e inclua um arquivo **docker-compose.yml** para:
  - Executar a aplicação de frontend (Laravel) e o banco de dados (MySQL).
  - Realizar a comunicação entre o backend (API) e o frontend (Laravel).

---

## Critérios de Avaliação

1. **API e Backend**:
   - Estrutura e organização do código Golang ou da solução em AWS Lambda.
   - Correção e completude dos endpoints e das operações CRUD.

2. **Frontend e Interface Laravel**:
   - Implementação completa das funcionalidades, incluindo CRUD e importação em massa.
   - Interface amigável e responsiva.

3. **Boas Práticas de Programação**:
   - Código modular e bem organizado.
   - Uso adequado de orientação a objetos e boas práticas de desenvolvimento.

4. **Documentação**:
   - Instruções claras no `README.md` sobre configuração e execução do projeto.
   - Detalhamento dos passos para instalação e execução dos serviços Docker, se utilizados.

5. **Extras (Bônus)**:
   - Autenticação simples para proteger as rotas de CRUD.
   - Implementação em AWS Lambda.
   - Testes unitários e de integração para backend e frontend.

