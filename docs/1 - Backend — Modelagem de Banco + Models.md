### 👤 Pessoa 1 — Backend: Modelagem de Banco + Models

#### 💡 Descrição:
Responsável por criar a estrutura inicial do banco de dados e as classes de modelo (Models) em POO. Essas classes serão a ponte entre o banco de dados e o restante da aplicação.

#### 📌 O que fazer:
- Pensar em quais entidades o sistema precisa (usuário, anime, categoria, post).
- Criar o banco de dados com suas tabelas e relacionamentos.
- Criar as classes PHP que vão manipular os dados dessas tabelas com PDO.

#### ✅ Etapas:
1. Criar script SQL com:
   - `usuarios`: dados do usuário + tipo (admin ou comum)
   - `animes`: dados do anime, incluindo categoria
   - `categorias`: nome da categoria
   - `posts`: postagens feitas pelos usuários
2. Criar as classes `Usuario`, `Anime`, `Categoria` e `Post` na pasta `models/`.
3. Implementar métodos CRUD (create, read, update, delete) em cada classe.
4. Utilizar PDO com tratamento de exceções (`try/catch`).
5. Validar entradas básicas (ex: strings vazias, valores inválidos).
6. Testar métodos com `var_dump()` e scripts simples.