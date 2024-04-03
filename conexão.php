<?php
// Informações de conexão com o banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "sistema_os";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
