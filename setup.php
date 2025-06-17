<?php
require_once __DIR__ . '/config/banco.php';

// Adiciona um estilo básico para a página de setup
echo "
<style>
    body { font-family: sans-serif; padding: 2em; line-height: 1.6; }
    .success { color: green; border: 1px solid green; padding: 1em; background-color: #f0fff0; }
    .error { color: red; border: 1px solid red; padding: 1em; background-color: #fff0f0; }
</style>
";

try {
    echo "Iniciando a criação do banco de dados...<br><br>";
    Banco::criaBanco();
    echo "<div class='success'>";
    echo "<h1>Banco de dados e tabelas criados com sucesso!</h1>";
    echo "<p>Um usuário <strong>admin</strong> foi criado com email: <strong>admin@email.com</strong> e senha: <strong>admin123</strong>.</p>";
    echo "<p><strong>IMPORTANTE:</strong> Por segurança, apague este arquivo (setup.php) agora.</p>";
    echo "</div>";
} catch (PDOException $e) {
    echo "<div class='error'>";
    echo "<h1>Erro ao criar o banco de dados:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "</div>";
}
?>
