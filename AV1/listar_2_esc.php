<html>
	<head>
		<style>
		  th, td {
			  border: 1px solid;
			  padding: 5px;
			  color: white;
			}
		</style>
	</head>
	  
	<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "av1";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$pergunta = $_GET["pergunta"]; // Obter a pergunta desejada

			$stmt = $conn->prepare("SELECT * FROM escritas WHERE pergunta = :pergunta");
			$stmt->bindParam(':pergunta', $pergunta);
			$stmt->execute();

			$escritas = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($escritas) {
				echo "<table>";
				echo "<tr>";
				echo "<th>Pergunta</th>";
				echo "<th>Resposta</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $escritas['pergunta'] . "</td>";
				echo "<td>" . $escritas['resposta'] . "</td>";
				echo "</tr>";
				echo "</table>";
			} else {
				echo "<h1>Pergunta não encontrada!</h1>";
			}
		} catch (PDOException $e) {
			echo "Erro de conexão com o banco de dados: " . $e->getMessage();
		}

		$conn = null;
		?>
	</body>
</html>