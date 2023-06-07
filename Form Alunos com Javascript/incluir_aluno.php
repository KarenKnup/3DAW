<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];

//  Vou escrever os dados do formulário em um arquivo de dados já existente
    if (!file_exists("alunosNovos.txt")) {
        $cabecalho = "nome;matricula;email\n";
        file_put_contents("alunosNovos.txt", $cabecalho);
    } else {
		$Alunos = fopen ("alunosNovos.txt", "r") or die ("Erro ao ler arquivo!");
		$existe = false; 
	    $c = explode(";", fgets($Alunos));
		  while(!feof($Alunos)){
			if($c[1] == $matricula){
				$existe = true;
			}
			$c = explode(";", fgets($Alunos));
		  }		
		  
		  if($existe == false){
			$txt = $nome . ";" . $matricula . ";" . $email . "\n";
			file_put_contents("alunosNovos.txt", $txt, FILE_APPEND);
			echo "Aluno inserido com sucesso!";
		  } else {
			  echo "Matrícula já registrada!";
		  }
		  
			fclose($Alunos);
	}
}

?>