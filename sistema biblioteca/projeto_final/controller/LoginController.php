<?php
session_start();

require_once __DIR__ . "/../model/Usuario.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

$user = Usuario::buscarPorEmail($data->email);

if ($user && password_verify($data->senha, $user['senha'])) {
    $_SESSION['usuario'] = $user['id'];
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "erro"]);
}
