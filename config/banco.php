<?php

    class Banco{
        public static function getConn() {
            return new PDO("mysql:host=localhost;dbname=catalogo_animes", "root", "");
        }

        public static function criaBanco() {
            $conn = Banco::getConn();
            $query = $conn->query("
                DROP DATABASE IF EXISTS catalogo_animes;

                CREATE DATABASE catalogo_animes;
                
                CREATE TABLE usuarios(
                    Id_Usuario INT AUTO_INCREMENT,
                    Nome VARCHAR(40) NOT NULL,
                    Email VARCHAR(50) NOT NULL,
                    Senha VARCHAR(100) NOT NULL,
                    CPF VARCHAR(11) NOT NULL,
                    Data_Nascimento Date,
                    Categoria_preferida Varchar(20),
                    
                    PRIMARY KEY (Id_Usuario)
                );
                
                CREATE TABLE Obras(
                    Id_Obra INT AUTO_INCREMENT,
                    Titulo VARCHAR(50) NOT NULL,
                    Tipo_Midia VARCHAR(15) NOT NULL,
                    Genero VARCHAR(15) NOT NULL,
                    Duracao VARCHAR(15) NOT NULL,
                    
                    PRIMARY KEY (Id_Obra)
                );
                
                CREATE TABLE Avaliacoes(
                    FK_Obra INT NOT NULL,
                    FK_Usuario INT NOT NULL,
                    Comentario VARCHAR(150),
                    Tipo_Avaliacao VARCHAR(15),
                    
                    PRIMARY KEY (FK_Obra, FK_Usuario),
                    FOREIGN KEY (FK_Obra) REFERENCES Obras(Id_Obra),
                    FOREIGN KEY (FK_Usuario) REFERENCES Usuarios(Id_Usuario)
                );

                INSERT INTO usuarios (Nome, Email, Senha, CPF, Data_Nascimento, Categoria_preferida) VALUES
                ('Lucas Martins', 'lucas.martins@email.com', 'senha123', '12345678901', '1995-06-15', 'Ação'),
                ('Mariana Souza', 'mariana.souza@email.com', 'senha456', '23456789012', '1998-03-22', 'Romance'),
                ('Carlos Silva', 'carlos.silva@email.com', 'senha789', '34567890123', '1992-11-30', 'Comédia'),
                ('Ana Oliveira', 'ana.oliveira@email.com', 'senha321', '45678901234', '2000-01-10', 'Fantasia'),
                ('João Pereira', 'joao.pereira@email.com', 'senha654', '56789012345', '1990-08-05', 'Terror');

                INSERT INTO obras (Titulo, Tipo_Midia, Genero, Duracao) VALUES
                ('Attack on Titan', 'Anime', 'Ação', '24 min'),
                ('Your Name', 'Filme', 'Romance', '1h 46min'),
                ('One Punch Man', 'Anime', 'Comédia', '23 min'),
                ('Spirited Away', 'Filme', 'Fantasia', '2h 5min'),
                ('Another', 'Anime', 'Terror', '24 min');

                INSERT INTO avaliacoes (FK_Obra, FK_Usuario, Comentario, Tipo_Avaliacao) VALUES
                (1, 1, 'Incrível e cheio de ação!', 'Positiva'),
                (2, 2, 'Muito emocionante e bem feito.', 'Positiva'),
                (3, 3, 'Hilário! Ri muito com esse anime.', 'Positiva'),
                (4, 4, 'Um clássico mágico. Visual lindo.', 'Positiva'),
                (5, 5, 'Assustador e misterioso. Gostei.', 'Positiva');
            ");
        }
    }

?>