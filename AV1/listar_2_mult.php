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

			$stmt = $conn->prepare("SELECT * FROM multiplas WHERE pergunta = :pergunta");
			$stmt->bindParam(':pergunta', $pergunta);
			$stmt->execute();

			$multiplas = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($multiplas) {
				echo "<table>";
				echo "<tr>";
				echo "<th>Pergunta</th>";
				echo "<th>Resposta 1</th>";
				echo "<th>Resposta 2</th>";
				echo "<th>Resposta 3</th>";
				echo "<th>Resposta 4</th>";
				echo "<th>Resposta 5</th>";
				echo "<th>Resposta correta</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $multiplas['pergunta'] . "</td>";
				echo "<td>" . $multiplas['resposta_1'] . "</td>";
				echo "<td>" . $multiplas['resposta_2'] . "</td>";
				echo "<td>" . $multiplas['resposta_3'] . "</td>";
				echo "<td>" . $multiplas['resposta_4'] . "</td>";
				echo "<td>" . $multiplas['resposta_5'] . "</td>";
				echo "<td>" . $multiplas['resposta'] . "</td>";
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