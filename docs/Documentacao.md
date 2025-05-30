🚀 1. Estrutura de Diretórios (Arquivos e Pastas)
Organizando no padrão MVC + POO:

swift
Copiar
Editar
/meu-projeto/
│
├── /config/          → Arquivos de configuração (db.php, csrf.php, constantes.php)
├── /controllers/     → Arquivos de controle (AnimeController.php, UserController.php, AuthController.php)
├── /models/          → Classes que representam entidades e regras de negócio (Anime.php, User.php, Categoria.php)
├── /views/           → Telas HTML/PHP organizadas por funcionalidade
│    ├── /anime/
│    ├── /auth/
│    ├── /categoria/
│    ├── /home/
│    └── /user/
├── /public/          → Arquivos públicos (index.php, css/, js/, img/)
│
├── /helpers/         → Funções auxiliares (csrf.php, auth.php, flash.php)
├── /core/            → Núcleo do sistema (Database.php, Router.php, Session.php, Controller.php, Model.php)
│
├── .htaccess         → Redirecionamento de URL amigável
├── composer.json     → Dependências (opcional)
└── README.md

-----------------------------------------------------------------------

🏛️ 2. Principais Entidades (Banco de Dados e Classes)

🔸 Tabelas do Banco de Dados

-- Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    tipo ENUM('admin', 'usuario') DEFAULT 'usuario',
    categoria_preferida_id INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Categorias
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Animes/Filmes
CREATE TABLE animes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    categoria_id INT,
    imagem VARCHAR(255),
    link_video VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Posts (para rede social interna)
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    conteudo TEXT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-----------------------------------------------------------------------

🔹 Classes Model
User.php

Anime.php

Categoria.php

Post.php

Cada uma com seus métodos de CRUD e validações usando PDO.

-----------------------------------------------------------------------

🔥 3. Controladores Principais

HomeController.php → Página inicial, categorias em destaque, filmes públicos.

AnimeController.php → CRUD de animes (restrito a admin), visualização para usuários.

UserController.php → Perfil, listagem de posts, alterar dados.

AuthController.php → Login, logout, cadastro, recuperação de senha.

PostController.php → CRUD de posts (rede social interna).

CategoriaController.php → Gerenciamento e exibição de categorias.

-----------------------------------------------------------------------

🖥️ Views Sugeridas
Organizar assim:

/views/
├── /home/
│   ├── index.php
│   └── categorias.php
├── /anime/
│   ├── index.php (listar animes)
│   ├── show.php (detalhe do anime)
│   ├── create.php
│   ├── edit.php
├── /auth/
│   ├── login.php
│   ├── register.php
│   ├── forgot.php
├── /user/
│   ├── profile.php
│   ├── posts.php
├── /post/
│   ├── create.php
│   ├── index.php

-----------------------------------------------------------------------

🔐 4. Funcionalidades de Segurança
Sessões e Cookies: Armazenar sessão de login, preferências.

password_hash() / password_verify(): Para senhas.

CSRF: Implementar tokens em todos os formulários sensíveis.

Validação de CPF e data de nascimento na recuperação de senha.

-----------------------------------------------------------------------

🧠 5. Páginas Abertas (Sem Login)
Home (home/index.php)

Lista de animes públicos (anime/index.php)

Categorias em destaque (home/categorias.php)

-----------------------------------------------------------------------

🔗 Fluxo MVC
Exemplo ao acessar /anime/edit/5:

Roteador → Direciona para AnimeController método edit(5).

Controller → Valida, pega dados do Anime model.

Model → Interage com banco via PDO.

View → Monta tela views/anime/edit.php com os dados.

-----------------------------------------------------------------------

📂 Banco - Conexão PDO

class Database {
    private static $instance;
    private $conn;

    private $host = 'localhost';
    private $db = 'animes_db';
    private $user = 'root';
    private $pass = '';

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", 
                                  $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

-----------------------------------------------------------------------

✅ 6. Divisão de Tarefas para 5 Pessoas

Pessoa	Tarefa Principal	Descrição
1 - Backend	Modelagem de Banco + Models	Criação do banco, classes User, Anime, Categoria, Post com PDO e validações.

2 - Backend	Controladores e Segurança	Implementar controllers (Auth, Anime, User, Post) + sistema CSRF, sessão, login, recuperação de senha.

3 - Frontend	Views Públicas + Login	Home, listagem de animes públicos, categorias, tela de login, cadastro e recuperação.

4 - Frontend	Views Privadas	Dashboard de usuário, perfil, posts, tela de CRUD de animes para admin, integração dos controllers com as views.

5 - Full Stack + Infraestrutura	Roteador, MVC Core + Documentação	Desenvolver Router.php, classes base (Model, Controller), organizar o MVC, preparar README e documentação para apresentação.