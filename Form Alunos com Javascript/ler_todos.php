<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir Alunos</title>
    <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
</head>
<body>
<h1>Exibir Alunos</h1>
<br>
<a href="inclui_aluno.html">Inserir Aluno</a><br>
<a href="alterar.html">Alterar Aluno</a><br>
<a href="ler_todos.php">Listar Alunos</a><br>
<a href="exibe1.html">Listar Aluno</a><br>
<a href="deletar.html">Excluir Aluno</a><br>
<br><br>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "escola";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->query("SELECT * FROM alunos");

		$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if ($alunos) {
			echo "<table>";
			echo "<tr>";
			echo "<th>Matrícula</th>";
			echo "<th>Nome</th>";
			echo "<th>Email</th>";
			echo "<th>Ação</th>"; // Adiciona a coluna para ação
			echo "</tr>";

			foreach ($alunos as $aluno) {
			echo "<tr>";
			echo "<td>" . $aluno['matricula'] . "</td>";
			echo "<td>" . $aluno['nome'] . "</td>";
			echo "<td>" . $aluno['email'] . "</td>";
			echo "<td>";
			echo "<a href=\"altera_aluno.php?mat=" . $aluno['matricula'] . "\">Alterar</a>"; // Modifica o link para redirecionar para a página de edição
			echo " | ";
			echo "<a href=\"remove_aluno.php?mat=" . $aluno['matricula'] . "\">Remover</a>"; // Adiciona o link para remover
			echo "</td>";
			echo "</tr>";
		}

			echo "</table>";
		} else {
			echo "<h1>Nenhum aluno encontrado!</h1>";
		}
	} catch (PDOException $e) {
		echo "Erro de conexão com o banco de dados: " . $e->getMessage();
	}

	$conn = null;
	?>
<br>
</body>
</html>
