<?php

// Endpoint GET - usuarios.php (lista usuarios)
// GET http://localhost/api/usuarios.php

require_once "Config.php";

$sql = "SELECT usuario, nombre, apellidos, celular FROM usuarios";
$stmt = $db->conn->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

?>