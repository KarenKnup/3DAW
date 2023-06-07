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
	  $pergunta = "";
	  $r1="";
	  if($_SERVER["REQUEST_METHOD"]=="GET"){
		  $pergunta = $_GET["pergunta"];
		$Escritas = fopen ("escritas.txt", "r") or die ("Erro ao ler arquivo!");
			while(!feof($Escritas)){
			  $c = explode(";", fgets($Escritas));
			  if($c[0] == $pergunta && !empty($c[1])){ #usar $pergunta aqui
				$r1=$c[1];
				 break;
			  }
			}
	  }
		if(!empty($pergunta) && !empty($r1)){
		  echo "<center><table><tr><th>Pergunta</th><th>Resposta</th></tr>";
		  echo "<tr><th>" . $pergunta . "</th>";
		  echo "<th>" . $r1 . "</th></tr></table></center>";
		}else{
		  echo "<center><h3>Essa pergunta não existe! </h3></center>";
		}
		
	?>
	</body>
</html>