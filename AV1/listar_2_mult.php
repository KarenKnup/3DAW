<!DOCTYPE html>
<html>
  <head>
    <style>
      th, td {
          border: 1px solid;
          padding: 5px;
          color: white;
        }
      
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

      h3 {
        color:red;
      }
      
       p{
        color:white;
        white-space: nowrap;
      }

      div{
        border-style: solid;
        border-color: white;
      }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Syncopate:wght@700&display=swap" rel="stylesheet">
	
    <title>GAME PROJECT</title>
    <link rel="stylesheet" href="style.css">
  </head> 
  
<body>
	<h1 style="color:lightskyblue;">➜ Ler dados de uma pergunta de múltipla escolha  </h1>
  <?php
  $pergunta = "";
  $r1="";
  $r2="";
  $r3="";
  $r4="";
  $r5="";
  $r6="";

  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $pergunta = $_POST["pergunta"];
    $Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
        while(!feof($Multiplas)){
          $c = explode(";", fgets($Multiplas));
          if($c[0] == $pergunta && !empty($c[1]) && !empty($c[2]) && !empty($c[3]) && !empty($c[4]) && !empty($c[5]) && !empty($c[6])){ #usar $pergunta aqui
            $r1=$c[1];
            $r2=$c[2];
            $r3=$c[3];                                      
            $r4=$c[4];
            $r5=$c[5];
            $r6=$c[6];
             break;
          }
        }
  }

  if(!empty($pergunta) && !empty($r1) && !empty($r2) && !empty($r3) && !empty($r4) && !empty($r5) && !empty($r6)){
    echo "<center><div>";
    echo "<h3>Pergunta: </h3>" . "<p>" . $pergunta . "</p>";
    echo "<h3>Resposta 1: </h3>" . "<p>" . $r1 . "</p>";
    echo "<h3>Resposta 2: </h3>" . "<p>" . $r2 . "</p>";
    echo "<h3>Resposta 3: </h3>" . "<p>" . $r3 . "</p>";
    echo "<h3>Resposta 4: </h3>" . "<p>" . $r4 . "</p>";
    echo "<h3>Resposta 5: </h3>" . "<p>" . $r5 . "</p>";
    echo "<h3>Resposta Correta: </h3>" . "<p>" . $r6 . "</p></div></center>"; 
  } else {
    echo "<center><h3>Essa pergunta não existe! </h3></center>";
  }
    
?>

  <a href="listar1.html" style="font-family: 'Montserrat', sans-serif;color: white;">RETORNAR</a>
</body>

</html>
