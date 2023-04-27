<?php
$Alunos = fopen ("alunos.txt", "r") or die ("Erro ao ler arquivo!");
    if(!(file_exists("temp.txt"))){
      $temp=fopen(filename: "temp.txt", mode:"a") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Alunos));
      while(!feof($Alunos)){
        $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3];
        fwrite($temp,$linha);
        $c = explode(";", fgets($Alunos));
      }
      
      fclose($temp);
    } 
     
    fclose($Alunos);
?>

<html>
<body>
  <h1>Alterar os dados de um aluno</h1>
  <?php
    $mat="";
    $n_mat="";
    $nome="";
    $data="";
    $cpf="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $mat = $_POST["mat"];
      $n_mat = $_POST["mat2"];
      $data = $_POST["ingresso"];
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];

      $Alunos = fopen ("alunos.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[2] == $mat){ 
            if(!($nome=="") && !($n_mat=="") && !($data=="") && !($cpf=="")){
              $linha = $nome . ";" . $cpf . ";" . $n_mat . ";" . $data . "\n";
            fwrite($Alunos,$linha);
            }
          } else {
              $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3];
            fwrite($Alunos,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Alunos);
      unlink($temp);
    }

?>      
    <center><h2 style="color:green;">Os dados do aluno foram alterados com sucesso!</h2></center>
    <p><a href="index.html">⇐ Retornar</a></p>
</body>

</html>