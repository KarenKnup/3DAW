<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pergunta = $_GET["pergunta"];
    $r1 = $_GET["r1"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se a pergunta já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM escritas WHERE pergunta = :pergunta");
        $stmt->bindParam(":pergunta", $pergunta);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "Pergunta já registrada!";
        } else {
            // Inserir a pergunta no banco de dados
            $stmt = $conn->prepare("INSERT INTO escritas (pergunta, resposta) VALUES (:pergunta, :r1)");
            $stmt->bindParam(":pergunta", $pergunta);
            $stmt->bindParam(":r1", $r1);
            $stmt->execute();

            echo "Pergunta inserida com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
