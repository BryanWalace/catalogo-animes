<?php
// Adiciona um estilo básico para a página de setup
echo "
<style>
    body { font-family: sans-serif; padding: 2em; line-height: 1.6; }
    .success { color: green; border: 1px solid green; padding: 1em; background-color: #f0fff0; }
    .error { color: red; border: 1px solid red; padding: 1em; background-color: #fff0f0; }
</style>
";

// Definição da classe Banco
define('BASE_URL', '/catalogo-animes');

class Banco{
    public static function getConn() {
        return new PDO("mysql:host=localhost;port=3307;dbname=catalogo_animes", "root", "");
    }

    public static function criaBanco() {
        // Conecta ao servidor MySQL sem especificar um banco de dados inicial
        $pdo = new PDO("mysql:host=localhost;port=3307", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Remove e recria o banco de dados
        $pdo->exec("DROP DATABASE IF EXISTS catalogo_animes;");
        $pdo->exec("CREATE DATABASE catalogo_animes;");
        $pdo->exec("USE catalogo_animes;"); // Usa o banco recém-criado

        // String com todo o SQL para criar tabelas e inserir dados
        $sql = "
            CREATE TABLE usuarios(
                id_usuario INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(40) NOT NULL,
                email VARCHAR(50) NOT NULL UNIQUE,
                senha VARCHAR(255) NOT NULL,
                cpf VARCHAR(11) NOT NULL UNIQUE,
                data_nascimento DATE,
                categoria_preferida VARCHAR(20),
                tipo_usuario VARCHAR(10) NOT NULL DEFAULT 'usuario'
            );

            CREATE TABLE obras(
                id_obra INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(100) NOT NULL,
                tipo_midia VARCHAR(50) NOT NULL,
                genero VARCHAR(50) NOT NULL,
                duracao VARCHAR(20) NOT NULL,
                descricao TEXT NOT NULL,
                link_imagem VARCHAR(255) NOT NULL
            );

            CREATE TABLE avaliacoes(
                FK_Obra INT NOT NULL,
                FK_Usuario INT NOT NULL,
                comentario VARCHAR(150),
                tipo_avaliacao VARCHAR(15),
                PRIMARY KEY (FK_Obra, FK_Usuario),
                FOREIGN KEY (FK_Obra) REFERENCES Obras(id_obra) ON DELETE CASCADE,
                FOREIGN KEY (FK_Usuario) REFERENCES Usuarios(id_usuario) ON DELETE CASCADE
            );

            -- Inseri usuarios com senhas (hash) no banco
            INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, categoria_preferida, tipo_usuario) VALUES
            ('Admin', 'admin@email.com', '" . password_hash('admin123', PASSWORD_BCRYPT) . "', '00000000000', '2000-01-01', 'Ação', 'admin'),
            ('Lucas Martins', 'lucas.martins@email.com', '" . password_hash('senha123', PASSWORD_BCRYPT) . "', '12345678901', '1995-06-15', 'Ação', 'usuario'),
            ('Mariana Souza', 'mariana.souza@email.com', '" . password_hash('senha456', PASSWORD_BCRYPT) . "', '23456789012', '1998-03-22', 'Romance', 'usuario'),
            ('Carlos Silva', 'carlos.silva@email.com', '" . password_hash('senha789', PASSWORD_BCRYPT) . "', '34567890123', '1992-11-30', 'Comédia', 'usuario'),
            ('Ana Oliveira', 'ana.oliveira@email.com', '" . password_hash('senha321', PASSWORD_BCRYPT) . "', '45678901234', '2000-01-10', 'Fantasia', 'usuario'),
            ('João Pereira', 'joao.pereira@email.com', '" . password_hash('senha654', PASSWORD_BCRYPT) . "', '56789012345', '1990-08-05', 'Terror', 'usuario');

            INSERT INTO obras (Titulo, Tipo_Midia, Genero, Duracao, Descricao, Link_Imagem) VALUES
            ('Attack on Titan', 'Anime', 'Ação', '24 min', 'Em um mundo onde a humanidade vive cercada por muralhas gigantes para se proteger de titãs devoradores de humanos, Eren Yeager decide lutar pela sobrevivência da raça humana após presenciar a destruição de sua cidade.', 'https://static.wikia.nocookie.net/shingekinokyojin/images/d/d8/Attack_on_Titan_Season_1.jpg/revision/latest?cb=20211214124930'),
            ('Your Name', 'Filme', 'Romance', '1h 46min', 'Dois jovens desconhecidos, Mitsuha e Taki, trocam de corpos misteriosamente enquanto vivem em cidades diferentes. Conforme os eventos se repetem, eles criam um laço profundo e tentam se encontrar antes que algo trágico aconteça.', 'https://cdn.myanimelist.net/images/anime/5/87048.jpg'),
            ('One Punch Man', 'Anime', 'Comédia', '23 min', 'Saitama é um super-herói tão poderoso que derrota qualquer inimigo com apenas um soco, mas isso o deixa entediado e frustrado. Ele busca um oponente digno enquanto enfrenta monstros e heróis da Associação de Heróis.', 'https://cdn.myanimelist.net/images/anime/12/76049.jpg'),
            ('Spirited Away', 'Filme', 'Fantasia', '2h 5min', 'Chihiro, uma menina de 10 anos, se perde em um mundo mágico dominado por espíritos, bruxas e criaturas místicas. Ela deve trabalhar em uma casa de banhos para libertar seus pais, que foram transformados em porcos.', 'https://cdn.myanimelist.net/images/anime/5/87078.jpg'),
            ('Another', 'Anime', 'Terror', '24 min', 'Koichi Sakakibara transfere-se para uma escola onde uma maldição misteriosa leva à morte alunos e familiares. Junto da enigmática Mei Misaki, ele tenta desvendar os segredos da turma 3-3 e pôr fim à tragédia.', 'https://cdn.myanimelist.net/images/anime/11/75138.jpg');

            INSERT INTO avaliacoes (FK_Obra, FK_Usuario, Comentario, Tipo_Avaliacao) VALUES
            (1, 2, 'Incrível e cheio de ação!', 'Positiva'),
            (2, 3, 'Muito emocionante e bem feito.', 'Positiva'),
            (3, 4, 'Hilário! Ri muito com esse anime.', 'Positiva'),
            (4, 5, 'Um clássico mágico. Visual lindo.', 'Positiva'),
            (5, 6, 'Assustador e misterioso. Gostei.', 'Positiva');
        ";
        // Executa todo o bloco de SQL para criar o banco e tabelas
        $pdo->exec($sql);
    }
}

// Início da execução do script de setup
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
    echo "<p>Verifique se o MySQL está rodando e se as credenciais de acesso (usuário 'root', sem senha, porta 3307) estão corretas.</p>";
    echo "</div>";
}
?>