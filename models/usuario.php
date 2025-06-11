<?php

    require_once __DIR__ . "/../config/banco.php";

    class Usuario {

        public static function cadastrar(string $nome, string $email, string $senha, string $cpf, DateTime $dataNascimento, string $categoriaPreferida) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("INSERT INTO Usuarios(nome, email, senha, cpf, data_nascimento, categoria_preferida) VALUES (?,?,?,?,?,?);");
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, password_hash($senha, PASSWORD_BCRYPT));
            $sql->bindParam(4, $cpf);
            $sql->bindParam(5, $dataNascimento);
            $sql->bindParam(6, $categoriaPreferida);
            $sql->execute();
        }

        public static function avaliar(int $idUsuario, int $idObra, string $comentario, string $tipoAvaliacao) {    //O tipo de avaliação será apenas positiva e negativa, sendo parecido com a steam,
            $conn = Banco::getConn();                                                                               // onde as avaliações são classicadas como poistiva ou negativa
            $sql = $conn->prepare("INSERT INTO avaliacoes(fk_obra, fk_usuario, comentario, tipoAvaliacao) VALUES (?,?,?,?)");
            $sql->bindParam(1, $idObra);
            $sql->bindParam(2, $idUsuario);
            $sql->bindParam(3, $comentario);
            $sql->bindParam(4, $tipoAvaliacao);
            $sql->execute();
        }

        public static function autenticao(string $email, string $senha): bool { //a senha sera um hash
            $banco = Banco::getConn();
            $sql = $banco->prepare("SELECT * FROM usuarios WHERE $email = ?");
            $sql->bindParam(1, $email);
            $sql->execute();

            if($sql->rowCount() <= 0){
                return false;
            } else {
                $usuario_obj_resposta = $sql->fetchObject();

                if(password_verify($senha, $usuario_obj_resposta->senha)){
                    $_SESSION['id'] = $usuario_obj_resposta->id;
                    $_SESSION['nome'] = $usuario_obj_resposta->nome;
                    return true;
                } else {
                    return false;
                }
            }
        }

        public static function apagarAvaliacao(int $idAvaliacao) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("DELETE FROM avaliacoes WHERE id_avaliacao = ?");
            $sql->bindParam(1, $idAvaliacao);
            $sql->execute();
        }

        public static function listarUsuarios() {
            $conn = Banco::getConn();
            $sql = $conn->query("SELECT * FROM usuarios");
            return $sql->fetch(PDO::FETCH_OBJ);
        }

        public static function apagarUsuario(int $idUsuario) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
            $sql->bindParam(1, $idUsuario);
            $sql->execute();
        }
    }

?>