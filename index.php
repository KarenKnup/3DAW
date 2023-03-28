<html>
  <head>
    <style>
		th {background-color: lightblue; 
        border-style: dotted dashed solid double;}
		td{background-color: lightgray;
      border-style: ridge;}
		
	</style>
  </head>
  <body>
    <?php
  $nomes = array("jose","antonio","neusa","tiago","luiz");
  $notas = array(7,5,9,3,8);
                ?>
    <table>
      <tr>
        <th>Nome</th>
        <th>Nota</th>
        <th>Status</th>
      </tr>
      <?php
        $msg;

        for($x=0; $x<count($nomes); $x++){
            echo "<tr>";
              echo "<td>";
              echo $nomes[$x];
              echo "</td>";
              echo "<td>";
              echo $notas[$x];
              echo "</td>";
              echo "<td>";
                if($notas[$x]>=8){
                  $msg="<p>Aprovado</p>";
                } else {
                  $msg="<p>Reprovado</p>";
                }
              echo $msg;
              echo "</td>";
            echo "</tr>";
        }
        
      ?>
    </table>
  </body>
</html>