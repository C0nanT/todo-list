## Índice

- [Como iniciar o projeto](#como-iniciar-o-projeto)
- [Funcionalidades](#funcionalidades)

## Como iniciar o projeto

Siga os passos abaixo para iniciar o projeto:

1. Clone o repositório:
    ```sh
    git clone https://github.com/C0nanT/todo-list.git
    cd todo-list
    ```

2. Instale as dependências do Composer:
    ```sh
    composer install
    ```

3. Copie o arquivo [.env.example](http://_vscodecontentref_/0) para `.env`:
    ```sh
    cp .env.example .env
    ```

4. Gere a chave da aplicação:
    ```sh
    php artisan key:generate
    ```

5. Caso queira alterar algo no .env para configurar o banco de dados, faça isso agora.

6. Execute as migrações do banco de dados:
    ```sh
    php artisan migrate
    ```

7. Compile os assets front-end:
    ```sh
    npm install
    npm run dev
    ```

8. Inicie o servidor de desenvolvimento:
    ```sh
    php artisan serve
    ```

Agora você pode acessar o projeto em 
```sh
http://localhost:8000
```
## Funcionalidades

### Gerenciamento de Tarefas:
- [ ] Registro e autenticação de usuários;
- [ ] O usuário pode criar, editar, excluir e marcar como concluída uma tarefa;
- [ ] O usuário só pode ver as tarefas atribuídas a ele.

### Filtros:
- [ ] Filtro por categorias;
- [ ] Filtro para exibir somente tarefas concluídas.

### CRUD Completo:
- [ ] Criação de usuários;
- [ ] CRUD para tarefas;
- [ ] CRUD para categorias.

#### Testes:
- [ ] Testes em todas as rotas backend.

#### Deletar Tarefas Automaticamente:
- [ ] Após uma semana marcada como concluída, a tarefa deve ser excluída automaticamente do banco de dados.
- [ ] Job ou Command no Laravel para excluir automaticamente as tarefas concluídas após uma semana (da tarefa finalizada).