# catalogo-animes

"/meu-projeto/
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
"