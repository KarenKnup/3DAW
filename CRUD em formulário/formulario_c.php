<?php
  $nome = "";
  $cpf = "";
  $mat = "";
  $ingresso = "";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $mat = $_POST["mat"];
    $ingresso = $_POST["ingresso"];
    if(!(file_exists("alunos.txt"))){
      $arqDisc=fopen(filename: "alunos.txt", mode:"w") or die("Erro ao criar arquivo!");
      $linha = "nome;cpf;matricula;ingresso\n";
      fwrite($arqDisc,$linha);
      fclose($arqDisc);
    } 
      $arqDisc=fopen(filename: "alunos.txt", mode:"a") or die("Erro ao criar arquivo"); 
      $linha = $nome . ";" . $cpf . ";" . $mat . ";" . $ingresso . "\n";
  fwrite($arqDisc,$linha);
  fclose($arqDisc);
    
  }
?>

<html>
  <body>
    <center><h2 style="color:green;">O aluno foi inserido com sucesso!</h2></center>
    <p><a href="index.html">⇐ Retornar</a></p>
  </body>
</html>