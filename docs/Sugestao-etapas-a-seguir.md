🧭 Trajetória de Desenvolvimento — Etapas e Prioridades
🟩 FASE 1 – Estrutura Inicial (Pessoa 1 + 5)
✅ Pessoa 1 – Banco de Dados + Models:

Criar script database.sql com tabelas:

users (id, nome, email, senha, cpf, nascimento, categoria_id, tipo_usuario)

animes (id, titulo, descricao, categoria_id, imagem, video, status)

categorias (id, nome)

posts (id, usuario_id, conteudo, data_postagem)

Criar os Models em /app/Models usando PDO:

User.php, Anime.php, Categoria.php, Post.php

Cada model com métodos: findAll, findById, create, update, delete

✅ Pessoa 5 – Estrutura MVC + Router:

Criar as pastas do projeto:

bash
Copiar
Editar
/app
  /Controllers
  /Models
  /Views
  /Core
/public
/config
/assets
/database
Criar:

Router.php: gerencia as rotas e chama os controllers corretos

Controller.php: classe base com helpers (render, redirect, etc)

Model.php: classe base com conexão PDO

config.php: define credenciais do banco e constantes

🟧 FASE 2 – Backend Funcionalidades (Pessoa 2)
✅ Pessoa 2 – Controladores e Segurança:

Criar controllers:

AuthController.php: login, logout, cadastro, recuperação de senha (com CPF e nascimento)

AnimeController.php: listar, ver detalhe, CRUD para admin

UserController.php: perfil do usuário

PostController.php: postar e listar posts por usuário

Implementar segurança:

Sessões ($_SESSION), cookies (lembrar login), validação de acesso

Gerar tokens CSRF nas views e validar no POST

Usar password_hash() no cadastro e password_verify() no login

🟨 FASE 3 – Telas Públicas e Login (Pessoa 3)
✅ Pessoa 3 – Views Públicas + Login:

Criar HTML + CSS para:

/views/home.php: destaque da plataforma

/views/animes.php: animes públicos

/views/categorias.php: categorias em destaque

/views/login.php, /cadastro.php, /recuperar_senha.php

Integrar formulários aos controllers (action, method="post" + tokens CSRF)

🟦 FASE 4 – Telas Internas e Usuário (Pessoa 4)
✅ Pessoa 4 – Views Privadas:

Criar:

/views/dashboard.php: resumo da conta, últimos animes da categoria

/views/perfil.php: info do usuário + lista de posts

/views/postagem.php: formulário para adicionar novo post

Utilizar sessões para identificar o usuário e exibir conteúdos personalizados

🟥 FASE 5 – Admin Panel + Documentação (Pessoa 5)
✅ Pessoa 5 – CRUD de Animes para Admins:

Criar telas:

/views/admin/lista.php: mostra todos os animes com botão editar/deletar

/views/admin/cadastrar.php: formulário novo anime

/views/admin/editar.php: editar anime existente

Integrar com AnimeController:

create(), edit(), delete()

✅ Documentação Final:

Escrever o README.md com instruções de uso

Adicionar prints de tela (se possível)

Garantir que todos os links e rotas funcionam corretamente