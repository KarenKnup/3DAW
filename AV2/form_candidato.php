<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cpf = $_GET["cpf"];
    $nome = $_GET["nome"];
    $identidade = $_GET["identidade"];
    $email = $_GET["email"];
    $cargo = $_GET["cargo"];
    $sala = $_GET["sala"];

    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $createTableSql = "CREATE TABLE IF NOT EXISTS salas (
            sala varchar(20) NOT NULL
        )";
        $conn->exec($createTableSql);

        // Verificar se a sala já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM salas WHERE sala = :sala");
        $stmt->bindParam(":sala", $sala);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $stmt = $conn->prepare("INSERT INTO salas (sala) VALUES (:sala)");
            $stmt->bindParam(":sala", $sala);
            $stmt->execute();
        }

        $tableName = "sala_" . $sala;
        $createTableSql = "CREATE TABLE IF NOT EXISTS $tableName (
            nome varchar(50) NOT NULL,
            cpf varchar(15) NOT NULL,
            email varchar(100) NOT NULL,
            identidade varchar(20) NOT NULL,
            cargo varchar(50) NOT NULL
        )";
        $conn->exec($createTableSql);

        // Verificar se o CPF já existe no banco de dados
        $stmt = $conn->prepare("SELECT * FROM $tableName WHERE cpf = :cpf");
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "CPF já registrado!";
        } else {
            // Obtém o número de registros na tabela sala
            $sql = "SELECT COUNT(*) as count FROM $tableName";
            $result = $conn->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $count = $row["count"];
            
            // Verifica se a tabela sala atingiu o limite de 50 registros
            if ($count >= 50) {
                echo "Sala lotada!";
            } else {
                // Inserir o usuário no banco de dados
                $stmt = $conn->prepare("INSERT INTO $tableName (nome, cpf, email, identidade, cargo) VALUES (:nome, :cpf, :email, :identidade, :cargo)");
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":cpf", $cpf);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":identidade", $identidade);
                $stmt->bindParam(":cargo", $cargo);
                $stmt->execute();

                echo "Candidato inserido com sucesso!";
            }
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
