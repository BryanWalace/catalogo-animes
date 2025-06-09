### 👤 Pessoa 2 — Backend: Controladores + Segurança

#### 💡 Descrição:
Responsável por programar a lógica dos controladores (Controllers), responsáveis por interpretar as requisições e interagir com os models e views. Também implementa o sistema de login, sessões, autenticação e segurança com CSRF.

#### 📌 O que fazer:
- Criar controllers para login, perfil, animes e postagens.
- Gerenciar sessões e proteger as rotas com autenticação.
- Usar `password_hash()` e `password_verify()` para senhas.
- Implementar sistema de tokens CSRF para formulários.

#### ✅ Etapas:
1. Criar os controllers:
   - `AuthController`: login, logout, cadastro, recuperação de senha.
   - `UsuarioController`: mostrar e editar perfil do usuário.
   - `AnimeController`: listar e visualizar animes.
   - `PostController`: adicionar e exibir posts.
2. Implementar `session_start()` e controle de acesso.
3. Criar sistema de geração e validação de token CSRF.
4. Validar formulários (campos obrigatórios, e-mail válido etc).
5. Criar funções utilitárias para redirecionamento e mensagens de erro.
6. Integrar os métodos dos Models com os Controllers.