<?php

    require_once __DIR__ . "/../config/banco.php";

    class Obra {
        public static function cadastrar(string $titulo, string $tipoMidia, string $genero, string $duracao) { //o tipo da midia é define se é ep(serie) ou horas(filme)
            $conn = Banco::getConn();
            $sql = $conn->prepare("INSERT INTO obras(titulo, tipoMidia, genero, duracao) VALUES (?,?,?,?)");
            $sql->bindParam(1, $titulo);
            $sql->bindParam(2, $tipoMidia);
            $sql->bindParam(3, $genero);
            $sql->bindParam(4, $duracao);
            $sql->execute();
        }

        public static function listar() { //retorna já como objetos, pode mudar se preferir
            $conn = Banco::getConn();
            $query = $conn->query("SELECT * FROM obras"); 

            if($query) {
                return $query->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }

        public static function apagar(int $idObra) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("DELETE FROM obras WHERE id_obra = ?");
            $sql->bindParam(1, $idObra);
            return $sql->execute();
        }

        public static function buscar(int $idObra) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("SELECT * FROM obras WHERE id_obra = ?");
            $sql->bindParam(1, $idObra);
            return $sql->execute();
        }

        public static function buscarPorGenero(string $genero) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("SELECT * FROM obras WHERE genero = ?");
            $sql->bindParam(1, $genero);
            return $sql->execute();
        }
    }

?>