<html> 
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Multiplicar valores:</h1>
   <form action="ex7.php" method="get">
     Multiplica
     <input type="number" name="n1">
     por
     <input type="number" name="n2">
     <br><br>
     <input type="submit" value="Multiplica">
   </form>
    <br>
  
    <?php
        //Multiplicação de 2 valores
      $r = $_GET["n1"] * $_GET["n2"];
        if (!($r>=0 || $r<0)){
         $r=0;
        }
    ?>

    Resultado = <?php echo $r; ?>
    
  </body>
</html>