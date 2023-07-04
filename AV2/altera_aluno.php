<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KEYFALLS</title>
    <script>
        function redirect() {
            window.location.href = "listar.php";
        }
    </script>
</head>
<body>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "av2";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Verifica se foi enviada uma solicitação de alteração
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$identidade = $_POST['identidade'];
			$email = $_POST['email'];
			$cargo = $_POST['cargo'];
			$sala = $_POST['sala'];

			// Atualiza os dados do candidato no banco de dados
			$stmt = $conn->prepare("UPDATE candidatos SET cpf = :cpf,nome = :nome,  identidade = :identidade, email = :email, cargo = :cargo, sala = :sala WHERE cpf = :cpf");
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':identidade', $identidade);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':cargo', $cargo);
			$stmt->bindParam(':sala', $sala);
			$stmt->execute();

			echo "<p>Candidato alterado com sucesso!</p>";

			echo "<script>setTimeout(redirect, 2000);</script>"; // Redireciona automaticamente após 2 segundos (ajuste o tempo conforme necessário)
		} else {
			// Obtém os dados fornecido na URL
			$cpf = $_GET['cpf'];
			$stmt = $conn->prepare("SELECT * FROM candidatos WHERE cpf = :cpf");
			$stmt->bindParam(':cpf', $cpf);
			$stmt->execute();
			$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($aluno) {
				// Exibe o formulário de edição
				?>
				<form method="POST" action="">	
					<label>Nome:</label>
					<input type="text" name="nome" value="<?php echo $aluno['nome']; ?>"><br><br>
					<label>CPF:</label>
					<input type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>"><br><br>					
					<label>Identidade:</label>
					<input type="text" name="identidade" value="<?php echo $aluno['identidade']; ?>"><br><br>
					<label>Email:</label>
					<input type="email" name="email" value="<?php echo $aluno['email']; ?>"><br><br>
					<label>Cargo:</label>
					<input type="text" name="cargo" value="<?php echo $aluno['cargo']; ?>"><br><br>
					<label>Sala:</label>
					<input type="text" name="sala" value="<?php echo $aluno['sala']; ?>"><br><br>
					
					<input type="submit" value="Salvar Alterações">
				</form>
				<?php
			} else {
				echo "<p>Candidato não encontrado!</p>";
			}
		}
	} catch (PDOException $e) {
		echo "Erro de conexão com o banco de dados: " . $e->getMessage();
	}

	$conn = null;
	?>

<br>
<a href="listar.php">Voltar para a lista de candidatos</a>
</body>
</html>