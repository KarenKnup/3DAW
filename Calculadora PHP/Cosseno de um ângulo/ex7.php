<html> 
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Cosseno de um ângulo:</h1>
   <form action="ex7.php" method="get">
     Cosseno de (em graus)
     <input type="number" name="n1">
     <br><br>
     <input type="submit" value="Calcular">
   </form>
    <br>
  
    <?php
      $n=cos((180*$_GET["n1"])/(M_PI));
        if (!($n>0)){
         $n=0;
        }
    ?>

    Resultado = <?php echo $n; ?>
    
  </body>
</html>