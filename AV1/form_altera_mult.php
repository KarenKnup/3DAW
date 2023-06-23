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
	$r2 = $_GET['r2'];
	$r3 = $_GET['r3'];
	$r4 = $_GET['r4'];
	$r5 = $_GET['r5'];
	$r6 = $_GET['r6'];

    $stmt = $conn->prepare("UPDATE multiplas SET pergunta = :pergunta2, resposta_1 = :r1, resposta_2 = :r2, resposta_3 = :r3, resposta_4 = :r4, resposta_5 = :r5, resposta = :r6 WHERE pergunta = :pergunta");
    $stmt->bindParam(':pergunta', $pergunta);
    $stmt->bindParam(':pergunta2', $pergunta2);
    $stmt->bindParam(':r1', $r1);
	$stmt->bindParam(':r2', $r2);
	$stmt->bindParam(':r3', $r3);
	$stmt->bindParam(':r4', $r4);
	$stmt->bindParam(':r5', $r5);
	$stmt->bindParam(':r6', $r6);
    $stmt->execute();

    echo "Pergunta alterada com sucesso!";
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
