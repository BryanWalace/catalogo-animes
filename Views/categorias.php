<?php 
    include 'partials/header.php';
?>

<h1>Categorias</h1>
<div class="category-list">
    <?php if (!empty($categorias)): ?>
        <ul>
            <?php foreach ($categorias as $categoria): ?>
                <li>
                    <a href="<?= BASE_URL ?>/categorias/ver/<?= urlencode($categoria) ?>">
                        <?= $categoria ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma categoria encontrada.</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
