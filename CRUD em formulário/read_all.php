<html>
  <head>
    <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
  </head>
  
  <body>
    <h1>Listagem de todos os alunos</h1>
      <?php
        $Alunos = fopen ("alunos.txt", "r") or die ("Erro ao ler arquivo!");
        if(!(file_exists("alunos.txt"))){
          echo "<h1>Turma vazia!</h1>";
        }
        $cabecalho = explode(";", fgets($Alunos));
      ?>
    
    <table>
       <tr>
        <th class="th"> <?php echo $cabecalho[0] ?> </th>
        <th class="th"> <?php echo $cabecalho[1] ?> </th>
        <th class="th"> <?php echo $cabecalho[2] ?> </th>
        <th class="th"> <?php echo $cabecalho[3] ?> </th>
      </tr>
      <?php
         while(!feof($Alunos)){
           $c = explode(";", fgets($Alunos));
           if(!empty($c[0]) && !empty($c[1]) && !empty($c[2]) && !empty($c[3])){   
              echo "<tr>";
                  for($i=0; $i<count($c); $i++){
                    echo "<th>";
                    echo $c[$i];
                    echo "</th>";
                  }
              echo "</tr>"; 
           }
         }
          fclose($Alunos);
      ?>
    </table>
    <p><a href="index.html">⇐ Retornar</a></p>
  </body>

</html>
