<?php
  $pergunta = "";
  $r1 = "";
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pergunta = $_POST["pergunta"];
    $r1 = $_POST["r1"];
   
    if(!(file_exists("escritas.txt"))){
      $arqDisc=fopen(filename: "escritas.txt", mode:"w") or die("Erro ao criar arquivo!");
      $linha = "pergunta;resposta\n";
      fwrite($arqDisc,$linha);
      fclose($arqDisc);
    } 
      $arqDisc=fopen(filename: "escritas.txt", mode:"a") or die("Erro ao criar arquivo"); 
      $linha = $pergunta . ";" . $r1 . "\n";
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