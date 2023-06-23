<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pergunta = $_GET["pergunta"];
    $r1 = $_GET["r1"];
	$r2 = $_GET["r2"];
	$r3 = $_GET["r3"];
	$r4 = $_GET["r4"];
	$r5 = $_GET["r5"];
	$r6 = $_GET["r6"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se a pergunta já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM multiplas WHERE pergunta = :pergunta");
        $stmt->bindParam(":pergunta", $pergunta);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "Pergunta já registrada!";
        } else {
            // Inserir a pergunta no banco de dados
            $stmt = $conn->prepare("INSERT INTO multiplas (pergunta, resposta_1, resposta_2, resposta_3, resposta_4, resposta_5, resposta) VALUES (:pergunta, :r1, :r2, :r3, :r4, :r5, :r6)");
            $stmt->bindParam(":pergunta", $pergunta);
            $stmt->bindParam(":r1", $r1);
			$stmt->bindParam(":r2", $r2);
			$stmt->bindParam(":r3", $r3);
			$stmt->bindParam(":r4", $r4);
			$stmt->bindParam(":r5", $r5);
			$stmt->bindParam(":r6", $r6); //É útil transformar a resposta 6 em um campo p selecionar uma das 5 respostas
            $stmt->execute();

            echo "Pergunta inserida com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
