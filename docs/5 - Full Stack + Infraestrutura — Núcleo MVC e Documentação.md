### 👤 Pessoa 5 — Full Stack + Infraestrutura + Painel Admin

#### 💡 Descrição:
Responsável pela infraestrutura do projeto e criação do painel de administração. Essa pessoa estrutura o core do MVC (roteador, classe base) e desenvolve um CRUD completo de animes para administradores.

#### 📌 O que fazer:
- Montar estrutura de pastas: `/models`, `/controllers`, `/views`, `/core`, `/public`.
- Criar `Router.php`, `Model.php`, `Controller.php`.
- Criar tela administrativa (acesso apenas por admin).
- Criar o CRUD de animes no painel admin.
- Criar o `README.md` explicando como rodar e testar o projeto.

#### ✅ Etapas:
1. Criar `core/Router.php` que lê a URL e direciona ao controller correto.
2. Criar classe base `Controller` com métodos comuns (render, redirect).
3. Criar `Model.php` base para herança e conexão PDO.
4. Criar:
   - `admin/index.php`: painel com listagem dos animes.
   - `admin/criar_anime.php`: formulário de criação.
   - `admin/editar_anime.php`: edição de anime.
   - `admin/excluir_anime.php`: confirmação e exclusão.
5. Proteger painel com checagem do tipo de usuário (admin).
6. Usar tokens CSRF e validações.
7. Finalizar documentação `README.md` com:
   - Objetivo do sistema
   - Tecnologias usadas
   - Como rodar localmente
   - Como acessar como admin
   - Prints ou GIFs das telas