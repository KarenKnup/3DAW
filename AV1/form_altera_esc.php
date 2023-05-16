<?php
$Escrita = fopen ("escritas.txt", "r") or die ("Erro ao ler arquivo!");
   
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Escrita));
      while(!feof($Escrita)){
        $linha = $c[0] . ";" . $c[1];
        fwrite($temp,$linha);
        $c = explode(";", fgets($Escrita));
      }
      
      fclose($temp);
     
    fclose($Escrita);
?>

<html>
<body>
  <?php
    $pergunta="";
    $pergunta2="";
    $r1="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $pergunta = $_POST["pergunta"];
      $pergunta2 = $_POST["pergunta2"];
      $r1 = $_POST["r1"];

      $Escrita = fopen ("escritas.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[0] == $pergunta){ 
            if(!($pergunta2=="") && !($r1=="")){
              $linha = $pergunta2 . ";" . $r1 . "\n";
            fwrite($Escrita,$linha);
            }
          } else {
              $linha = $c[0] . ";" . $c[1];
            fwrite($Escrita,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Escrita);
      unlink($temp);
    }

?>      
    <center><h2 style="color:green;">Os dados da pergunta foram alterados com sucesso!</h2></center>
    <p><a href="index.html">⇐ Retornar</a></p>
</body>

</html>