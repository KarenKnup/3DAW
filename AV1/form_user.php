<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];

//  Vou escrever os dados do formulário em um arquivo de dados já existente
    if (!file_exists("users.txt")) {
        $cabecalho = "CPF;Nome\n";
        file_put_contents("users.txt", $cabecalho);
		$txt = $cpf . ";" . $nome . "\n";
		file_put_contents("users.txt", $txt, FILE_APPEND);
		echo "Usuário inserido com sucesso!";
    } else {
		$Users = fopen ("users.txt", "r") or die ("Erro ao ler arquivo!");
		$existe = false; 
	    $c = explode(";", fgets($Users));
		  while(!feof($Users)){
			if($c[0] == $cpf){
				$existe = true;
			}
			$c = explode(";", fgets($Users));
		  }		
		  
		  if($existe == false){
			$txt = $cpf . ";" . $nome . "\n";
			file_put_contents("users.txt", $txt, FILE_APPEND);
			echo "Usuário inserido com sucesso!";
		  } else {
			  echo "CPF já registrado!";
		  }
		  
			fclose($Users);
	}
}

?>