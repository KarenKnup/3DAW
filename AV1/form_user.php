<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cpf = $_GET["cpf"];
    $nome = $_GET["nome"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o CPF já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM users WHERE cpf = :cpf");
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "CPF já registrado!";
        } else {
            // Inserir o usuário no banco de dados
            $stmt = $conn->prepare("INSERT INTO users (cpf, nome) VALUES (:cpf, :nome)");
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":nome", $nome);
            $stmt->execute();

            echo "Usuário inserido com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
