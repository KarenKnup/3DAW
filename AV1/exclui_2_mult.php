<?php
// Estabelecer a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "av1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Remover dados da tabela
    $pergunta = $_GET['pergunta']; // Obtenha a pergunta a ser removida
    $stmt = $conn->prepare("DELETE FROM multiplas WHERE pergunta = :pergunta");
    $stmt->bindParam(':pergunta', $pergunta);
    $stmt->execute();

    echo "Pergunta removida com sucesso!";
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
