<?php

    require_once __DIR__ . "/../config/banco.php";

    class Obra {
        public static function cadastrar(
            string $titulo,
            string $tipoMidia,
            string $genero,
            string $duracao,
            string $descricao,
            string $linkImagem
        ) {
            $conn = Banco::getConn();
            $sql = $conn->prepare("INSERT INTO obras (titulo, tipo_midia, genero, duracao, descricao, link_imagem) VALUES (?, ?, ?, ?, ?, ?)");
            
            $sql->bindParam(1, $titulo);
            $sql->bindParam(2, $tipoMidia);
            $sql->bindParam(3, $genero);
            $sql->bindParam(4, $duracao);
            $sql->bindParam(5, $descricao);
            $sql->bindParam(6, $linkImagem);
            
            $sql->execute();
        }
        

        public static function listar() { //retorna já como objetos, pode mudar se preferir
            $conn = Banco::getConn();
            $query = $conn->query("SELECT * FROM obras"); 

            if($query) {
                return $query->fetchAll();
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
            $sql->execute();
            return $sql->fetchAll();
        }
    }

?>