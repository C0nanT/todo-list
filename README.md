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

Agora você pode acessar o projeto em `http://localhost:8000`.