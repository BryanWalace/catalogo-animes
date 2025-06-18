<?php
// Inclui o arquivo de configuração para ter acesso à constante BASE_URL
require_once __DIR__ . '/../config/banco.php';
require_once __DIR__ . '/../models/obra.php';
// Inclusão do novo model de avaliações, essencial para a página de detalhes
require_once __DIR__ . '/../models/avaliacao.php';

class AnimeController {

    // Lista todos os animes na página de catálogo
    public static function index() {
        $animes = Obra::listar();
        require __DIR__ . '/../views/animes.php';
    }
    
    // Exibe o painel de administração
    public static function adminPanel() {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        $obras = Obra::listar();
        require __DIR__ . '/../views/admin.php';
    }

    // Exibe o formulário para criar um novo anime
    public static function novo() {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        require __DIR__ . '/../views/animes/novo.php';
    }

    // Processa a criação de um novo anime
    public static function criar() {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Obra::cadastrar(
                $_POST['titulo'],
                $_POST['tipo_midia'],
                $_POST['genero'],
                $_POST['duracao'],
                $_POST['descricao'],
                $_POST['link_imagem']
            );
        }
        header("Location: " . BASE_URL . "/admin");
        exit;
    }

    /**
     * Exibe o formulário de edição com os dados de uma obra.
     */
    public static function editar($id) {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin' || !$id) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        $obra = Obra::buscar($id);
        require __DIR__ . '/../views/animes/editar.php';
    }

    /**
     * Processa os dados do formulário de edição e atualiza no banco.
     */
    public static function atualizar() {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Obra::atualizar(
                $_POST['id_obra'],
                $_POST['titulo'],
                $_POST['tipo_midia'],
                $_POST['genero'],
                $_POST['duracao'],
                $_POST['descricao'],
                $_POST['link_imagem']
            );
        }
        header("Location: " . BASE_URL . "/admin");
        exit;
    }

    /**
     * Deleta uma obra do banco de dados.
     */
    public static function apagar($id) {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        if ($id) {
            Obra::apagar($id);
        }
        header("Location: " . BASE_URL . "/admin");
        exit;
    }

    /**
     * Exibe a página de detalhes de uma única obra.
     */
    public static function ver($id) {
        // Se o usuário não estiver logado, redireciona para a página de login.
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: ' . BASE_URL . '/login?redirect_msg=1');
            exit;
        }
        // Se o ID não for válido, redireciona para o catálogo
        if (!$id) {
            header('Location: ' . BASE_URL . '/animes');
            exit;
        }

        // Busca os dados da obra principal
        $obra = Obra::buscar($id);

        // CORREÇÃO: Busca os dados de avaliações e estatísticas
        $avaliacoes = Avaliacao::buscarPorObra($id);
        $stats = Avaliacao::getStats($id);

        // Carrega a view, passando todas as variáveis necessárias para ela
        require __DIR__ . '/../views/animes/ver.php';
    }
}
