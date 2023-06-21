<?php
// Estabelecer a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atualizar os dados na tabela
    $mat = $_GET['mat']; // Obtenha o valor da matrícula do aluno a ser alterado
    $matricula = $_GET['matricula'];
    $nome = $_GET['nome'];
    $email = $_GET['email'];

    $stmt = $conn->prepare("UPDATE alunos SET nome = :nome, matricula = :matricula, email = :email WHERE matricula = :mat");
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mat', $mat);
    $stmt->execute();

    echo "Aluno alterado com sucesso!";
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
