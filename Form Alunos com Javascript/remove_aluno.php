<?php
// Estabelecer a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Remover dados da tabela
    $matricula = $_GET['mat']; // Obtenha o valor da matrícula do aluno a ser removido
    $stmt = $conn->prepare("DELETE FROM alunos WHERE matricula = :matricula");
    $stmt->bindParam(':matricula', $matricula);
    $stmt->execute();

    $conn = null;

    echo "<script>window.location.replace('ler_todos.php');</script>"; // Redireciona a página para si mesma (recarregar)
    exit();
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>
