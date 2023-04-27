<!DOCTYPE html>
<html>
  <head>
    <style>
      h3{
    color: red;
    }
    </style>
  </head>
<body>
   <h1>Ler dados de um aluno</h1>   
  <?php
  $mat = "";
  $nome="";
  $data="";
  $cpf="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $mat = $_POST["mat"];
    $Alunos = fopen ("alunos.txt", "r") or die ("Erro ao ler arquivo!");
        while(!feof($Alunos)){
          $c = explode(";", fgets($Alunos));
          if($c[2] == 2){ #usar $mat aqui
            $nome=$c[0];
            $cpf=$c[1];
            $data=$c[3];
             break;
          }
        }
  }

    echo "<h3>Dados do aluno: </h3>";
    echo "<p>" . "Aluno: " . $nome . "</p>";
    echo "<p>" . "Matrícula: " . $mat . "</p>";
    echo "<p>" . "CPF: " . $cpf . "</p>";
    echo "<p>" . "Data de ingresso: " . $data . "</p>";
?>

  <p><a href="index.html">⇐ Retornar</a></p>
</body>

</html>
