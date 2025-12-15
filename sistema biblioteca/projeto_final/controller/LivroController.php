<?php
require_once "Auth.php";
require_once "../model/livro.class.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"));

if ($method === "POST") {
    Livro::criar($data->titulo, $data->autor, $data->ano);
    echo json_encode(["msg" => "Livro cadastrado"]);
}

if ($method === "GET") {
    echo json_encode(Livro::listar());
}

if ($method === "PUT") {
    Livro::atualizar($data->id, $data->titulo, $data->autor, $data->ano);
    echo json_encode(["msg" => "Livro atualizado"]);
}

if ($method === "DELETE") {
    Livro::deletar($data->id);
    echo json_encode(["msg" => "Livro removido"]);
}
