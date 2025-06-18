<?php
require_once __DIR__ . '/../models/obra.php';

class CategoriaController {

    /**
     * Exibe a página principal de categorias, com uma lista de todos os gêneros únicos.
     */
    public static function index() {
        // Busca todos os gêneros distintos da tabela de obras
        $categorias = Obra::listarGenerosUnicos();
        // Carrega a view que vai exibir a lista de categorias
        require __DIR__ . '/../views/categorias.php';
    }

    /**
     * Exibe todos os animes de um gênero específico.
     */
    public static function ver($genero) {
        if (!$genero) {
            // Se nenhum gênero foi especificado, redireciona para a página principal de categorias
            header('Location: /categorias');
            exit;
        }
        
        // Decodifica o nome do gênero para lidar com espaços e caracteres especiais (ex: "Ficção Científica")
        $generoDecodificado = urldecode($genero);
        
        // Busca as obras pelo gênero
        $animes = Obra::buscarPorGenero($generoDecodificado);
        
        // Carrega a view que vai exibir os animes daquele gênero
        require __DIR__ . '/../views/categoria_animes.php';
    }
}
