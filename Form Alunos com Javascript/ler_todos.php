<html>
<head>
    <meta charset="UTF-8">
    <title>Exibir Alunos</title>
   <style>
        th, td {
          border: 1px solid;
          padding: 5px;
        }
    </style>
</head>
<body>
<h1>Exibir Alunos</h1>
<br>
<a href="inclui_aluno.html">Inserir Aluno</a><br>
<a href="alterar.html">Alterar Aluno</a><br>
<a href="ler_todos.php">Listar Alunos</a><br>
<a href="exibe1.html">Listar Aluno</a><br>
<a href="deletar.html">Excluir Aluno</a><br>
<br><br>
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
         while(!feof($Alunos)){
           $c = explode(";", fgets($Alunos));
           if(!empty($c[0]) && !empty($c[1]) && !empty($c[2])){   
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
<br>
</body>
</html>
