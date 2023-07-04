<?php
// Estabelecer a conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "av2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Remover dados da tabela
    $cpf = $_GET['cpf']; // Obtenha o valor da matrícula do aluno a ser removido
    $stmt = $conn->prepare("DELETE FROM candidatos WHERE cpf = :cpf");
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    $conn = null;

    echo "<script>window.location.replace('listar.php');</script>"; // Redireciona a página para si mesma (recarregar)
    exit();
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>