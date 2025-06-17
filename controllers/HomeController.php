<?php
class HomeController {
    public static function index() {
        // Apenas carrega a view da página inicial
        require __DIR__ . '/../views/home.php';
    }
}