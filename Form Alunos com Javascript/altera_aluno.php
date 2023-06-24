<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <script>
        function redirect() {
            window.location.href = "ler_todos.php";
        }
    </script>
</head>
<body>
<h1>Editar Aluno</h1>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "escola";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Verifica se foi enviada uma solicitação de alteração
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$matricula = $_POST['matricula'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];

			// Atualiza os dados do aluno no banco de dados
			$stmt = $conn->prepare("UPDATE alunos SET nome = :nome, email = :email WHERE matricula = :matricula");
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':matricula', $matricula);
			$stmt->execute();

			echo "<p>Aluno alterado com sucesso!</p>";

			echo "<script>setTimeout(redirect, 2000);</script>"; // Redireciona automaticamente após 2 segundos (ajuste o tempo conforme necessário)
		} else {
			// Obtém os dados do aluno com base na matrícula fornecida na URL
			$matricula = $_GET['mat'];
			$stmt = $conn->prepare("SELECT * FROM alunos WHERE matricula = :matricula");
			$stmt->bindParam(':matricula', $matricula);
			$stmt->execute();
			$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($aluno) {
				// Exibe o formulário de edição
				?>
				<form method="POST" action="">
					<input type="hidden" name="matricula" value="<?php echo $aluno['matricula']; ?>">
					<label>Nome:</label>
					<input type="text" name="nome" value="<?php echo $aluno['nome']; ?>"><br><br>
					<label>Email:</label>
					<input type="email" name="email" value="<?php echo $aluno['email']; ?>"><br><br>
					<input type="submit" value="Salvar Alterações">
				</form>
				<?php
			} else {
				echo "<p>Aluno não encontrado!</p>";
			}
		}
	} catch (PDOException $e) {
		echo "Erro de conexão com o banco de dados: " . $e->getMessage();
	}

	$conn = null;
	?>

<br>
<a href="ler_todos.php">Voltar para a lista de alunos</a>
</body>
</html>
