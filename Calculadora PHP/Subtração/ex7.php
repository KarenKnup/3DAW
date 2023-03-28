<html> 
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <h1>Subtrair valores:</h1>
   <form action="ex7.php" method="get">
     <input type="number" name="n1">
     -
     <input type="number" name="n2">
     <br><br>
     <input type="submit" value="Subtrair">
   </form>
    <br>
  
    <?php
        //Subtração de 2 valores
      $r = $_GET["n1"] - $_GET["n2"];
        if (!($r>=0 || $r<0)){
         $r=0;
        }
    ?>

    Resultado = <?php echo $r; ?>
    
  </body>
</html>