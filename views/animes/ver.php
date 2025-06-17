<?php 
include __DIR__ . '/../partials/header.php'; 

$stats = $stats ?? ['total' => 0, 'positivas' => 0];

// Logica para calcular a nota de 0 a 5
$nota = 0;
if ($stats['total'] > 0) {
    $percentual_positivas = ($stats['positivas'] / $stats['total']) * 100;
    $nota = ($percentual_positivas / 100) * 5;
}
?>

<div class="anime-detalhe-container">
    <h1><?= $obra->titulo ?></h1>

    <div class="nota-media">
        Nota da Comunidade: <strong><?= number_format($nota, 1) ?> / 5.0</strong> 
        (<?= $stats['total'] ?> votos)
    </div>
    
    <div class="anime-content">
        <img src="<?= $obra->link_imagem ?>" alt="<?= $obra->titulo ?>" class="anime-detalhe-img">
        <div class="anime-info">
            <div class="video-player-area"><p>Área reservada para o player de vídeo.</p></div>
            <h3>Descrição</h3>
            <p><?= nl2br($obra->descricao) ?></p>
        </div>
    </div>

    <div class="avaliacoes-section">
        <h2>Avaliações</h2>
        <div class="form-avaliacao">
            <h3>Deixe sua avaliação:</h3>
            <form action="<?= BASE_URL ?>/avaliacoes/criar" method="POST">
                <input type="hidden" name="id_obra" value="<?= $obra->id_obra ?>">
                <textarea name="comentario" placeholder="Escreva um comentário (opcional)..."></textarea>
                <button type="submit" name="tipo_avaliacao" value="Positiva">Recomendo 👍</button>
                <button type="submit" name="tipo_avaliacao" value="Negativa">Não Recomendo 👎</button>
            </form>
        </div>

        <div class="lista-avaliacoes">
            <h3>Comentários da Comunidade</h3>
            <?php if (empty($avaliacoes)): ?>
                <p>Ainda não há avaliações para esta obra. Seja o primeiro!</p>
            <?php else: ?>
                <?php foreach($avaliacoes as $avaliacao): ?>
                    <div class="avaliacao-item">
                        <p><strong><?= $avaliacao['nome_usuario'] ?>:</strong></p>
                        <?php if(!empty($avaliacao['comentario'])): ?>
                            <blockquote>"<?= nl2br($avaliacao['comentario']) ?>"</blockquote>
                        <?php endif; ?>
                        <span>Avaliação: <strong><?= $avaliacao['tipo_avaliacao'] ?></strong></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
