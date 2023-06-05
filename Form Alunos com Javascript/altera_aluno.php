<?php
$Alunos = fopen ("alunosNovos.txt", "r") or die ("Erro ao ler arquivo!");
   
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Alunos));
      while(!feof($Alunos)){
        $linha = $c[0] . ";" . $c[1] . ";" . $c[2] ;
        fwrite($temp,$linha);
        $c = explode(";", fgets($Alunos));
      }
      
      fclose($temp);
     
    fclose($Alunos);

    $mat="";
    $matricula="";
    $nome="";
    $email="";

    if($_SERVER["REQUEST_METHOD"]=="GET"){
      $mat = $_GET["mat"];
      $matricula = $_GET["matricula"];
      $email = $_GET["email"];
      $nome = $_GET["nome"];

      $Alunos = fopen ("alunosNovos.txt", "w+") or die ("Erro ao abrir arquivo!");
      $temp = fopen ("temp.txt", "r") or die ("Erro ao ler arquivo!");
      $c = explode(";", fgets($temp));
      while(!feof($temp)){
          if($c[1] == $mat){ 
            if(!($nome=="") && !($matricula=="") && !($email=="")){
              $linha = $nome . ";" . $matricula . ";" . $email . "\n";
            fwrite($Alunos,$linha);
            }
          } else {
              $linha = $c[0] . ";" . $c[1] . ";" . $c[2] ;
            fwrite($Alunos,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Alunos);
      unlink("temp.txt");
	  echo "Aluno alterado com sucesso!";
    }

?>  