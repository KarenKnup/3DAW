<?php
// Configurações de conexão
$servername = "localhost";
$username = "root";
$password = ""; // Normalmente a senha do root no localhost é vazia, mas ajuste se necessário
$dbname = "Diario";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
