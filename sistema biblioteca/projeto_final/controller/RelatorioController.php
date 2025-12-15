<?php
require_once __DIR__ . "/Auth.php";
require_once __DIR__ . "/../model/livro.class.php";

header("Content-Type: application/json");

echo json_encode(Livro::relatorioPorAutor());
