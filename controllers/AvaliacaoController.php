<?php
require_once __DIR__ . '/../models/usuario.php';

class AvaliacaoController {

    public static function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id_usuario'])) {
            $id_obra = $_POST['id_obra'];
            $id_usuario = $_SESSION['id_usuario'];
            $comentario = $_POST['comentario'];
            $tipo_avaliacao = $_POST['tipo_avaliacao'];

            // O método já existe no seu model Usuario
            Usuario::avaliar($id_usuario, $id_obra, $comentario, $tipo_avaliacao);

            // Redireciona de volta para a página do anime
            header('Location: ' . BASE_URL . '/animes/ver/' . $id_obra);
            exit;
        }

        // Se algo der errado, volta para a home
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
