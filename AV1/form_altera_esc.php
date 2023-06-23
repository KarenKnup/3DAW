<?php
// Estabelecer a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "av1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualizar os dados na tabela
    $pergunta = $_GET['pergunta']; // Obtenha a pergunta a ser alterada
    $pergunta2 = $_GET['pergunta2'];
    $r1 = $_GET['r1'];

    $stmt = $conn->prepare("UPDATE escritas SET pergunta = :pergunta2, resposta = :r1 WHERE pergunta = :pergunta");
    $stmt->bindParam(':pergunta', $pergunta);
    $stmt->bindParam(':pergunta2', $pergunta2);
    $stmt->bindParam(':r1', $r1);
    $stmt->execute();

    echo "Pergunta alterada com sucesso!";
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
