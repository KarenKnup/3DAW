<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>KEYFALLS</title>
    <style>
        body {
        font-family: 'Syncopate', sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 20px;
      }
      
      h1 {
        color: black;
        text-align: center;
        margin-top: 0;
      }
      
      .middle {
        text-align: center;
        margin-top: 30px;
      }
      
      .middle a {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
        text-decoration: none;
      }
      
      .middle a:hover {
        color: #555;
      }
	  
	  th, td {
	    border: 1px solid;
	    padding: 5px;
	    color: black;
	  }
    </style>
  </head>
  
  <body>
    <center><h1>KEYFALLS</h1></center>
		<?php
		echo "<center>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "av2";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->query("SELECT * FROM salas");
			$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$salas = array();
			$i = 0;

			if ($array) {
				foreach ($array as $sala) {
					$salas[$i] = $sala['sala']; // armazena as salas
					$i++;
				}
			} else {
				echo "<h1>Nenhuma sala encontrada!</h1>";
			}

			foreach ($salas as $sala) {
				$tableName = "sala_" . $sala;
				$stmt = $conn->query("SELECT * FROM $tableName");
				$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo "<table>";
				echo "<tr>Sala $sala</tr>";
				echo "<tr>";
				echo "<th>Nome</th>";
				echo "<th>CPF</th>";
				echo "<th>Email</th>";
				echo "<th>Identidade</th>";
				echo "<th>Cargo pretendido</th>";
				echo "</tr>";

				foreach ($tables as $table) {
					echo "<tr>";
					echo "<td>" . $table['nome'] . "</td>";
					echo "<td>" . $table['cpf'] . "</td>";
					echo "<td>" . $table['email'] . "</td>";
					echo "<td>" . $table['identidade'] . "</td>";
					echo "<td>" . $table['cargo'] . "</td>";
					echo "</tr>";
				}

				echo "</table><br><br>";
			}
		} catch (PDOException $e) {
			echo "Erro de conexão com o banco de dados: " . $e->getMessage();
		}
		echo "</center>";
		$conn = null;
		?>
		<a href="index.html" style="font-family: 'Montserrat', sans-serif;color: black;">RETORNAR</a>
  </body>
</html>
