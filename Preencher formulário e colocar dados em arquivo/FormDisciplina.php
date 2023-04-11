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
</head>

<body>
  <h1>Criar 9 disciplinas</h1>
  <form action="FormDisciplina.php" method="POST">
    Nome: <input type="text" name="nome"> <br>
    Sigla: <input type="text" name="sigla"> <br>
    Carga Horária: <input type="text" name="carga"> <br>
  <input type="submit" value="Criar nova disciplina">
  </form>


</body>

</html>