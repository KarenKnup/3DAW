<?php
$Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
   
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Multiplas));
      while(!feof($Multiplas)){
        $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5];
        fwrite($temp,$linha);
        $c = explode(";", fgets($Multiplas));
      }
      
      fclose($temp);
     
    fclose($Multiplas);
?>

<html>
<body>
  <?php
    $pergunta="";
    $pergunta2="";
    $r1="";
    $r2="";
    $r3="";
    $r4="";
    $r5="";
    $r6="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $pergunta = $_POST["pergunta"];
      $pergunta2 = $_POST["pergunta2"];
      $r1 = $_POST["r1"];
      $r2 = $_POST["r2"];
      $r3 = $_POST["r3"];
      $r4 = $_POST["r4"];
      $r5 = $_POST["r5"];
      $r6 = $_POST["r6"];

      $Multiplas = fopen ("multiplas.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[0] == $pergunta){ 
            if(!($pergunta2=="") && !($r1=="")){
              $linha = $pergunta2 . ";" . $r1 . ";" . $r2 . ";" . $r3 . ";" . $r4 . ";" . $r5 . ";" . $r6 . "\n";
            fwrite($Multiplas,$linha);
            }
          } else {
              $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5];
            fwrite($Multiplas,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Multiplas);
      unlink($temp);
    }

?>      
    <center><h2 style="color:green;">Os dados da pergunta foram alterados com sucesso!</h2></center>
    <p><a href="index.html">⇐ Retornar</a></p>
</body>

</html>