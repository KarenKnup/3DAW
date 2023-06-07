<?php	
	$pergunta = "";
    $r1 = "";
    $r2 = "";
    $r3 = "";
    $r4 = "";
    $r5 = "";
    $r6 = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pergunta = $_GET["pergunta"];
    $r1 = $_GET["r1"];
    $r2 = $_GET["r2"];
    $r3 = $_GET["r3"];
    $r4 = $_GET["r4"];
    $r5 = $_GET["r5"];
    $r6 = $_GET["r6"];

//  Vou escrever os dados do formulário em um arquivo de dados já existente
    if (!file_exists("multiplas.txt")) {
        $cabecalho = "Pergunta;Resposta 1;Resposta 2;Resposta 3;Resposta 4;Resposta 5;Resposta Correta\n";
        file_put_contents("multiplas.txt", $cabecalho);
		$txt = $pergunta . ";" . $r1 . ";" . $r2 . ";" . $r3 . ";" . $r4 . ";" . $r5 . ";" . $r6 . "\n";
		file_put_contents("multiplas.txt", $txt, FILE_APPEND);
		echo "Pergunta de múltipla escolha inserida com sucesso!";
    } else {
		$Multiplas = fopen ("multiplas.txt", "r") or die ("Erro ao ler arquivo!");
		$existe = false; 
	    $c = explode(";", fgets($Multiplas));
		  while(!feof($Multiplas)){
			if($c[0] == $pergunta){
				$existe = true;
			}
			$c = explode(";", fgets($Multiplas));
		  }		
		  
		  if($existe == false){
     		$txt = $pergunta . ";" . $r1 . ";" . $r2 . ";" . $r3 . ";" . $r4 . ";" . $r5 . ";" . $r6 . "\n";
			file_put_contents("multiplas.txt", $txt, FILE_APPEND);
			echo "Pergunta de múltipla escolha inserida com sucesso!";
		  } else {
			  echo "Pergunta já registrada!";
		  }
		  
			fclose($Multiplas);
	}
}

?>
