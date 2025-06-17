<?php
require_once __DIR__ . "/../config/banco.php";

class Avaliacao {
    //Busca todas as avaliações de uma obra específica, incluindo o nome do usuário que a fez.
    public static function buscarPorObra(int $idObra) {
        $conn = Banco::getConn();
        $sql = "SELECT a.*, u.nome AS nome_usuario 
                FROM avaliacoes a 
                JOIN usuarios u ON a.FK_Usuario = u.id_usuario 
                WHERE a.FK_Obra = ? 
                ORDER BY a.FK_Usuario DESC"; // Mostra as mais recentes primeiro
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idObra);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Insere uma nova avaliação para uma obra específica
    public static function getStats(int $idObra) {
        $conn = Banco::getConn();
        $sql = "SELECT 
                    COUNT(*) AS total, 
                    SUM(CASE WHEN tipo_avaliacao = 'Positiva' THEN 1 ELSE 0 END) AS positivas 
                FROM avaliacoes 
                WHERE FK_Obra = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idObra);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
