# Projeto de Gestão de Obras e Reformas

Este é um projeto de gestão de obras e reformas, desenvolvido em PHP utilizando o framework Laravel. O objetivo deste projeto é facilitar o acompanhamento e a aprovação de projetos de construção e reforma, proporcionando uma plataforma integrada para todas as etapas do processo.

## Funcionalidades

- **Cadastro de Obras e Reformas:** Permite o registro detalhado de novos projetos, incluindo informações como localização, descrição, e prazo estimado.
- **Fluxo de Aprovação:** Implementa um sistema de aprovação para diferentes fases do projeto, garantindo que todas as etapas sejam validadas por responsáveis designados.
- **Acompanhamento de Projetos:** Oferece ferramentas para monitorar o progresso das obras e reformas, com atualizações em tempo real sobre o status das atividades.
- **Notificações:** Envia alertas e notificações para os usuários envolvidos no projeto, mantendo todos informados sobre atualizações importantes.
- **Relatórios:** Gera relatórios detalhados sobre o andamento do projeto, permitindo análises e tomadas de decisão baseadas em dados concretos.

## Tecnologias Utilizadas

- **PHP 8.x**
- **Laravel 9.x**
- **MySQL/MariaDB**
- **HTML5/CSS3**
- **JavaScript**
- **Bootstrap 5**

## Instalação

Para instalar e configurar este projeto localmente, siga os passos abaixo:

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/nandopira/laravel01.git
    cd laravel01
    ```

2. **Instale as dependências:**
    ```bash
    composer install
    npm install
    ```

3. **Configure o arquivo .env:**
    Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as informações do banco de dados.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure o banco de dados:**
    Crie um banco de dados e configure as credenciais no arquivo `.env`. Depois, execute as migrações:

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5. **Compile os assets:**
    ```bash
    npm run dev
    ```

6. **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve
    ```

A aplicação estará disponível em `http://localhost:8000`.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Contato

Para mais informações, entre em contato com [Fernando Pira](https://github.com/nandopira).

---

Feito com ❤️ por [Fernando](https://github.com/nandopira)
