<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $sala = $_GET["sala"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o cpf já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM fiscais WHERE cpf = :cpf");
        $stmt->bindParam(":cpf", $matricula);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "CPF já registrado!";
        } else {
            // Inserir o fiscal no banco de dados
            $stmt = $conn->prepare("INSERT INTO fiscais (nome, cpf, sala) VALUES (:nome, :cpf, :sala)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":sala", $sala);
            $stmt->execute();

            echo "Fiscal inserido com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>