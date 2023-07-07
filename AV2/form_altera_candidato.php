<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Estabelecer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "av2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obter os dados do CPF fornecido
        $cpf = $_GET['cpf'];
        $sala = $_GET['sala'];
        $sala2 = $_GET['sala2'];

        // Verificar se a tabela original existe
        $tableName = "sala_" . $sala;
        $stmt = $conn->prepare("SELECT 1 FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :tableName LIMIT 1");
        $stmt->bindParam(":dbname", $dbname);
        $stmt->bindParam(":tableName", $tableName);
        $stmt->execute();
        $tableExists = $stmt->fetchColumn();

        if ($tableExists) {
            // Verificar se a tabela de destino existe
            $tableName2 = "sala_" . $sala2;
            $stmt = $conn->prepare("SELECT 1 FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :tableName LIMIT 1");
            $stmt->bindParam(":dbname", $dbname);
            $stmt->bindParam(":tableName", $tableName2);
            $stmt->execute();
            $tableExists2 = $stmt->fetchColumn();

            if ($tableExists2 || $sala2 == "") {
                // Obter os dados do registro a ser movido
                $stmt = $conn->prepare("SELECT nome, email, identidade, cargo FROM $tableName WHERE cpf = :cpf");
                $stmt->bindParam(":cpf", $cpf);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $nome = $row['nome'];
                    $email = $row['email'];
                    $identidade = $row['identidade'];
                    $cargo = $row['cargo'];

                    // Excluir o registro da tabela original
                    $stmt = $conn->prepare("DELETE FROM $tableName WHERE cpf = :cpf");
                    $stmt->bindParam(":cpf", $cpf);
                    $stmt->execute();

                    if ($tableExists2) {
                        // Inserir o registro na tabela de destino
                        $stmt = $conn->prepare("INSERT INTO $tableName2 (nome, cpf, email, identidade, cargo) VALUES (:nome, :cpf, :email, :identidade, :cargo)");
                        $stmt->bindParam(":nome", $nome);
                        $stmt->bindParam(":cpf", $cpf);
                        $stmt->bindParam(":email", $email);
                        $stmt->bindParam(":identidade", $identidade);
                        $stmt->bindParam(":cargo", $cargo);
                        $stmt->execute();

                        echo "Registro movido com sucesso para a sala $sala2!";
                    } else {
                        echo "Registro excluído da sala $sala!";
                    }
                } else {
                    echo "Não foi encontrado nenhum registro com o CPF fornecido.";
                }
            } else {
                echo "A sala de destino $sala2 não existe.";
            }
        } else {
            echo "A sala original $sala não existe.";
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
