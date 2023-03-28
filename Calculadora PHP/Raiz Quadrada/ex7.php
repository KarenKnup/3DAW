<html> 
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Raiz quadrada de um valor:</h1>
   <form action="ex7.php" method="get">
     Raiz quadrada de
     <input type="number" name="n1">
     <br><br>
     <input type="submit" value="Calcular">
   </form>
    <br>
  
    <?php
      $r = sqrt($_GET["n1"]);
        if (!($r>0)){
         $r=0;
        }
    ?>

    Resultado = <?php echo $r; ?>
    
  </body>
</html>