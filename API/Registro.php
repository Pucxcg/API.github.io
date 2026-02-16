<?php

// ENDPOINT POST - register.php 
// POST http://localhost/api/Registro.php

require_once "Config.php";

$input = json_decode(file_get_contents("php://input"), true);

$usuario  = $input["user"] ?? "";
$contrasena    = $input["pass"] ?? "";
$nombre    = $input["nombre"] ?? "";
$apellidos = $input["apellidos"] ?? "";
$celular   = $input["celular"] ?? "";

if ($usuario === "" || $contrasena === "") {
    echo json_encode(["error" => "Usuario y contraseña son obligatorios"]);
    exit;
}

if ($db->usuarioExiste($usuario)) {
    echo json_encode(["error" => "El usuario ya existe"]);
    exit;
}

$ok = $db->agregarUsuario($usuario, $contrasena, $nombre, $apellidos, $celular);

if ($ok) {
    echo json_encode(["success" => true, "mensaje" => "Usuario registrado.."]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al registrar usuario.."]);
}

?>