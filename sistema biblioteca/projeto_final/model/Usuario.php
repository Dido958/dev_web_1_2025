<?php

require_once __DIR__ . "/../database/conexao.php";

class Usuario {

    public static function criar($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([
            $nome,
            $email,
            password_hash($senha, PASSWORD_DEFAULT)
        ]);
    }

    public static function listar() {
        $sql = "SELECT id, nome, email FROM usuarios";
        return Conexao::conectar()
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function atualizar($id, $nome, $email) {
        $sql = "UPDATE usuarios SET nome=?, email=? WHERE id=?";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([$nome, $email, $id]);
    }

    public static function deletar($id) {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = Conexao::conectar()->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email=?";
        $stmt = Conexao::conectar()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
