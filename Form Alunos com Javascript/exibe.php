<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir Aluno</title>
    <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
</head>
<body>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escola";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mat = $_GET["mat"]; // Obter a matrícula do aluno

    $stmt = $conn->prepare("SELECT * FROM alunos WHERE matricula = :mat");
    $stmt->bindParam(':mat', $mat);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($aluno) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Matrícula</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $aluno['matricula'] . "</td>";
        echo "<td>" . $aluno['nome'] . "</td>";
        echo "<td>" . $aluno['email'] . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<h1>Aluno não encontrado!</h1>";
    }
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}

$conn = null;
?>
<br>
</body>
</html>
