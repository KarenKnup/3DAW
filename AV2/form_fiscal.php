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

        $createTableSql = "CREATE TABLE IF NOT EXISTS fiscais (
            nome varchar(100) NOT NULL,
            cpf varchar(15) NOT NULL,
            sala varchar(20) NOT NULL,
            PRIMARY KEY(cpf)
        )";
        $conn->exec($createTableSql);

		// Nome da tabela a ser verificada
		$tableName = "sala_" . $sala;
		// Consulta para verificar se a tabela existe
		$stmt = $conn->prepare("SELECT 1 FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :tableName LIMIT 1");
		$stmt->bindParam(":dbname", $dbname);
		$stmt->bindParam(":tableName", $tableName);
		$stmt->execute();
		$tableExists = $stmt->fetchColumn();

		if ($tableExists) {
					// Verificar se o CPF já existe no banco de dados
				$stmt = $conn->prepare("SELECT * FROM fiscais WHERE cpf = :cpf");
				$stmt->bindParam(":cpf", $cpf);
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($result) {
					echo "CPF já registrado!";
				} else {
					// Obtém o número de registros na tabela para a sala atual
					$stmt = $conn->prepare("SELECT COUNT(*) as quantidade FROM fiscais WHERE sala = :sala");
					$stmt->bindParam(":sala", $sala);
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					if ($row && isset($row["quantidade"])) {
						$quantidade = $row["quantidade"];

						// Verifica se a sala atingiu o limite de 2 nomes
						if ($quantidade >= 2) {
							echo "Limite de fiscais atingido nessa sala!";
						} else {
							// Inserir o usuário no banco de dados
							$stmt = $conn->prepare("INSERT INTO fiscais (nome, cpf, sala) VALUES (:nome, :cpf, :sala)");
							$stmt->bindParam(":nome", $nome);
							$stmt->bindParam(":cpf", $cpf);
							$stmt->bindParam(":sala", $sala);
							$stmt->execute();

							echo "Fiscal inserido com sucesso!";
						}
					} else {
						echo "Erro ao obter quantidade de fiscais.";
					}
				}
		} else {
			echo "A sala $sala não existe.";
		}
	
        
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }

    $conn = null;
}
?>
