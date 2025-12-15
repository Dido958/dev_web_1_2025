<?php
require_once "Auth.php";
require_once "../model/Usuario.php";


$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"));

if ($method === "POST") {
    Usuario::criar($data->nome, $data->email, $data->senha);
    echo json_encode(["msg" => "Usuário criado"]);
}

if ($method === "GET") {
    echo json_encode(Usuario::listar());
}

if ($method === "PUT") {
    Usuario::atualizar($data->id, $data->nome, $data->email);
    echo json_encode(["msg" => "Usuário atualizado"]);
}

if ($method === "DELETE") {
    Usuario::deletar($data->id);
    echo json_encode(["msg" => "Usuário excluído"]);
}
