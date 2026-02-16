<?php

// ENDPOINT POST - login.php 
// POST http://localhost/api/login.php

require_once "Config.php";

$input = json_decode(file_get_contents("php://input"), true);

$usuario = $input["user"] ?? "";
$clave   = $input["pass"] ?? "";

if ($usuario === "" || $clave === "") {
    echo json_encode(["success" => false, "mensaje" => "Faltan datos"]);

    exit;
}

$usuarioEncontrado = $db->buscarUsuario($usuario, $clave);

if ($usuarioEncontrado) {
    echo json_encode([
        "success" => true,
        "mensaje" => "Usuario encontrado",
        "usuario" => $usuarioEncontrado
    ]);
} else {
    echo json_encode([
        "success" => false,
        "mensaje" => "Usuario o contraseña incorrectos"
    ]);
}

?>