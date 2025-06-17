<?php 
include 'partials/header.php';
?>

<h1>Painel Admin</h1>
<p>Bem-vindo, <?= $_SESSION['nome'] ?>!</p>
<a href="<?= BASE_URL ?>/animes/novo" class="link-como-botao">Adicionar anime</a>

<table>
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Acoes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($obras as $obra): ?>
            <tr>
                <td><?= $obra['titulo'] ?></td>
                <td><?= $obra['genero'] ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/animes/editar/<?= $obra['id_obra'] ?>">Editar</a>
                    <a href="<?= BASE_URL ?>/animes/apagar/<?= $obra['id_obra'] ?>">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
include 'partials/footer.php'; 
?>
