<?php

require_once __DIR__ . "/../config/banco.php";

class Usuario {

    public static function cadastrar(string $nome, string $email, string $senha, string $cpf, string $dataNascimento, string $categoriaPreferida) {
        $conn = Banco::getConn();
        $sql = $conn->prepare("INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, categoria_preferida) VALUES (?,?,?,?,?,?)");
        $sql->bindParam(1, $nome);
        $sql->bindParam(2, $email);
        $sql->bindParam(3, password_hash($senha, PASSWORD_BCRYPT));
        $sql->bindParam(4, $cpf);
        $sql->bindParam(5, $dataNascimento);
        $sql->bindParam(6, $categoriaPreferida);
        $sql->execute();
    }

    public static function avaliar(int $idUsuario, int $idObra, string $comentario, string $tipoAvaliacao) {
        $conn = Banco::getConn();
        $sql = $conn->prepare("
            INSERT INTO avaliacoes (FK_Obra, FK_Usuario, comentario, tipo_avaliacao) 
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                comentario = VALUES(comentario),
                tipo_avaliacao = VALUES(tipo_avaliacao)
        ");
        $sql->bindParam(1, $idObra);
        $sql->bindParam(2, $idUsuario);
        $sql->bindParam(3, $comentario);
        $sql->bindParam(4, $tipoAvaliacao);
        $sql->execute();
    }

    public static function autenticao(string $email, string $senha): bool {
        $banco = Banco::getConn();
        $sql = $banco->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sql->bindParam(1, $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario_obj_resposta = $sql->fetch(PDO::FETCH_OBJ);

            if (password_verify($senha, $usuario_obj_resposta->senha)) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['id_usuario'] = $usuario_obj_resposta->id_usuario;
                $_SESSION['nome'] = $usuario_obj_resposta->nome;
                $_SESSION['tipo_usuario'] = $usuario_obj_resposta->tipo_usuario;
                return true;
            }
        }
        return false;
    }
     // Apaga a avaliação de um usuário para uma obra específica.
     // A tabela 'avaliacoes' não tem 'id_avaliacao', a chave é composta.    
    public static function apagarAvaliacao(int $idUsuario, int $idObra) {
        $conn = Banco::getConn();
        $sql = $conn->prepare("DELETE FROM avaliacoes WHERE FK_Usuario = ? AND FK_Obra = ?");
        $sql->bindParam(1, $idUsuario);
        $sql->bindParam(2, $idObra);
        $sql->execute();
    }

    public static function listarUsuarios() {
        $conn = Banco::getConn();
        $sql = $conn->query("SELECT id_usuario, nome, email, tipo_usuario FROM usuarios");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public static function apagarUsuario(int $idUsuario) {
        $conn = Banco::getConn();
        $sql = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $sql->bindParam(1, $idUsuario);
        $sql->execute();
    }
}