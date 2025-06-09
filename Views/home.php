<?php include __DIR__ . '/partials/header.php'; ?>

<h1>Bem-vindo ao AniStream</h1>
<p>A plataforma para você assistir e organizar seus animes favoritos.</p>

<section>
  <h2>Destaques</h2>
  <?php foreach ($animesDestaque as $anime): ?>
    <article>
      <h3><?= htmlspecialchars($anime['titulo']) ?></h3>
      <p><?= htmlspecialchars($anime['descricao']) ?></p>
      <a href="/anime/<?= $anime['id'] ?>">Ver detalhes</a>
    </article>
  <?php endforeach; ?>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
