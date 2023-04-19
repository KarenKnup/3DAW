<?php
$nome = "";
$sigla ="";
$carga ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $nome=$_POST["nome"];
  $sigla=$_POST["sigla"];
  $carga=$_POST["carga"];
  $linha ="";
    echo "Nome: " . $nome . " Sigla: " . $sigla . " Carga: " . $carga;
    //var_dump
  //w3schools  
    if(!(file_exists("disciplinas.txt"))){
      $arqDisc=fopen(filename: "disciplinas.txt", mode:"w") or die("Erro ao criar arquivo");
      $linha = "nome;sigla;carga\n";
  fwrite($arqDisc,$linha);
       fclose($arqDisc);
    }
     $arqDisc=fopen(filename: "disciplinas.txt", mode:"a") or die("Erro ao criar arquivo"); 
      $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
  fwrite($arqDisc,$linha);
  fclose($arqDisc);
}
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    th{
      border: 1px solid;
      }
  </style>
</head>

<body>
  <h1>Criar nova disciplina</h1>
  <form action="FormDisciplina.php" method="POST">
    Nome: <input type="text" name="nome"> <br>
    Sigla: <input type="text" name="sigla"> <br>
    Carga Horária: <input type="text" name="carga"> <br>
  <input type="submit" value="Criar nova disciplina">
  </form>

   <hr>
   <h1>Listar Disciplinas</h1> 
    <?php
      $Disciplinas = fopen ("disciplinas.txt", "r") or die ("Erro ao ler arquivo!");
      $cabecalho = explode(";", fgets($Disciplinas));
    ?>
  
  <table>
     <tr>
      <th class="th"> <?php echo $cabecalho[0] ?> </th>
      <th class="th"> <?php echo $cabecalho[1] ?> </th>
      <th class="th"> <?php echo $cabecalho[2] ?> </th>
    </tr>
    <?php
       while(!feof($Disciplinas)){
         $c = explode(";", fgets($Disciplinas));
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
        fclose($Disciplinas);
    ?>
  </table>

</body>

</html>
