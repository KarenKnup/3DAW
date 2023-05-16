<?php
  $pergunta = "";
  $r1 = "";
  $r2 = "";
  $r3 = "";
  $r4 = "";
  $r5 = "";
  $r6 = "";
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pergunta = $_POST["pergunta"];
    $r1 = $_POST["r1"];
    $r2 = $_POST["r2"];
    $r3 = $_POST["r3"];
    $r4 = $_POST["r4"];
    $r5 = $_POST["r5"];
    $r6 = $_POST["r6"];

   
    if(!(file_exists("multiplas.txt"))){
      $arqDisc=fopen(filename: "multiplas.txt", mode:"w") or die("Erro ao criar arquivo!");
      $linha = "pergunta;resposta1;resposta2;resposta3;resposta4;resposta5;resposta\n";
      fwrite($arqDisc,$linha);
      fclose($arqDisc);
    } 
      $arqDisc=fopen(filename: "multiplas.txt", mode:"a") or die("Erro ao criar arquivo"); 
      $linha = $pergunta . ";" . $r1 . ";" . $r2 . ";" . $r3 . ";" . $r4 . ";" . $r5 . ";" . $r6 . "\n";
  fwrite($arqDisc,$linha);
  fclose($arqDisc);
    
  }
?>

<html>
  <body>
    <center><h2 style="color:green;">Inserção realizada com sucesso!</h2></center>
    <p><a href="index.html"> Retornar</a></p>
  </body>
</html>