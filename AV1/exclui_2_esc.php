<?php
	  $Escritas = fopen ("escritas.txt", "r") or die ("Erro ao ler arquivo!");
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Escritas));
      while(!feof($Escritas)){
        $linha = $c[0] . ";" . $c[1] ;
        fwrite($temp,$linha);
        $c = explode(";", fgets($Escritas));
      }      
      fclose($temp);     
      fclose($Escritas);

    $pergunta="";
    if($_SERVER["REQUEST_METHOD"]=="GET"){
      $pergunta = $_GET["pergunta"];
      $Escritas = fopen ("escritas.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[0] != $pergunta){ 
            $linha = $c[0] . ";" . $c[1] ;
            fwrite($Escritas,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Escritas);
      unlink("temp.txt");
	  echo "Pergunta removida com sucesso!";
    }

?>  