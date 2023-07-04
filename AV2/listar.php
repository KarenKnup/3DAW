<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KEYFALLS</title>
    <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
</head>
<body>
<h1>Exibir Candidatos</h1>
<br>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "av2";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->query("SELECT * FROM candidatos");

		$candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($candidatos) {
			echo "<table>";
			echo "<tr>";
			echo "<th>Nome</th>";
			echo "<th>CPF</th>";
			echo "<th>Identidade</th>";
			echo "<th>Email</th>";
			echo "<th>Cargo</th>";
			echo "<th>Sala</th>";
			echo "<th>Ação</th>"; // Adiciona a coluna para ação
			echo "</tr>";

			foreach ($candidatos as $aluno) {
			echo "<tr>";
			echo "<td>" . $aluno['nome'] . "</td>";
			echo "<td>" . $aluno['cpf'] . "</td>";
			echo "<td>" . $aluno['identidade'] . "</td>";
			echo "<td>" . $aluno['email'] . "</td>";
			echo "<td>" . $aluno['cargo'] . "</td>";
			echo "<td>" . $aluno['sala'] . "</td>";
			echo "<td>";
			echo "<a href=\"altera_aluno.php?cpf=" . $aluno['cpf'] . "\">Alterar</a>"; // Modifica o link para redirecionar para a página de edição
			echo " | ";
			echo "<a href=\"remove_aluno.php?cpf=" . $aluno['cpf'] . "\">Remover</a>"; // Adiciona o link para remover
			echo "</td>";
			echo "</tr>";
		}

			echo "</table>";
		} else {
			echo "<h1>Nenhum candidato encontrado!</h1>";
		}
	} catch (PDOException $e) {
		echo "Erro de conexão com o banco de dados: " . $e->getMessage();
	}

	$conn = null;
	?>
<br>
<a href="index.html">Voltar para a página inicial</a>
</body>
</html>