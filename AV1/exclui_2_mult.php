<?php
	  $Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Multiplas));
      while(!feof($Multiplas)){
        $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5] . ";" . $c[6] ;
        fwrite($temp,$linha);
        $c = explode(";", fgets($Multiplas));
      }      
      fclose($temp);     
      fclose($Multiplas);

    $pergunta="";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
      $pergunta = $_GET["pergunta"];
      $Multiplas = fopen ("multiplas.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[0] != $pergunta){ 
            $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5] . ";" . $c[6] ;
            fwrite($Multiplas,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Multiplas);
      unlink("temp.txt");
	  echo "Pergunta removida com sucesso!";
    }

?>  