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
	  $r2="";
	  $r3="";
	  $r4="";
	  $r5="";
	  $r6="";
	  if($_SERVER["REQUEST_METHOD"]=="GET"){
		  $pergunta = $_GET["pergunta"];
		$Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
			while(!feof($Multiplas)){
			  $c = explode(";", fgets($Multiplas));
			  if($c[0] == $pergunta && !empty($c[1]) && !empty($c[2]) && !empty($c[3]) && !empty($c[4]) && !empty($c[5]) && !empty($c[6])){ #usar $pergunta aqui
				$r1=$c[1];
				$r2=$c[2];
				$r3=$c[3];
				$r4=$c[4];
				$r5=$c[5];
				$r6=$c[6];
				 break;
			  }
			}
	  }
		if(!empty($pergunta) && !empty($r1) && !empty($r2) && !empty($r3) && !empty($r4) && !empty($r5) && !empty($r6)){
		  echo "<center><table><tr><th>Pergunta</th><th>Resposta 1</th><th>Resposta 2</th><th>Resposta 3</th><th>Resposta 4</th><th>Resposta 5</th><th>Resposta Correta</th></tr>";
		  echo "<tr><th>" . $pergunta . "</th>";
		  echo "<th>" . $r1 . "</th>";
		  echo "<th>" . $r2 . "</th>";
		  echo "<th>" . $r3 . "</th>";
		  echo "<th>" . $r4 . "</th>";
		  echo "<th>" . $r5 . "</th>";
		  echo "<th>" . $r6 . "</th>";
		  echo "</tr></table></center>";
		}else{
		  echo "<center><h3>Essa pergunta não existe! </h3></center>";
		}
		
	?>
	</body>
</html>