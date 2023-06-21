<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "escola";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se a matrícula já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM alunos WHERE matricula = :matricula");
        $stmt->bindParam(":matricula", $matricula);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "Matrícula já registrada!";
        } else {
            // Inserir o aluno no banco de dados
            $stmt = $conn->prepare("INSERT INTO alunos (nome, matricula, email) VALUES (:nome, :matricula, :email)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":matricula", $matricula);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            echo "Aluno inserido com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
