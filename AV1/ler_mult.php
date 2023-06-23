<html>
  <head>
    <style>
      th, td {
          border: 1px solid;
          padding: 5px;
          color: white;
        }
      
      body{
        margin: 0;
        padding: 0;
        background: #2d3436;
      }
      .middle{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }
      .btn{
        position: relative;
        display: block;
        color: white;
        font-size: 14px;
        font-family: "montserrat";
        text-decoration: none;
        margin: 30px 0;
        border: 2px solid lightskyblue;
        padding: 14px 60px;
        text-transform: uppercase;
        overflow: hidden;
        transition: 1s all ease;
      }
      .btn::before{
        background: lightskyblue;
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        z-index: -1;
        transition: all 0.6s ease;
      }
      
      .btn1::before{
        width: 0%;
        height: 100%;
      }
      
      .btn1:hover::before{
        width: 100%;
      }
      
      
      .btn2::before{
        width: 100%;
        height: 0%;
      }
      .btn2:hover::before{
        height: 100%;
      }
      
      .btn3::before{
        width: 100%;
        height: 0%;
        transform: translate(-50%,-50%) rotate(45deg);
      }
      .btn3:hover::before{
        height: 380%;
      }
      
      .btn4::before{
        width: 100%;
        height: 0%;
        transform: translate(-50%,-50%) rotate(-45deg);
      }
      .btn4:hover::before{
        height: 380%;
      }

    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Syncopate:wght@700&display=swap" rel="stylesheet">
	
    <title>GAME PROJECT</title>
    <link rel="stylesheet" href="style.css">
  </head> 
  
  <body>
    <center><h2 style="color:lightskyblue;">➜ Listagem de todas as perguntas e respostas de múltipla escolha</h2></center>
      
    <center>
     <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "av1";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->query("SELECT * FROM multiplas");

			$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($perguntas) {
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

				foreach ($perguntas as $pergunta) {
					echo "<tr>";
					echo "<td>" . $pergunta['pergunta'] . "</td>";
					echo "<td>" . $pergunta['resposta_1'] . "</td>";
					echo "<td>" . $pergunta['resposta_2'] . "</td>";
					echo "<td>" . $pergunta['resposta_3'] . "</td>";
					echo "<td>" . $pergunta['resposta_4'] . "</td>";
					echo "<td>" . $pergunta['resposta_5'] . "</td>";
					echo "<td>" . $pergunta['resposta'] . "</td>";
					echo "</tr>";
				}

				echo "</table>";
			} else {
				echo "<h1>Nenhuma pergunta encontrada!</h1>";
			}
		} catch (PDOException $e) {
			echo "Erro de conexão com o banco de dados: " . $e->getMessage();
		}

		$conn = null;
		?>
    </center> 
    <br>
    <a href="listar1.html" style="font-family: 'Montserrat', sans-serif;color: white;">RETORNAR</a>
  </body>

</html>
