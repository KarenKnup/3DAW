<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir Aluno</title>
   <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
</head>
<body>
<br>
<?php
        $Alunos = fopen ("alunosNovos.txt", "r") or die ("Erro ao ler arquivo!");
        if(!(file_exists("alunosNovos.txt"))){
          echo "<h1>Turma vazia!</h1>";
        }
        $cabecalho = explode(";", fgets($Alunos));
      ?>
    
    <table>
       <tr>
        <th class="th"> <?php echo $cabecalho[0] ?> </th>
        <th class="th"> <?php echo $cabecalho[1] ?> </th>
        <th class="th"> <?php echo $cabecalho[2] ?> </th>
      </tr>
      <?php
	  if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$mat = $_GET["mat"];
         while(!feof($Alunos)){
           $c = explode(";", fgets($Alunos));
           if(!empty($c[0]) && !empty($c[1]) && !empty($c[2])){   
              if($c[1] == $mat){
				  echo "<tr>";
                  for($i=0; $i<count($c); $i++){
                    echo "<th>";
                    echo $c[$i];
                    echo "</th>";
                  }
				  echo "</tr>"; 
			  }
           }
         }
          fclose($Alunos);
	  }
      ?>
    </table>
<br>
</body>
</html>
