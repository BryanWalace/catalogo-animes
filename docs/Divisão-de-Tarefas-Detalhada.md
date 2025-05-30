📜 Divisão de Tarefas Detalhada

👨‍💻 1 - Backend — Modelagem de Banco + Models
Responsabilidades:
Modelagem do banco de dados:

Criar as tabelas usuarios, animes, categorias, posts com seus relacionamentos, chaves primárias e estrangeiras.

Criação das classes Models:

User.php → Cadastro, login, recuperação de senha, busca por CPF e data de nascimento.

Anime.php → CRUD completo de animes (para admin) e listagem de animes para usuários.

Categoria.php → Gerenciar categorias e listar animes por categoria.

Post.php → Permitir que usuários façam postagens na rede interna, visualização de posts do próprio perfil. //talvez

Conexão com Banco:

Criar uma classe Database usando PDO para garantir segurança nas queries (prevenção de SQL Injection).

Validações:

Garantir que dados enviados estejam corretos antes de gravar no banco (ex.: e-mail único, CPF válido, campos obrigatórios).

Entregáveis:
Script SQL do banco.

Classes de Model prontas e testadas.

Documentação sobre como importar o banco.

-----------------------------------------------------------------------

🔐 2 - Backend — Controladores e Segurança

Responsabilidades:
Controladores principais:
Criar classes como:

AuthController.php → Login, logout, cadastro, recuperação de senha.

AnimeController.php → Cadastro, edição, exclusão e listagem de animes.

UserController.php → Perfil do usuário, preferências, listagem de posts.

PostController.php → CRUD de posts.

Gestão de Sessões:

Implementar o uso de sessões ($_SESSION) para controle de login.

Controle de acesso por nível (admin e usuário comum).

Cookies:

Ex.: Salvar a preferência de categoria ou lembrar o usuário no login.

Segurança CSRF:

Gerar tokens únicos para formulários.

Validar tokens no envio dos formulários sensíveis (login, cadastro, edição, posts, etc.).

Segurança de Senhas:

Utilizar password_hash() e password_verify() para armazenar e verificar senhas.

Mensagens de Erro/Confirmação:

Implementar feedbacks de sucesso, erro e alertas usando sessões ou helper (flash()).

Entregáveis:
Controladores funcionando com segurança CSRF e autenticação.

Sistema de login, logout e recuperação de senha completo.

Restrição de páginas para admin e usuário.

-----------------------------------------------------------------------

🎨 3 - Frontend — Views Públicas + Login

Responsabilidades:
Páginas abertas (sem necessidade de login):

Home → Apresentação do projeto, com destaque de categorias ou animes populares.

Lista de Animes Públicos → Página que exibe todos os animes, com filtros por categoria.

Categorias em Destaque → Página que mostra todas as categorias e ao clicar, filtra os animes.

Páginas de autenticação:

Login

Cadastro

Recuperação de Senha (CPF + Data de Nascimento)

Design Responsivo:

Usar HTML5, CSS3 e, se quiser, frameworks como Bootstrap para deixar bonito e funcional.

Formulários seguros:

Implementar nos formulários os campos de CSRF enviados pelos controllers.

Entregáveis:
Todas as páginas públicas + telas de login/cadastro prontas.

Design organizado, com CSS bem estruturado.

Validações simples no frontend (HTML/CSS).

-----------------------------------------------------------------------

🔒 4 - Frontend — Views Privadas

Responsabilidades:
Dashboard do Usuário:

Tela inicial pós-login, mostrando animes da sua categoria preferida.

Tela de Perfil:

Dados do usuário, opção para editar dados ou visualizar seus posts.

Postagens (Rede Interna):

Tela para criar posts e listar seus próprios posts.

CRUD de Animes (Apenas Admin):

Telas de:

Listagem

Cadastro

Edição

Exclusão

Integração Frontend + Backend:

Conectar as views com os dados que vêm dos controllers e models (usando PHP para inserir dados no HTML).

Feedbacks:

Mostrar mensagens de sucesso, erro e alertas vindos dos controllers.

Entregáveis:
Todas as páginas privadas e restritas funcionando corretamente.

Integração total com o backend.

Design consistente com o restante do sistema.

-----------------------------------------------------------------------

🏗️ 5 - Full Stack + Infraestrutura — Núcleo MVC e Documentação

Responsabilidades:
Core MVC:

Criar as classes base:

Router.php → Faz o mapeamento das rotas (/anime/edit/5) para chamar o controller e o método correto.

Controller.php → Classe pai dos controllers, fornece métodos utilitários (ex.: carregar view, validar CSRF).

Model.php → Classe base dos models, gerencia conexão com o banco.

Session.php → Gerenciar sessões e cookies.

Sistema de Rotas:

Criar URLs amigáveis usando .htaccess.

Definir padrões como: /anime/show/5 ou /user/profile.

Helpers:

Criar arquivos auxiliares para funções como:

csrf.php (geração e validação dos tokens)

auth.php (checar se está logado)

flash.php (mensagens de sessão)

Documentação:

Fazer o README.md:

Como instalar.

Dependências.

Configurações iniciais.

Estrutura de diretórios.

Explicação das rotas e funcionamento.

Padronização do Projeto:

Garantir que todo o código siga um padrão consistente.

Fazer revisões finais e integração de todas as partes.

Entregáveis:
Estrutura funcional do MVC.

Router com rotas bem definidas.

Helpers para segurança, sessão e autenticação.

Documentação clara e completa.

📦 Resumo Visual das Tarefas
Pessoa	Área	Entregáveis
1	Modelagem + Models	Banco + Classes Models
2	Controladores + Segurança	Controllers + CSRF + Login/Recuperação
3	Frontend Público	Home, Login, Cadastro, Lista de Animes, Categorias
4	Frontend Privado	Dashboard, Perfil, Posts, CRUD Animes (Admin)
5	Infraestrutura	Núcleo MVC, Router, Helpers, Documentação