### 👤 Pessoa 4 — Frontend: Views Privadas do Usuário

#### 💡 Descrição:
Responsável pelas páginas que só aparecem para usuários autenticados (comuns). Essas páginas permitem que o usuário veja seus dados, crie postagens e explore conteúdos personalizados.

#### 📌 O que fazer:
- Criar o dashboard do usuário com os animes da sua categoria preferida.
- Criar o perfil do usuário com opção de editar dados.
- Criar página para postar na rede social interna.

#### ✅ Etapas:
1. Criar:
   - `dashboard.php`: boas-vindas e lista de animes recomendados.
   - `perfil.php`: exibe dados e permite edição.
   - `postagem.php`: área de postagem e listagem de posts do usuário.
2. Proteger todas as páginas com verificação de login.
3. Usar tokens CSRF nos formulários de edição e postagem.
4. Listar os posts do usuário em ordem cronológica.
5. Validar os dados antes de enviar aos controllers.
6. Estilizar os elementos com foco em usabilidade.
