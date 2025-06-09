### 👤 Pessoa 3 — Frontend: Views Públicas + Login

#### 💡 Descrição:
Responsável pelas páginas acessíveis ao público antes de fazer login. Essa parte é importante para atrair o usuário, com uma boa interface e organização dos dados.

#### 📌 O que fazer:
- Criar o visual das páginas iniciais e de login/cadastro.
- Montar listas públicas de animes e categorias.
- Estilizar com CSS e utilizar HTML5 semântico.

#### ✅ Etapas:
1. Criar:
   - `home.php`: apresentação e chamada para login/cadastro.
   - `animes.php`: listagem dos animes públicos.
   - `categorias.php`: destaque das categorias disponíveis.
   - `login.php`: formulário de login.
   - `cadastro.php`: formulário de registro de usuário.
   - `recuperar_senha.php`: validação de CPF e data de nascimento.
2. Criar formulários usando POST e integração com `AuthController`.
3. Mostrar erros e mensagens com dados da sessão (ex: `$_SESSION['erro']`).
4. Estilizar com CSS simples (responsivo se possível).
5. Usar tags semânticas: `<main>`, `<header>`, `<section>`, `<footer>`.
