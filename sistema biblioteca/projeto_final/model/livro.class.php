<?php
require_once __DIR__ . "/../database/conexao.php";

class Livro {

    public static function criar($titulo, $autor, $ano) {
        $sql = "INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([$titulo, $autor, $ano]);
    }

    public static function listar() {
        return Conexao::conectar()
            ->query("SELECT * FROM livros")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($id, $titulo, $autor, $ano) {
        $sql = "UPDATE livros SET titulo=?, autor=?, ano=? WHERE id=?";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([$titulo, $autor, $ano, $id]);
    }

    public static function deletar($id) {
        $sql = "DELETE FROM livros WHERE id=?";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function relatorioPorAutor() {
        $sql = "SELECT autor, COUNT(*) total FROM livros GROUP BY autor";
        return Conexao::conectar()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
