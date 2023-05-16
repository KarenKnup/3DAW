<?php
$Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
   
      $temp=fopen(filename: "temp.txt", mode:"w+") or die("Erro ao criar arquivo!");
      $c = explode(";", fgets($Multiplas));
      while(!feof($Multiplas)){
        $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5] . ";" . $c[6];
        fwrite($temp,$linha);
        $c = explode(";", fgets($Multiplas));
      }
      
      fclose($temp);
     
    fclose($Multiplas);
?>

<html>
  <head>
    <style>
      body{
        margin: 0;
        padding: 0;
        background: #2d3436;
      }
      .middle{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }
      .btn{
        position: relative;
        display: block;
        color: white;
        font-size: 14px;
        font-family: "montserrat";
        text-decoration: none;
        margin: 30px 0;
        border: 2px solid lightskyblue;
        padding: 14px 60px;
        text-transform: uppercase;
        overflow: hidden;
        transition: 1s all ease;
      }
      .btn::before{
        background: lightskyblue;
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        z-index: -1;
        transition: all 0.6s ease;
      }
      
      .btn1::before{
        width: 0%;
        height: 100%;
      }
      
      .btn1:hover::before{
        width: 100%;
      }
      
      
      .btn2::before{
        width: 100%;
        height: 0%;
      }
      .btn2:hover::before{
        height: 100%;
      }
      
      .btn3::before{
        width: 100%;
        height: 0%;
        transform: translate(-50%,-50%) rotate(45deg);
      }
      .btn3:hover::before{
        height: 380%;
      }
      
      .btn4::before{
        width: 100%;
        height: 0%;
        transform: translate(-50%,-50%) rotate(-45deg);
      }
      .btn4:hover::before{
        height: 380%;
      }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>GAME PROJECT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Syncopate:wght@700&display=swap" rel="stylesheet">
  </head>
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
            if(!($pergunta2=="") && !($r1=="") && !($r2=="") && !($r3=="") && !($r4=="") && !($r5=="") && !($r6=="")){
              $linha = $pergunta2 . ";" . $r1 . ";" . $r2 . ";" . $r3 . ";" . $r4 . ";" . $r5 . ";" . $r6 . "\n";
            fwrite($Multiplas,$linha);
            }
          } else {
              $linha = $c[0] . ";" . $c[1] . ";" . $c[2] . ";" . $c[3] . ";" . $c[4] . ";" . $c[5] . ";" . $c[6];
            fwrite($Multiplas,$linha);
          }
        $c = explode(";", fgets($temp));
      }
      fclose($temp);
      fclose($Multiplas);
      unlink("temp.txt");
    }

?>      
    <br>
  <center><h2 style="color:lightskyblue;">Os dados da pergunta foram alterados com sucesso!</h2></center>
    <a href="index.html" style="font-family: 'Montserrat', sans-serif;color: white;">RETORNAR</a>
</body>

</html>
