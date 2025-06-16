<?php
    
    session_start();
    if (!isset($_SESSION['id'])) {
    header("Location: /login");
    exit;
    }

    include `partials/header.php`;
    require_once __DIR__ . `/../models/Anime.php`;

    $obras = Obra::listar();

?>

<h1>Painel Admin</h1>
<a href="/animes/novo">Adicionar anime</a>

<table>
    <tr>
        <th>Titulo</th>
        <th>Genero</th>
        <th>Acoes</th>
    </tr>
    <?php foreach ($obras as $obra): ?>
        <tr>
            <td><?= htmlspecialchars($obra->titulo) ?></td>
            <td><?= htmlspecialchars($obra->genero) ?></td>
            <td>
                <a href="/animes/editar/<?= $obra->id ?>">Editar</a>
                <a href="/animes/apagar/<?= $obra->id ?>">Apagar</a>
            </td>
        </tr>
        <?php endforeach; ?>
</table>

<?php include `partials/footer.php`;?>