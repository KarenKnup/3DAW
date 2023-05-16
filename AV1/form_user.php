<?php
  $nome = "";
  $cpf = "";
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
   
    if(!(file_exists("users.txt"))){
      $arqDisc=fopen(filename: "users.txt", mode:"w") or die("Erro ao criar arquivo!");
      $linha = "Nome;CPF\n";
      fwrite($arqDisc,$linha);
      fclose($arqDisc);
    } 
      $arqDisc=fopen(filename: "users.txt", mode:"a") or die("Erro ao criar arquivo"); 
      $linha = $nome . ";" . $cpf . "\n";
  fwrite($arqDisc,$linha);
  fclose($arqDisc);
    
  }
?>

<html>
  <body>
    <center><h2 style="color:green;">O usuário foi inserido com sucesso!</h2></center>
    <p><a href="index.html"> Retornar</a></p>
  </body>
</html>