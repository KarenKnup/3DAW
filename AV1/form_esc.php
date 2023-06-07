<?php	
	$pergunta = "";
    $r1 = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pergunta = $_GET["pergunta"];
    $r1 = $_GET["r1"];

//  Vou escrever os dados do formulário em um arquivo de dados já existente
    if (!file_exists("escritas.txt")) {
        $cabecalho = "Pergunta;Resposta\n";
        file_put_contents("escritas.txt", $cabecalho);
		$txt = $pergunta . ";" . $r1 . "\n";
		file_put_contents("escritas.txt", $txt, FILE_APPEND);
		echo "Pergunta escrita inserida com sucesso!";
    } else {
		$Escritas = fopen ("escritas.txt", "r") or die ("Erro ao ler arquivo!");
		$existe = false; 
	    $c = explode(";", fgets($Escritas));
		  while(!feof($Escritas)){
			if($c[0] == $pergunta){
				$existe = true;
			}
			$c = explode(";", fgets($Escritas));
		  }		
		  
		  if($existe == false){
     		$txt = $pergunta . ";" . $r1 . "\n";
			file_put_contents("escritas.txt", $txt, FILE_APPEND);
			echo "Pergunta escrita inserida com sucesso!";
		  } else {
			  echo "Pergunta já registrada!";
		  }
		  
			fclose($Escritas);
	}
}

?>
